<?php

namespace inventario;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
   protected $table='articulo';
    protected $primaryKey='idarticulo';
    public $timestamps=false;
    protected $fillable=[
    'idcategoria',
    'lote',
	'cantidad',
	'fecha_expiracion',
	'precio',
    ];
protected $guarded =[
];
}
