@extends ('layouts.admin')
@section ('contenido')

<section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">



        <div class="justify-content-center d-inline col-1">
          <div class="hero-logo mt-5 d-inline">
              <img src="img/ppis.png" width="100" height=50">
            </div>
          <div class="hero-logo mt-5 d-inline">
                <img src="img/citeccal.png" width="150" height=50">
          </div>
          <div class="hero-logo mt-5 d-inline">
              <img src="img/ucsm.png" width="200" height=50">
          </div>
          <div class="hero-logo mt-5 d-inline">
            <img src="img/red_cite.png" width="130" height=50">
          </div>
        </div>

        <div class="hero-logo mt-5">
          <img class="" src="img/logo_cite_v2.2.png" width="200" height="200">
        </div>      

        <h1 class="h1 d-flex justify-content-center font-weight-bold">BIENVENIDO</h1>        
            <p class="lead text-white font-weight-bold">Usuario: {{Auth:: user()->name}}</p>
            <hr class="my-4 col-sm-4 ">
            @if(auth()->user()->role==2)
              <p class="text-white mb-4">Si desea realizar algun cambio ingrese a Configuracion Inicial:</p>
              <a class="bttn-slant bttn-md bttn-success" href="{{url('configuracion_inicial')}}" role="button col-sm-4"">Configuracion Inicial</a>
            @endif
            @if(auth()->user()->estado==3)
              <p class="text-white">Es su primera vez iniciando.</p>
              <a class="bttn-slant bttn-md bttn-success" href="{{url('Usuario')}}" role="button">Cambio de Contraseña</a>
            @endif
      </div>
    </div>
</section>
@push ('scripts')
<script>
$('#liAlmacen').addClass("treeview active");
$('#liCategorias').addClass("active");
</script>
@endpush
@endsection
