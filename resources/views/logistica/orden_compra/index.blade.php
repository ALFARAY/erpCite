@extends ('layouts.admin')
@section ('contenido')

<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 ">
        <div class="x_panel">
          <div class="x_title ">
              <h1 class="d-inline font-weight-bold ">Orden de Compra </h1>
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <div class="float-right">
              <div class="input-group mb-5">
                <button class="bttn-slant bttn-md bttn-primary mat mr-sm-2" >Materias Primas</button>
                <button class="bttn-slant bttn-md bttn-primary ins mr-sm-2" >Insumos</button>
                <button class="bttn-slant bttn-md bttn-primary sum mr-sm-2" >Suministros</button>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <?php $c=0; $col1=0; $col2=0;  $icol1=0; $icol2=0;  $scol1=0; $scol2=0; ?>

          <script>

            $(document).ready(function(){

                @foreach($materialesmp as $mat)
                  var nombre="{{$mat->descrip_material}}";
                  @if ($col1==0)
                     $("#mp_col1").append("<div class='custom-control custom-checkbox'><input  type='checkbox' class='custom-control-input' id='<?php echo $c; ?>''><label class='custom-control-label' for='<?php echo $c; ?>'>"+nombre+"</label></div>");
                     $("#<?php echo $c; ?>").off('click');
                     $("#<?php echo $c; ?>").on('click',function(){
                       if(!$(this).checked)
                       {
                         $('#table_mp> tbody:last-child').append("<tr id='<?php echo $c."f";?>'><td><input disabled type='text' class='form-control block' name='id[]' value='{{$mat->cod_material}}'></td><td><input disabled type='text' class='form-control block' name='subcategoria[]' value='{{$mat->nom_subcategoria}}'></td><td><input disabled type='text' class='form-control block' name='nombre[]' value='{{$mat->descrip_material}}'></td><td><input disabled type='text' class='form-control block' name='descripcion[]' value='{{$mat->descrip_material}}'></td><td><select name='proveedor[]' class='custom-select prov'> <option value=''selected disabled>Proveedores</option></select></td>"+
                         "<td><input id='<?php echo $c.'a' ?>' type='number' class='form-control' name='cantidad[]' value='1'></td><td><input disabled type='text' class='form-control block' name='unidad[]' value='{{$mat->descrip_unidad_medida}}'></td><td><input disabled type='text' class='form-control block' name='costo[]' value='{{$mat->costo_sin_igv_material}}'></td><td><input id='<?php echo $c.'c';?>' disabled type='number' step='any' class='form-control block' name='total[]' value='0' ></td><td><select id='<?php echo $c."sel";?>' name='tipo_compra[]' class='custom-select'> <option value=''selected disabled>Tipo de Compra</option><option value='1'>Credito</option><option value='2'>Contado</option></select></td><td><input id='<?php echo $c."in"; ?>' disabled type='text' class='form-control block' name='dias[]'></td><td><a class='btn btn-danger' id='<?php echo $c."b";?>'>-</a></td></tr>");
                          $(".prov").empty();
                          $(".prov").append("<option value=''selected disabled>Proveedores</option>");
                         @foreach($proveedores as $prove)
                           $(".prov").append("<option value='{{$prove->RUC_proveedor}}'>{{$prove->nom_proveedor}}</option>")
                         @endforeach
                         $("#<?php echo $c."sel";?>").off('change');
                         $("#<?php echo $c."sel";?>").on('change',function(){
                            if($(this).val()==1)
                            {
                              $("#<?php echo $c."in"; ?>").attr("disabled",false);
                            }
                            else {
                              $("#<?php echo $c."in"; ?>").attr("disabled",true);
                            }
                         });
                         $("#<?php echo $c."b";?>").off('click');
                         $("#<?php echo $c."b";?>").on('click',function(){
                           $("#<?php echo $c."f";?>").remove();
                           $("#<?php echo $c; ?>").attr("disabled", false);
                           $("#<?php echo $c; ?>").prop("checked", false);
                         });
                         $("#<?php echo $c.'a';?>").off('focusout');
                         $("#<?php echo $c.'a';?>").on('focusout',function(){
                           var cantidad= $("#<?php echo $c.'a';?>").val();
                           var preciou={{$mat->costo_sin_igv_material}};
                           tot=parseFloat(preciou).toFixed(2)*parseFloat(cantidad).toFixed(2);
                           $("#<?php echo $c.'c';?>").val(tot);
                         });
                         $("#<?php echo $c; ?>").attr("disabled", true);
                       }

                     });
                     <?php $col1=1; $c++; ?>
                 @elseif ($col2==0)
                     $("#mp_col2").append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='<?php echo $c; ?>'><label class='custom-control-label' for='<?php echo $c; ?>'>"+nombre+"</label></div>");
                     $("#<?php echo $c; ?>").off('click');
                     $("#<?php echo $c; ?>").on('click',function(){
                       if(!$(this).checked)
                       {
                         $('#table_mp> tbody:last-child').append("<tr id='<?php echo $c."f";?>'><td><input disabled type='text' class='form-control block' name='id[]' value='{{$mat->cod_material}}'></td><td><input disabled type='text' class='form-control block' name='subcategoria[]' value='{{$mat->nom_subcategoria}}'></td><td><input disabled type='text' class='form-control block' name='nombre[]' value='{{$mat->descrip_material}}'></td><td><input disabled type='text' class='form-control block' name='descripcion[]' value='{{$mat->descrip_material}}'></td><td><select name='proveedor[]' class='custom-select prov'> <option value=''selected disabled>Proveedores</option></select></td>"+
                         "<td><input id='<?php echo $c.'a' ?>' type='number' class='form-control' name='cantidad[]'value='1' ></td><td><input disabled type='text' class='form-control block' name='unidad[]' value='{{$mat->descrip_unidad_medida}}'></td><td><input disabled type='text' class='form-control block' name='costo[]' value='{{$mat->costo_sin_igv_material}}'></td><td><input id='<?php echo $c.'c';?>' disabled type='number' step='any' class='form-control block' name='total[]' value='0' ></td><td><select id='<?php echo $c."sel";?>' name='tipo_compra[]' class='custom-select'> <option value=''selected disabled>Tipo de Compra</option><option value='1'>Credito</option><option value='2'>Contado</option></select></td><td><input id='<?php echo $c."in"; ?>' disabled type='text' class='form-control block' name='dias[]'></td><td><a class='btn btn-danger' id='<?php echo $c."b";?>'>-</a></td></tr>");
                         $(".prov").empty();
                         $(".prov").append("<option value=''selected disabled>Proveedores</option>");
                         @foreach($proveedores as $prove)
                           $(".prov").append("<option value='{{$prove->RUC_proveedor}}'>{{$prove->nom_proveedor}}</option>")
                         @endforeach
                         $("#<?php echo $c."sel";?>").off('change');
                         $("#<?php echo $c."sel";?>").on('change',function(){
                            if($(this).val()==1)
                            {
                              $("#<?php echo $c."in"; ?>").attr("disabled",false);
                            }
                            else {
                              $("#<?php echo $c."in"; ?>").attr("disabled",true);
                            }
                         });
                         $("#<?php echo $c."b";?>").off('click');
                         $("#<?php echo $c."b";?>").on('click',function(){
                           $("#<?php echo $c."f";?>").remove();
                           $("#<?php echo $c; ?>").attr("disabled", false);
                           $("#<?php echo $c; ?>").prop("checked", false);
                         });
                         $("#<?php echo $c.'a';?>").off('focusout');
                         $("#<?php echo $c.'a';?>").on('focusout',function(){
                           var cantidad= $("#<?php echo $c.'a';?>").val();
                           var preciou={{$mat->costo_sin_igv_material}};
                           tot=parseFloat(preciou).toFixed(2)*parseFloat(cantidad).toFixed(2);
                           $("#<?php echo $c.'c';?>").val(tot);
                         });
                         $("#<?php echo $c; ?>").attr("disabled", true);
                       }
                     });
                     <?php $col2=1; $c++; ?>
                 @else
                    $("#mp_col3").append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='<?php echo $c; ?>'><label class='custom-control-label' for='<?php echo $c; ?>'>"+nombre+"</label></div>");
                    $("#<?php echo $c; ?>").off('click');
                    $("#<?php echo $c; ?>").on('click',function(){
                      if(!$(this).checked)
                      {
                        $('#table_mp> tbody:last-child').append("<tr id='<?php echo $c."f";?>'><td><input disabled type='text' class='form-control block' name='id[]' value='{{$mat->cod_material}}'></td><td><input disabled type='text' class='form-control block' name='subcategoria[]' value='{{$mat->nom_subcategoria}}'></td><td><input disabled type='text' class='form-control block' name='nombre[]' value='{{$mat->descrip_material}}'></td><td><input disabled type='text' class='form-control block' name='descripcion[]' value='{{$mat->descrip_material}}'></td><td><select name='proveedor[]' class='custom-select prov'> <option value=''selected disabled>Proveedores</option></select></td>"+
                        "<td><input id='<?php echo $c.'a' ?>' type='number' class='form-control' name='cantidad[]' value='1' ></td><td><input disabled type='text' class='form-control block' name='unidad[]' value='{{$mat->descrip_unidad_medida}}'></td><td><input disabled type='text' class='form-control block' name='costo[]' value='{{$mat->costo_sin_igv_material}}'></td><td><input id='<?php echo $c.'c';?>' disabled type='number' step='any' class='form-control block' name='total[]' value='0' ></td><td><select id='<?php echo $c."sel";?>' name='tipo_compra[]' class='custom-select'> <option value=''selected disabled>Tipo de Compra</option><option value='1'>Credito</option><option value='2'>Contado</option></select></td><td><input id='<?php echo $c."in"; ?>' disabled type='text' class='form-control block' name='dias[]'></td><td><a class='btn btn-danger' id='<?php echo $c."b";?>'>-</a></td></tr>");
                        $(".prov").empty();
                        $(".prov").append("<option value=''selected disabled>Proveedores</option>");
                        @foreach($proveedores as $prove)
                          $(".prov").append("<option value='{{$prove->RUC_proveedor}}'>{{$prove->nom_proveedor}}</option>")
                        @endforeach
                        $("#<?php echo $c."sel";?>").off('change');
                        $("#<?php echo $c."sel";?>").on('change',function(){
                           if($(this).val()==1)
                           {
                             $("#<?php echo $c."in"; ?>").attr("disabled",false);
                           }
                           else {
                             $("#<?php echo $c."in"; ?>").attr("disabled",true);
                           }
                        });
                        $("#<?php echo $c."b";?>").off('click');
                        $("#<?php echo $c."b";?>").on('click',function(){
                          $("#<?php echo $c."f";?>").remove();
                          $("#<?php echo $c; ?>").attr("disabled", false);
                          $("#<?php echo $c; ?>").prop("checked", false);
                        });
                        $("#<?php echo $c.'a';?>").off('focusout');
                        $("#<?php echo $c.'a';?>").on('focusout',function(){
                          var cantidad= $("#<?php echo $c.'a';?>").val();
                          var preciou={{$mat->costo_sin_igv_material}};
                          tot=parseFloat(preciou).toFixed(2)*parseFloat(cantidad).toFixed(2);
                          $("#<?php echo $c.'c';?>").val(tot);
                        });
                        $("#<?php echo $c; ?>").attr("disabled", true);
                      }
                    });
                    <?php $col1=0; $col2=0; $c++?>
                 @endif
                @endforeach
                @foreach($materialesins as $mat)
                  var nombre="{{$mat->descrip_material}}";
                  @if ($icol1==0)
                     $("#i_col1").append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='<?php echo $c; ?>'><label class='custom-control-label' for='<?php echo $c; ?>'>"+nombre+"</label></div>");
                     $("#<?php echo $c; ?>").off('click');
                     $("#<?php echo $c; ?>").on('click',function(){
                       if(!$(this).checked)
                       {
                         $('#table_ins> tbody:last-child').append("<tr id='<?php echo $c."f";?>'><td><input disabled type='text' class='form-control block' name='id[]' value='{{$mat->cod_material}}'></td><td><input disabled type='text' class='form-control block' name='subcategoria[]' value='{{$mat->nom_subcategoria}}'></td><td><input disabled type='text' class='form-control block' name='nombre[]' value='{{$mat->descrip_material}}'></td><td><input disabled type='text' class='form-control block' name='descripcion[]' value='{{$mat->descrip_material}}'></td><td><select name='proveedor[]' class='custom-select prov'> <option value=''selected disabled>Proveedores</option></select></td>"+
                         "<td><input id='<?php echo $c.'a' ?>' type='number' class='form-control' name='cantidad[]' value='1' ></td><td><input disabled type='text' class='form-control block' name='unidad[]' value='{{$mat->descrip_unidad_medida}}'></td><td><input disabled type='text' class='form-control block' name='costo[]' value='{{$mat->costo_sin_igv_material}}'></td><td><input id='<?php echo $c.'c';?>' disabled type='number' step='any' class='form-control block' name='total[]' value='0' ></td><td><select id='<?php echo $c."sel";?>' name='tipo_compra[]' class='custom-select'> <option value=''selected disabled>Tipo de Compra</option><option value='1'>Credito</option><option value='2'>Contado</option></select></td><td><input id='<?php echo $c."in"; ?>' disabled type='text' class='form-control block' name='dias[]'></td><td><a class='btn btn-danger' id='<?php echo $c."b";?>'>-</a></td></tr>");
                         $(".prov").empty();
                         $(".prov").append("<option value=''selected disabled>Proveedores</option>");
                         @foreach($proveedores as $prove)
                           $(".prov").append("<option value='{{$prove->RUC_proveedor}}'>{{$prove->nom_proveedor}}</option>")
                         @endforeach
                         $("#<?php echo $c."sel";?>").off('change');
                         $("#<?php echo $c."sel";?>").on('change',function(){
                            if($(this).val()==1)
                            {
                              $("#<?php echo $c."in"; ?>").attr("disabled",false);
                            }
                            else {
                              $("#<?php echo $c."in"; ?>").attr("disabled",true);
                            }
                         });
                         $("#<?php echo $c."b";?>").off('click');
                         $("#<?php echo $c."b";?>").on('click',function(){
                           $("#<?php echo $c."f";?>").remove();
                           $("#<?php echo $c; ?>").attr("disabled", false);
                           $("#<?php echo $c; ?>").prop("checked", false);
                         });
                        $("#<?php echo $c.'a';?>").off('focusout');
                        $("#<?php echo $c.'a';?>").on('focusout',function(){
                          var cantidad= $("#<?php echo $c.'a';?>").val();
                          var preciou={{$mat->costo_sin_igv_material}};
                          tot=parseFloat(preciou).toFixed(2)*parseFloat(cantidad).toFixed(2);
                          $("#<?php echo $c.'c';?>").val(tot);
                        });
                         $("#<?php echo $c; ?>").attr("disabled", true);
                       }
                     });
                     <?php $icol1=1; $c++;?>
                 @elseif ($icol2==0)
                     $("#i_col2").append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='<?php echo $c; ?>'><label class='custom-control-label' for='<?php echo $c; ?>'>"+nombre+"</label></div>");
                     $("#<?php echo $c; ?>").off('click');
                     $("#<?php echo $c; ?>").on('click',function(){
                       if(!$(this).checked)
                       {
                         $('#table_ins> tbody:last-child').append("<tr id='<?php echo $c."f";?>'><td><input disabled type='text' class='form-control block' name='id[]' value='{{$mat->cod_material}}'></td><td><input disabled type='text' class='form-control block' name='subcategoria[]' value='{{$mat->nom_subcategoria}}'></td><td><input disabled type='text' class='form-control block' name='nombre[]' value='{{$mat->descrip_material}}'></td><td><input disabled type='text' class='form-control block' name='descripcion[]' value='{{$mat->descrip_material}}'></td><td><select name='proveedor[]' class='custom-select prov'> <option value=''selected disabled>Proveedores</option></select></td>"+
                         "<td><input id='<?php echo $c.'a' ?>' type='number' class='form-control' name='cantidad[]' value='1' ></td><td><input disabled type='text' class='form-control block' name='unidad[]' value='{{$mat->descrip_unidad_medida}}'></td><td><input disabled type='text' class='form-control block' name='costo[]' value='{{$mat->costo_sin_igv_material}}'></td><td><input id='<?php echo $c.'c';?>' disabled type='number' step='any' class='form-control block' name='total[]' value='0' ></td><td><select id='<?php echo $c."sel";?>' name='tipo_compra[]' class='custom-select'> <option value=''selected disabled>Tipo de Compra</option><option value='1'>Credito</option><option value='2'>Contado</option></select></td><td><input id='<?php echo $c."in"; ?>' disabled type='text' class='form-control block' name='dias[]'></td><td><a class='btn btn-danger' id='<?php echo $c."b";?>'>-</a></td></tr>");
                         $(".prov").empty();
                         $(".prov").append("<option value=''selected disabled>Proveedores</option>");
                         @foreach($proveedores as $prove)
                           $(".prov").append("<option value='{{$prove->RUC_proveedor}}'>{{$prove->nom_proveedor}}</option>")
                         @endforeach
                         $("#<?php echo $c."sel";?>").off('change');
                         $("#<?php echo $c."sel";?>").on('change',function(){
                            if($(this).val()==1)
                            {
                              $("#<?php echo $c."in"; ?>").attr("disabled",false);
                            }
                            else {
                              $("#<?php echo $c."in"; ?>").attr("disabled",true);
                            }
                         });
                         $("#<?php echo $c."b";?>").off('click');
                         $("#<?php echo $c."b";?>").on('click',function(){
                           $("#<?php echo $c."f";?>").remove();
                           $("#<?php echo $c; ?>").attr("disabled", false);
                           $("#<?php echo $c; ?>").prop("checked", false);
                         });
                        $("#<?php echo $c.'a';?>").off('focusout');
                        $("#<?php echo $c.'a';?>").on('focusout',function(){
                          var cantidad= $("#<?php echo $c.'a';?>").val();
                          var preciou={{$mat->costo_sin_igv_material}};
                          tot=parseFloat(preciou).toFixed(2)*parseFloat(cantidad).toFixed(2);
                          $("#<?php echo $c.'c';?>").val(tot);
                        });
                         $("#<?php echo $c; ?>").attr("disabled", true);
                       }
                     });
                     <?php $icol2=1; $c++; ?>
                 @else
                    $("#i_col3").append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='<?php echo $c; ?>'><label class='custom-control-label' for='<?php echo $c; ?>'>"+nombre+"</label></div>");
                    $("#<?php echo $c; ?>").off('click');
                    $("#<?php echo $c; ?>").on('click',function(){
                      if(!$(this).checked)
                      {
                        $('#table_ins> tbody:last-child').append("<tr id='<?php echo $c."f";?>'><td><input disabled type='text' class='form-control block' name='id[]' value='{{$mat->cod_material}}'></td><td><input disabled type='text' class='form-control block' name='subcategoria[]' value='{{$mat->nom_subcategoria}}'></td><td><input disabled type='text' class='form-control block' name='nombre[]' value='{{$mat->descrip_material}}'></td><td><input disabled type='text' class='form-control block' name='descripcion[]' value='{{$mat->descrip_material}}'></td><td><select name='proveedor[]' class='custom-select prov'> <option value=''selected disabled>Proveedores</option></select></td>"+
                        "<td><input id='<?php echo $c.'a' ?>' type='number' class='form-control' name='cantidad[]' value='1' ></td><td><input disabled type='text' class='form-control block' name='unidad[]' value='{{$mat->descrip_unidad_medida}}'></td><td><input disabled type='text' class='form-control block' name='costo[]' value='{{$mat->costo_sin_igv_material}}'></td><td><input id='<?php echo $c.'c';?>' disabled type='number' step='any' class='form-control block' name='total[]' value='0' ></td><td><select id='<?php echo $c."sel";?>' name='tipo_compra[]' class='custom-select'> <option value=''selected disabled>Tipo de Compra</option><option value='1'>Credito</option><option value='2'>Contado</option></select></td><td><input id='<?php echo $c."in"; ?>' disabled type='text' class='form-control block' name='dias[]'></td><td><a class='btn btn-danger' id='<?php echo $c."b";?>'>-</a></td></tr>");
                        $(".prov").empty();
                        $(".prov").append("<option value=''selected disabled>Proveedores</option>");
                        @foreach($proveedores as $prove)
                          $(".prov").append("<option value='{{$prove->RUC_proveedor}}'>{{$prove->nom_proveedor}}</option>")
                        @endforeach
                        $("#<?php echo $c."sel";?>").off('change');
                        $("#<?php echo $c."sel";?>").on('change',function(){
                           if($(this).val()==1)
                           {
                             $("#<?php echo $c."in"; ?>").attr("disabled",false);
                           }
                           else {
                             $("#<?php echo $c."in"; ?>").attr("disabled",true);
                           }
                        });
                        $("#<?php echo $c."b";?>").off('click');
                        $("#<?php echo $c."b";?>").on('click',function(){
                          $("#<?php echo $c."f";?>").remove();
                          $("#<?php echo $c; ?>").attr("disabled", false);
                          $("#<?php echo $c; ?>").prop("checked", false);
                        });
                       $("#<?php echo $c.'a';?>").off('focusout');
                       $("#<?php echo $c.'a';?>").on('focusout',function(){
                         var cantidad= $("#<?php echo $c.'a';?>").val();
                         var preciou={{$mat->costo_sin_igv_material}};
                         tot=parseFloat(preciou).toFixed(2)*parseFloat(cantidad).toFixed(2);
                         $("#<?php echo $c.'c';?>").val(tot);
                       });
                        $("#<?php echo $c; ?>").attr("disabled", true);
                      }
                    });
                    <?php $icol1=0; $icol2=0;  $c++;?>
                 @endif
                @endforeach
                @foreach($materialessum as $mat)
                  var nombre="{{$mat->descrip_material}}";
                  @if ($scol1==0)
                     $("#s_col1").append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='<?php echo $c; ?>'><label class='custom-control-label' for='<?php echo $c; ?>'>"+nombre+"</label></div>");
                     $("#<?php echo $c; ?>").off('click');
                     $("#<?php echo $c; ?>").on('click',function(){
                       if(!$(this).checked)
                       {
                         $('#table_sum> tbody:last-child').append("<tr id='<?php echo $c."f";?>'><td><input disabled type='text' class='form-control block' name='id[]' value='{{$mat->cod_material}}'></td><td><input disabled type='text' class='form-control block' name='subcategoria[]' value='{{$mat->nom_subcategoria}}'></td><td><input disabled type='text' class='form-control block' name='nombre[]' value='{{$mat->descrip_material}}'></td><td><input disabled type='text' class='form-control block' name='descripcion[]' value='{{$mat->descrip_material}}'></td><td><select name='proveedor[]' class='custom-select prov'> <option value=''selected disabled>Proveedores</option></select></td>"+
                         "<td><input id='<?php echo $c.'a' ?>' type='number' class='form-control' name='cantidad[]' value='1' ></td><td><input disabled type='text' class='form-control block' name='unidad[]' value='{{$mat->descrip_unidad_medida}}'></td><td><input disabled type='text' class='form-control block' name='costo[]' value='{{$mat->costo_sin_igv_material}}'></td><td><input id='<?php echo $c.'c';?>' disabled type='number' step='any' class='form-control block' name='total[]' value='0' ></td><td><select id='<?php echo $c."sel";?>' name='tipo_compra[]' class='custom-select'> <option value=''selected disabled>Tipo de Compra</option><option value='1'>Credito</option><option value='2'>Contado</option></select></td><td><input id='<?php echo $c."in"; ?>' disabled type='text' class='form-control block' name='dias[]'></td><td><a class='btn btn-danger' id='<?php echo $c."b";?>'>-</a></td></tr>");
                         $(".prov").empty();
                         $(".prov").append("<option value=''selected disabled>Proveedores</option>");
                         @foreach($proveedores as $prove)
                           $(".prov").append("<option value='{{$prove->RUC_proveedor}}'>{{$prove->nom_proveedor}}</option>")
                         @endforeach
                         $("#<?php echo $c."sel";?>").off('change');
                         $("#<?php echo $c."sel";?>").on('change',function(){
                            if($(this).val()==1)
                            {
                              $("#<?php echo $c."in"; ?>").attr("disabled",false);
                            }
                            else {
                              $("#<?php echo $c."in"; ?>").attr("disabled",true);
                            }
                         });
                         $("#<?php echo $c."b";?>").off('click');
                         $("#<?php echo $c."b";?>").on('click',function(){
                           $("#<?php echo $c."f";?>").remove();
                           $("#<?php echo $c; ?>").attr("disabled", false);
                           $("#<?php echo $c; ?>").prop("checked", false);
                         });
                        $("#<?php echo $c.'a';?>").off('focusout');
                        $("#<?php echo $c.'a';?>").on('focusout',function(){
                          var cantidad= $("#<?php echo $c.'a';?>").val();
                          var preciou={{$mat->costo_sin_igv_material}};
                          tot=parseFloat(preciou).toFixed(2)*parseFloat(cantidad).toFixed(2);
                          $("#<?php echo $c.'c';?>").val(tot);
                        });
                         $("#<?php echo $c; ?>").attr("disabled", true);
                       }
                     });
                     <?php $scol1=1; $c++;?>
                 @elseif ($scol2==0)
                     $("#s_col2").append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='<?php echo $c; ?>'><label class='custom-control-label' for='<?php echo $c; ?>'>"+nombre+"</label></div>");
                     $("#<?php echo $c; ?>").off('click');
                     $("#<?php echo $c; ?>").on('click',function(){
                       if(!$(this).checked)
                       {
                         $('#table_sum> tbody:last-child').append("<tr id='<?php echo $c."f";?>'><td><input disabled type='text' class='form-control block' name='id[]' value='{{$mat->cod_material}}'></td><td><input disabled type='text' class='form-control block' name='subcategoria[]' value='{{$mat->nom_subcategoria}}'></td><td><input disabled type='text' class='form-control block' name='nombre[]' value='{{$mat->descrip_material}}'></td><td><input disabled type='text' class='form-control block' name='descripcion[]' value='{{$mat->descrip_material}}'></td><td><select name='proveedor[]' class='custom-select prov'> <option value=''selected disabled>Proveedores</option></select></td>"+
                         "<td><input id='<?php echo $c.'a' ?>' type='number' class='form-control' name='cantidad[]' value='1' ></td><td><input disabled type='text' class='form-control block' name='unidad[]' value='{{$mat->descrip_unidad_medida}}'></td><td><input disabled type='text' class='form-control block' name='costo[]' value='{{$mat->costo_sin_igv_material}}'></td><td><input id='<?php echo $c.'c';?>' disabled type='number' step='any' class='form-control block' name='total[]' value='0' ></td><td><select id='<?php echo $c."sel";?>' name='tipo_compra[]' class='custom-select'> <option value=''selected disabled>Tipo de Compra</option><option value='1'>Credito</option><option value='2'>Contado</option></select></td><td><input id='<?php echo $c."in"; ?>' disabled type='text' class='form-control block' name='dias[]'></td><td><a class='btn btn-danger' id='<?php echo $c."b";?>'>-</a></td></tr>");
                         $(".prov").empty();
                         $(".prov").append("<option value=''selected disabled>Proveedores</option>");
                         @foreach($proveedores as $prove)
                           $(".prov").append("<option value='{{$prove->RUC_proveedor}}'>{{$prove->nom_proveedor}}</option>")
                         @endforeach
                         $("#<?php echo $c."sel";?>").off('change');
                         $("#<?php echo $c."sel";?>").on('change',function(){
                            if($(this).val()==1)
                            {
                              $("#<?php echo $c."in"; ?>").attr("disabled",false);
                            }
                            else {
                              $("#<?php echo $c."in"; ?>").attr("disabled",true);
                            }
                         });
                         $("#<?php echo $c."b";?>").off('click');
                         $("#<?php echo $c."b";?>").on('click',function(){
                           $("#<?php echo $c."f";?>").remove();
                           $("#<?php echo $c; ?>").attr("disabled", false);
                           $("#<?php echo $c; ?>").prop("checked", false);
                         });
                        $("#<?php echo $c.'a';?>").off('focusout');
                        $("#<?php echo $c.'a';?>").on('focusout',function(){
                          var cantidad= $("#<?php echo $c.'a';?>").val();
                          var preciou={{$mat->costo_sin_igv_material}};
                          tot=parseFloat(preciou).toFixed(2)*parseFloat(cantidad).toFixed(2);
                          $("#<?php echo $c.'c';?>").val(tot);
                        });
                         $("#<?php echo $c; ?>").attr("disabled", true);
                       }
                     });
                     <?php $scol2=1; $c++;?>
                 @else
                    $("#s_col3").append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='<?php echo $c; ?>'><label class='custom-control-label' for='<?php echo $c; ?>'>"+nombre+"</label></div>");
                    $("#<?php echo $c; ?>").off('click');
                    $("#<?php echo $c; ?>").on('click',function(){
                      if(!$(this).checked)
                      {
                        $('#table_sum> tbody:last-child').append("<tr id='<?php echo $c."f";?>'><td><input disabled type='text' class='form-control block' name='id[]' value='{{$mat->cod_material}}'></td><td><input disabled type='text' class='form-control block' name='subcategoria[]' value='{{$mat->nom_subcategoria}}'></td><td><input disabled type='text' class='form-control block' name='nombre[]' value='{{$mat->descrip_material}}'></td><td><input disabled type='text' class='form-control block' name='descripcion[]' value='{{$mat->descrip_material}}'></td><td><select name='proveedor[]' class='custom-select prov'> <option value=''selected disabled>Proveedores</option></select></td>"+
                        "<td><input id='<?php echo $c.'a' ?>' type='number' class='form-control' name='cantidad[]' value='1' ></td><td><input disabled type='text' class='form-control block' name='unidad[]' value='{{$mat->descrip_unidad_medida}}'></td><td><input disabled type='text' class='form-control block' name='costo[]' value='{{$mat->costo_sin_igv_material}}'></td><td><input id='<?php echo $c.'c';?>' disabled type='number' step='any' class='form-control block' name='total[]' value='0' ></td><td><select id='<?php echo $c."sel";?>' name='tipo_compra[]' class='custom-select'> <option value=''selected disabled>Tipo de Compra</option><option value='1'>Credito</option><option value='2'>Contado</option></select></td><td><input id='<?php echo $c."in"; ?>' disabled type='text' class='form-control block' name='dias[]'></td><td><a class='btn btn-danger' id='<?php echo $c."b";?>'>-</a></td></tr>");
                        $(".prov").empty();
                        $(".prov").append("<option value=''selected disabled>Proveedores</option>");
                        @foreach($proveedores as $prove)
                          $(".prov").append("<option value='{{$prove->RUC_proveedor}}'>{{$prove->nom_proveedor}}</option>")
                        @endforeach
                        $("#<?php echo $c."sel";?>").off('change');
                        $("#<?php echo $c."sel";?>").on('change',function(){
                           if($(this).val()==1)
                           {
                             $("#<?php echo $c."in"; ?>").attr("disabled",false);
                           }
                           else {
                             $("#<?php echo $c."in"; ?>").attr("disabled",true);
                           }
                        });
                        $("#<?php echo $c."b";?>").off('click');
                        $("#<?php echo $c."b";?>").on('click',function(){
                          $("#<?php echo $c."f";?>").remove();
                          $("#<?php echo $c; ?>").attr("disabled", false);
                          $("#<?php echo $c; ?>").prop("checked", false);
                        });
                       $("#<?php echo $c.'a';?>").off('focusout');
                       $("#<?php echo $c.'a';?>").on('focusout',function(){
                         var cantidad= $("#<?php echo $c.'a';?>").val();
                         var preciou={{$mat->costo_sin_igv_material}};
                         tot=parseFloat(preciou).toFixed(2)*parseFloat(cantidad).toFixed(2);
                         $("#<?php echo $c.'c';?>").val(tot);
                       });
                        $("#<?php echo $c; ?>").attr("disabled", true);
                      }
                    });
                    <?php $scol1=0; $scol2=0; $c++; ?>
                 @endif
                @endforeach

              });
          </script>

          <div class="x_content">
            <div class="panel-group " id="accordion">
              <div class="panel panel-default" id="materias" style="display:none">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="btn " data-toggle="collapse" data-parent="#accordion"  href="#collapseOne">
                              Materias Primas<span class="fa fa-chevron-down"></span>
                          </a>
                      </h4>
                  </div>
                  <div  id="collapseOne" class="panel-collapse collapse in">
                      <div class="panel-body row">
                              <div id="mp_col1" class="col-md-4 col-xs-12">

                              </div>

                              <div id="mp_col2" class="col-md-4 col-xs-12">
                              </div>

                              <div id="mp_col3" class="col-md-4 col-xs-12">
                              </div>
                      </div>
                  </div>
              </div>

              <div class="panel panel-default" id="insum" style="display:none">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="btn" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                              Insumos<span class="fa fa-chevron-down"></span>
                          </a>
                      </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse in">
                      <div class="panel-body row">
                          <div id="i_col1" class="col-md-4 col-xs-12">


                          </div>
                          <div id="i_col2" class="col-md-4 col-xs-12">

                          </div>
                          <div id="i_col3" class="col-md-4 col-xs-12">

                          </div>
                      </div>
                  </div>
              </div>
              <div class="panel panel-default" id="sumin" style="display:none">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a class="btn" data-toggle="collapse" data-parent="#accordion" href="#collapseTree">
                              Suministros<span class="fa fa-chevron-down"></span>
                          </a>
                      </h4>
                  </div>
                  <div id="collapseTree" class="panel-collapse collapse in">
                      <div class="panel-body row">
                          <div id="s_col1" class="col-md-4 col-xs-12">


                          </div>
                          <div id="s_col2" class="col-md-4 col-xs-12">

                          </div>
                          <div id="s_col3" class="col-md-4 col-xs-12">

                          </div>
                      </div>
                  </div>
              </div>
            </div>
            {!!Form::open(array('url'=>'logistica/orden_compra','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
              <h2>Materias Primas</h2>
              <div class="x_content table-responsive">
                <table id="table_mp" class="table stacktable">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Subcategoria</th>
                      <th>Nombre</th>
                      <th>Detalle</th>
                      <th>proveedor</th>
                      <th>Cantidad</th>
                      <th>Unidad Medida</th>
                      <th>Costo sin IGV</th>
                      <th>Total</th>
                      <th>Tipo de Compra</th>
                      <th>Dia de Pago(Dias)</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <h2>Insumos</h2>
              <div class="table-responsive">
                <table id="table_ins" class="table stacktable">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Subcategoria</th>
                      <th>Nombre</th>
                      <th>Detalle</th>
                      <th>proveedor</th>
                      <th>Cantidad</th>
                      <th>Unidad Medida</th>
                      <th>Costo sin IGV</th>
                      <th>Total</th>
                      <th>Tipo de Compra</th>
                      <th>Dia de Pago(Dias)</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <h2>Suministros</h2>
              <div class="table-responsive">
                <table id="table_sum" class="table stacktable">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Subcategoria</th>
                      <th>Nombre</th>
                      <th>Detalle</th>
                      <th>proveedor</th>
                      <th>Cantidad</th>
                      <th>Unidad Medida</th>
                      <th>Costo sin IGV</th>
                      <th>Total</th>
                      <th>Tipo de Compra</th>
                      <th>Dia de Pago(Dias)</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <div class="form-group">
                <label for="total_orden_compra">Total Orden de Compra General:</label>
                <input disabled style="width:10%" id="total_orden_compra" type='text' class='form-control block' name='total_orden' value="0.0" >
              </div>
              <div class="form-group">
                <label for="total_orden_compra">Total Orden de Compra Contado:</label>
                <input disabled style="width:10%" id="total_orden_compra_contado" type='text' class='form-control block' name='total_orden_contado' value="0.0" >
              </div>
              <div class="form-group">
                <label for="total_orden_compra">Total Orden de Compra Credito:</label>
                <input disabled style="width:10%" id="total_orden_compra_credito" type='text' class='form-control block' name='total_orden_credito' value="0.0" >
              </div>
              <button type="button" id="calcular_total" class="bttn-slant bttn-md bttn-primary">Calcular Total</button>
              <br>
              <span>*No olvide dar click luego de algun cambio</span>
              <div class="form-group">
                <label for="comment">Comentario:</label>
                  <textarea class="form-control" rows="5" id="comment" name="comentarios"></textarea>
              </div>
              <div class=" col-md-12">
                <button type="submit" class="bttn-slant bttn-md bttn-primary" target="_blank" id="sub">Guardar e imprimir</button>
                <button type="button" class="bttn-slant bttn-md bttn-danger">Cancelar</button>
              </div>
            {!!Form::close()!!}
            <script>
              $("#calcular_total").click(function(){
                var totales=$("input[name~='total[]']");
                var tipos=$("select[name~='tipo_compra[]']");
                var total_orde=0.00;
                var total_credito=0.00;
                var total_contado=0.00;
                for(var i=0;i<totales.length;i++)
                 {
                   var valor=totales[i].value;
                   total_orde=parseFloat(valor)+parseFloat(total_orde);
                   if(tipos[i].value=="1")
                   {
                     total_credito=parseFloat(valor)+parseFloat(total_credito);
                   }
                   else {
                     total_contado=parseFloat(valor)+parseFloat(total_contado);
                   }
                }
                $("#total_orden_compra").val(total_orde);
                $("#total_orden_compra_contado").val(total_contado)
                $("#total_orden_compra_credito").val(total_credito)
              });
              $("#sub").click(function(event){
                $("#calcular_total").click();
                $(".block").prop('disabled',false);
              });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@push ('scripts')
<script>
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");
</script>
@endpush
@endsection
