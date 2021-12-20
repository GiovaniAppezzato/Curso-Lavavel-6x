@extends('admin.layouts.app')
@section('titulo', 'Listagem de produtos')

@section('conteudo')
    <div class="container">

        <div class="row mt-3">
            <div class="col-12 col-md-8 mx-auto">
                <h1 class="fw-bold">Exibindo Produtos</h1>
                <a class="btn btn-primary" href="{{ route('produtos.create')}} ">Criar um produto</a>
            </div>

            <div class="col-12 col-md-8 mx-auto mt-3">

                <form class="form form-inline d-flex" action="{{ route('produtos.search') }}" method="POST"> @csrf
                    <input class="form-control" type="text" name="filtro" placeholder="Filtrar" value="{{ $filtros['filtro'] ?? '' }}">
                    <button class="btn btn-small btn-info text-white ms-1" type="submit">Pesquisar</button>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Ações</th>
                            <th scope="col">Imagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->valor }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                                    <a class="btn btn-success" href="{{ route('produtos.show', $produto->id) }}">Detahes</a>
                                </td>
                                <td>
                                    @if($produto->imagem){{-- Criar link simbolico de public para storage --> "php artisan storage:link" --}}
                                        <img class="rounded" src="storage/produtos/{{ $produto->imagem }}" alt="{{ $produto->nome }}" style="max-width: 125px;">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(isset($filtros))
                    {!! $produtos->appends($filtros)->links() !!}
                @else
                    {!! $produtos->links() !!}
                @endif
            </div>
        </div>
    </div>
@endsection
