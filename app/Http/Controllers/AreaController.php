<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use erpCite\Area;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
class AreaController extends Controller
{
  public function __construct()
  {
    $this->middleware('jefe');
  }
  public function index(Request $request)
  {
    if ($request) {
      $areas=DB::table('area')->where('RUC_empresa',Auth::user()->RUC_empresa)->paginate(10);
      return view('recursos_humanos.area.index',["areas"=>$areas]);
    }
  }
  public function create(Request $request)
  {
    if($request)
    {

      return view("recursos_humanos.area.create");
    }

  }
  public function store()
  {
    //Se Registra el campo detalle_orden_compra
    $empresa=Auth::user()->RUC_empresa;
    $identificador=rand(10000,99999);
    $area=new Area;
    $area->cod_area=$identificador;
    $area->descrip_area=Input::get('area');
    $area->RUC_empresa=$empresa;
    $area->estado_area=1;
    $area->save();
    session()->flash('success','Area registrada');
    return Redirect::to('recursos_humanos/area');
  }
  public function show()
  {
    return view('recursos_humanos.area.index',["clasificacion"=>$clasi]);
  }
  public function edit($id)
  {
    return Redirect::to('recursos_humanos/area');
  }
  public function update(CategoriaFormRequest $request,$id)
  {
    /*$categoria=Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->update();
    return Redirect::to('almacen/categoria');*/
    return Redirect::to('recursos_humanos/area');
  }
  public function destroy($id)
  {
    return Redirect::to('recursos_humanos/area');
  }
}
