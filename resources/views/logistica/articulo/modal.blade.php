<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$mat->cod_material}}">
	{{Form::Open(array('action'=>array('MaterialController@destroy',$mat->cod_material
  ),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Eliminar Artículo</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el artículo</p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="bttn-slant bttn-md bttn-primary ">Guardar</button>
				<button type="button" class="bttn-slant bttn-md bttn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
