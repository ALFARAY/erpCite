<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ERPCITE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="image_src" href="{{asset('img/cite-logo.png')}}">

  </head>


  <body class="hold-transition skin-alfa sidebar-mini ">
    <div class="wrapper">
        <nav class="navbar navbar-static-top main-header" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            </a>

            <a href="#" class="h3 font-weight-bold text-white">ERP CITECCAL</a>

            <li class="nav-item dropdown ">
                <a id="navbarDropdown" class="bttn-slant bttn-md bttn-primary float-right dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span><i class="fas fa-arrow-circle-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                     {{ __('Salir') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
            </li>

      </nav>


<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar mt-3">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar ">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu ">
        <li class="treeview">
          <a href="{{url('bienvenida')}}">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Logistica</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu ">

            <li><a href="{{url('logistica/almacen')}}"><i class="fas fa-warehouse"></i> Almacen</a></li>
            <li><a href="{{url('logistica/orden_compra')}}"><i class="fas fa-shopping-basket"></i> Orden de Compra</a></li>
            
            <li><a href="{{url('logistica/articulo')}}"><i class="fas fa-box"></i> Materiales</a></li>
            <li><a href="{{url('logistica/clasificacion')}}"><i class="fas fa-list-alt"></i> Clasificacion</a></li>
            <li><a href="{{url('logistica/proveedores')}}"><i class="fas fa-users"></i> Proveedores</a></li>
            <li><a href="{{url('logistica/ingreso_salida')}}"><i class="fas fa-file-import"></i> Ingresos y Salidas</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Recursos Humano</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('recursos_humanos/area')}}"><i class="fa fa-folder"></i> Areas</a></li>
            <li><a href="{{url('recursos_humanos/trabajador')}}"><i class="fa fa-user-friends"></i> Personal</a></li>

          </ul>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-plus-square"></i> <span>Configuracion</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>




       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @include('flash-message')
                              @yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> BETA
        </div>
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <!-- eventos -->
    <script src="{{asset('js/eventos.js')}}"></script>

  </body>
</html>
