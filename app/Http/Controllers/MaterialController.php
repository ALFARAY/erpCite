<?php

namespace erpCite\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use erpCite\Material;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;


class MaterialController extends Controller
{
  public function __construct()
{
  $this->middleware('logistica');
}
public function index(Request $request)
{
  if ($request) {
    $materiales=DB::table('material')->join('unidad_medida','material.unidad_medida','=','unidad_medida.cod_unidad_medida')->where('RUC_empresa',Auth::user()->RUC_empresa)->paginate(10);

    return view('logistica.articulo.index',["materiales"=>$materiales]);
  }
}
public function create(Request $request)
{
  if($request)
  {
    $categoria=DB::table('categoria')->get();
    $subcategoria=DB::table('subcategoria')->get();
    $unidad_medida=DB::table('unidad_medida')->get();
    return view("logistica.articulo.create",["categoria"=>$categoria,"subcategoria"=>$subcategoria,'unidad_medida'=>$unidad_medida]);
  }

}
public function store()
{
  //Se Registra el campo detalle_orden_compra
  $identificador=rand(100000,999999);
  $idempresa=Auth::user()->RUC_empresa;
  $articulo=new Material;
  $articulo->cod_material=$identificador;
  $articulo->descrip_material=Input::get('descripcion_material');
  $articulo->costo_sin_igv_material=Input::get('costo_sin_igv');
  $articulo->unidad_medida=Input::get('unidad_medida');
  $articulo->cod_subcategoria=Input::get('subcategoria');
  $articulo->estado_material=1;
  $articulo->RUC_empresa=$idempresa;
  $articulo->save();

  return Redirect::to('logistica/articulo');
}
public function show()
{
  return view('logistica.clasificacion.index',["clasificacion"=>$clasi]);
}
public function edit($id)
{
  return Redirect::to('logistica/clasificacion');
}
public function update(CategoriaFormRequest $request,$id)
{
  /*$categoria=Categoria::findOrFail($id);
  $categoria->nombre=$request->get('nombre');
  $categoria->descripcion=$request->get('descripcion');
  $categoria->update();
  return Redirect::to('almacen/categoria');*/
  return Redirect::to('logistica/clasificacion');
}
public function destroy($id)
{
  $clasificacion=Clasificacion::findOrFail($id);
  $clasificacion->condicion='2';
  $clasificacion->update();
  return Redirect::to('logistica/clasificacion');
}
}
