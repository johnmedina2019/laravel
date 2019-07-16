<?php

namespace inventario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Illuminate\support\Facades\Input;
use inventario\Http\Requests\ArticuloFormRequest;
use inventario\Articulo;
use DB;

class ArticuloController extends Controller
{
   public function __construct()
    {

    }

	public function index(Request $request)
    {
        
                $query=trim($request->get('busqueda'));
                $articulos=DB::table('articulo as a')
                ->join('categoria as c','a.idcategoria','c.idcategoria')
                ->select('a.idarticulo','a.lote','a.cantidad','a.fecha_expiracion','c.nombre as categoria','a.precio','a.estado')
                ->where('c.nombre','LIKE','%'.$query.'%')
                ->orderBy('a.idarticulo','desc')
                ->paginate(10);

                return view('almacen.articulo.index',['articulos'=>$articulos,'busqueda'=>$query]);

    }

	public function create()
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
    	return view ("almacen.articulo.create",["categorias"=>$categorias]);
    }
    public function store(ArticuloFormRequest $request)
    {
    	$articulo= new Articulo;
    	$articulo->idcategoria=$request->get('idcategoria');
    	$articulo->cantidad=$request->get('cantidad');
    	$articulo->lote=$request->get('lote');
    	$articulo->fecha_expiracion=$request->get('fecha_expiracion');
    	$articulo->precio=$request->get('precio');
    	$articulo->estado='Activo';
    	$articulo->save();
    	return Redirect::to('almacen/articulo');
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
    }
}

