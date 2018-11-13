<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use erpCite\DetalleOrdenCompra;
use erpCite\OrdenCompra;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;
class OrdenCompraViewController extends Controller
{
  public function __construct()
  {
    $this->middleware('logistica');
  }
  public function index($var)
  {
    if ($var) {
      $empresa=  $idempresa=Auth::user()->RUC_empresa;
      $detalleorden=DB::table('detalle_orden_compra')->join('material','detalle_orden_compra.cod_material','=','material.cod_material')
      ->join('subcategoria','material.cod_subcategoria','=','subcategoria.cod_subcategoria')
      ->where('subcategoria.cod_categoria','=','1')
      ->where('detalle_orden_compra.cod_orden_compra','=',$var)->get();
      $detalleordeninsu=DB::table('detalle_orden_compra')->join('material','detalle_orden_compra.cod_material','=','material.cod_material')
      ->join('subcategoria','material.cod_subcategoria','=','subcategoria.cod_subcategoria')
      ->where('subcategoria.cod_categoria','=','2')->where('detalle_orden_compra.cod_orden_compra','=',$var)->get();
      $detalleordensumi=DB::table('detalle_orden_compra')->join('material','detalle_orden_compra.cod_material','=','material.cod_material')
      ->join('subcategoria','material.cod_subcategoria','=','subcategoria.cod_subcategoria')
      ->where('subcategoria.cod_categoria','=','3')
      ->where('detalle_orden_compra.cod_orden_compra','=',$var)->get();
      return view('logistica.orden_compra_vista.index',['var'=>$var,'detalleorden'=>$detalleorden,'detalleordeninsu'=>$detalleordeninsu,'detalleordensumi'=>$detalleordensumi]);
    }
  }
}
