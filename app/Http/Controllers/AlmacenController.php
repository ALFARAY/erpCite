<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use erpCite\Almacen;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
class AlmacenController extends Controller
{
  public function __construct()
  {
    $this->middleware('jefe');
  }
  public function index(Request $request)
  {
    if ($request) {
      $almacen=DB::table('almacen')->join('trabajador','almacen.DNI_trabajador','=','trabajador.DNI_trabajador')->where('almacen.RUC_empresa',Auth::user()->RUC_empresa)->paginate(10);
      return view('logistica.almacen.index',["almacen"=>$almacen]);
    }
  }
  public function create(Request $request)
  {
    if($request)
    {
      $trabajadores=DB::table('trabajador')->where('RUC_empresa',Auth::user()->RUC_empresa)->get();
      return view("logistica.almacen.create",["trabajadores"=>$trabajadores]);
    }

  }
  public function store()
  {
    //Se Registra el campo detalle_orden_compra
    $empresa=Auth::user()->RUC_empresa;
    $identificador=rand(10000,99999);
    $almacen=new Almacen;
    $almacen->cod_almacen=$identificador;
    $almacen->descrip_almacen=Input::get('descripcion');
    $almacen->DNI_trabajador=Input::get('trabajador');
    $almacen->estado_almacen=1;
    $almacen->RUC_empresa=$empresa;
    $almacen->save();
    session()->flash('success','Almacen registrado');
    return Redirect::to('logistica/almacen');
  }
  public function show()
  {
    return view('recursos_humanos.area.index');
  }
  public function edit($id)
  {
    return Redirect::to('logistica/almacen');
  }
  public function update(CategoriaFormRequest $request,$id)
  {
    /*$categoria=Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->update();
    return Redirect::to('almacen/categoria');*/
    return Redirect::to('logistica/almacen');
  }
  public function destroy($id)
  {
    return Redirect::to('logistica/almacen');
  }
}
