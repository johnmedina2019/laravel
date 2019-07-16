@extends ('layouts.admin')

@section ('contenido')
<div class="row">
	<div class="col-xs-6">
		<H3>Editar el Articulo {{$categoria->nombre}}</H3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
			<li>{!!$error!!}</li>
			@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($categoria,['method'=>'PATCH','route'=>['categoria.update',$categoria->idcategoria]])!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" placeholder="">
		</div>
		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<input type="text" name="descripcion" class="form-control" value="{{$categoria->descripcion}}" placeholder="">
		</div>
		<div class="form-group">
		<button class="btn btn-primary" type="submit">Actualizar</button>
		<button class="btn btn-danger" type="reset">Restaurar</button>
		<a href="../categoria"><button type="button" class="btn btn-warning">Volver</button></a>
		</div>
		{!!Form::close()!!}
	</div>
</div>
@endsection