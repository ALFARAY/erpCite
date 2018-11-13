@extends ('layouts.admin')
@section ('contenido')
<div>
  <h3 class="font-weight-bold">Listado de Materiales en Almacen</h3>
  @include('logistica.kardex.search')
</div>
<h3>Leyenda de Colores</h3>
<span class="badge badge-danger">Stock Bajo</span>
<span class="badge badge-warning">Stock Alto</span>
<div class="x_content table-responsive">
  <table id="table_mp" class="table stacktable">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>stock</th>
        <th>Codigo de Barras</th>
      </tr>
    </thead>
    <tbody>
      @foreach($kardex as $kard)
        @if($kard->stock_total<=$kard->stock_minimo+10)
          <tr class="badge-danger">
        @elseif($kard->stock_total>=$kard->stock_maximo-10)
          <tr class="badge-warning">
        @else
          <tr >
        @endif
            <td>{{$kard->cod_material}}</td>
            <td>{{$kard->descrip_material}}</td>
            <td>{{$kard->stock_total}}</td>
            <td>{!! DNS1D::getBarcodeHTML($kard->cod_material,"c128")!!}</td>
            <td>
              <a href="#" >
                <button class="bttn-slant bttn-md bttn-primary ">Historial</button></a>
            </td>
            <td>
              <a href="" data-target="#modal-salida-{{$kard->cod_material}}" data-toggle="modal">
               <button class="bttn-slant bttn-md bttn-danger">Salida</button></a>
            </td>
            <td>
              <a href="" data-target="#modal-devolucion-{{$kard->cod_material}}" data-toggle="modal">
               <button class="bttn-slant bttn-md bttn-danger">Devolucion</button></a>
            </td>
          </tr>
          @include('logistica.kardex.modal_salida')
          @include('logistica.kardex.modal_devolucion')
      @endforeach
    </tbody>
  </table>
</div>
{{$kardex->render()}}

@endsection
