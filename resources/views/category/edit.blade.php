@extends('layouts.main')

@section('content')
<h1 class="page-header"><i class="fa fa-fw fa-list"></i> Categorias</h1>

<div class="row">
	<div class="col-md-6">

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
				@foreach($categories as $cat)
					<tr>
						<td>{{ $cat['id'] }}</td>
						<td>{{ $cat['name'] }}</td>
						<td>{{ $cat['created_at'] }}</td>
						<td>
							<a href="{{ route('category.edit', $cat['id']) }}" class="btn btn-primary btn-xs">Editar</a>
							<a href="{{ route('category.destroy', $cat['id']) }}" class="btn btn-danger btn-xs">Excluir</a>
						</td>
					</tr>
				@endforeach
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
			{!! Form::model($category, ['route' => 'category.update']) !!}
				<div class="form-group">
					{!! Form::label('name', 'Nome da categoria', ['class' => 'control-label']) !!}
					{!! Form::text('name', '', ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					<button class="btn btn-primary"> Salvar </button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@stop