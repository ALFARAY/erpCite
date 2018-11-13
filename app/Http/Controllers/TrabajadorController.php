<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use erpCite\Trabajador;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
class TrabajadorController extends Controller
{
  public function __construct()
  {
    $this->middleware('jefe');
  }
  public function index(Request $request)
  {
    if ($request) {
      $trabajador=DB::table('trabajador')->join('area','trabajador.cod_area','=','area.cod_area')->join('tipo_trabajador','trabajador.cod_tipo_trabajador','=','tipo_trabajador.cod_tipo_trabajador')
      ->where('trabajador.RUC_empresa',Auth::user()->RUC_empresa)->paginate(10);
      return view('recursos_humanos.trabajador.index',["trabajador"=>$trabajador]);
    }
  }
  public function create(Request $request)
  {
    if($request)
    {
      $areas=DB::table('area')->where('RUC_empresa',Auth::user()->RUC_empresa)->paginate(10);
      $tipo_trabajador=DB::table('tipo_trabajador')->get();
      return view("recursos_humanos.trabajador.create",["areas"=>$areas,'tipo_trabajador'=>$tipo_trabajador]);
    }

  }
  public function store()
  {
    //Se Registra el campo detalle_orden_compra
    $empresa=Auth::user()->RUC_empresa;
    $trabajador=new Trabajador;
    $trabajador->DNI_trabajador=Input::get('dni');
    $trabajador->nombres=Input::get('nombre');
    $trabajador->apellido_paterno=Input::get('apellidop');
    $trabajador->apellido_materno=Input::get('apellidom');
    $trabajador->direccion=Input::get('direccion');
    $trabajador->sexo=Input::get('sexo');
    $trabajador->fecha_nacimiento=Input::get('fecha');
    $trabajador->puesto=Input::get('puesto');
    $trabajador->estado_trabajador=1;
    $trabajador->cod_tipo_trabajador=Input::get('tipo');
    $trabajador->cod_area=Input::get('area');
    $trabajador->RUC_empresa=$empresa;
    $trabajador->save();
    session()->flash('success','trabajador registrado');
    return Redirect::to('recursos_humanos/trabajador');
  }
  public function show()
  {
    return view('recursos_humanos.area.index');
  }
  public function edit($id)
  {
    return Redirect::to('recursos_humanos/trabajador');
  }
  public function update(CategoriaFormRequest $request,$id)
  {
    /*$categoria=Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->update();
    return Redirect::to('almacen/categoria');*/
    return Redirect::to('recursos_humanos/trabajador');
  }
  public function destroy($id)
  {
    return Redirect::to('recursos_humanos/trabajador');
  }
}
