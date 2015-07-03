@extends('layouts.main', ['selectItem' => 'projects'])

@section('page_title')
Criar novo projeto - 
@stop

@section('content')

    <h1 class="page-header">
        <i class="fa fa-fw fa-files-o"></i> Projetos
        <small>Criar novo projeto</small>
    </h1>

    @if(is_null($project))
        {!! Form::open([]) !!}
    @else
        {!! Form::model($project, []) !!}
    @endif

    <div class="form-group">
        {!! Form::label('owner', 'Líder do projeto') !!}
        {!! Form::select('owner', $usersForSelect, null, ['class' => 'form-control', 'id' => 'owner']) !!}
        <small class="text-danger">{{ $errors->first('owner') }}</small>
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>

    <div class="form-group">
        {!! Form::label('categories', 'Categorias') !!}
        {!! Form::select('categories',$categoriesForSelect, null, ['class' => 'form-control', 'multiple', 'id' => 'categories']) !!}
        <small class="text-danger">{{ $errors->first('categories') }}</small>
    </div>

    <div class="form-group">
        {!! Form::label('users', 'Membros') !!}
        {!! Form::select('users',$usersForSelect,null, ['class' => 'form-control', 'multiple', 'id' => 'users']) !!}
        <small class="text-danger">{{ $errors->first('users') }}</small>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Descrição') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('description') }}</small>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="{!! route('project.index') !!}" class="btn btn-default btn-sm">
                <i class="fa fa-fw fa-arrow-left"></i> voltar
            </a>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-success" type="submit">
                <i class="fa fa-save"></i> Salvar
            </button>
        </div>
    </div>

    {!! Form::close() !!}

    @include('partials.alerts')

@stop

@section('scripts')
@parent
    <script src="{{ elixir('js/projects.js') }}"></script>
@stop