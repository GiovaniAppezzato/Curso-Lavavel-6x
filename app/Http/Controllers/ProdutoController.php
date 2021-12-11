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
        $this->middleware(['auth'])->only([     // <-- Adicionando APENAS nos métodos especificado
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
        $produtos = ['Protudo 1', 'Produto 2', 'Produto 3'];

        return $produtos;
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
        return 'view com formulário para cadastro de produto';
    }

    /**
     * CRUD - Exibir formulário para EDITAR produto
     */
    public function edit($id = null)
    {
        return "view de edição do produto {$id}";
    }

    /**
     * CRUD - Cadastrar um novo produto
     * @param  Request $dados
     */
    public function store(Request $dados)
    {
        $produto = $dados;

        return 'Cadastrando um novo produto';
    }

    /**
     * CRUD - Atualizar registro no banco de dados
     * @param  Request $dados
     */
    public function update(Request $dados)
    {
        $produto = $dados;

        return 'Fazendo update do produto';
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
