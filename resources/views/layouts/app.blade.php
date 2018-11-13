<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ERP CITECCAL</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="image_src" href="{{asset('img/cite-logo.png')}}">


</head>
<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-dark bg-dark entrar2">
            <div class="container ">
                <a class="navbar-brand " href="{{ url('/') }}">
                    <img src="img/cite-logo.png" height="30" class="d-inline-block align-top"
                        alt="mdb logo">
                    ERP-Cite
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @guest
                      @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Mantenimiento</a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{url('Categoria')}}">
                                  Categoria
                              </a>
                              <a class="dropdown-item" href="{{url('Subcategoria')}}">
                                  Subcategoria
                              </a>
     
                          </div>
                      </li>
                      @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
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
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('flash-message')
            @yield('content')
        </main>
    </div>


    <footer>
        <div class="container">
             <div class="row">  
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <ul class="carta pcolor">
                        <span class="wer text-center">¿Tienes alguna duda?</span>    
                            <li class="text-center">
                                <a>Telefono de contacto:</a>
                            </li>
                                            
                                     <li class="text-center ">
                                         <a>054 488128</a>
                                     </li class="text-left">
                                            
                                     <li class="text-center">
                                        <a>969947159</a>
                                     </li>
                                     
                            <li class="text-center">
                                <a>Correo:</a>
                            </li>
                            <li class="text-center">
                                <a>dguiteras@itp.gob.pe</a>
                            </li>
                    </ul>
                </div>
                             
                <div class="col-md-3 col-sm-6 col-xs-12">
                                <ul class="carta">
                                <span class="wer text-center">Manual de Usuario</span>    
                                     <li class="text-center">
                                         <a href="#" class="text-center" data-toggle="modal" data-target="#exampleModalLong">Manual</a>
                                     </li>
                                </ul>
                </div>
                             
                <div class="col-md-3 col-sm-6 col-xs-12">
                                 <ul class="carta text-left">
                                      <span class="wer text-center">Preguntas Frecuentes</span>    
                                      <li class="text-center">
                                         <a href="#" class="text-center" data-toggle="modal" data-target="#preguntas">Preguntas</a>
                                       </li>
                                            
                                       <li class="text-center">
                                         <a href="#" data-toggle="modal" data-target="#enviarpreguntas">Enviar pregunta</a>
                                       </li>
                                       <li class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#version">Información</a>
                                        </li>
                                  </ul>
                                  
                </div>
                        
                             <div class="col-md-3 col-sm-6 col-xs-12">
                               <ul class="carta">
                                     <span class="wer text-center">Participantes en el proyecto</span>       
                                     <li class="text-center">
                                         <a href="#">Cite</a>
                                     </li>
                                     <li class="text-center">
                                         <a href="#">Unidersidad</a>
                                     </li> 
                                     <li class="text-center">
                                         <a href="#">Programadores</a>
                                     </li> 
                                </ul>
                            </div>
                        

            </div> 
         </div>
         <div class="col-md-12 "><hr>
                <span class="wer2 text-center d-block my-0">Copyright © Todos los Derechos Reservados - CITECCAL 2018</span>   
        </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Manual de Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui delectus doloribus quasi cum est magni iure nemo consequatur illo quidem praesentium, tempora deleniti aut nam aperiam voluptates animi dignissimos corrupti?
          Odio a minus vitae fugit voluptate harum expedita ipsa dolores iusto earum, amet aut delectus tempora necessitatibus doloremque inventore dolorem veniam deleniti maiores officia. Voluptatibus minima vitae incidunt quo repellat?
          Earum adipisci maxime id ullam perspiciatis, explicabo tempora sequi odio in dolorum, quisquam provident fuga minima dolor nostrum molestias expedita sunt nesciunt veniam, repellendus minus nam exercitationem. Ex, distinctio repellat!
          Nemo voluptate mollitia ab eveniet, inventore illum aliquid est! Ratione, blanditiis, nulla doloribus ab accusamus repellat deserunt fuga iste praesentium a asperiores qui quibusdam corrupti fugiat. Quos voluptates vitae praesentium.
          Adipisci dolor eum molestias cupiditate vitae ex amet, perferendis repudiandae ab quisquam. Nobis, alias quas? Nisi delectus assumenda esse eveniet sequi quibusdam adipisci accusamus, quos, atque, illum unde ducimus earum.
          Nobis magni tenetur eos repudiandae, laboriosam pariatur quo assumenda quae, corporis facere tempore! Quas, perferendis harum eius modi corrupti aperiam vel iure ducimus doloribus assumenda nobis recusandae, aliquid adipisci sunt?
          Perferendis ipsam deserunt, maxime voluptatem molestias, fuga dignissimos quos magnam tenetur hic, qui suscipit? Totam consectetur voluptatum amet voluptates repellendus illo rerum fugit, tempora quasi eveniet error atque qui sed.
          Delectus quas natus accusantium, autem tempore tempora impedit odit recusandae, beatae unde numquam asperiores, dolorem aliquam animi necessitatibus. At blanditiis expedita consectetur enim dolor quis pariatur laborum ducimus neque deserunt!
          Nobis, dolor. Reprehenderit temporibus repellat mollitia omnis ipsa exercitationem provident veniam, iusto asperiores rem praesentium voluptatem sequi, inventore quibusdam. Deleniti nisi culpa fugiat accusantium natus nulla distinctio at blanditiis odio!
          Distinctio, mollitia sed. Porro necessitatibus soluta eveniet repudiandae neque facere reiciendis omnis! Debitis quasi a quam delectus eum quas consequatur deserunt, neque facilis ipsam molestias porro vel error. A, minus.
          Praesentium dolorem odit dolorum? Debitis, fugiat repellat? Placeat, expedita, inventore recusandae ipsa vitae, fugit voluptatem temporibus nemo laudantium vero debitis iusto illo veritatis. Eveniet perferendis illum reiciendis quis, velit suscipit!
          Nihil velit reiciendis quam esse est, ullam laborum laudantium reprehenderit quidem odio exercitationem corrupti dolorem numquam blanditiis dolore placeat hic eligendi veniam facilis minus dolorum alias. Asperiores repellendus sit quos.
          Consequatur repellendus ipsa nulla voluptates. Reiciendis voluptates impedit dolores obcaecati doloremque! Ipsum quisquam, excepturi explicabo iusto autem atque voluptatem assumenda aliquid ad unde sunt. Sint quibusdam modi accusantium quae totam.
          Ex ea repudiandae rem nemo ipsa quaerat totam praesentium voluptates nisi porro eius iusto eligendi ipsam amet iure officia error ab cumque doloribus odit reiciendis tempora aspernatur, nesciunt aliquam! Consectetur?
          Odit unde, voluptas, ipsa ullam corrupti dolore, quod repellat aspernatur minus iure ipsum. Laboriosam voluptates dignissimos voluptate esse. Expedita doloribus quia repellat esse, eum facilis provident aut asperiores quisquam ea.
          Sapiente quidem error asperiores sed doloribus, possimus dolorum est soluta modi reiciendis nemo facere nam molestias voluptas obcaecati accusamus officiis nihil. Culpa eius itaque voluptas eveniet facere velit esse deserunt!
          Nobis commodi sint aliquam itaque dicta cum ea maxime beatae, nulla tempore soluta? Corporis autem maiores repudiandae voluptatem totam dolorum omnis doloribus sapiente iure hic aspernatur tempore, dolore quis! Distinctio.
          Quasi corporis molestiae quam! Delectus tenetur earum in nobis qui. Sit deserunt itaque corporis iure! Libero doloremque corporis, optio sapiente consequuntur consectetur nulla ea obcaecati, sit dolorem laboriosam, accusantium eos!
          Iusto dicta repudiandae laborum pariatur provident adipisci neque facere aliquam accusamus, totam beatae, doloremque quibusdam debitis numquam. Cum beatae, iste qui sunt magnam, adipisci vel enim eaque illo, aperiam dicta?
          Quasi vel repudiandae itaque voluptate eaque animi nulla aliquid ullam suscipit beatae, eligendi doloribus exercitationem natus harum sunt! Accusamus provident tempore perspiciatis vel adipisci corrupti consectetur debitis quaerat. Animi, doloribus!
          Atque eos at saepe, incidunt possimus ipsum nemo? Vitae accusantium soluta quibusdam similique ullam aut dolore voluptatem asperiores est, natus in labore rerum, officia rem. Alias tempora quia maxime repudiandae?
          Vitae incidunt debitis sit reprehenderit. Ad, in odit sequi repudiandae delectus quaerat dolore. Aperiam eum quos amet laudantium reprehenderit a libero magnam illo! Quis nisi blanditiis ad inventore, repellendus dolorem?
          Quibusdam similique modi laborum maiores illo consequatur sint eaque doloremque vero! Velit facere quisquam est quas accusantium itaque voluptates, quam dolores. Esse ipsa exercitationem quisquam sunt deserunt mollitia inventore facilis!
          Vero vel laudantium iste necessitatibus dolore odit? Quibusdam aperiam modi nostrum, reprehenderit quo hic nisi, asperiores iste quos neque provident illo magnam voluptates accusamus dolor at debitis impedit error! Itaque!
          Ipsam eius consequuntur iure totam provident id, repudiandae aperiam vel ea deleniti voluptas sequi quasi maxime optio dicta eligendi a asperiores adipisci facere unde explicabo. Fugit corrupti delectus iusto modi?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="preguntas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Preguntas Frecuentes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                            <div class="col-4">
                              <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Pregunta 1</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Pregunta 2</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Pregunta 3</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Pregunta 4</a>
                              </div>
                            </div>
                            <div class="col-8">
                              <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem libero facilis consectetur commodi quasi, rem at excepturi ex nulla tempora? Tempora veniam fugiat ea eligendi corporis eum voluptatibus suscipit tenetur?</div>
                                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus sint, suscipit nihil obcaecati nostrum amet fugiat quisquam, dolore natus non culpa magni laboriosam assumenda excepturi et, incidunt voluptatem libero repellendus?</div>
                                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus sint, suscipit nihil obcaecati nostrum amet fugiat quisquam, dolore natus non culpa magni laboriosam assumenda excepturi et, incidunt voluptatem libero repellendus?</div>
                                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus sint, suscipit nihil obcaecati nostrum amet fugiat quisquam, dolore natus non culpa magni laboriosam assumenda excepturi et, incidunt voluptatem libero repellendus?</div>
                              </div>
                            </div>
                        </div>                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="enviarpreguntas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo Mensaje</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Asunto:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Mensaje:</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>

    <div class="modal fade" id="version" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Informacion de ERP</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Version de ERP: Beta 0.1
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
                </div>
    </div>



    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>
