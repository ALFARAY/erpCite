<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-update-{{$emp->RUC_empresa}}">
{{Form::Open(array('action'=>array('AdminController@update',$emp->RUC_empresa),'method'=>'patch'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
          <h4 class="modal-title">Modificar empresa: {{$emp->razon_social}}</h4>
			</div>
			<div class="modal-body">
        <div class="x_content">
                      <div class="row ">
                              <div class="col-md-12">
                              <input type="text"  id="ruc" required="required" name="nombre_empresa_mod" class="form-control col-md-12" placeholder="Nombre de Empresa*" value="{{$emp->nom_empresa}}">
                          </div>
                      </div>

                      <div class="row mt-2">
                          <div class="col-md-6">
                              <input type="text" maxlength="11" id="ruc" name="ruc_empresa_mod" required="required" class="form-control" placeholder="RUC*" value="{{$emp->RUC_empresa}}">
															<input type="text" maxlength="11" id="ruc" name="ruc_empresabuscar_mod" required="required" class="form-control" placeholder="RUC*" value="{{$emp->RUC_empresa}}"  style="display:none">
                          </div>
                          <div class="col-md-6">
                              <input type="text" id="razon_social" name="razon_social_empresa_mod" required="required" class="form-control" placeholder="Razon Social *" value="{{$emp->razon_social}}">
                          </div>
                      </div>

                      <div class="row mt-2">
                          <div class="col-md-6">
														<select name="regimen_renta_mod" class="custom-select">
															<option value=""  disabled>Regimen de Renta</option>
															<option value="{{$emp->cod_regimen_renta}}" selected>{{$emp->descrip_regimen_renta}}</option>
															@foreach($regimen_renta as $regi)
																@if ($regi->cod_regimen_renta!=$emp->cod_regimen_renta)
																	<option value="{{$regi->cod_regimen_renta}}" >{{$regi->descrip_regimen_renta}}</option>
																@endif
															@endforeach
														</select>
                          </div>
                          <div class="col-md-6">
                              <input type="text" id="representante_legal" name="representante_legal_mod" required="required" class="form-control"  placeholder="Representante Legal*" value="{{$emp->representante_legal}}">
                          </div>
                      </div>

                      <div class="row mt-2">
                          <div class="col-md-6">
                              <input type="text" id="nombre_comercial" name="nombre_comercial_mod" required="required" class="form-control" placeholder="Nombre Comercial*" value="{{$emp->nombre_comercial}}">
                          </div>
                          <div class="col-md-6">
                              <input type="text" id="domicilio" name="domicilio_mod" required="required" class="form-control " placeholder="Domicilio*" value="{{$emp->domicilio}}">
                          </div>
                      </div>

                        <div class="row mt-2">
                          <div class="col-md-6">
                              <input type="email" id="correo" name="correo_mod" class="form-control"  placeholder="Correo" value="{{$emp->correo}}">
                          </div>
                          <div class=" input-group col-md-6">
                            <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">+54</span>
                        </div>
                              <input type="text" maxlength="6" id="telefono" name="telefono_mod"  class="form-control" placeholder="Telefono" value="{{$emp->telefono}}">
                          </div>
                        </div>


                      <div class="row mt-2">

                          <div class="col-md-6">
                              <input type="text" id="pagina_web" name="pagina_web_mod"  class="form-control" placeholder="Pagina Web" value="{{$emp->pagina_web}}">
                          </div>
													<div class="col-md-6">
														<select name="regimen_laboral_mod" class="custom-select">
															<option value=""  disabled>Regimen Laboral</option>
															<option value="{{$emp->cod_regimen_laboral}}" selected>{{$emp->descrip_regimen_laboral}}</option>
															@foreach($regimen_laboral as $reg)
																@if ($reg->cod_regimen_laboral!=$emp->cod_regimen_laboral)
																	<option value="{{$reg->cod_regimen_laboral}}" >{{$reg->descrip_regimen_laboral}}</option>
																@endif
															@endforeach
														</select>
													</div>
                        </div>
												<div class="row mt-2">
														<div class="col-md-8">
															<select name="tipo_contribuyente_mod" class="custom-select">
																<option value=""  disabled>Tipo de Contribuyente</option>
																<option value="{{$emp->cod_tipo_contribuyente}}" selected>{{$emp->descrip_tipo_contribuyente}}</option>
																@foreach($tipo_contribuyente as $tipo)
																	@if ($tipo->cod_tipo_contribuyente!=$emp->cod_tipo_contribuyente)
																		<option value="{{$tipo->cod_tipo_contribuyente}}" >{{$tipo->descrip_tipo_contribuyente}}</option>
																	@endif
																@endforeach
															</select>
														</div>
														<div class="col-md-4">
															<select name="estado_mod" class="custom-select">
																<option value=""  disabled>Estado de empresa</option>
																@if($emp->estado_empresa==1)
																	<option value="{{$emp->estado_empresa}}" selected>Activa</option>
																	<option value="2" >Desactivar</option>
																@else
																	<option value="{{$emp->estado_empresa}}" selected>Desactivada</option>
																	<option value="1" >Activar</option>
																@endif
															</select>
														</div>
	                        </div>

                        <div class="ln_solid"></div>

                  </div>

      </div>
      <div class="modal-footer">
                <button type="submit" class="bttn-slant bttn-md bttn-primary">Guardar</button>
        <button type="button" class="bttn-slant bttn-md bttn-danger" data-dismiss="modal">Cerrar</button>
      </div>
			</div>

		</div>
	</div>
	{{Form::Close()}}

</div>
