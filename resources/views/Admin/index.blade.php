@extends('layouts.app')
@section('content')

        <div id="reg-usuario" class="container ">
            <div class="row justify-content-center ">
                <div class="col-md-8">

                    <div class="card mt-3 tab-card">
                      <div class="d-inline p-2 d-flex justify-content-center">
                          <div class="h2 font-weight-bold">Listado de Empresas</div>
                      </div>
                      @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                      <div class="d-inline p-2 d-flex justify-content-center">
                              <a href="Admin/create">
                                <button class="bttn-slant bttn-md bttn-primary">Registrar Empresa</button>
                              </a>
                      </div>
                    </div>

                          <div class="card-body card mt-3 tab-card ">
                            <div class="x_content table-responsive ">
                              <h3>Leyenda de Colores</h3>
                              <span class="badge badge-danger">Desactivado</span>
                              <table id="table_mp" class="table ">
                                <thead>
                                  <tr>
                                    <th>RUC</th>
                                    <th>Razon Social</th>
                                    <th>Agregar Usuario</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  @foreach($empresas as $emp)
                                  @if($emp->estado_empresa==2)
                                  <tr class=" badge-danger">
                                  @else
                                  <tr>


                                  @endif
                                    <td>{{$emp->RUC_empresa}}</td>
                                    <td>{{$emp->razon_social}}</td>
                                    <td>
                                      <a href="" data-target="#modal-delete-{{$emp->RUC_empresa}}" data-toggle="modal"><button class="bttn-slant bttn-md bttn-warning ">Agregar</button></a>
                                    </td>
                                    <td>
                                      <a href="" data-target="#modal-update-{{$emp->RUC_empresa}}" data-toggle="modal"><button class="bttn-slant bttn-md bttn-warning ">Modificar</button></a>
                                    </td>
                                  </tr>

                                  @include('Admin.modal')
                                  @include('Admin.modal_modificar')
                                  @endforeach
                                </tbody>
                              </table>
                          </div>
                          {{$empresas->render()}}
                      </div>
                  </div>
              </div>
            </div>
        </div>
@endsection
