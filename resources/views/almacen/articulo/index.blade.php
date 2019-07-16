@extends ('layouts.admin')
@section ('contenido')
<div class="row">
<div class="col-xs-12">
<h3>Inventario <a href="/almacen/articulo/create"> <button class="btn btn-success">Agregar</button></a></h3>
@include('almacen.articulo.search')
</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
 			<table class="table table-striped table-bordered table-condesed table-cover">
 				<thead>
 					<th>Articulo</th>
 					<th>Cantidad</th>
 					<th>Lote</th>
 					<th>Fecha de expiracion</th>
 					<th>Precio</th>
 					<th>Estado</th>
 					<th></th>
 				</thead>
 				@foreach ($articulos as $art)
 				<tr>
 					<td>{{ $art->categoria}}</td>
 					<td>{{ $art->cantidad}}</td>
 					<td>{{ $art->lote}}</td>
 					<td>{{ $art->fecha_expiracion}}</td>
 					<td>{{ $art->precio}}</td>
 					<td>{{ $art->estado}}</td>
 					<td>
 						<a href="{{URL::action('ArticuloController@edit',$art->idarticulo)}}"><button class="btn btn-primary">Editar</button></a>
 						</td>
 				</tr>
 			 	@endforeach
 			</table>
		</div>
		{{$articulos->render()}}
	</div>
</div>
@endsection