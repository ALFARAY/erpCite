@extends('layouts.app')
@section ('content')
<div class="container">


    <div>
    <h3 class="font-weight-bold">Listado de Clasificaciones <a href="Categoria/create">
      <button class="bttn-slant bttn-md bttn-success ">Nueva Categoria</button></a></h3>
	</div>
              <div class="x_content table-responsive">
                <table id="table_mp" class="table stacktable">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($clasificacion as $clas)
                    <tr>
                    	<td>{{$clas->nom_categoria}}</td>
                   	</tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{$clasificacion->render()}}
              </div>
@endsection
