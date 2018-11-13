@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2 class="font-weight-bold">Nueva Producto</h2>
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
          {!!Form::open(array('url'=>'logistica/articulo','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}

                    <div class="row">
                      <div class="input-group  col-md-4">
                        <select name="subcategoria" class="custom-select">
                          <option value="" selected>Subcategoria</option>
                          @foreach ($subcategoria as $subcat)
                            <option value="{{$subcat->cod_subcategoria}}" >{{$subcat->nom_subcategoria}}</option>
                          @endforeach
                        </select>
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Nombre del Material:</label>
                         <input type="text" id="categoria" name="nombre_material" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Descripcion de Material:</label>
                         <input type="text" id="subcategoria" name="descripcion_material" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Costo sin IGV:</label>
                         <input type="text" id="tipo" name="costo_sin_igv" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <select name="unidad_medida" class="custom-select">
                          <option value="" selected disabled>Unidad de medida</option>
                          @foreach ($unidad_medida as $uni)
                            <option value="{{$uni->cod_unidad_medida}}" >{{$uni->descrip_unidad_medida}}</option>
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
