@extends ('layouts.admin')
@section ('contenido')
<div>
<h3 class="font-weight-bold">Listado de Proveedores <a href="proveedores/create">
  <button class="bttn-slant bttn-md bttn-success float-right mr-sm-5">Nuevo Proveedor</button></a></h3>
</div>
<div class="x_content table-responsive">
  <table id="table_mp" class="table stacktable">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Direccion Tienda</th>
        <th>Telefono</th>
        <th>Celular</th>
        <th>Correo</th>
      </tr>
    </thead>
    <tbody>
      @foreach($proveedor as $pro)
      <tr>
        <td>{{$pro->nom_proveedor}}</td>
        <td>{{$pro->direc_proveedor}}</td>
        <td>{{$pro->direc_tienda}}</td>
        <td>{{$pro->telefono_proveedor}}</td>
        <td>{{$pro->cel_proveedor}}</td>
        <td>{{$pro->correo_proveedor}}</td>
        <td>
           <a href="" data-target="#modal-delete-{{$pro->RUC_proveedor}}" data-toggle="modal">
            <button class="bttn-slant bttn-md bttn-danger">Eliminar</button></a>
        </td>
      </tr>
      @include('logistica.proveedores.modal')
      @endforeach
    </tbody>
  </table>
</div>
{{$proveedor->render()}}
@endsection
