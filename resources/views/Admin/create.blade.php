@extends('layouts.app')

@section('content')


<div id="reg-usuario" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card mt-3">
                <div class="h4 card-header tab-card-header font-weight-bold d-flex justify-content-center ">Nueva Empresa</div>

                <div class="card-body ">
                  {!!Form::open(array('url'=>'Admin','files'=>true,'method'=>'POST','autocomplete'=>'off'))!!}
                        {{Form::token()}}
                  <div class="x_content">
                                <div class="row ">
                                        <div class="col-md-12">
                                        <input type="text"  id="ruc" required="required" name="nombre_empresa" class="form-control col-md-12" placeholder="Nombre de Empresa*">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <input type="text" maxlength="11" id="ruc" name="ruc_empresa" required="required" class="form-control" placeholder="RUC*">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="razon_social" name="razon_social_empresa" required="required" class="form-control" placeholder="Razon Social *">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                      <select name="tipo_contribuyente" class="custom-select">
                                        <option value="" selected disabled>Tipo de Contribuyente</option>
                                        @foreach ($tipo_contribuyente as $tip)
                                          <option value="{{$tip->cod_tipo_contribuyente}}" >{{$tip->descrip_tipo_contribuyente}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="representante_legal" name="representante_legal" required="required" class="form-control"  placeholder="Representante Legal*">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <input type="text" id="nombre_comercial" name="nombre_comercial" required="required" class="form-control" placeholder="Nombre Comercial*">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="domicilio" name="domicilio" required="required" class="form-control " placeholder="Domicilio*">
                                    </div>
                                </div>

                                  <div class="row mt-2">
                                    <div class="col-md-6">
                                        <input type="email" id="correo" name="correo" class="form-control"  placeholder="Correo">
                                    </div>
                                    <div class=" input-group col-md-6">
                                      <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">+54</span>
                                  </div>
                                        <input type="text" maxlength="6" id="telefono" name="telefono"  class="form-control" placeholder="Telefono">
                                    </div>
                                  </div>


                                <div class="row mt-2">

                                  <div class="col-md-6">
                                    <select name="regimen_laboral" class="custom-select">
                                      <option value="" selected disabled>Regimen Laboral</option>
                                      @foreach ($regimen_laboral as $regl)
                                        <option value="{{$regl->cod_regimen_laboral}}" >{{$regl->descrip_regimen_laboral}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                    <div class="col-md-6">
                                      <select name="regimen_renta" class="custom-select">
                                        <option value="" selected disabled>Regimen de Renta</option>
                                        @foreach ($regimen_renta as $regr)
                                          <option value="{{$regr->cod_regimen_renta}}" >{{$regr->descrip_regimen_renta}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <input type="text" id="pagina_web" name="pagina_web"  class="form-control" placeholder="Pagina Web">
                                    </div>

                                </div>

                                <div class=" row mt-2">
                                  <div class="col-md-12">
                                    <label for="exampleFormControlFile1">Logo de la empresa:</label>
                                    <input type="file" class="form-control-file" id="photo" name="photo">
                                  </div>

                                </div>


                                  <div class="ln_solid"></div>

                            </div>

                </div>
                            <div class="card-footer d-flex justify-content-end tab-card-header">
                                <div class="row">
                                  <div class="col-md-3 col-sm-6 d-inline d-flex justify-content-end mr-sm-5">
                                    <button type="submit" class="bttn-slant bttn-md bttn-primary">Guardar</button>
                                  </div>
                                  <div class="col-md-4 col-sm-6 d-inline d-flex justify-content-end">
                                    <a href="{{url('Admin')}}" class="bttn-slant bttn-md bttn-danger">Regresar</a>
                                  </div>
                                </div>
                            </div>
                  {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection
