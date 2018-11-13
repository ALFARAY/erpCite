@extends ('layouts.admin')
@section ('contenido')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#inst").click(function(event){
        $(".block").prop('disabled',false);
        $(".borr").prop('disabled',true);

    });
  });

</script>
<div>
  <h1 class="asd">Orden de Compra N° {{$var}}</h1>
</div>
  <hr class=" my-4">
  <input type="text" name="cod_orden" value="{{$var}}" style="display:none">
<h2 class="">Materias Primas</h2>
<div class="x_content table-responsive">
  <table id="table_mp" class="table table-hover">
    <thead>
      <tr>
        <th>Código</th>
        <th>Subcategoria</th>
        <th>Detalle</th>
        <th>Cantidad Sin Recibir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($detalleorden as $det)
        <td>{{$det->cod_material}}</td>
        <td>{{$det->nom_subcategoria}}</td>
        <td>{{$det->descrip_material}}</td>
        <td>{{$det->cantidad}}</td>
      @endforeach

    </tbody>
  </table>
</div>
<h2>Insumos</h2>
<div class="x_content table-responsive">
  <table id="table_mp" class="table table-hover">
    <thead>
      <tr>
        <th>Código</th>
        <th>Subcategoria</th>
        <th>Detalle</th>
        <th>Cantidad Sin Recibir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($detalleordeninsu as $det)
        <td>{{$det->cod_material}}</td>
        <td>{{$det->nom_subcategoria}}</td>
        <td>{{$det->descrip_material}}</td>
        <td>{{$det->cantidad}}</td>
      @endforeach
    </tbody>
  </table>
</div>
<h2>Suministros</h2>
<div class="x_content table-responsive">
  <table id="table_mp" class="table table-hover">
    <thead>
      <tr>
        <th>Código</th>
        <th>Subcategoria</th>
        <th>Detalle</th>
        <th>Cantidad Sin Recibir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($detalleordensumi as $det)
        <td>{{$det->cod_material}}</td>
        <td>{{$det->nom_subcategoria}}</td>
        <td>{{$det->descrip_material}}</td>
        <td>{{$det->cantidad}}</td>
      @endforeach
    </tbody>
  </table>
</div>


@endsection
