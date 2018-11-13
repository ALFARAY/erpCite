<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use erpCite\Http\Requests\MaterialRequest;
use DB;
use erpCite\kardex;
use erpCite\KardexDetalle;
class KardexMatController extends Controller
{
  public function __construct()
  {
    $this->middleware('logistica');
  }
  public function index(Request $request)
  {
    if ($request) {
      $empresa=Auth::user()->RUC_empresa;
      $query=trim($request->get('searchtext'));
      $kardex=DB::table('kardex_material')
      ->join('material','kardex_material.cod_material','=','material.cod_material')
      ->where('kardex_material.cod_material','LIKE','%'.$query.'%')
      ->where('kardex_material.RUC_empresa','=',$empresa)
      ->orderby('material.cod_material','desc')
      ->paginate(10);

      return view('logistica.kardex.index',["kardex"=>$kardex,"searchtext"=>$query]);
    }
  }
  public function create(Request $request)
  {
    if($request)
    {
      return view("logistica.kardex.create");
    }

  }
  public function store(Request $data)
  {
    if($data)
    {
        $mytime = date("Y-m-d H:i:s") ;
        $stocktotal;
        $cod_material=Input::get('codmatbuscar');
        $cantidaddevuelta=Input::get('cantidad_devuelta');
        $detalle=new KardexDetalle;
        $persona=Input::get('trasladador_devolucion');
        $detalle->cod_kardex_material=$cod_material;
        $detalle->fecha_devolucion=$mytime;
        $detalle->cantidad_ingresada=$cantidaddevuelta;
        $detalle->trasladador_material=$persona;
        $detalle->comentario_devolucion=Input::get('comentarios');
        $record=DB::table('detalle_Kardex_material')->where('cod_kardex_material','=',$cod_material)->get();
        if(count($record))
        {
          $cantidad=count($record)-1;
          $detalle->stock=$record[$cantidad]->stock+$cantidaddevuelta;
          $stocktotal=$record[$cantidad]->stock+$cantidaddevuelta;
        }
        else {
          $detalle->stock=$record[0]->stock+$cantidaddevuelta;
          $stocktotal=$record[0]->stock+$cantidaddevuelta;
        }
        $detalle->save();
        $act=Kardex::where('cod_material',$cod_material)
        ->update(['stock_total'=>$stocktotal]);
          session()->flash('success','Devolucion Registrada');
              return Redirect::to('logistica/kardex');
    }
  }
  public function show()
  {
    return view('logistica.ingreso_salida.index');
  }
  public function edit($id)
  {
    return Redirect::to('logistica/ingreso_salida.update');
  }
  public function update($data)
  {
    if($data)
    {
      if(Input::get('stock_mat')<Input::get('cantidad_entregar'))
      {
          session()->flash('error','Cantidad por entregar no puede superar al stock');
      }
      else {
        $mytime = date("Y-m-d H:i:s") ;
        $stocktotal;
        $cod_material=Input::get('cod_mat_buscar');
        $cantidadsalida=Input::get('cantidad_entregar');
        $detalle=new KardexDetalle;
        $persona=Input::get('trasladador_material');
        $detalle->cod_kardex_material=$cod_material;
        $detalle->fecha_salida=$mytime;
        $detalle->cantidad_salida=$cantidadsalida;
        $detalle->trasladador_material=$persona;
        $record=DB::table('detalle_Kardex_material')->where('cod_kardex_material','=',$cod_material)->get();
        if(count($record))
        {
          $cantidad=count($record)-1;
          $detalle->stock=$record[$cantidad]->stock-$cantidadsalida;
          $stocktotal=$record[$cantidad]->stock-$cantidadsalida;
        }
        else {
          $detalle->stock=$record[0]->stock-$cantidadsalida;
          $stocktotal=$record[0]->stock-$cantidadsalida;
        }
        $detalle->save();
        $act=Kardex::where('cod_material',$cod_material)
        ->update(['stock_total'=>$stocktotal]);
          session()->flash('success','Salida Registrada');
      }
              return Redirect::to('logistica/kardex');
    }
  }
  public function destroy($id)
  {

    return Redirect::to('logistica/ingreso_salida');
  }
  public function recoger()
  {
    return view(logistica.ingreso_salida.recoger);
  }
}
