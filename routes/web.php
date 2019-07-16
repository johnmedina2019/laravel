<?php


Route::get('/',function() {
	return view('welcome');
});

Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/articulo','ArticuloController');
Route::resource('almacen/venta','VentaController');