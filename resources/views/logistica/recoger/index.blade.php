@extends ('layouts.admin')
@section ('contenido')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#inst").click(function(event){
        $(".block").prop('disabled',false);
        $(".borr").prop('disabled',true);

    });
  });

</script>
<div>
  <h1 class="asd">Orden de Compra N° {{$var}}</h1>
</div>
  <hr class=" my-4">
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  {!!Form::open(array('url'=>'logistica/recoger/create','method'=>'POST','autocomplete'=>'off'))!!}
  {{Form::token()}}
  <input type="text" name="cod_orden" value="{{$var}}" style="display:none">
<h2 class="font-weight-bold">Materias Primas</h2>
<div class="x_content table-responsive">
  <table id="table_mp" class="table table-hover">
    <thead>
      <tr>
        <th>Código</th>
        <th>Subcategoria</th>
        <th>Detalle</th>
        <th>Cantidad Sin Recibir</th>
        <th>Cantidad Recogida</th>
        <th>Almacen de recepcion</th>
        <th>Lugar de Almacenaje</th>
        <th>Personal de Traslado</th>
      </tr>
    </thead>
    <tbody>
      <?php

       if(count($kardex))
         {
           for($i=0;$i<count($detalleorden);$i++)
             {
                $pos="";
               for( $j=0;$j<count($kardex);$j++)
               {
                if($detalleorden[$i]->cod_material==$kardex[$j]->cod_material)
                 {
                   $pos.=$j;
                   break;
                 }
               }
               if($pos=="")
               {
                 echo "<tr>";
                 echo "<td class='block'> <input type='text' class=' form-control' id='mpc".$i."' name='cod_material[]' disabled value='". $detalleorden[$i]->cod_material."''></td>";
                 echo "<td>". $detalleorden[$i]->nom_subcategoria."</td>";
                 echo "<td>". $detalleorden[$i]->descrip_material."</td>";
                 echo "<td><input type='text' class='form-control ' id='mpca".$i."' name='cantidad[]' disabled value='". $detalleorden[$i]->cantidad."'></td>";
                 echo "<td><input type='text' id='mpr".$i."' class='form-control borr' name='recogido[]'></td>";
                 $temalamacen="<td><select id='mp".  $i ."'name='almacen[]' class='custom-select borr'><option value='' selected disabled>Almacen</option>";
                 for($h=0;$h<count($almacen);$h++)
                 {
                  $temalamacen.="<option value='".$almacen[$h]->cod_almacen."'>".$almacen[$h]->descrip_almacen."</option>";
                }
                 $temalamacen.= "</td>";
                 echo $temalamacen;
                 echo "<td><input type='text' id='mpclu".$i."' class='form-control borr' name='lugar[]'></td>";
                 echo "<td><input type='text' id='mpcl".$i."' class='form-control borr' name='persona_traslado[]'></td>";
                 echo "</tr>";
               }
               else {
                 echo "<tr>";
                  echo "<td> <input type='text' class='form-control block ' id='mpc".$i."' name='cod_material[]' disabled value='". $detalleorden[$i]->cod_material."''></td>";
                 echo "<td>". $detalleorden[$i]->nom_subcategoria."</td>";
                 echo "<td>". $detalleorden[$i]->descrip_material."</td>";
                 echo "<td><input type='text' class='form-control block' id='mpca".$i."' name='cantidad[]' disabled value='". $detalleorden[$i]->cantidad."'></td>";
                 echo "<td><input type='text' class='form-control' name='recogido[]'></td>";
                 $temalamacen="<td><select disabled id='mp".  $i ."'name='almacen[]' class='custom-select block'><option value=''  disabled>Almacen</option>";
                  $temalamacen.="<option selected value='".$kardex[$pos]->cod_almacen."'>".$kardex[$pos]->descrip_almacen."</option>";
                 $temalamacen.= "</td>";
                 echo $temalamacen;
                 echo "<td><input type='text' class='form-control block' name='lugar[]' value=".$kardex[$pos]->lugar_almacenaje." disabled></td>";
                 echo "<td><input type='text' class='form-control' name='persona_traslado[]'></td>";
                 echo "</tr>";
               }?>
               <script>
                 $("#mp<?php echo $i;?>").off('change')
                 $("#mp<?php echo $i;?>").on('change',function(){
                    $("#mpc<?php echo $i;?>").addClass('block');
                    $("#mpca<?php echo $i;?>").addClass('block');
                    $("#mpr<?php echo $i;?>").removeClass("borr")
                    $("#mpclu<?php echo $i;?>").removeClass("borr")
                    $("#mpcl<?php echo $i;?>").removeClass("borr")
                    $("#mp<?php echo $i;?>").removeClass("borr")
                 });
               </script>
               <?php
             }

         }
         else {
           for($i=0;$i<count($detalleorden);$i++)
             {
               echo "<tr>";
                 echo "<td> <input type='text' class='form-control ' id='mpc".$i."' name='cod_material[]' disabled value='". $detalleorden[$i]->cod_material."''></td>";
               echo "<td>". $detalleorden[$i]->nom_subcategoria."</td>";
               echo "<td>". $detalleorden[$i]->descrip_material."</td>";
               echo "<td><input type='text' class='form-control ' id='mpca".$i."' name='cantidad[]' disabled value='". $detalleorden[$i]->cantidad."'></td>";
               echo "<td><input type='text'  id='mpr".$i."' class='form-control borr' name='recogido[]'></td>";
               $temalamacen="<td><select id='mp".  $i ."'name='almacen[]' class='custom-select borr'><option value='' selected disabled>Almacen</option>";
               for($h=0;$h<count($almacen);$h++)
               {
                $temalamacen.="<option value='".$almacen[$h]->cod_almacen."'>".$almacen[$h]->descrip_almacen."</option>";
              }
               $temalamacen.= "</td>";
               echo $temalamacen;
               echo "<td><input type='text' id='mpclu".$i."' class='form-control borr' name='lugar[]'></td>";
               echo "<td><input type='text' id='mpcl".$i."' class='form-control borr' name='persona_traslado[]'></td>";
               echo "</tr>";?>
               <script>
                 $("#mp<?php echo $i;?>").off('change')
                 $("#mp<?php echo $i;?>").on('change',function(){
                    $("#mpc<?php echo $i;?>").addClass('block');
                    $("#mpca<?php echo $i;?>").addClass('block');
                    $("#mpr<?php echo $i;?>").removeClass("borr")
                    $("#mpclu<?php echo $i;?>").removeClass("borr")
                    $("#mpcl<?php echo $i;?>").removeClass("borr")
                    $("#mp<?php echo $i;?>").removeClass("borr")
                 });
               </script>
               <?php
             }

         }?>

    </tbody>
  </table>
</div>
<h2>Insumos</h2>
<div class="x_content table-responsive">
  <table id="table_mp" class="table table-hover">
    <thead>
      <tr>
        <th>Código</th>
        <th>Subcategoria</th>
        <th>Detalle</th>
        <th>Cantidad Sin Recibir</th>
        <th>Cantidad Recogida</th>
        <th>Almacen de recepcion</th>
        <th>Lugar de Almacenaje</th>
        <th>Personal de Traslado</th>
      </tr>
    </thead>
    <tbody>
      <?php if(count($kardex))
         {
           for($i=0;$i<count($detalleordeninsu);$i++)
             {
               $pos="";
               for( $j=0;$j<count($kardex);$j++)
               {
                 if($kardex[$j]->cod_material==$detalleordeninsu[$i]->cod_material)
                 {
                   $pos.=$j;
                   break;
                 }
               }
               if($pos=="")
               {
                 echo "<tr>";
                    echo "<td> <input type='text' class='form-control ' id=insc".$i." name='cod_material[]' disabled value='". $detalleordeninsu[$i]->cod_material."''></td>";
                 echo "<td>". $detalleordeninsu[$i]->nom_subcategoria."</td>";
                 echo "<td>". $detalleordeninsu[$i]->descrip_material."</td>";
                 echo "<td><input type='text' class='form-control ' id=insca".$i." name='cantidad[]' disabled value='". $detalleordeninsu[$i]->cantidad."'></td>";
                 echo "<td><input type='text' id='inscr".$i."' class='form-control borr' name='recogido[]'></td>";
                 $temalamacen="<td><select id='in".  $i ."'name='almacen[]' class='custom-select borr'><option value='' selected disabled>Almacen</option>";
                 for($h=0;$h<count($almacen);$h++)
                 {
                  $temalamacen.="<option value='".$almacen[$h]->cod_almacen."'>".$almacen[$h]->descrip_almacen."</option>";
                }
                 $temalamacen.= "</td>";
                 echo $temalamacen;
                 echo "<td><input type='text' id='insclu".$i."' class='form-control borr' name='lugar[]'></td>";
                 echo "<td><input type='text' id='inscl".$i."' class='form-control borr' name='persona_traslado[]'></td>";
                 echo "</tr>";
               }
               else {
                 echo "<tr>";
                    echo "<td> <input type='text' class='form-control block ' id=insc".$i." name='cod_material[]' disabled value='". $detalleordeninsu[$i]->cod_material."''></td>";
                 echo "<td>". $detalleordeninsu[$i]->nom_subcategoria."</td>";
                 echo "<td>". $detalleordeninsu[$i]->descrip_material."</td>";
                 echo "<td><input type='text' class='form-control block ' id=insca".$i." name='cantidad[]' disabled value='". $detalleordeninsu[$i]->cantidad."'></td>";
                 echo "<td><input type='text' class='form-control ' name='recogido[]'></td>";
                 $temalamacen="<td><select disabled id='in".  $i ."'name='almacen[]' class='custom-select block'><option value=''  disabled>Almacen</option>";
                  $temalamacen.="<option selected value='".$kardex[$pos]->cod_almacen."'>".$kardex[$pos]->descrip_almacen."</option>";
                 $temalamacen.= "</td>";
                 echo $temalamacen;
                 echo "<td><input type='text' disabled class='form-control block' name='lugar[]' value=".$kardex[$pos]->lugar_almacenaje."></td>";
                 echo "<td><input type='text' class='form-control' name='persona_traslado[]'></td>";
                 echo "</tr>";
               }
               ?>
               <script>
                 $("#in<?php echo $i;?>").off('change')
                 $("#in<?php echo $i;?>").on('change',function(){
                    $("#insc<?php echo $i;?>").addClass('block');
                    $("#insca<?php echo $i;?>").addClass('block');
                    $("#inscr<?php echo $i;?>").removeClass('borr');
                    $("#insclu<?php echo $i;?>").removeClass('borr');
                    $("#inscl<?php echo $i;?>").removeClass('borr');
                    $("#in<?php echo $i;?>").removeClass('borr');
                 });
               </script>
               <?php
             }
         }
         else {
           for($i=0;$i<count($detalleordeninsu);$i++)
             {
               echo "<tr>";
                  echo "<td> <input type='text' class='form-control ' id=insc".$i." name='cod_material[]' disabled value='". $detalleordeninsu[$i]->cod_material."''></td>";
               echo "<td>". $detalleordeninsu[$i]->nom_subcategoria."</td>";
               echo "<td>". $detalleordeninsu[$i]->descrip_material."</td>";
               echo "<td><input type='text' class='form-control ' id=insca".$i." name='cantidad[]' disabled value='". $detalleordeninsu[$i]->cantidad."'></td>";
               echo "<td><input type='text' id='inscr".$i."' class='form-control borr' name='recogido[]'></td>";
               $temalamacen="<td><select id='in".  $i ."'name='almacen[]' class='custom-select borr'><option value='' selected disabled>Almacen</option>";
               for($h=0;$h<count($almacen);$h++)
               {
                $temalamacen.="<option value='".$almacen[$h]->cod_almacen."'>".$almacen[$h]->descrip_almacen."</option>";
              }
               $temalamacen.= "</td>";
               echo $temalamacen;
               echo "<td><input type='text' id='insclu".$i."' class='form-control borr' name='lugar[]'></td>";
               echo "<td><input type='text' id='inscl".$i."' class='form-control borr' name='persona_traslado[]'></td>";
               echo "</tr>";?>
               <script>
                 $("#in<?php echo $i;?>").off('change')
                 $("#in<?php echo $i;?>").on('change',function(){
                   $("#insc<?php echo $i;?>").addClass('block');
                   $("#insca<?php echo $i;?>").addClass('block');
                   $("#inscr<?php echo $i;?>").removeClass('borr');
                   $("#insclu<?php echo $i;?>").removeClass('borr');
                   $("#inscl<?php echo $i;?>").removeClass('borr');
                   $("#in<?php echo $i;?>").removeClass('borr');
                 });
               </script>
            <?php
             }
         }?>

    </tbody>
  </table>
</div>
<h2>Suministros</h2>
<div class="x_content table-responsive">
  <table id="table_mp" class="table table-hover">
    <thead>
      <tr>
        <th>Código</th>
        <th>Subcategoria</th>
        <th>Detalle</th>
        <th>Cantidad Sin Recibir</th>
        <th>Cantidad Recogida</th>
        <th>Almacen de recepcion</th>
        <th>Lugar de Almacenaje</th>
        <th>Personal de Traslado</th>
      </tr>
    </thead>
    <tbody>
      <?php if(count($kardex))
         {
           for($i=0;$i<count($detalleordensumi);$i++)
             {
               $pos="";
               for( $j=0;$j<count($kardex);$j++)
               {
                 if($kardex[$j]->cod_material==$detalleordensumi[$i]->cod_material)
                 {
                   $pos.=$j;
                   break;
                 }
               }
               if($pos=="")
               {
                 echo "<tr>";
                    echo "<td> <input type='text' class='form-control' id='sumc".$i."' name='cod_material[]' disabled value='". $detalleordensumi[$i]->cod_material."''></td>";
                 echo "<td>". $detalleordensumi[$i]->nom_subcategoria."</td>";
                 echo "<td>". $detalleordensumi[$i]->descrip_material."</td>";
                 echo "<td><input type='text' class='form-control' id='sumca".$i."' name='cantidad[]' disabled value='". $detalleordensumi[$i]->cantidad."'></td>";
                 echo "<td><input type='text' id='sumcr".$i."' class='form-control borr' name='recogido[]'></td>";
                 $temalamacen="<td><select id='".  $i ."'name='almacen[]' class='custom-select borr'><option value='' selected disabled>Almacen</option>";
                 for($h=0;$h<count($almacen);$h++)
                 {
                  $temalamacen.="<option value='".$almacen[$h]->cod_almacen."'>".$almacen[$h]->descrip_almacen."</option>";
                }
                 $temalamacen.= "</td>";
                 echo $temalamacen;
                 echo "<td><input type='text' id='sumclu".$i."' class='form-control borr' name='lugar[]'></td>";
                 echo "<td><input type='text' id='sumcl".$i."' class='form-control borr' name='persona_traslado[]'></td>";
                 echo "</tr>";
               }
               else {
                 echo "<tr>";
                    echo "<td> <input type='text' class='form-control block ' id='sumc".$i."' name='cod_material[]' disabled value='". $detalleordensumi[$i]->cod_material."''></td>";
                 echo "<td>". $detalleordensumi[$i]->nom_subcategoria."</td>";
                 echo "<td>". $detalleordensumi[$i]->descrip_material."</td>";
                 echo "<td><input type='text' class='form-control block' id='sumca".$i."' name='cantidad[]' disabled value='". $detalleordensumi[$i]->cantidad."'></td>";
                 echo "<td><input type='text' class='form-control ' name='recogido[]'></td>";
                 $temalamacen="<td><select disabled id='".  $i ."'name='almacen[]' class='custom-select block'><option value='' selected >Almacen</option>";
                  $temalamacen.="<option selected value='".$kardex[$pos]->cod_almacen."'>".$kardex[$pos]->descrip_almacen."</option>";
                 $temalamacen.= "</td>";
                 echo $temalamacen;
                 echo "<td><input disabled type='text' class='form-control block' name='lugar[]' value='".$kardex[$pos]->lugar_almacenaje."'></td>";
                 echo "<td><input type='text' class='form-control' name='persona_traslado[]'></td>";
                 echo "</tr>";
               }
               ?>
               <script>
                 $("#<?php echo $i;?>").off('change')
                 $("#<?php echo $i;?>").on('change',function(){
                   $("#sumc<?php echo $i;?>").addClass('block');
                   $("#sumca<?php echo $i;?>").addClass('block');
                   $("#sumcr<?php echo $i;?>").removeClass('borr');
                   $("#sumclu<?php echo $i;?>").removeClass('borr');
                   $("#sumcl<?php echo $i;?>").removeClass('borr');
                   $("#<?php echo $i;?>").removeClass('borr');
                 });
               </script>
               <?php
             }
         }
         else {
           for($i=0;$i<count($detalleordensumi);$i++)
             {
               echo "<tr>";
                  echo "<td> <input type='text' class='form-control ' id='sumc".$i."' name='cod_material[]' disabled value='". $detalleordensumi[$i]->cod_material."''></td>";
               echo "<td>". $detalleordensumi[$i]->nom_subcategoria."</td>";
               echo "<td>". $detalleordensumi[$i]->descrip_material."</td>";
               echo "<td><input type='text' class='form-control ' id='sumca".$i."' name='cantidad[]' disabled value='". $detalleordensumi[$i]->cantidad."'></td>";
               echo "<td><input type='text' id='sumcr".$i."' class='form-control borr' name='recogido[]'></td>";
               $temalamacen="<td><select id='".  $i ."'name='almacen[]' class='custom-select borr'><option value='' selected disabled>Almacen</option>";
               for($h=0;$h<count($almacen);$h++)
               {
                $temalamacen.="<option value='".$almacen[$h]->cod_almacen."'>".$almacen[$h]->descrip_almacen."</option>";
              }
               $temalamacen.= "</td>";
               echo $temalamacen;
               echo "<td><input type='text' id='sumclu".$i."' class='form-control borr ' name='lugar[]'></td>";
               echo "<td><input type='text' id='sumcl".$i."' class='form-control borr' name='persona_traslado[]'></td>";
               echo "</tr>";
               ?>
               <script>
                 $("#<?php echo $i;?>").off('change')
                 $("#<?php echo $i;?>").on('change',function(){
                   $("#sumc<?php echo $i;?>").addClass('block');
                   $("#sumca<?php echo $i;?>").addClass('block');
                   $("#sumcr<?php echo $i;?>").removeClass('borr');
                   $("#sumclu<?php echo $i;?>").removeClass('borr');
                   $("#sumcl<?php echo $i;?>").removeClass('borr');
                   $("#<?php echo $i;?>").removeClass('borr');
                 });
               </script>
               <?php
             }
         }?>

    </tbody>
  </table>
</div>
<div class=" col-md-12">

  <button type="submit" class="bttn-slant bttn-md bttn-primary " id="inst">Guardar Cambios</button>
  <button type="button" class="bttn-slant bttn-md bttn-danger " >Cancelar</button>
</div>
{!!Form::close()!!}

@endsection
