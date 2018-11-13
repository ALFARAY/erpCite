@extends ('layouts.admin')
@section ('contenido')
<div>
<h3 class="font-weight-bold">Listado de Areas <a href="area/create"><button class="bttn-slant bttn-md bttn-success float-right mr-sm-5">Nueva Area</button></a></h3>
</div>

<div class="x_content table-responsive">
  <table id="table_mp" class="table stacktable">
    <thead>
      <tr>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody>
      @foreach($areas as $ar)
      <tr>
        <td>{{$ar->descrip_area}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{$areas->render()}}
@endsection
