@extends ('layouts.admin')
@section ('contenido')
<div>
<h3 class="font-weight-bold">Listado de Trabajadores <a href="trabajador/create">
  <button class="bttn-slant bttn-md bttn-success float-right mr-sm-5">Registrar Encargado</button></a></h3>
</div>

<div class="x_content table-responsive">
  <table id="table_mp" class="table stacktable">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Puesto</th>
        <th>Tipo de Empleado</th>
        <th>Area</th>
      </tr>
    </thead>
    <tbody>
      @foreach($trabajador as $trab)
      <tr>
        <td>{{$trab->nombres." ".$trab->apellido_paterno." ".$trab->apellido_materno}}</td>
        <td>{{$trab->puesto}}</td>
        <td>{{$trab->descrip_tipo_trabajador}}</td>
        <td>{{$trab->descrip_area}}</td>
        <td><a href="" data-target="#modal-vermas-{{$trab->DNI_trabajador}}" data-toggle="modal">
         <button class="bttn-slant bttn-md bttn-danger">Ver mas</button></a></td>

      </tr>
      @include('recursos_humanos.trabajador.modal')
      @endforeach
    </tbody>
  </table>
</div>
{{$trabajador->render()}}
@endsection
