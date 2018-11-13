<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$emp->RUC_empresa}}">
{{Form::Open(array('action'=>array('AdminController@store',$emp->RUC_empresa
),'method'=>'POST'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
          <h4 class="modal-title">Nuevo Usuario</h4>
			</div>
			<div class="modal-body">
        <div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">RUC:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{$emp->RUC_empresa}}" required disabled>
								<input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="ruc_empresa_USER" value="{{$emp->RUC_empresa}}" style="display:none">
                @if ($errors->has('cod_empresa'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cod_empresa') }}</strong>
                    </span>
                @endif
            </div>
        </div>
				<div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">Razon Social:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{$emp->razon_social}}" required disabled>
                @if ($errors->has('cod_empresa'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cod_empresa') }}</strong>
                    </span>
                @endif
            </div>
        </div>
          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">Nombre del Usuario</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                  @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Usuario</label>

              <div class="col-md-6">
                  <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Guardar Contraseña</label>

              <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
          </div>
          <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Role</label>

              <div class="col-md-6">
                <select name="role" class="custom-select">
                  <option value="" selected disabled>Role</option>
									@foreach($roles as $r)
                    <option value="{{$r->id}}" >{{$r->name}}</option>
									@endforeach
                </select>
              </div>
          </div>

			</div>
			<div class="modal-footer">
                <button type="submit" class="bttn-slant bttn-md bttn-primary">Guardar</button>
				<button type="button" class="bttn-slant bttn-md bttn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
