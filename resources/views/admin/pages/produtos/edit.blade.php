@extends('admin.layouts.app')
@section('titulo', 'Editando produto')

@section('conteudo')
    <div class="container-fluid">
        <div class="col-12 col-md-8 col-xl-6 mx-auto mt-3">
            <h1>Editar produto</h1>

            @include('admin.includes.alerts')

            <form action="{{ route('produtos.update', $produto->id) }}" method="POST" enctype="multipart/form-data"> @csrf @method('PUT')
                <div class="form-group mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input class="form-control" id="nome" type="text" name="nome" value="{{ $produto->nome }}">
                </div>
                <div class="form-group mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input class="form-control" id="descricao" type="text" name="descricao" value="{{ $produto->descricao }}">
                </div>
                <div class="form-group mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input class="form-control" id="valor" name="valor" type="text" value="{{ $produto->valor }}">
                </div>
                <div class="form-group mb-3">
                    <label for="imagem" class="form-label">Selecione uma imagem</label>
                    <input class="form-control" id="imagem" name="imagem" type="file">
                </div>
                <div class="col-12">
                    <button class="btn btn-outline-success" type="submit">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
