<?php

namespace inventario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Illuminate\support\Facades\Input;
use inventario\Http\Requests\VentaFormRequest;
use inventario\Venta;
use DB;

class VentaController extends Controller
{
     public function __construct()
    {

    }

	public function index(Request $request)
    {
                $query=trim($request->get('busqueda'));
                $ventas=DB::table('detalle_venta as dv')
                ->join('articulo as a','dv.idarticulo','a.idcategoria')
                ->select('dv.id_venta','dv.idventa','dv.cantidad','dv.total','c.nombre as categoria')
                ->where('c.nombre','LIKE','%'.$query.'%')
                ->orderBy('dv.id_venta','desc')
                ->paginate(10);
                return view('almacen.venta.index',['ventas'=>$ventas,'busqueda'=>$query]);
    }

	public function create()
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
    	return view ("almacen.venta.create",["categorias"=>$categorias]);
    }
    public function store(ArticuloFormRequest $request)
    {
    	$venta= new Venta;
    	$venta->idventa=$request->get('idventa');
    	$venta->cantidad=$request->get('cantidad');
    	$venta->total=$request->('total');


    	$articulo->save();
    	return Redirect::to('almacen/venta');
    }
    public function show($id)
    {
    		return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$articulo=Articulo::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
    	return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);
    }
    public function update(ArticuloFormRequest $request,$id)
    {
    		$articulo=Articulo::findOrFail($id);
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->cantidad=$request->get('cantidad');
        $articulo->lote=$request->get('lote');
        $articulo->fecha_expiracion=$request->get('fecha_expiracion');
        $articulo->precio=$request->get('precio');
    		$articulo->update();
    		return Redirect::to('almacen/articulo');
    }
    public function destroy($id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }  //
}
