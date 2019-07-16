@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-6">
		<H3>Agregar Inventario</H3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
			<li>{!!$error!!}</li>
			@endforeach
			</ul>
		</div>
		@endif
		{!!Form::open(array('url'=>'../almacen/articulo','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="categoria">Seleccione Articulo</label>
			<select name="idcategoria" class="form-control">
				@foreach ($categorias as $cat)
				<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
				@endforeach
		</select>
		</div>
		<div class="form-group">
			<label for="cantidad">Cantidad</label>
			<input type="numeric" name="cantidad" class="form-control" placeholder="Ingrese Cantidad...">
		</div>
		<div class="form-group">
			<label for="lote">Lote</label>
			<input type="numeric" name="lote" class="form-control" placeholder="Ingrese Lote...">
		</div>

		<div class="form-group">
			<label for="fecha_expiracion">Fecha de Expiracion</label>
			<input type="text" name="fecha_expiracion" class="form-control" placeholder="Ingrese Fecha (ddmmaaaa)">
		</div>
		<div class="form-group">
			<label for="precio">Precio</label>
			<input type="numeric" name="precio" class="form-control" placeholder="Ingrese Precio...">
		</div>	
		<div class="form-group">
		<button class="btn btn-primary" type="submit">Crear</button>
		<button class="btn btn-danger" type="reset">Borrar</button>
		<a href="../articulo"><button type="button" class="btn btn-warning">Volver</button></a>
		</div>
		{!!Form::close()!!}
	</div>
</div>
@endsection