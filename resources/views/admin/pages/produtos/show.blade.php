@extends('admin.layouts.app')
@section('titulo', "informações - {$produto->nome}")

@section('conteudo')
    <div class="container-fluid">
        <h2>informações sobre - <span class="fw-bold">{{ $produto->nome }}</span></h2>
        <a href="{{ route('produtos.index') }}">Voltar</a>

        <ul class="mt-3">
            <li>Nome: {{ $produto->nome }}</li>
            <li>Descrição: {{ $produto->descricao }}</li>
            <li>Valor: {{ $produto->valor }}</li>
        </ul>

        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete">Deletar</button>
    </div>

    <div class="modal fade" id="modal-delete" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title fw-bold text-white">Atenção usuário!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Deseja deletar o evento - {{ $produto->id }}<span class="fw-bold">{{ $produto->titulo }}</span>?</p>

                    <div class="accordion" id="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
                                    Mais informações
                                </button>
                            </h2>
                            <div id="collapse" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><span class="fw-bold">id: </span> {{ $produto->id }}</li>
                                        <li class="list-group-item"><span class="fw-bold">Produto: </span> {{ $produto->nome }}</li>
                                        <li class="list-group-item"><span class="fw-bold">Descrição: </span> {{ $produto->descricao }}</li>
                                        <li class="list-group-item"><span class="fw-bold">Valor: </span> {{ $produto->valor }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form class="d-inline-block" action="{{ route('produtos.destroy', $produto->id) }}" method="POST"> @csrf @method('delete')
                        <button class="btn btn-danger">Deletar</button>
                    </form>

                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
