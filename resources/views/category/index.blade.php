@extends('layouts.main')

@section('page_title')
Gerenciamento de categorias - 
@stop

@section('content')
<h1 class="page-header"><i class="fa fa-fw fa-list"></i> Categorias</h1>

<div class="row">
    <div class="col-md-6">

        {{-- Busca --}}
        @include('partials.search', ['search' => $search])

        {{-- Lista --}}
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Criada em</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @if(count($categories) > 0)
                    @foreach($categories as $cat)
                        <tr>
                            <td>{{ $cat['id'] }}</td>
                            <td>{{ $cat['name'] }}</td>
                            <td>{{ $cat['created_at'] }}</td>
                            <td>
                                <a href="{{ route('category.edit', $cat['id']) }}" class="btn btn-primary btn-xs">Editar</a>
                                <a href="{{ route('category.destroy', $cat['id']) }}" class="btn btn-danger btn-xs btn-destroy">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="4">Nenhum registro encontrado</td>
                    </tr>
                @endif
            </tbody>
        </table>

        {{-- end lista --}}

        {{-- Paginacao --}}
        <p>Página {!! $categories->currentPage() !!} de {!! $categories->lastPage() !!}</p>

        <div class="row">
            <div class="col-md-12 text-center">
                {!! $categories->render() !!}
            </div>
        </div>

        {{-- Paginacao End --}}
    </div>
    <div class="col-md-6">
        <div class="well">
            @include('partials.alerts')
            {!! Form::open(['route' => 'category.store']) !!}
                @include('category.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>

@section('scripts')
@parent
    <script src="{{ elixir('js/categories.js') }}"></script>
@stop

@stop