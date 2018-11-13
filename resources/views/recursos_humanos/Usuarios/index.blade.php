@extends ('layouts.admin')
@section ('contenido')
<div>
<h3 class="font-weight-bold">Lista de Usuarios
</div>

<div class="x_content table-responsive">
  <table id="table_mp" class="table stacktable">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Role</th>
        <th>Privilegios extra</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $us)
      <tr>
        <td>{{$us->name}}</td>
        <td>{{$us->email}}</td>
        <td>{{$us->description}}</td>
        <td>{{$us->extra}}</td>
        <td>{{$us->estado}}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
