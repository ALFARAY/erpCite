<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
class UserChangeController extends Controller
{
  public function __construct()
  {
    $this->middleware('jefe');
  }
  public function index(Request $request)
  {
    if ($request) {
      $users=DB::table('users')->join('roles','users.role','=','roles.id')
      ->where('RUC_empresa','=',Auth::user()->RUC_empresa)->select('users.name','users.email','users.extra','users.estado','roles.description')->get();
      return view('recursos_humanos.Usuarios.index',["users"=>$users]);
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
    $almacen->nom_almacen=Input::get('nombre');
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
