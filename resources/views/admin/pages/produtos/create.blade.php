@extends('admin.layouts.app')
@section('titulo', 'Cadastre um produto')

@section('conteudo')
    <h1>Cadastrar novo produto</h1>

    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form class="" action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data"> @csrf
        <input type="text" name="nome" value="{{ old('nome') }}">
        <input type="text" name="descricao" value="{{ old('descricao') }}">
        <input type="file" name="imagem">
        <button type="submit">Enviar</button>
    </form>
@endsection
