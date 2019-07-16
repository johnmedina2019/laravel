@extends ('layouts.admin')
@section ('contenido')
<div class="row">
<div class="col-xs-12">
<h3>Inventario <a href="/almacen/venta/create"> <button class="btn btn-success">Agregar Compra</button></a></h3>
@include('almacen.venta.search')
</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="table-responsive">
 			<table class="table table-striped table-bordered table-condesed table-cover">
 				<thead>
 					<th>Id venta</th>
 					<th>Articulo</th>
 					<th>Cantidad</th>
 					<th>Total</th>
 					<th></th>
 				</thead>
 				@foreach ($ventas as $ven)
 				<tr>
 					<td>{{ $ven->id_venta}}</td>
 					<td>{{ $ven->articulo}}</td>
 					<td>{{ $ven->cantidad}}</td>
 					<td>{{ $ven->Total}}</td>
 					<td>
 						<a href="{{URL::action('VentaController@edit',$ven->id_venta)}}"><button class="btn btn-primary">Generar Factura</button></a>
 						</td>
 				</tr>
 			 	@endforeach
 			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>
@endsection