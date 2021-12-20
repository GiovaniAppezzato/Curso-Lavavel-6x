@extends('admin.layouts.app')
@section('titulo', 'Cadastre um produto')

@section('conteudo')
    <div class="container-fluid">
        <div class="col-12 col-md-8 col-xl-6 mx-auto mt-3">
            <h1>Cadastrar novo produto</h1>

            @include('admin.includes.alerts')

            <form class="" action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data"> @csrf
                <div class="form-group mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input class="form-control" id="nome" type="text" name="nome" value="{{ old('nome') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input class="form-control" id="descricao" type="text" name="descricao" value="{{ old('descricao') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input class="form-control" id="valor" name="valor" type="text" value="{{ old('valor') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="imagem" class="form-label">Selecione uma imagem</label>
                    <input class="form-control" id="imagem" name="imagem" type="file">
                </div>
                <div class="col-12">
                    <button class="btn btn-outline-success" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
