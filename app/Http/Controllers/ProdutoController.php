<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProduto;

class ProdutoController extends Controller
{
    protected $request;

    /* Injeção de dependedencias - injetar instancias de classe em qualquer método */
    public function __construct(Request $request)
    {
        // dd($request);
        $this->request = $request;

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
        // $produtos = 'Carro BMW 2016';
        $produtos = ['Carro 1', 'Carro 2', 'Carro 3'];
        return view('admin.pages.produtos.index', compact('produtos'));
    }

    /**
     * CRUD - Exibir mais informações sobre um produto
     * @param  int $id [id produto]
     */
    public function show($id = null)
    {
        $produto = $id;

        return "Exibindo o produto {$produto}";
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
        return view('admin.pages.produtos.edit', compact('id'));
    }

    /**
     * CRUD - Cadastrar um novo produto
     * @param  Request $dados
     */
    public function store(StoreUpdateProduto $dados)
    {

        /* Formas de coletar dados de requisições
        echo "<pre>";
            print_r($dados->all());                                 // <-- Pega todos os dados vindo de formulários
            print_r($dados->only(['nome', 'descricao']));           // <-- Pega somente os dados passados no parametro
            echo $dados->nome . '</br>';                            // <-- Pega o NOME enviado pelo formulário
            echo $dados->descricao . '</br>';                       // <-- Pega o DESCRIÇÃO enviado pelo formulário
            echo $dados->input('nome', 'default') . '</br>';        // <-- Pega o NOME enviado pelo formulário e ou define um valor default para caso não exista
            echo $dados->input('descricao', 'default') . '</br>';   // <-- Pega o DESCRIÇÃO enviado pelo formulário e ou define um valor default para caso não exista
            var_dump($dados->has('nome'));                          // <-- verifica se tem aquele valor
            var_dump($dados->has('descricao'));                     // <-- verifica se tem aquele valor
            print_r($dados->except('descricao'));                   // <-- Pega todos os dados vindo de formulários EXCETO
            echo $dados->path() . '</br>';                          // <-- Pega o caminho/path
        echo "</pre>";
        dd($dados); */

        /* // Primeira forma de vilidação
        $dados->validate([
            'nome' => 'required|min:3|max:255',
            'descricao' => 'nullable|min:3:|max:255',
            'imagem' => 'required|image'
        ]);*/

        /* // Upload arquivos
        if($dados->imagem->isValid()):
            echo $dados->imagem->extension();
            echo $dados->imagem->getClientOriginalName();

            // Podemos configurar onde será armazenado o arquivo em "config/filesystems.php"
            // dd($dados->file('imagem')->store('produtos'));                                   // <-- faz upload e já nomeia com um nome unico

            $nomeArquivo = $dados->nome . '.' . $dados->imagem->extension();
            dd($dados->file('imagem')->storeAs('produtos', $nomeArquivo));                       // <-- faz upload e passamos o novo nome do arquivo
        endif; */

        dd('Tudo OK');
    }

    /**
     * CRUD - Atualizar registro no banco de dados
     * @param  Request $dados
     */
    public function update(Request $dados)
    {
        dd('Fazendo update...');
    }

    /**
     * Deletar um produto
     * @param  int $id
     */
    public function destroy($id = null)
    {
        return "Deletando o produto com id {$produto}";
    }
}
