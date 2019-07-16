@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-6">
		<H3>Crear un Articulo</H3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
			<li>{!!$error!!}</li>
			@endforeach
			</ul>
		</div>
		@endif
		{!!Form::open(array('url'=>'../almacen/categoria','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
		</div>
		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<input type="text" name="descripcion" class="form-control" placeholder="Descripcion...">
		</div>
		<div class="form-group">
		<button class="btn btn-primary" type="submit">Crear</button>
		<button class="btn btn-danger" type="reset">Borrar</button>
		<a href="../categoria"><button type="button" class="btn btn-warning">Volver</button></a>
		</div>
		{!!Form::close()!!}
	</div>
</div>
@endsection