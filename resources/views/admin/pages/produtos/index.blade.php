@extends('admin.layouts.app')
@section('titulo', 'Listagem de produtos')

@section('conteudo')

    @include('admin.includes.alerts', ['conteudo' => 'enviado com sucesso'])

    @if(is_array($produtos))
        <ul>
            @foreach($produtos as $produto)
                <li>{{ $produto }}</li>
            @endforeach
        </ul>
        <a href="{{ route('produtos.create') }}">Cadastrar</a>
    @endif

    <hr>

    <ul>
        @forelse ($produtos as $produto)
            <li>{{ $produto }}</li>
        @empty
            <p>Não existe produtos cadastrado</p>
        @endforelse
    </ul>

    <hr>

    @component('admin.componentes.cards')
        @slot('tituloCard')
            <h1>Titulo card</h1>
        @endslot

        <p>Um card</p>
    @endcomponent
@endsection

@push('styles')
    <style media="screen">
        * {font-family: 'Nunito', sans-serif;}
    </style>
@endpush

@push('scripts')
    <script type="text/javascript">
        console.log("Laravel - push funcionou");
    </script>
@endpush
