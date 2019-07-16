<?php

namespace inventario\Http\Controllers;

use Illuminate\Http\Request;
use inventario\Categoria;
use Illuminate\Support\Facades\Redirect;
use inventario\Http\Request\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct()
    {

    }

	public function index(Request $request)
    {
                $query=trim($request->get('busqueda'));
                $categorias=DB::table('categoria as c')
                ->select('c.idcategoria','c.nombre','c.descripcion','c.condicion')
                ->where('c.nombre','LIKE','%'.$query.'%')
                ->orderBy('idcategoria','asc')
                ->paginate(10);
                return view('almacen.categoria.index',['categorias'=>$categorias,'busqueda'=>$query]);

    }

	public function create()
    {
    			return view ('almacen.categoria.create');
    }
    public function store(CategoriaFormRequest $request)
    {
    	$categoria= new Categoria;
    	$categoria->nombre=$request->get('nombre');
    	$categoria->descripcion=$request->get('descripcion');
    	$categoria->condicion='1';
    	$categoria->save();
    	return Redirect::to('almacen/categoria');
    }
    public function show($id)
    {
    		return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
    		return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request,$id)
    {
    		$categoria=Categoria::findOrFail($id);
    		$categoria->nombre=$request->get('nombre');
    		$categoria->descripcion=$request->get('descripcion');
    		$categoria->update();
    		return Redirect::to('almacen/categoria');
    }
    public function destroy(Request $request)
    {
        $categoria=Categoria::findOrFail($request->idcategoria);
        $categoria->delete();
        return back();
    }
}
