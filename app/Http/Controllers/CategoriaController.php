<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use erpCite\CategoriaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
class CategoriaController extends Controller
{
  public function __construct()
{
  $this->middleware('admin');
}
public function index(Request $request)
{
  if ($request) {
    $clasificacion=DB::table('categoria')->paginate(5);
    return view('Categoria.index',["clasificacion"=>$clasificacion]);
  }
}
public function create(Request $request)
{
  if($request)
  {
    $categoria=DB::table('categoria')->get();
    return view("Categoria.create",["categoria"=>$categoria]);
  }

}
public function store()
{
  $identificador=rand(100,999);
  $subcategoria=new CategoriaModel;
  $subcategoria->cod_categoria=$identificador;
  $subcategoria->nom_categoria=Input::get('categoria');
  $subcategoria->save();

  return Redirect::to('Categoria');
}
public function show()
{
  return view('Categoria.index',["clasificacion"=>$clasi]);
}
public function edit($id)
{
  return Redirect::to('Categoria');
}
public function update(CategoriaFormRequest $request,$id)
{
  /*$categoria=Categoria::findOrFail($id);
  $categoria->nombre=$request->get('nombre');
  $categoria->descripcion=$request->get('descripcion');
  $categoria->update();
  return Redirect::to('almacen/categoria');*/
  return Redirect::to('Categoria');
}
public function destroy($id)
{
  $subcategoria=SubcategoriaModel::findOrFail($id);
  $subcategoria->delete();
  return Redirect::to('Categoria');
}
}
