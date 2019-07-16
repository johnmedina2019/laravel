<?php

namespace inventario;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table='detalle_venta';
    protected $primaryKey='id_venta';
    public $timestamps=false;
    protected $fillable=[
    'id_venta',
    'idventa',
	'idarticulo',
	'cantidad',
	'total',
    ];
protected $guarded =[
];   //
}
