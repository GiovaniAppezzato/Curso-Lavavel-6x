@extends('admin.layouts.app')
@section('titulo', 'Editando produto')

@section('conteudo')
    <h1>Editando produto - {{ $id }}</h1>

    <form class="" action="{{ route('produtos.update', $id) }}" method="POST"> @csrf @method('PUT')
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
