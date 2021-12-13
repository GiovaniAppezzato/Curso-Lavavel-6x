<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function store(Request $dados)
    {
        dd('Cadastrando...');
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
