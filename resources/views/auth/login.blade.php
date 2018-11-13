@extends('layouts.app')

@section('content')
@guest
@else
   <script>window.location = "logistica/orden_compra";</script>
@endguest

        <div class="container login col-12 col-ms-12 col-md-10 col-lg-10 col-lx-10 ">
                <div class="row">
                    <div class="col-md-4 login-left">
                        <img src="img/logo_cite_v2.png" width="230" height="200"/>
                        <h3 class="">Bienvenido a ERP</h3>
                        <h3><strong> CITE Cuero y Calzado</strong></h3>
                        <p>ERP diseñado para todo tipo de empresa del sector calzado, que permite integrar y gestionar las principales áreas de su organizacion desde un solo sistema.</p>                        
                    </div>
                    <div class="col-md-8 login-right p-5">
                                          
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="login-heading"> <strong>Inicio de Sesión</strong></h3>
                                
                                
                                    <div class="row login-form d-flex justify-content-center">
                                        <div class="col-md-9 col-lg-7 col-lx-7 ">
                                            <form method="POST" action="{{ route('login') }}">
                                                    @csrf   
                                                <div class="form-group">                                                    
                                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Usuario" required autofocus >
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>                                        
                                                <div class="form-group">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>                                      
                                                <button type="submit" class="btnlogin bttn-slant bttn-md bttn-primary">{{ __('Aceptar') }}</button>
                                            </form>
                                        </div>                                    
                                    </div>
                            </div>                                                     
                        </div>                        
                    </div>
                </div>
        </div>



@endsection
