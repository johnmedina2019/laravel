@extends ('layouts.admin')
@section ('contenido')
<div class="row">
<div class="col-xs-12">
<h3>Listado de Articulos<a href="categoria/create"> <button class="btn btn-success">Crear</button></a></h3>
@include('almacen.categoria.search')
</div>
</div>
<div class="row">
	<div class="col-xs-9">
		<div class="table-responsive">
 			<table class="table table-striped table-bordered table-condesed table-cover">
 				<thead>
 					<th>Id</th>
 					<th>Nombre</th>
 					<th>Descripcion</th>
 					<th></th>
 				</thead>
 				@foreach ($categorias as $cat)
 				<tr>
 					<td>{{ $cat->idcategoria}}</td>
 					<td>{{ $cat->nombre}}</td>
 					<td>{{ $cat->descripcion}}</td>
 					<td>
 						<a href="{{URL::action('CategoriaController@edit',$cat->idcategoria)}}"><button class="btn btn-primary">Editar</button></a>
 						
 					</td>
 				</tr>
 				
 				@endforeach
 			</table>
		</div>
		{{$categorias->render()}}
	</div>
</div>

<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="model-title text-center" id="myModalLabel">Eliminar Categoria</h4>
			</div>
			<form action="{{route('categoria.destroy','test')}}" method="post">
				{{method_field('delete')}}
				{{csrf_field()}}
				<div class="modal-body">
					<p class="text-center">
						Esta seguro de eliminar la categoria?
					</p>
					<input type="hidden" name="category_id" id="cat_id" value="">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">No, Cancelar</button>
					<button type="submit" class="btn btn-warning">Si, Eliminar</button>
				</div>
			</form>
		</div>
	</div>	
</div>

@endsection