<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class KardexController extends Controller
{
  public function __construct()
  {
    $this->middleware('logistica');
  }
  public function index(Request $request)
  {
    if ($request) {
      $query=trim($request->get('searchtext'));
      $ordenes=DB::table('orden_compra')->where('cod_orden_compra','LIKE','%'.$query.'%')->orderby('cod_orden_compra','desc')->paginate(10);
      return view('logistica.ingreso_salida.index',["ordenes"=>$ordenes,"searchtext"=>$query]);
    }
  }
  public function create(Request $request)
  {
    if($request)
    {
      return view("logistica.ingreso_salida.create");
    }

  }
  public function store()
  {

    return Redirect::to('logistica/ingreso_salida');
  }
  public function show()
  {
    return view('logistica.ingreso_salida.index');
  }
  public function edit($id)
  {
    return Redirect::to('logistica/ingreso_salida.update');
  }
  public function update(CategoriaFormRequest $request,$id)
  {
    /*$categoria=Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->update();
    return Redirect::to('almacen/categoria');*/
    return Redirect::to('logistica/articulo');
  }
  public function destroy($id)
  {

    return Redirect::to('logistica/ingreso_salida');
  }
  public function recoger()
  {
    return view(logistica.ingreso_salida.recoger);
  }
}
