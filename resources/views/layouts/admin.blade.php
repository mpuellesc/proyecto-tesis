<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    {!! Html::style('melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
    {!! Html::style('melody/vendors/css/vendor.bundle.base.css') !!}
    {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {!! Html::style('melody/css/style.css') !!}
    @yield('styles')
    <!-- endinject -->
    <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>

<body class="sidebar-fixed">
    <div class="container-scroller">


        <!-- modal -->
        {{--
        <div class="modal fade" id="modalInicio" role="dialog">
            <div class="modal-dialog modal-lg">
              <!-- Modal content-->
             <div class="modal-content">
               

               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información sobre la demo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

               <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">  
                            <h4>Videos del curso en <a href="https://youtube.com/playlist?list=PL33d8DmxxcSNNIA6DVZ5Xrx50IGsyGfUt" target="_black">La Marqueza</a></h4>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/videoseries?list=PL33d8DmxxcSNNIA6DVZ5Xrx50IGsyGfUt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h3>Restricciones</h3>
                            <p>Para evitar la alteración de la información, la demo no guarda los cambios de edición, creación y eliminación de los siguientes módulos.</p>
                        </div>
                        <div class="col-md-4 mt-3">
                            <ul class="list-group list-group-flush">
                                <p><strong><i class="fa fa-check"></i> Productos</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Categorías</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Etiquetas</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Marcas</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Publicaciones</strong> </p>
                               
                            </ul>
                        </div>
                        <div class="col-md-4 mt-3">
                            <ul class="list-group list-group-flush">
                                <p><strong><i class="fa fa-check"></i> Productos</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Categorías</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Etiquetas</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Marcas</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Publicaciones</strong> </p>
                               
                            </ul>
                        </div>
                        <div class="col-md-4 mt-3">
                            <ul class="list-group list-group-flush">
                                <p><strong><i class="fa fa-check"></i> Redes sociales</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Sliders</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Redes sociales</strong> </p>
                                <p><strong><i class="fa fa-check"></i> Sliders</strong> </p>
                            </ul>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h3>Credenciales para realizar pruebas de pago</h3>
                            <p>Para evitar errores se recomienda usar estas credenciales de prueba.</p>
                        </div>
                        <div class="col-md-6 mt-3">
                            <p><strong>PayPal</strong><br>
                            <strong>Correo electrónico: </strong> sb-hqdis5181449@personal.example.com<br>
                            <strong>Contraseña: </strong> pf>e0Q=V<br>
                        </p>
                        </div>
                        <div class="col-md-6 mt-3">
                            <p><strong>Stripe</strong><br>
                            <strong>Número de tarjeta: </strong> 4242 4242 4242 4242 <br>
                            <strong>MM/YY CVC: </strong> 04/24 242 42424 <br>
                        </p>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p><strong>Mercado pago</strong><br>
                            <strong>Número: </strong> 5031 7557 3453 0604 <br>
                            <strong>Código de seguridad: </strong> 123 <br>
                            <strong>Fecha de vencimiento: </strong> 11/25 <br>
                        </p>
                        </div>

                        <div class="col-md-6 mt-3">
                            <p><strong>PayU</strong><br>
                            <strong>Numero de tarjeta: </strong>4111111111111111<br>
                            <strong>CVC: </strong>123<br>
                            <strong>MM: </strong>08<br>
                            <strong>YY: </strong>2020<br>
                            <strong>Tarjeta: </strong>VISA<br>
                            <strong>Nombre: </strong>APPROVED<br>
                            <strong>Correo: </strong>test@payulatam.com<br>
                            </p>
                        </div>

                        <div class="col-md-12 mt-3">
                            <h4>Credenciales de usuario</h4>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Administrador</strong></p>
                            <p><strong>Correo: Admin@gmail.com</strong> </p>
                            <p><strong>Contraseña: 123456789</strong> </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Cajero</strong></p>
                            <p><strong>Correo: Cashier@gmail.com</strong> </p>
                            <p><strong>Contraseña: 123456789</strong> </p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Cliente</strong></p>
                            <p><strong>Correo: Client@gmail.com</strong> </p>
                            <p><strong>Contraseña: 123456789</strong> </p>
                        </div>



                        <div class="col-md-12 mt-3">
                            <h4>Panel administrador</h4>
                            <p>Recuerda que para acceder al panel administrador debes usar las credenciales de administrador y cerrar sesión como cliente, de lo contrario no tendrás permisos para ver ni realizar ninguna acción en el panel administrador.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('login')}}" class="sqr-btn">Ir al panel administrador </a>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Correo: Admin@gmail.com</strong> </p>
                            <p><strong>Contraseña: 123456789</strong> </p>
                        </div>

                        <div class="col-md-12 mt-3">
                            <h4>Videos del curso </h4>

                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/videoseries?list=PL33d8DmxxcSNNIA6DVZ5Xrx50IGsyGfUt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
        </div>
        --}}
        <!-- fin modal -->


        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="https://www.facebook.com/puellesyou/"><img src="{{asset('melody/images/logo.svg')}}"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="{{asset('melody/images/logo-mini.svg')}}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                 <ul class="navbar-nav">
                    <li class="nav-item nav-search d-none d-md-flex">
                        <div class="nav-link">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                            </div>
                        </div>
                    </li>
                </ul> 

                

                <ul class="navbar-nav navbar-nav-right">

                    {{-- <li class="nav-item d-none d-lg-flex">
                        <a class="nav-link" href="#"  data-toggle="modal" data-target="#modalInicio">
                          <span class="btn btn-primary">Demo</span>
                        </a>
                    </li> --}}

                    @yield('create')

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                          <i class="fas fa-bell mx-0"></i>
                            @if (auth()->user()->unreadNotifications->count() > 0)
                            <span class="count">
                                {{ auth()->user()->unreadNotifications->count()}}
                            </span> 
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                          <a class="dropdown-item" href="{{route('mark_all_notifications')}}">
                            <p class="mb-0 font-weight-normal float-left">Tienes {{ auth()->user()->unreadNotifications->count()}} notificaciones nuevas
                            </p>
                            <span class="badge badge-pill badge-warning float-right">
                                Ver todo
                            </span>
                          </a>
                          @foreach (auth()->user()->unreadNotifications as $notification)
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item" href="{{route('mark_a_notification',[$notification->id, $notification->data['id']])}}">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-danger">
                                <i class="fas {{$notification->data['icon']}} mx-0"></i>
                              </div>
                            </div>
                            <div class="preview-item-content">
                              <h6 class="preview-subject font-weight-medium">
                                {{$notification->data['title']}}
                              </h6>
                              <p class="font-weight-light small-text">
                                {{$notification->data['name']}} ha realizado un pedido por {{$notification->data['total']}} soles.
                              </p>
                            </div>
                          </a> 
                          @endforeach
                        </div>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                          <i class="fas fa-bell mx-0"></i>
                          <span class="count">16</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                          <a class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 16 new notifications
                            </p>
                            <span class="badge badge-pill badge-warning float-right">View all</span>
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-danger">
                                <i class="fas fa-exclamation-circle mx-0"></i>
                              </div>
                            </div>
                            <div class="preview-item-content">
                              <h6 class="preview-subject font-weight-medium">Application Error</h6>
                              <p class="font-weight-light small-text">
                                Just now
                              </p>
                            </div>
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-warning">
                                <i class="fas fa-wrench mx-0"></i>
                              </div>
                            </div>
                            <div class="preview-item-content">
                              <h6 class="preview-subject font-weight-medium">Settings</h6>
                              <p class="font-weight-light small-text">
                                Private message
                              </p>
                            </div>
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-info">
                                <i class="far fa-envelope mx-0"></i>
                              </div>
                            </div>
                            <div class="preview-item-content">
                              <h6 class="preview-subject font-weight-medium">New user registration</h6>
                              <p class="font-weight-light small-text">
                                2 days ago
                              </p>
                            </div>
                          </a>
                        </div>
                      </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-envelope mx-0"></i>
                          <span class="count">25</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                          <div class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                            </p>
                            <span class="badge badge-info badge-pill float-right">View all</span>
                          </div>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{asset('melody/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                              <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                                <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                              </h6>
                              <p class="font-weight-light small-text">
                                The meeting is cancelled
                              </p>
                            </div>
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{asset('melody/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                              <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                                <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                              </h6>
                              <p class="font-weight-light small-text">
                                New product launch
                              </p>
                            </div>
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{asset('melody/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                              <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                                <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                              </h6>
                              <p class="font-weight-light small-text">
                                Upcoming board meeting
                              </p>
                            </div>
                          </a>
                        </div>
                    </li>

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{asset('melody/images/faces/face21.jpg')}}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                             <a class="dropdown-item">
                                <i class="fas fa-cog text-primary"></i>
                                Settings
                            </a> 
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off text-primary"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                          <i class="fas fa-ellipsis-h"></i>
                        </a>
                      </li>
                    
                    @yield('options')
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close fa fa-times"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles primary"></div>
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close fa fa-times"></i>
                <ul class="nav nav-tabs" id="setting-panel" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                  </li>
                </ul>
                <div class="tab-content" id="setting-content">
                  <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                      <form class="form w-100">
                        <div class="form-group d-flex">
                          <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                          <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task-todo">Add</button>
                        </div>
                      </form>
                    </div>
                    <div class="list-wrapper px-3">
                      <ul class="d-flex flex-column-reverse todo-list">
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox">
                              Team review meeting at 3.00 PM
                            </label>
                          </div>
                          <i class="remove fa fa-times-circle"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox">
                              Prepare for presentation
                            </label>
                          </div>
                          <i class="remove fa fa-times-circle"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox">
                              Resolve all the low priority tickets due today
                            </label>
                          </div>
                          <i class="remove fa fa-times-circle"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked>
                              Schedule meeting for next week
                            </label>
                          </div>
                          <i class="remove fa fa-times-circle"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked>
                              Project review
                            </label>
                          </div>
                          <i class="remove fa fa-times-circle"></i>
                        </li>
                      </ul>
                    </div>
                    <div class="events py-4 border-bottom px-3">
                      <div class="wrapper d-flex mb-2">
                        <i class="fa fa-times-circle text-primary mr-2"></i>
                        <span>Feb 11 2018</span>
                      </div>
                      <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
                      <p class="text-gray mb-0">build a js based app</p>
                    </div>
                    <div class="events pt-4 px-3">
                      <div class="wrapper d-flex mb-2">
                        <i class="fa fa-times-circle text-primary mr-2"></i>
                        <span>Feb 7 2018</span>
                      </div>
                      <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                      <p class="text-gray mb-0 ">Call Sarah Graves</p>
                    </div>
                  </div>
                  <!-- To do section tab ends -->
                  <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                      <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                      <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
                    </div>
                    <ul class="chat-list">
                      <li class="list active">
                        <div class="profile"><img src="{{asset('melody/images/faces/face1.jpg')}}" alt="image"><span class="online"></span></div>
                        <div class="info">
                          <p>Thomas Douglas</p>
                          <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">19 min</small>
                      </li>
                      <li class="list">
                        <div class="profile"><img src="{{asset('melody/images/faces/face2.jpg')}}" alt="image"><span class="offline"></span></div>
                        <div class="info">
                          <div class="wrapper d-flex">
                            <p>Catherine</p>
                          </div>
                          <p>Away</p>
                        </div>
                        <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                        <small class="text-muted my-auto">23 min</small>
                      </li>
                      <li class="list">
                        <div class="profile"><img src="{{asset('melody/images/faces/face3.jpg')}}" alt="image"><span class="online"></span></div>
                        <div class="info">
                          <p>Daniel Russell</p>
                          <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">14 min</small>
                      </li>
                      <li class="list">
                        <div class="profile"><img src="{{asset('melody/images/faces/face4.jpg')}}" alt="image"><span class="offline"></span></div>
                        <div class="info">
                          <p>James Richardson</p>
                          <p>Away</p>
                        </div>
                        <small class="text-muted my-auto">2 min</small>
                      </li>
                      <li class="list">
                        <div class="profile"><img src="{{asset('melody/images/faces/face5.jpg')}}" alt="image"><span class="online"></span></div>
                        <div class="info">
                          <p>Madeline Kennedy</p>
                          <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">5 min</small>
                      </li>
                      <li class="list">
                        <div class="profile"><img src="{{asset('melody/images/faces/face6.jpg')}}" alt="image"><span class="online"></span></div>
                        <div class="info">
                          <p>Sarah Graves</p>
                          <p>Available</p>
                        </div>
                        <small class="text-muted my-auto">47 min</small>
                      </li>
                    </ul>
                  </div>
                  <!-- chat tab ends -->
                </div>
            </div>

            @yield('preference')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('layouts._nav')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Todos los derechos reservados.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a href="https://www.facebook.com/puellesyou/">La Marqueza</a> </> <i class="far fa-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
    {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    {!! Html::script('melody/js/off-canvas.js') !!}
    {!! Html::script('melody/js/hoverable-collapse.js') !!}
    {!! Html::script('melody/js/misc.js') !!}
    {!! Html::script('melody/js/settings.js') !!}
    {!! Html::script('melody/js/todolist.js') !!}

    @include('sweetalert::alert')

    <!-- endinject -->
    <!-- Custom js for this page-->
    {{--  {!! Html::script('melody/js/dashboard.js') !!}  --}}
    <!-- End custom js for this page-->
    @yield('scripts')
    
</body>


</html>
