<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Produto;
use App\Http\Requests\StoreUpdateProduto;

class ProdutoController extends Controller
{
    protected $request;

    /* Injeção de dependedencias - injetar instancias de classe em qualquer método */
    public function __construct(Request $request, Produto $produto)
    {
        // dd($request);
        $this->request = $request;
        $this->model = $produto;

        /* Aplicando middleware pelo controller: */
        $this->middleware([])->only([     // <-- Adicionando APENAS nos métodos especificado
            'create', 'store', 'edit', 'update', 'destroy'
        ]);

        // $this->middleware(['auth'])->except(['index', 'show']); // <-- Adicionando EXCETO nos métodos especificado
        // $this->middleware(['auth']);    // <-- Adicionando em todos os métodos
    }

    /**
     * Fazer listagem de TODOS os produtos
     */
    public function index()
    {
        // $produtos =  Produto::all();
        // $produtos =  Produto::get();
        $produtos = Produto::paginate(25);

        // dd($produtos);
        return view('admin.pages.produtos.index', ['produtos' => $produtos]);
    }

    /**
     * CRUD - Exibir mais informações sobre um produto
     * @param  int $id [id produto]
     */
    public function show($id = null)
    {
        $produto = Produto::where('id', '=', $id)->first();
        // $produto = Produto::find($id);
        // $produto = Produto::findOrFail($id);

        return !$produto ? redirect()->back() : view('admin.pages.produtos.show', ['produto' => $produto]);

        // dd($produto);
    }

    /**
     * CRUD - Exibir formulário para cadastro
     */
    public function create()
    {
        return view('admin.pages.produtos.create');
    }

    /**
     * CRUD - Exibir formulário para EDITAR produto
     */
    public function edit($id = null)
    {
        $produto = Produto::findOrFail($id);
        return view('admin.pages.produtos.edit', ['produto' => $produto]);
    }

    /**
     * CRUD - Cadastrar um novo produto
     * @param  Request $dados
     */
    public function store(StoreUpdateProduto $request)
    {
        /* Formas de coletar dados de requisições
        echo "<pre>";
            print_r($request->all());                                 // <-- Pega todos os dados vindo de formulários
            print_r($request->only(['nome', 'descricao']));           // <-- Pega somente os dados passados no parametro
            echo $request->nome . '</br>';                            // <-- Pega o NOME enviado pelo formulário
            echo $request->descricao . '</br>';                       // <-- Pega o DESCRIÇÃO enviado pelo formulário
            echo $request->input('nome', 'default') . '</br>';        // <-- Pega o NOME enviado pelo formulário e ou define um valor default para caso não exista
            echo $$request->input('descricao', 'default') . '</br>';   // <-- Pega o DESCRIÇÃO enviado pelo formulário e ou define um valor default para caso não exista
            var_dump($request->has('nome'));                          // <-- verifica se tem aquele valor
            var_dump($request->has('descricao'));                     // <-- verifica se tem aquele valor
            print_r($request->except('descricao'));                   // <-- Pega todos os dados vindo de formulários EXCETO
            echo $request->path() . '</br>';                          // <-- Pega o caminho/path
        echo "</pre>";
        dd($request); */

        /* // Primeira forma de vilidação
        $request->validate([
            'nome' => 'required|min:3|max:255',
            'descricao' => 'nullable|min:3:|max:255',
            'imagem' => 'required|image'
        ]);*/

        /* // Upload arquivos
        if($request->imagem->isValid()):
            echo $request->imagem->extension();
            echo $request->imagem->getClientOriginalName();

            // Podemos configurar onde será armazenado o arquivo em "config/filesystems.php"
            // dd($request->file('imagem')->store('produtos'));                                   // <-- faz upload e já nomeia com um nome unico

            $nomeArquivo = $request->nome . '.' . $request->imagem->extension();
            dd($request->file('imagem')->storeAs('produtos', $nomeArquivo));                       // <-- faz upload e passamos o novo nome do arquivo
        endif; */

        /*
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor;
        $produto->save(); */

        $dados = $request->all();

        if($request->hasFile('imagem') && $request->imagem->isValid()):
            $arquivo = $request->imagem;
            $extensao = $arquivo->extension();
            $imagemNome = md5($arquivo->getClientOriginalName() . strtotime('now')) . "." . $extensao;

            $request->imagem->storeAs('produtos', $imagemNome);
            $dados['imagem'] = $imagemNome;
        endif;

        Produto::create($dados);

        return redirect()
                ->route('produtos.index')
                ->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * CRUD - Atualizar registro no banco de dados
     * @param  Request $dados
     */
    public function update(StoreUpdateProduto $request, $id)
    {
        $produto = Produto::find($id);
        if(!$produto)
            return redirect()->back();

        $dados = $request->all();

        if($request->hasFile('imagem') && $request->imagem->isValid()):
            if($produto->imagem && Storage::exists("produtos/{$produto->imagem}")):
                Storage::delete("produtos/{$produto->imagem}");
            endif;

            $arquivo = $request->imagem;
            $extensao = $arquivo->extension();
            $imagemNome = md5($arquivo->getClientOriginalName() . strtotime('now')) . "." . $extensao;

            $request->imagem->storeAs('produtos', $imagemNome);
            $dados['imagem'] = $imagemNome;
        endif;

        $produto->update($dados);
        return redirect()->route('produtos.index');
    }

    /**
     * Deletar um produto
     * @param  int $id
     */
    public function destroy($id = null)
    {
        $produto = Produto::findOrFail($id);

        if($produto->imagem && Storage::exists("produtos/{$produto->imagem}")):
            Storage::delete("produtos/{$produto->imagem}");
        endif;

        $produto->delete();

        return redirect()->route('produtos.index');
    }

    /**
     * filtrar produtos
     * @param  Request $request
     */
    public function search(Request $request)
    {
        $filtros = $request->except('_token');

        $produtos = $this->model->search($request->filtro);
        return view('admin.pages.produtos.index', [
            'produtos' => $produtos,
            'filtros' => $filtros
        ]);
    }
}
