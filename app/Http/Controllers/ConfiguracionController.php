<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\File;

use erpCite\Empresa;
class ConfiguracionController extends Controller
{
   public function __construct()
  {
    $this->middleware('jefe');
  }
  public function index(Request $request)
  {
    if ($request) {
      $empresas=DB::table('empresa')
      ->join('tipo_contribuyente','tipo_contribuyente.cod_tipo_contribuyente','=','empresa.cod_tipo_contribuyente')
      ->join('regimen_laboral','regimen_laboral.cod_regimen_laboral','=','empresa.cod_regimen_laboral')
      ->join('regimen_renta','regimen_renta.cod_regimen_renta','=','empresa.cod_regimen_renta')
      ->where('empresa.RUC_empresa','=',Auth::user()->RUC_empresa)->get();
      $roles=DB::table('roles')->where('id','!=','1')->get();
      $tipo_contribuyente=DB::table('tipo_contribuyente')->where('cod_tipo_contribuyente','!=','1000')->get();
      $regimen_laboral=DB::table('regimen_laboral')->where('cod_regimen_laboral','!=','1000')->get();
      $regimen_renta=DB::table('regimen_renta')->where('cod_regimen_renta','!=','1000')->get();
      return view('configuracion_inicial.index',['empresas'=>$empresas,'roles'=>$roles,'tipo_contribuyente'=>$tipo_contribuyente,'regimen_laboral'=>$regimen_laboral,'regimen_renta'=>$regimen_renta]);
  	}
  }
  public function create()
  {
    return view("configuracion_inicial.create");
  }
  public function store(Request $data)
  {
    $photo="";
    if($data->hasFile('foto'))
    {
      $destination="photo";
      $file= $data->foto;
      $extension=$file->getClientOriginalExtension();
      $filename=input::get('ruc_empresabuscar_mod').Input::get('foto').".".$extension;
      $file->move($destination,$filename);
      $photo=$filename;
      session()->flash('success','Su Empresa se a actualizado');
    }
    $clasificacion=Empresa::findOrFail(Input::get('ruc_empresabuscar_mod'));
    $clasificacion->RUC_empresa=Input::get('ruc_empresa_mod');
    $clasificacion->estado_empresa=Input::get('estado_mod');
    $clasificacion->nom_empresa=Input::get('nombre_empresa_mod');
    $clasificacion->razon_social=Input::get('razon_social_empresa_mod');
    $clasificacion->representante_legal=Input::get('representante_legal_mod');
    $clasificacion->nombre_comercial=Input::get('nombre_comercial_mod');
    $clasificacion->domicilio=Input::get('domicilio_mod');
    $clasificacion->correo=Input::get('correo_mod');
    $clasificacion->telefono=Input::get('telefono_mod');
    $clasificacion->pagina_web=Input::get('pagina_web_mod');
    $clasificacion->cod_tipo_contribuyente=Input::get('tipo_contribuyente_mod');
    $clasificacion->cod_regimen_laboral=Input::get('regimen_laboral_mod');
    $clasificacion->cod_regimen_renta=Input::get('regimen_renta_mod');
    $clasificacion->imagen=$photo;
    $clasificacion->update();
    return Redirect::to('configuracion_inicial');
  }
  public function show()
  {
    return view('logistica.clasificacion.index',["clasificacion"=>$clasi]);
  }
  public function edit($id)
  {
    return Redirect::to('configuracion_inicial');
  }
  public function update(Request $data)
  {


    return Redirect::to('configuracion_inicial');
  }
  public function destroy($id)
  {
    $clasificacion=Clasificacion::findOrFail($id);
    $clasificacion->condicion='2';
    $clasificacion->update();
    return Redirect::to('logistica/clasificacion');
  }
}
