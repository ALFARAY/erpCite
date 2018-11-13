@extends('layouts.app')
@section ('content')
<div class="container">


    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h2 class="font-weight-bold">Nueva Clasificacion</h2>
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
          {!!Form::open(array('url'=>'Subcategoria','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <select name="categoria" class="custom-select">
                          <option value="" selected>Categoria</option>
                          @foreach ($categoria as $cat)
                            <option value="{{$cat->cod_categoria}}" >{{$cat->nom_categoria}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group  col-md-4 col-md-offset-4 col-xs-12">
                        <label for="total_orden_compra">Subcategoria:</label>
                         <input type="text" id="subcategoria" name="subcategoria" required="required" class="form-control ">
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
    </div>
@push ('scripts')
<script>
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");
</script>
@endpush
@endsection
