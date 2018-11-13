<?php

namespace erpCite\Http\Controllers;

use Illuminate\Http\Request;
use erpCite\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class CambiarContrasenaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(Request $request)
  {
    if ($request) {
      return view('Usuario.index');
    }
  }
  public function create(Request $request)
  {
    if($request)
    {
      return view("Usuario");
    }

  }
  public function store()
  {

    $id=Auth::user()->id;
    $usuario=User::findOrFail($id);
    $usuario->password=Hash::make(Input::get('password'));
    $usuario->estado=1;
    $usuario->update();
    session()->flash('success','Contraseña Cambiada');
    return Redirect::to('bienvenida');
  }
  public function show()
  {
    return view('Usuario.index');
  }
  public function edit()
  {
    return Redirect::to('Usuario');
  }
  public function update()
  {

    return Redirect::to('Usuario');
  }
  public function destroy()
  {

    return Redirect::to('Usuario');
  }
}
