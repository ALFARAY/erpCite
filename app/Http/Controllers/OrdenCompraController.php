<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;

use erpCite\OrdenCompra;
use erpCite\DetalleOrdenCompra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use erpCite\Http\Requests\MaterialRequest;
use DB;
class OrdenCompraController extends Controller
{
  public function __construct()
  {
    $this->middleware('logistica');
  }
  public function index(Request $request)
  {
    if ($request) {
      $proveedores=DB::table('proveedor')->where('RUC_empresa','=',Auth::user()->RUC_empresa)->get();
      $materialesmp=DB::table('material')->join('unidad_medida','material.unidad_medida','=','unidad_medida.cod_unidad_medida')->join('subcategoria','material.cod_subcategoria','=','subcategoria.cod_subcategoria')->where('subcategoria.cod_categoria','=','1')->where('material.RUC_empresa','=',Auth::user()->RUC_empresa)->get();
      $materialesins=DB::table('material')->join('unidad_medida','material.unidad_medida','=','unidad_medida.cod_unidad_medida')->join('subcategoria','material.cod_subcategoria','=','subcategoria.cod_subcategoria')->where('subcategoria.cod_categoria','=','2')->where('material.RUC_empresa','=',Auth::user()->RUC_empresa)->get();
      $materialessum=DB::table('material')->join('unidad_medida','material.unidad_medida','=','unidad_medida.cod_unidad_medida')->join('subcategoria','material.cod_subcategoria','=','subcategoria.cod_subcategoria')->where('subcategoria.cod_categoria','=','3')->where('material.RUC_empresa','=',Auth::user()->RUC_empresa)->get();
      return view('logistica.orden_compra.index',["proveedores"=>$proveedores,"materialesmp"=>$materialesmp,"materialesins"=>$materialesins,"materialessum"=>$materialessum]);
    }
  }
  public function create()
  {
    return view("logistica.orden_compra");
  }
  public function store(Request $request)
  {
    $request->validate([
    'proveedor' => 'required',
    'tipo_compra' => 'required',
    'cantidad' => 'required',
    ]);
    $mytime = date("Y/m/d");
    $empresa=Auth::user()->RUC_empresa;
    //Se Registra el orden compra
    $identificador=rand(100000,999999);
    $ordencompra=new OrdenCompra;
    $ordencompra->cod_orden_compra=$identificador;
    $ordencompra->costo_total_oc=Input::get('total_orden');
    $ordencompra->comentario_oc=Input::get('comentarios');
    $ordencompra->RUC_empresa=$empresa;
    $ordencompra->estado_orden_compra=1;
    $ordencompra->fecha_orden_compra=$mytime;
    if($ordencompra->costo_total_oc!=0)
    {
      $ordencompra->save();
      //Se Recupera los datos para el detalle de orden de compra
      $idmaterial=Input::get('id');
      $costo=Input::get('costo');
      $unidad=Input::get('unidad');
      $cantidad=Input::get('cantidad');
      $total=Input::get('total');
      $contado=Input::get('tipo_compra');
      $fechapago=Input::get('dias');
      $proveedor=Input::get('proveedor');
      if(count($proveedor)==count($idmaterial))
      {
      for ($i=0; $i <count($idmaterial) ; $i++) {
         $detalle=new DetalleOrdenCompra;
        $identificadordetalle=rand(100000,999999);
         $detalle->id_detalle_oc=$identificadordetalle;
         $detalle->cod_orden_compra=$identificador;
         $detalle->cod_material=$idmaterial[$i];
         $detalle->cantidad=$cantidad[$i];
         $detalle->costo_unitario=$costo[$i];
         $detalle->costo_total=$total[$i];
         $detalle->material_recibido=0;
         if($contado[$i]==1)
         {
           $detalle->pago_credito=$contado[$i];
           $detalle->pago_contado=0;
           $detalle->fecha_pago=date('Y-m-d', strtotime($mytime. ' + '.$fechapago[$i].' days'));
         }
         else {
           $detalle->pago_credito=0;
           $detalle->pago_contado=$contado[$i];
         }
         $detalle->RUC_proveedor=$proveedor[$i];
         $detalle->save();
       }
      }
    }
    //

    return redirect()->action(
    'PdfController@index', ['codigo' => $identificador]
    );
  }
  public function show()
  {
    return view('logistica.orden_compra.index',["materiales"=>$materiales]);
  }
  public function edit($id)
  {
    return Redirect::to('logistica.orden_compra');
  }
  public function update(CategoriaFormRequest $request,$id)
  {
    /*$categoria=Categoria::findOrFail($id);
    $categoria->nombre=$request->get('nombre');
    $categoria->descripcion=$request->get('descripcion');
    $categoria->update();
    return Redirect::to('almacen/categoria');*/
    return Redirect::to('logistica.orden_compra');
  }
  public function destroy($id)
  {
    /*$categoria=Categoria::findOrFail($id);
    $categoria->condicion='0';
    $categoria->update();
    return Redirect::to('almacen/categoria');*/
    return Redirect::to('logistica.orden_compra');
  }
}
