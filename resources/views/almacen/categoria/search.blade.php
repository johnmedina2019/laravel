
{!! Form::open(array('url'=>'almacen/categoria','method'=>'get','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
	<div class="col-xs-6">
		<div class="input-group">
				<input type="text" class="form-control" name="busqueda" placeholders="Escriba Aqui..." value="{{$busqueda}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Filtrar</button>
		</span>
	    </div>
	</div>
</div>
{!!Form::close()!!}