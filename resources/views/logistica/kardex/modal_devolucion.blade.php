<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-devolucion-{{$kard->cod_material}}">
	{{Form::Open(array('action'=>array('KardexMatController@store',$kard->cod_material
  ),'method'=>'POST'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Devolucion de Material</h4>
			</div>
			<div class="modal-body">
        <div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">Codigo del Material:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{$kard->cod_material}}" required disabled>
								<input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="codmatbuscar" value="{{$kard->cod_material}}" style="display:none">
            </div>
        </div>
        <div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">Stock actual:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{$kard->stock_total}}" required disabled>
								<input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="stocktotal" value="{{$kard->stock_total}}" style="display:none">
            </div>
        </div>
        <div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">Cantidad Devuelta:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cantidad_devuelta" value="" required>
            </div>
        </div>
        <div class="form-group row"  >
            <label for="name" class="col-md-4 col-form-label text-md-right">Persona:</label>

            <div class="col-md-6">
                <input id="cod_empresa" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="trasladador_devolucion" value="" required>
            </div>
        </div>
        <div class="form-group row"  >
            <label for="comment" class="col-md-4 col-form-label text-md-right">Comentario:</label>
            <div class="col-md-6">
                <textarea class="form-control" rows="5" id="comment" name="comentarios"></textarea>
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
