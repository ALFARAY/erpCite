<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-salida-{{$kard->cod_material}}">
	{{Form::Open(array('action'=>array('KardexMatController@update',$kard->cod_material
  ),'method'=>'PATCH'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Salida de Material</h4>
			</div>
			<div class="modal-body">
        <div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">Codigo del Material:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{$kard->cod_material}}" required disabled>
								<input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cod_mat_buscar" value="{{$kard->cod_material}}" style="display:none">
            </div>
        </div>
        <div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">Stock actual:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{$kard->stock_total}}" required disabled>
								<input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="stock_mat" value="{{$kard->stock_total}}" style="display:none">
            </div>
        </div>
        <div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">Cantidad por entregar:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cantidad_entregar" value="" required>
            </div>
        </div>
        <div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">Persona a entregar:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="trasladador_material" value="" required>
            </div>
        </div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="bttn-slant bttn-md bttn-primary ">Guardar</button>
				<button type="button" class="bttn-slant bttn-md bttn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
