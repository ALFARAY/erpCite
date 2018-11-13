<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class BienvenidaController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(Request $request)
  {
    if ($request) {
      $empresa=DB::table('empresa')->where('RUC_empresa','=',Auth::user()->RUC_empresa)->get();
      return view('bienvenida.index',['empresa'=>$empresa]);
    }
  }
  public function create(Request $request)
  {
    if($request)
    {
      //$categoria=DB::table('categoria')->get();
      return view("bienvenida.index");
    }

  }
  public function store()
  {
    return Redirect::to('bienvenida');
  }
  public function show()
  {
    return view('bienvenida.index');
  }
  public function edit($id)
  {
    return Redirect::to('bienvenida');
  }
  public function update(CategoriaFormRequest $request,$id)
  {
    return Redirect::to('bienvenida');
  }
  public function destroy($id)
  {
    return Redirect::to('bienvenida');
  }
}
