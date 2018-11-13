@extends ('layouts.admin')
@section ('contenido')
<div>
  <h3 class="font-weight-bold">Listado de Orden de Compra <a href="orden_compra">
    <button class="bttn-slant bttn-md bttn-success float-right mr-sm-5">Nueva Orden de Compra</button></a></h3>
  @include('logistica.ingreso_salida.search')
</div>

<div class="x_content table-responsive">
  <table id="table_mp" class="table stacktable">
    <thead>
      <tr>
        <th>Código</th>
      </tr>
    </thead>
    <tbody>
      @foreach($ordenes as $ord)
          <tr>
            <td>{{$ord->cod_orden_compra}}</td>
            @if($ord->estado_orden_compra==1)
            <td>
              <a href="{!! route('recogida',['var'=>$ord->cod_orden_compra]) !!}" >
                <button class="bttn-slant bttn-md bttn-primary ">Recoger Materiales</button></a>
            </td>
            @else
            <td>
              No hay Materiales para recoger
            </td>
            @endif

            <td>
              <a href="{!! route('ver',['var'=>$ord->cod_orden_compra]) !!}" >
                <button class="bttn-slant bttn-md bttn-primary ">Ver Orden de Compra</button></a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{$ordenes->render()}}
@endsection
