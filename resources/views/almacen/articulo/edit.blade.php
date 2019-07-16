@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-6">
		<H3>Editar Inventario </H3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
			<li>{!!$error!!}</li>
			@endforeach
			</ul>
		</div>
		@endif
		{!!Form::model($articulo,['method'=>'PATCH','route'=>['articulo.update',$articulo->idarticulo]])!!}
		{{Form::token()}}
		<div class="form-group">
			<label for="categoria">Categoria</label>
			<select name="idcategoria" class="form-control" placeholder="{{$articulo->nombre}}">
				@foreach ($categorias as $cat)
				<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="cantidad">Cantidad</label>
			<input type="numeric" name="cantidad" class="form-control" value="{{$articulo->cantidad}}" placeholder="">
		</div>
		<div class="form-group">
			<label for="lote">Lote</label>
			<input type="numeric" name="lote" class="form-control" value="{{$articulo->lote}}" placeholder="">
		</div>
		<div class="form-group">
			<label for="fecha_expiracion">Fecha de Expiracion</label>
			<input type="text" name="fecha_expiracion" class="form-control" value="{{$articulo->fecha_expiracion}}" placeholder="">
		</div>
		<div class="form-group">
			<label for="precio">Precio</label>
			<input type="numeric" name="precio" class="form-control" value="{{$articulo->precio}}" placeholder="">
		</div>	
		<div class="form-group">
		<button class="btn btn-primary" type="submit">Actualizar</button>
		<button class="btn btn-danger" type="reset">Restaurar</button>
		<a href='../'><button type="button" class="btn btn-warning">Volver</button></a>
		</div>
		{!!Form::close()!!}
	</div>
</div>
@endsection