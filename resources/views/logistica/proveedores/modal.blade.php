<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$pro->RUC_proveedor}}">
	{{Form::Open(array('action'=>array('ProveedorController@destroy',$pro->RUC_proveedor
  ),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title">Eliminar Proveedor</h4>
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>

			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el Proveedor</p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="bttn-slant bttn-md bttn-primary">Guardar</button>
				<button type="button" class="bttn-slant bttn-md bttn-danger" data-dismiss="modal">Cerrar</button>

			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
