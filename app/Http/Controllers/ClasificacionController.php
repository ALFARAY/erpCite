<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;

use erpCite\SubcategoriaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use erpCite\Http\Requests\ClasificacionFormRequest;
use DB;
class ClasificacionController extends Controller
{
    public function __construct()
  {
    $this->middleware('admin');
  }
  public function index(Request $request)
  {
    if ($request) {
      $clasificacion=DB::table('subcategoria')->paginate(5);
      return view('Subcategoria.index',["clasificacion"=>$clasificacion]);
    }
  }
  public function create(Request $request)
  {
    if($request)
    {
      $categoria=DB::table('categoria')->get();
      return view("Subcategoria.create",["categoria"=>$categoria]);
    }

  }
  public function store()
  {
    $identificador=rand(100,999);
    $subcategoria=new SubcategoriaModel;
    $subcategoria->cod_subcategoria=$identificador;
    $subcategoria->cod_categoria=Input::get('categoria');
    $subcategoria->nom_subcategoria=Input::get('subcategoria');
    $subcategoria->estado_subcategoria=1;
    $subcategoria->save();

    return Redirect::to('Subcategoria');
  }
  public function show()
  {
    return view('Subcategoria.index',["clasificacion"=>$clasi]);
  }
  public function edit($id)
  {
    return Redirect::to('Subcategoria');
  }
  public function update(CategoriaFormRequest $request,$id)
  {
    /*$categoria=Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->update();
    return Redirect::to('almacen/categoria');*/
    return Redirect::to('Subcategoria');
  }
  public function destroy($id)
  {
    $subcategoria=SubcategoriaModel::findOrFail($id);
    $subcategoria->delete();
    return Redirect::to('Subcategoria');
  }
}
