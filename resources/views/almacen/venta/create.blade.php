@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-6">
		<H3>Agregar Venta</H3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
			<li>{!!$error!!}</li>
			@endforeach
			</ul>
		</div>
		@endif
		{!!Form::open(array('url'=>'../almacen/venta','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="categoria">Articulo</label>
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
			<label for="lote">Total</label>
			<input type="numeric" name="lote" class="form-control" value="sum()">
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