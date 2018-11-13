@extends ('layouts.admin')
@section ('contenido')
<div>
<h3 class="font-weight-bold">Listado de Materiales <a href="articulo/create">
  <button class="bttn-slant bttn-md bttn-success float-right mr-sm-5">Nuevo Material</button></a></h3>
</div>

<div class="x_content table-responsive">
  <table id="table_mp" class="table stacktable">
    <thead>
      <tr>
        <th>Descripción</th>
        <th>Costo sin IGV</th>
        <th>Unidad de medida</th>
      </tr>
    </thead>
    <tbody>
      @foreach($materiales as $mat)
      <tr>
        <td>{{$mat->descrip_material}}</td>
        <td>{{$mat->costo_sin_igv_material}}</td>
        <td>{{$mat->descrip_unidad_medida}}</td>
        <!--<td>
           <a href="" data-target="#modal-delete-{{$mat->cod_material}}" data-toggle="modal">
            <button class="bttn-slant bttn-md bttn-danger">Eliminar</button></a>
        </td>-->
      </tr>
      @include('logistica.articulo.modal')
      @endforeach
    </tbody>
  </table>
</div>
{{$materiales->render()}}
@endsection
