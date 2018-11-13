@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2 class="font-weight-bold">Nuevo Proveedor</h2>
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
          {!!Form::open(array('url'=>'logistica/proveedores','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="row">
                  <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                    <label for="total_orden_compra">RUC Proveedor:</label>
                     <input type="text"  name="ruc_proveedor" required="required" class="form-control ">
                  </div>
                </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Nombre Proveedor:</label>
                         <input type="text"  name="nomb_proveedor" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Direccion Empresa:</label>
                         <input type="text" name="dir_proveedor" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Direccion Tienda:</label>
                         <input type="text" name="tienda_proveedor" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Telefono:</label>
                         <input type="text"  name="tele_proveedor" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Celular Proveedor:</label>
                         <input type="text" name="cel_proveedor" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Correo:</label>
                         <input type="email" name="correo_proveedor" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <select name="tipo_proveedor" class="custom-select">
                          <option value="" selected disabled>Tipo de Proveedor</option>
                          @foreach ($tipo_proveedor as $tipo)
                            <option value="{{$tipo->cod_tipo_proveedor}}" >{{$tipo->descrip_tipo_proveedor}}</option>
                          @endforeach
                        </select>
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
