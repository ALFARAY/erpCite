<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;

use erpCite\Proveedor;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use erpCite\Http\Requests\MaterialRequest;
use DB;
class ProveedorController extends Controller
{
    public function __construct()
  {
    $this->middleware('logistica');
  }
   public function index(Request $request)
  {
    if ($request) {
    $proveedor=DB::table('proveedor')->where('proveedor.RUC_empresa',Auth::user()->RUC_empresa)->paginate(5);
      return view('logistica.proveedores.index',["proveedor"=>$proveedor]);
    }
  }
  public function create()
  {
    $tipo_proveedor=DB::table('tipo_proveedor')->get();
    return view("logistica.proveedores.create",['tipo_proveedor'=>$tipo_proveedor]);
  }
  public function store()
  {
    $idempresa=Auth::user()->RUC_empresa;
    $proveedor=new Proveedor;
    $proveedor->RUC_proveedor=Input::get('ruc_proveedor');
    $proveedor->nom_proveedor=Input::get('nomb_proveedor');
    $proveedor->direc_proveedor=Input::get('dir_proveedor');
    $proveedor->direc_tienda=Input::get('tienda_proveedor');
    $proveedor->telefono_proveedor=Input::get('tele_proveedor');
    $proveedor->cel_proveedor=Input::get('cel_proveedor');
    $proveedor->correo_proveedor=Input::get('correo_proveedor');
    $proveedor->cod_tipo_proveedor=Input::get('tipo_proveedor');
    $proveedor->RUC_empresa=$idempresa;
    $proveedor->estado_proveedor=1;
    $proveedor->save();
    return Redirect::to('logistica/proveedores');
  }
  public function show()
  {
    return view('logistica.proveedores.index');
  }
  public function edit($id)
  {
    return Redirect::to('logistica/proveedores');
  }
  public function update(CategoriaFormRequest $request,$id)
  {
    /*$categoria=Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->update();
    return Redirect::to('almacen/categoria');*/
    return Redirect::to('logistica/proveedores');
  }
  public function destroy($id)
  {
    $proveedor=Proveedor::findOrFail($id);
    $proveedor->delete();
    return Redirect::to('logistica/proveedores');
  }
}
