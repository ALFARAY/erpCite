<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use admin;
use erpCite\User;
use erpCite\Empresa;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
  use RegistersUsers;

  public function __construct()
  {
    $this->middleware('admin');

  }
  public function index(Request $request)
  {
    if ($request) {
          $empresas=DB::table('empresa')
          ->join('tipo_contribuyente','tipo_contribuyente.cod_tipo_contribuyente','=','empresa.cod_tipo_contribuyente')
          ->join('regimen_laboral','regimen_laboral.cod_regimen_laboral','=','empresa.cod_regimen_laboral')
          ->join('regimen_renta','regimen_renta.cod_regimen_renta','=','empresa.cod_regimen_renta')
          ->where('empresa.RUC_empresa','!=','cite')->paginate(10);
          $roles=DB::table('roles')->where('id','!=','1')->get();
          $tipo_contribuyente=DB::table('tipo_contribuyente')->where('cod_tipo_contribuyente','!=','1000')->get();
          $regimen_laboral=DB::table('regimen_laboral')->where('cod_regimen_laboral','!=','1000')->get();
          $regimen_renta=DB::table('regimen_renta')->where('cod_regimen_renta','!=','1000')->get();
      return view('Admin.index',['empresas'=>$empresas,'roles'=>$roles,'tipo_contribuyente'=>$tipo_contribuyente,'regimen_laboral'=>$regimen_laboral,'regimen_renta'=>$regimen_renta]);
    }
  }
  public function create(Request $data)
  {
    if($data)
    {
      $tipo_contribuyente=DB::table('tipo_contribuyente')->where('cod_tipo_contribuyente','!=','1000')->get();
      $regimen_laboral=DB::table('regimen_laboral')->where('cod_regimen_laboral','!=','1000')->get();
      $regimen_renta=DB::table('regimen_renta')->where('cod_regimen_renta','!=','1000')->get();

      return view("Admin.create",['tipo_contribuyente'=>$tipo_contribuyente,'regimen_laboral'=>$regimen_laboral,'regimen_renta'=>$regimen_renta]);
    }

  }
  public function store(Request $data)
  {
    if($data['ruc_empresa_USER']=="")
    {
      $photo="";
      if($data->hasFile('photo'))
      {
        $destination="photo";
        $file= $data->photo;
        $extension=$file->getClientOriginalExtension();
        $filename=input::get('ruc_empresa').Input::get('photo').".".$extension;
        $file->move($destination,$filename);
        $photo=$filename;
      }
      $identificador=rand(10000,99999);
      $empresa=new Empresa;
      $empresa->RUC_empresa=Input::get('ruc_empresa');
      $empresa->nom_empresa=Input::get('nombre_empresa');
      $empresa->razon_social=Input::get('razon_social_empresa');
      $empresa->representante_legal=Input::get('representante_legal');
      $empresa->nombre_comercial=Input::get('nombre_comercial');
      $empresa->domicilio=Input::get('domicilio');
      $empresa->correo=Input::get('correo');
      $empresa->telefono=Input::get('telefono');
      $empresa->pagina_web=Input::get('pagina_web');
      $empresa->imagen=$photo;
      $empresa->estado_empresa=1;
      $empresa->cod_tipo_contribuyente=Input::get('tipo_contribuyente');
      $empresa->cod_regimen_laboral=Input::get('regimen_laboral');
      $empresa->cod_regimen_renta=Input::get('regimen_renta');
      $empresa->save();
      session()->flash('success','Empresa registrada');
    }
    else {
      $data->validate([
      'role' => 'required',
      'email' => 'required|max:9',
      'password' => 'required|max:9',
      ]);
      $usuario=new User;
      $usuario->name=$data['name'];
      $usuario->email=$data['email'];
      $usuario->password=Hash::make($data['password']);
      $usuario->RUC_empresa=$data['ruc_empresa_USER'];
      $usuario->role=$data['role'];
      $usuario->estado=3;
      $usuario->id=$data['email'];
      $usuario->save();
      session()->flash('success','Usuario Registrado');
    }

    return Redirect::to('Admin');
  }
  public function reg_usuario()
  {

  }
  public function show()
  {
    return view('Admin.index');
  }
  public function edit()
  {
    return Redirect::to('Admin');
  }
  public function update($data)
  {

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
    $clasificacion->update();
    session()->flash('success','Empresa Actualizada');
    return Redirect::to('Admin');
  }
  public function destroy($id)
  {

    return Redirect::to('Admin');
  }
}
