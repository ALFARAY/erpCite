<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use PDF;
class PdfController extends Controller
{
  public function index(Request $request){
    if ($request) {
      $query=trim($request->get('codigo'));
      $pdf=\App::make('dompdf.wrapper');
      $pdf->loadHTML($this->convert_data($query));
      return $pdf->stream();
    }
  }
  function get_data($query)
  {
    $orden_data=DB::table('detalle_orden_compra')->join('material','detalle_orden_compra.cod_material','=','material.cod_material')->join('subcategoria','material.cod_subcategoria','=','subcategoria.cod_subcategoria')->join('proveedor','detalle_orden_compra.RUC_proveedor','=','proveedor.RUC_proveedor')->where('detalle_orden_compra.cod_orden_compra','=',$query)->get();
    return $orden_data;
  }
  function get_cabecera($query)
  {
    $cabecera=DB::table('orden_compra')->where('cod_orden_compra','=',$query)->limit(1)->get();
    return $cabecera;
  }
  function get_imagen($query)
  {
    foreach ($query as $q) {
        $imagen=DB::table('empresa')->where('RUC_empresa','=',$q->RUC_empresa)->limit(1)->get();
        return $imagen;
    }
  }
  function convert_data($query)
  {
    $detalle=$this->get_data($query);
    $cabecera=$this->get_cabecera($query);
    $img=$this->get_imagen($cabecera);
    $photo="";
    foreach ($img as $i) {
        if($i->imagen!="")
        {
          $photo=$i->imagen;
        }
    }
    foreach($cabecera as $cab)
    {
      if ($photo=="") {
        $output='
        <h1>Orden de Compra N°'.$cab->cod_orden_compra.'</h1>
        ';
      }
      else {
        $output='
        <div class="row">
          <div class="col-md-12">
            <img src="photo/'.$photo.'" alt="" class="img-rounded center-block">
          </div>
        </div>
        <h1>Orden de Compra N°'.$cab->cod_orden_compra.'</h1>
        ';
      }

    }
    $output.='
      <h2>Materias Primas</h2>
      <table  style="border-collapse: collapse; border: 1px solid black;">
          <tr>
            <th style="border-collapse: collapse; border: 1px solid black;">Código Material</th>
            <th style="border-collapse: collapse; border: 1px solid black;">Subcategoria</th>
            <th style="border-collapse: collapse; border: 1px solid black;">Detalle</th>
            <th style="border-collapse: collapse; border: 1px solid black;">proveedor</th>
            <th style="border-collapse: collapse; border: 1px solid black;">Cantidad</th>
            <th style="border-collapse: collapse; border: 1px solid black;">Unidad Medida</th>
            <th style="border-collapse: collapse; border: 1px solid black;">Costo sin IGV</th>
            <th style="border-collapse: collapse; border: 1px solid black;">Total</th>
            <th style="border-collapse: collapse; border: 1px solid black;">Tipo de Compra</th>
            <th style="border-collapse: collapse; border: 1px solid black;">Fecha de pago</th>
          </tr>

    ';
    foreach ($detalle as $dat) {
      if($dat->cod_categoria==1)
      {
        if($dat->pago_contado==2)
        {
          $tipo="contado";
        }
        else {
          $tipo="credito";
        }
        $output.='
        <tr>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->cod_material.'</td>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->cod_subcategoria.'</td>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->descrip_material.'</td>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->nom_proveedor.'</td>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->cantidad.'</td>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->unidad_medida.'</td>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->costo_unitario.'</td>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->costo_total.'</td>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$tipo.'</td>
          <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->fecha_pago.'</td>
        </tr>
        ';
      }
    }
    $output.='</table>';
    $output.='
    <h2>Insumos</h2>
    <table  style="border-collapse: collapse; border: 1px solid black;">
        <tr>
          <th style="border-collapse: collapse; border: 1px solid black;">Código</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Subcategoria</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Detalle</th>
          <th style="border-collapse: collapse; border: 1px solid black;">proveedor</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Cantidad</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Unidad Medida</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Costo sin IGV</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Total</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Tipo de Compra</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Fecha de pago</th>
        </tr>
    ';
    foreach ($detalle as $dat) {
      if($dat->cod_categoria==2)
      {
        if($dat->pago_contado==2)
        {
          $tipo="contado";
        }
        else {
          $tipo="credito";
        }
        $output.='
        <tr>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->cod_material.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->cod_subcategoria.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->descrip_material.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->nom_proveedor.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->cantidad.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->unidad_medida.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->costo_unitario.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->costo_total.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$tipo.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->fecha_pago.'</td>
        </tr>
        ';
      }
    }
    $output.='</table>';
    $output.='
    <h2>Suministros</h2>
    <table  style="border-collapse: collapse; border: 1px solid black;">
        <tr>
          <th style="border-collapse: collapse; border: 1px solid black;">Código</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Subcategoria</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Detalle</th>
          <th style="border-collapse: collapse; border: 1px solid black;">proveedor</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Cantidad</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Unidad Medida</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Costo sin IGV</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Total</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Tipo de Compra</th>
          <th style="border-collapse: collapse; border: 1px solid black;">Fecha de pago</th>
        </tr>
    ';
    foreach ($detalle as $dat) {
      if($dat->cod_categoria==3)
      {
        if($dat->pago_contado==2)
        {
          $tipo="contado";
        }
        else {
          $tipo="credito";
        }
        $output.='
        <tr>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->cod_material.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->cod_subcategoria.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->descrip_material.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->nom_proveedor.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->cantidad.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->unidad_medida.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->costo_unitario.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->costo_total.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$tipo.'</td>
        <td style="border-collapse: collapse; border: 1px solid black;">'.$dat->fecha_pago.'</td>
        </tr>
        ';
      }
    }
    $output.='</table>';
    foreach($cabecera as $cab)
    {
      $output.='<h3>Total:S/.'.$cab->costo_total_oc.'</h3>';
    }

    return $output;
  }


}
