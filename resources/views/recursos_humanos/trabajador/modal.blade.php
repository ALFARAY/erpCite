<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-vermas-{{$trab->DNI_trabajador}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Personal {{$trab->DNI_trabajador}}</h4>
			</div>
			<div class="modal-body">
        <h5>DNI: {{$trab->DNI_trabajador}}</h5>
        <h5>Nombre: {{$trab->nombres." ".$trab->apellido_paterno." ".$trab->apellido_materno}}</h5>
        <h5>Direccion: {{$trab->direccion}}</h5>
        <h5>Sexo: {{$trab->sexo}}</h5>
        <h5>Fecha de Nacimiento: {{$trab->fecha_nacimiento}}</h5>
        <h5>Puesto: {{$trab->puesto}}</h5>
        <h5>Tipo de Empleado: {{$trab->descrip_tipo_trabajador}}</h5>
        <h5>Area: {{$trab->descrip_area}}</h5>
			</div>
		</div>
	</div>
</div>
