@extends ('layouts.admin')
@section ('contenido')
<div>
<h3 class="font-weight-bold">Listado de Almacenes
  <a href="almacen/create">
    <button class="bttn-slant bttn-md bttn-success float-right mr-sm-5">Registrar Almacen</button></a></h3>
</div>

<div class="x_content table-responsive">
  <table id="table_mp" class="table stacktable">
    <thead>
      <tr>
        <th>Descripcion</th>
        <th>Encargado</th>
      </tr>
    </thead>
    <tbody>
      @foreach($almacen as $trab)
      <tr>
        <td>{{$trab->descrip_almacen}}</td>
        <td>{{$trab->nombres." ".$trab->apellido_paterno." ".$trab->apellido_materno}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{$almacen->render()}}
@endsection
