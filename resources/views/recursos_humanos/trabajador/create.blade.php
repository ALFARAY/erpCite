@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2 class="font-weight-bold">Registrar Encargado</h2>
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
          {!!Form::open(array('url'=>'recursos_humanos/trabajador','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}

                    <div class="row">
                      <div class="input-group  col-md-4">
                        <select name="area" class="custom-select">
                          <option value="" selected>Area</option>
                          @foreach ($areas as $subcat)
                            <option value="{{$subcat->cod_area}}" >{{$subcat->descrip_area}}</option>
                          @endforeach
                        </select>
                        <div class="input-group-append">
                          <a class="btn btn-outline-secondary"  href="{{url('recursos_humanos/area/create')}}" >Nueva Area</a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">DNI del Encargado:</label>
                         <input type="text" id="categoria" name="dni" required="required" onkeypress="return isNumberKey(event)" maxlength="8" class="form-control ">
                      </div>
                    </div>



                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Nombre del Encargado:</label>
                         <input type="text" id="categoria" name="nombre" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Apellido Paterno:</label>
                         <input type="text" id="subcategoria" name="apellidop" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Apellido Materno:</label>
                         <input type="text" id="tipo" name="apellidom" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                          <label for="total_orden_compra">Direccion:</label>
                           <input type="text" id="tipo" name="direccion" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-group  col-md-4">
                        <select name="sexo" class="custom-select">
                          <option value="" selected disabled>Sexo</option>
                            <option value="H" >Hombre</option>
                            <option value="M" >Mujer</option>
                        </select>
                      </div>

                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                          <label for="total_orden_compra">Fecha de Nacimiento:</label>
                           <input type="date" id="tipo" name="fecha" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Puesto:</label>
                         <input type="text" id="tipo" name="puesto" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                           <select name="tipo" class="custom-select">
                             <option value="" selected disabled>Tipo de Encargado</option>
                             @foreach ($tipo_trabajador as $tip)
                               <option value="{{$tip->cod_tipo_trabajador}}" >{{$tip->descrip_tipo_trabajador}}</option>
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
	<script>
	function isNumberKey(evt)
	{
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode != 46 && charCode > 31
		&& (charCode < 48 || charCode > 57))
		return false;
		return true;
	}
	</script>
@push ('scripts')
<script>
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");

</script>
@endpush
@endsection
