@extends('admin.layouts.app')
@section('titulo', 'Cadastre um produto')

@section('conteudo')
    <h1>Cadastrar novo produto</h1>

    <form class="" action="{{ route('produtos.store') }}" method="POST"> @csrf
        <input type="text" name="" value="">
        <input type="text" name="" value="">
        <button type="submit" name="button">Enviar</button>
    </form>
@endsection

@push('styles')
    <style>
        * {font-family: 'Nunito', sans-serif !important;}
    </style>
@endpush
