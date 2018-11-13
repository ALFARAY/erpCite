<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$clas->cod_subcategoria}}">
	{{Form::Open(array('action'=>array('ClasificacionController@destroy',$clas->cod_subcategoria),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Eliminar Subcategoria</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">x
                </button>
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
