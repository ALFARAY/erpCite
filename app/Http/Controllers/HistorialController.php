<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use erpCite\KardexDetalle;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Auth;
use erpCite\Charts\historial;
class HistorialController extends Controller
{
  public function __construct()
  {
    $this->middleware('logistica');
  }
  public function index($var)
  {
    if ($var) {
      $data = collect([]);
      for($mes=0;$mes<13;$mes++)
      {
         $data->push(KardexDetalle::whereDate('fecha_ingreso', today()->subDays($days_backwards))->count());
      }
      $chart = new historial;
      $chart->labels(['2 days ago', 'Yesterday', 'Today']);
      $chart->dataset(['Mis datos','line',$data]);
      return view('logistica.historial.index',['var'=>$var,'chart'=>$chart]);
    }
  }
}
