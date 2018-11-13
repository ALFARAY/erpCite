@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2 class="font-weight-bold">Registrar Almacen</h2>
                      <div class="clearfix"></div>
                    </div>
          @if (count($errors)>0)
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
            </ul>
          </div>
          @endif
          {!!Form::open(array('url'=>'logistica/almacen','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}

                    <div class="row">
                      <div class="input-group  col-md-4">
                        <select name="trabajador" class="custom-select">
                          <option value="" selected disabled >Encargado</option>
                          @foreach ($trabajadores as $trab)
                            <option value="{{$trab->DNI_trabajador}}" >{{$trab->nombres." ".$trab->apellido_paterno." ".$trab->apellido_materno}}</option>
                          @endforeach
                        </select>
                        <div class="input-group-append">
                          <a class="btn btn-outline-secondary"  href="{{url('recursos_humanos/trabajador/create')}}" >Registrar Encargado</a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Descripcion de Almacen:</label>
                         <input type="text" id="categoria" name="descripcion" required="required" maxlength="30" class="form-control ">
                      </div>
                    </div>

                          <div class="ln_solid"></div>
                      <div class="form-group">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                              <button type="submit" class="bttn-slant bttn-md bttn-success col-md-2 col-md-offset-5">Guardar</button>
                            </div>
                          </div>
          {!!Form::close()!!}
        </div>
      </div>
    </div>
@push ('scripts')
<script>
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");
</script>
@endpush
@endsection
