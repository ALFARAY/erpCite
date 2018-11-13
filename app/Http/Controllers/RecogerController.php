<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use erpCite\kardex;
use erpCite\KardexDetalle;
use erpCite\DetalleOrdenCompra;
use erpCite\OrdenCompra;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;


class RecogerController extends Controller
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
      ->where('detalle_orden_compra.cod_orden_compra','=',$var)
      ->where('detalle_orden_compra.cantidad','>','0')->get();
      $detalleordeninsu=DB::table('detalle_orden_compra')->join('material','detalle_orden_compra.cod_material','=','material.cod_material')
      ->join('subcategoria','material.cod_subcategoria','=','subcategoria.cod_subcategoria')
      ->where('subcategoria.cod_categoria','=','2')->where('detalle_orden_compra.cod_orden_compra','=',$var)
      ->where('detalle_orden_compra.cantidad','>','0')->get();
      $detalleordensumi=DB::table('detalle_orden_compra')->join('material','detalle_orden_compra.cod_material','=','material.cod_material')
      ->join('subcategoria','material.cod_subcategoria','=','subcategoria.cod_subcategoria')
      ->where('subcategoria.cod_categoria','=','3')
      ->where('detalle_orden_compra.cod_orden_compra','=',$var)
      ->where('detalle_orden_compra.cantidad','>','0')->get();

      $kardex=DB::table('kardex_material')->join('almacen','kardex_material.cod_almacen','=','almacen.cod_almacen')->where('kardex_material.RUC_empresa','=',$empresa)->get();
      $almacen=DB::table('almacen')->where('RUC_empresa','=',$empresa)->get();
      return view('logistica.recoger.index',['var'=>$var,'detalleorden'=>$detalleorden,'detalleordeninsu'=>$detalleordeninsu,'detalleordensumi'=>$detalleordensumi,'kardex'=>$kardex,'almacen'=>$almacen]);
    }
  }

  public function store(Request $data)
  {
      $data->validate([
      'almacen' => 'required',
      ]);
      $stocktotal;
      $id=Input::get('cod_orden');
      $mytime = date("Y-m-d H:i:s") ;
      $empresa=  $idempresa=Auth::user()->RUC_empresa;
      $cod_material=Input::get('cod_material');
      $cantidadsinrecibir=Input::get('cantidad');
      $cod_almacen=Input::get('almacen');
      $lugaralmacenaje=Input::get('lugar');
      $personal_traslado=Input::get('persona_traslado');
      $cantidadrecogida=Input::get('recogido');
      for ($i=0; $i < count($cod_material) ; $i++) {
          if( $personal_traslado[$i]=="" && $cantidadrecogida[$i]=="" )
          {

          }
          else {
            $restante=$cantidadsinrecibir[$i]-$cantidadrecogida[$i];
            $kardex=DB::table('kardex_material')->where('RUC_empresa','=',$empresa)->where('cod_material','=',$cod_material[$i])->get();
            if(count($kardex))
            {
              $detalle=new KardexDetalle;
              $detalle->cod_kardex_material=$cod_material[$i];
              $detalle->fecha_ingreso=$mytime;
              $record=DB::table('detalle_Kardex_material')->where('cod_kardex_material','=',$cod_material[$i])->get();
              if(count($record))
              {
                $cantidad=count($record)-1;
                $detalle->stock=$record[$cantidad]->stock+$cantidadrecogida[$i];
                $stocktotal=$record[$cantidad]->stock+$cantidadrecogida[$i];
              }
              else {
                $detalle->stock=$record[0]->stock+$cantidadrecogida[$i];
                $stocktotal=$record[0]->stock+$cantidadrecogida[$i];
              }
              $detalle->cantidad_ingresada=$cantidadrecogida[$i];
              $detalle->trasladador_material=$personal_traslado[$i];
              $detalle->save();
              $act=DetalleOrdenCompra::where('cod_orden_compra',$id)
              ->where('cod_material',$cod_material[$i])
              ->update(['cantidad'=>$restante,]);
              $act=Kardex::where('cod_material',$cod_material)
              ->update(['stock_total'=>$stocktotal]);

            }
            else {
              $producto=new Kardex;
              try {
                $producto->cod_kardex_material=$cod_material[$i];
                $producto->cod_almacen=$cod_almacen[$i];
                $producto->cod_material=$cod_material[$i];
                $producto->RUC_empresa=$empresa;
                $producto->stock_minimo=10;
                $producto->stock_maximo=200;
                $producto->lugar_almacenaje=strtoupper($lugaralmacenaje[$i]);
                $detalle=new KardexDetalle;
                $detalle->cod_kardex_material=$cod_material[$i];
                $detalle->fecha_ingreso=$mytime;
                $detalle->stock=$cantidadrecogida[$i];
                $stocktotal=$cantidadrecogida[$i];
                $detalle->cantidad_ingresada=$cantidadrecogida[$i];
                $detalle->trasladador_material=$personal_traslado[$i];
                $producto->save();
                $detalle->save();
                $act=DetalleOrdenCompra::where('cod_orden_compra',$id)
                ->where('cod_material',$cod_material[$i])
                ->update(['cantidad'=>$restante]);
                $act=Kardex::where('cod_material',$cod_material)
                ->update(['stock_total'=>$stocktotal]);


              } catch (Exception $e) {
                break;
              }
            }
          }

      }
        session()->flash('success','Materiales Recogidos');
        return Redirect::to('logistica/ingreso_salida');
  }
}
