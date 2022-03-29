<?php
  $exibirModal = false;
  if(!isset($_COOKIE["mostrarModal"]))
  {
    $expirar = 3600;
    setcookie('mostrarModal', 'SI', (time() + $expirar));
    $exibirModal = true;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    {{-- <meta name="description" content="@yield('meta_description', 'Miler')"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    {{-- @stack('meta')  --}}
    {{-- <title>
        @yield('title', config('app.name'))
    </title> --}}
    <title>Ferreteria la Marqueza</title>
    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template">
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">
    {{-- <link rel="shortcut icon" href="{!!asset('galio/assets/img/favicon.ico')!!}" type="image/x-icon" /> --}}
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets\images\icons\favicon.png">


    {{-- {!! Html::style('galio/assets/css/bootstrap.min.css') !!}
    {!! Html::style('galio/assets/css/font-awesome.min.css') !!}
    {!! Html::style('galio/assets/css/helper.min.css') !!}
    {!! Html::style('galio/assets/css/plugins.css') !!}
    {!! Html::style('galio/assets/css/style.css') !!} --}}
    {{-- <style>
        .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
               -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          }
          .tt-hint {
            color: #999
          }
          .tt-menu {
            width: 100% ;
            margin-top: 4px;
            padding: 4px 0;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 0px;
               -moz-border-radius: 0px;
                    border-radius: 0px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
               -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                    box-shadow: 0 5px 10px rgba(0,0,0,.2);
          }
          .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
          }
          .tt-suggestion.tt-cursor,.tt-suggestion:hover {
            color: #f8f8f8;
            background-color: #001123;
          
          }
          .tt-suggestion p {
            margin: 0;
          }
    </style> --}}
    {{-- {!! Html::style('bootstrap_star_rating/css/star-rating.css') !!}
    {!! Html::style('bootstrap_star_rating/themes/krajee-fa/theme.css') !!} --}}
    
    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <link rel="preload" href="assets\vendor\fontawesome-free\webfonts\fa-regular-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="assets\vendor\fontawesome-free\webfonts\fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="assets\vendor\fontawesome-free\webfonts\fa-brands-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="assets\fonts\wolmart.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">
    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="assets\vendor\fontawesome-free\css\all.min.css">


    <!-- Plugins CSS -->
    <!-- <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css"> -->
    <link rel="stylesheet" type="text/css" href="assets\vendor\animate\animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets\vendor\nouislider\nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="assets\vendor\magnific-popup\magnific-popup.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="assets\vendor\swiper\swiper-bundle.min.css">
    

    <!-- Default CSS -->
    
    <link rel="stylesheet" type="text/css" href="assets\css\style.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="assets\css\demo1.min.css"> --}}
    @yield('styles')
    @stack('styles')
</head>
<body>
    <div class="page-wrapper">
        <!-- modal -->
        {{-- <div class="modal fade" id="modalInicio" role="dialog">
            <div class="modal-dialog modal-lg">
              <!-- Modal content-->
             <div class="modal-content">
                <div class="newsletter-popup mfp-hide">
                    <div class="newsletter-content">
                        <h4 class="text-uppercase font-weight-normal ls-25">Get Up to<span class="text-primary">25% Off</span></h4>
                        <h2 class="ls-25">Sign up to Wolmart</h2>
                        <p class="text-light ls-10">Subscribe to the Wolmart market newsletter to
                            receive updates on special offers.</p>
                        <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
                            <input type="email" class="form-control email font-size-md" name="email" id="email2" placeholder="Your email address" required="">
                            <button class="btn btn-dark" type="submit">SUBMIT</button>
                        </form>
                        <div class="form-checkbox d-flex align-items-center">
                            <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup" required="">
                            <label for="hide-newsletter-popup" class="font-size-sm text-light">Don't show this popup again.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- fin modal -->
        <!-- header area start -->
        <header class="header header-border">
            <!-- header top start -->
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <div class="welcome-msg">
                            <a href="mailto:{{$web_company->email}}">
                                <i class="fa fa-envelope"></i>
                                {{$web_company->email}}
                            </a>
                            <span class="divider d-lg-show"> | </span>
                            <a href="tel:{{$web_company->phone}}">
                                <i class="fa fa-phone"></i>
                                {{$web_company->phone}}
                            </a>
                        </div>
                    </div>
                    <div class="header-right">
                        <a href="{{route('web.blog')}}" class="d-lg-show">Blog</a>
                        <a href="{{route('web.contact_us')}}" class="d-lg-show">Contáctanos</a>
                        @guest
                        <a href="{{route('web.login_register')}}" class="d-lg-show login sign-in"><i class="w-icon-account"></i>Iniciar sesión</a>
                        <span class="delimiter d-lg-show">/</span>
                        <a href="{{route('web.login_register')}}" class="ml-0 d-lg-show login register">Registro</a>
                        @else
                        <a href="{{route('web.my_account')}}" class="d-lg-show">Mi cuenta</a>
                        @endguest
                        <a href="{{route('web.cart')}}" class="d-lg-show">Mi Carrito</a>
                    </div>
                </div>
            </div>
            <!-- header top end -->
            <!-- header top start -->
            {{-- <div class="header-top-area bg-gray text-center text-md-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <div class="header-call-action">
                                <a href="mailto:{{$web_company->email}}">
                                    <i class="fa fa-envelope"></i>
                                    {{$web_company->email}}
                                </a>
                                <a href="tel:{{$web_company->phone}}">
                                    <i class="fa fa-phone"></i>
                                    {{$web_company->phone}}
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-right float-md-right float-none">
                                <nav>
                                    <ul>
                                        
                                    <li>
                                        <a href="{{route('web.blog')}}" class="d-lg-show">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{route('web.contact_us')}}" class="d-lg-show"> Contáctanos</a>
                                    </li>
                                    @guest
                                    <li>
                                        <a href="assets\ajax\login.html" class="d-lg-show login sign-in"><i class="w-icon-account"></i>Iniciar sesión</a>
                                    </li>
                                    <span class="delimiter d-lg-show">/</span>
                                    <li>
                                        <a href="{{ route('web.login_register') }}" class="ml-0 d-lg-show login register">Registro</a>
                                    </li>
                                    @else
                                    <li>
                                        <div class="dropdown header-top-dropdown">
                                            <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Mi cuenta
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="myaccount">
                                                <a href="{{route('web.my_account')}}" class="dropdown-item">Mi cuenta</a>
                                                <a class="dropdown-item" href="{{route('web.orders')}}"> Pedidos</a>
                                                
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">Cerrar sesión</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>  
                                            </div>
                                        </div>
                                    </li>
                                    @endguest
                                        <li>
                                            <a href="{{route('web.cart')}}">Mi Carrito</a>
                                        </li>
                                        {{-- @if ($shopping_cart->has_products())
                                        <li>
                                            <a href="{{route('web.checkout')}}">Pagos</a>
                                        </li>
                                        @endif  -}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- header top end -->

            <!-- header middle start -->
            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                        </a>
                        <a href="{{route("web.welcome")}}" class="logo ml-lg-0">
                            <img src="{{asset('melody/images/logo.svg')}}" alt="logo" width="144" height="45">
                        </a>
                        @include('layouts._search_products')
                    </div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="tel:#" class="w-icon-call"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="mailto:{{$web_company->email}}" class="text-capitalize">Chat en vivo</a> o :</h4>
                                <a href="tel:{{$web_company->phone}}" class="phone-number font-weight-bolder ls-50">{{$web_company->phone}}</a>
                            </div>
                        </div>
                        <a class="wishlist label-down link d-xs-show" href="wishlist.html">
                            <i class="w-icon-heart"></i>
                            <span class="wishlist-label d-lg-show">Lista de deseos</span>
                        </a>
                        <a class="compare label-down link d-xs-show" href="compare.html">
                            <i class="w-icon-compare"></i>
                            <span class="compare-label d-lg-show">Comparar</span>
                        </a>
                        @include('layouts._mini_cart')
                    </div>
                </div>
            </div>
            <!-- header middle end -->

            <!-- main menu area start -->
            <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            @include('layouts._category_toggle_wrap')
                            @include('layouts._main_menu')
                        </div>
                        {{-- <div class="header-right">
                            <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                            <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- main menu area end -->
            <!-- main menu area start -->
            {{-- <div class="main-header-wrapper bdr-bottom1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-header-inner">
                                @include('layouts._category_toggle_wrap')
                                @include('layouts._main_menu')
                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none"><div class="mobile-menu"></div></div>
                    </div>
                </div>
            </div> --}}
            <!-- main menu area end -->

        </header>
        <!-- header area end -->
        @yield('content')
        <!-- footer area start -->

        @stack('modal')

        <footer class="footer appear-animate" data-animation-options="{
            'name': 'fadeIn'}">
            <div class="footer-newsletter bg-primary">
                <div class="container">
                    @if (session('mensaje'))
                        <div class="alert alert-icon alert-error alert-bg alert-inline ">
                            <h4 class="alert-title">
                                <i class="w-icon-times-circle"></i><font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">¡Oh, error!</font></font>
                                </h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> {{session('mensaje')}}
                        </div>
                        <br>
                    @endif
                    @if ($errors->has('subscription_email'))
                        <div class="alert alert-icon alert-error alert-bg alert-inline ">
                            <h4 class="alert-title">
                                <i class="w-icon-times-circle"></i><font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">¡Oh, error!</font></font>
                                </h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> {{ $errors->first('subscription_email') }}
                        </div>
                        <br>
                    @endif 
                    <div class="row justify-content-center align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="icon-box icon-box-side text-white">
                                <div class="icon-box-icon d-inline-flex">
                                    <i class="w-icon-envelop3"></i>
                                </div>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                        Our Newsletter</h4>
                                    <p class="text-white">Get all the latest information on Events, Sales and Offers.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                            <form action="{{route('web.subscription_email')}}" method="post" class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                                @csrf
                                <input type="email" class="form-control mr-2 bg-white" name="subscription_email" id="email" placeholder="Your E-mail Address">
                                <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i class="w-icon-long-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="widget widget-about">
                                <a href="demo1.html" class="logo-footer">
                                    <img src="{{asset('melody/images/logo.svg')}}" alt="logo-footer" width="144" height="45">
                                </a>
                                <div class="widget-body">
                                    <p class="widget-about-title">Tienes una pregunta? Llámanos 24/7</p>
                                    <div class="header-call d-ls-show d-lg-flex align-items-center">
                                        <a href="tel:#" class="w-icon-call"></a>
                                        <div class="call-info d-xg-show">
                                            {{--<h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                                <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4> --}}
                                            <a href="tel:{{$web_company->phone}}" class="widget-about-call">{{$web_company->phone}}</a>
                                        </div>
                                    </div>
                                    <p class="widget-about-desc">Registrese ahora para recibir actualizaciones sobre los íconos y cupones
                                        de ascenso ahora mismo. <br><a href="mailto:{{$web_company->email}}" class="w-icon-envelop2"></a>
                                        <a href="mailto:{{$web_company->email}}" class="text-capitalize">{{$web_company->email}}</a>
                                        <br><a href="{{$web_company->address}}" class="w-icon-map-marker"></a>
                                        <a href="{{$web_company->address}}" class="text-capitalize">{{$web_company->address}}</a>
                                        <a class="btn btn-primay btn-outline btn-rounded" href="{{url($web_company->google_maps_link)}}">Abrir en Google Maps</a>
                                   </p>
                                    {{-- <div class="social-icons social-icons-colored">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                        <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                        <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                                    </div> --}}
                                    <div class="social-icons social-icons-colored">
                                        @foreach ($web_social_networks as $web_social_network)
                                        <a href="{{url($web_social_network->url)}}" data-toggle="tooltip" data-placement="top" title="{{$web_social_network->name}}" class="social-icon social-{{$web_social_network->icon}} w-icon-{{$web_social_network->icon}}"></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h3 class="widget-title">Company</h3>
                                <ul class="widget-body">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="#">Team Member</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="#">Affilate</a></li>
                                    <li><a href="#">Order History</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4>
                                <ul class="widget-body">
                                    <li><a href="#">Track My Order</a></li>
                                    <li><a href="cart.html">View Cart</a></li>
                                    <li><a href="login.html">Sign In</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="wishlist.html">My Wishlist</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>
                                <ul class="widget-body">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Product Returns</a></li>
                                    <li><a href="#">Support Center</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Term and Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="footer-bottom">
                    <div class="footer-left">
                        <p class="copyright">Copyright © 2022 Tienda La Marqueza. Todos los derechos reservados.</p>
                    </div>
                    <div class="footer-right">
                        <span class="payment-label mr-lg-8">Estamos utilizando el pago seguro para</span>
                        @foreach ($web_payment_methods as $web_payment_method)
                        <figure class="payment">
                            <img src="/{{$web_payment_method->image}}" alt="{{$web_payment_method->name}}" >
                        </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </footer>

        

        {{-- <footer>
            <!-- footer top start -->
            
            <div class="footer-top bg-black pt-14 pb-14">
                <div class="container">
                   @if (session('mensaje'))
                    <div class="alert alert-success rounded-0" role="alert">
                    {{session('mensaje')}}
                    </div>
                   @endif
                   @if ($errors->has('subscription_email'))
                    <div class="alert alert-danger rounded-0" role="alert">
                        {{ $errors->first('subscription_email') }}
                    </div>
                   @endif 
                    
                    <div class="footer-top-wrapper">
                        <div class="newsletter__wrap">
                            <div class="newsletter__title">
                                <div class="newsletter__icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="newsletter__content">
                                    <h3>Suscribirse al boletín</h3>
                                    <p>Duis autem vel eum iriureDuis autem vel eum</p>
                                </div>
                            </div>
                            <div class="newsletter__box">
                                <form action="{{route('web.subscription_email')}}" method="POST">
                                    @csrf
                                    <input type="email" name="subscription_email" autocomplete="off" placeholder="Email">
                                    <button type="submit">subscribe!</button>
                                </form>
                            </div>
                            
                        </div>

                        <div class="social-icons">
                            @foreach ($web_social_networks as $web_social_network)
                            <a href="{{url($web_social_network->url)}}" data-toggle="tooltip" data-placement="top" title="{{$web_social_network->name}}" target="_blank"><i class="fa {{$web_social_network->icon}}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer top end -->

            <!-- footer main start -->
            <div class="footer-widget-area pt-40 pb-38 pb-sm-4 pt-sm-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>CONTACTO</h4>
                                </div>
                                <div class="widget-body">
                                    <ul class="location">
                                        <li>
                                            <i class="fa fa-envelope"></i>
                                            {{$web_company->email}}
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            {{$web_company->phone}}
                                        </li>
                                        <li>
                                            <i class="fa fa-map-marker"></i>
                                            Dirección:  {{$web_company->address}}
                                        </li>
                                    </ul>
                                    <a class="map-btn" href="{{url($web_company->google_maps_link)}}" target="_blank">Abrir en Google Map</a>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Mi cuenta</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        @guest
                                        <li><a href="{{route('web.login_register')}}">Iniciar sesión</a></li>
                                        <li><a href="{{route('web.login_register')}}">Registro</a></li>
                                        @else
                                        <li><a href="{{route('web.my_account')}}">Mi cuenta</a></li>
                                        {{--  @if ($shopping_cart->has_products())
                                        <li><a href="{{route('web.checkout')}}">Pagar</a></li>
                                        @endif  -}}
                                       
                                        <li><a href="{{route('web.orders')}}">Mis ordenes</a></li>
                                        @endguest
                                        <li><a href="{{route('web.cart')}}">mi carrito</a></li>

                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Categorías populares</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        {{-- TRAER 5 CATEGORIAS --}}
                                        {{-- @foreach ($web_categories->take(5) as $web_category)
                                            <li>
                                                <a href="{{route('web.get_products_category', $web_category)}}">
                                                    {{$web_category->name}}
                                                </a>
                                            </li>
                                        @endforeach -}}
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget mb-sm-26">
                                <div class="widget-title mb-10 mb-sm-6">
                                    <h4>Etiquetas populares</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        {{-- @foreach ($web_tags_products->take(5) as $web_tag_product)
                                        <li>
                                            <a href="{{route('web.get_products_tag', $web_tag_product)}}">
                                                {{$web_tag_product->name}}
                                            </a>
                                        </li>
                                        @endforeach -}}
                                    </ul>
                                </div>
                            </div> <!-- single widget end -->
                        </div> <!-- single widget column end -->
                    </div>
                </div>
            </div>
            <!-- footer main end -->

            <!-- footer bootom start -->
            <div class="footer-bottom-area bg-gray pt-20 pb-20">
                <div class="container">
                    <div class="footer-bottom-wrap">
                        <div class="copyright-text">
                            <p><a target="_blank" href="https://www.facebook.com/puellesyou/">La Marqueza</a></p>
                        </div>
                        <div class="payment-method-img">
                            @foreach ($web_payment_methods as $web_payment_method)
                            <img src="/{{$web_payment_method->image}}" alt="{{$web_payment_method->name}}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer bootom end -->

        </footer> --}}
        <!-- footer area end -->
        <!-- footer area end -->

    </div>


    <!-- Quick view modal start -->
    {{--  @include('web._modal_quick_view')  --}}
    <!-- Quick view modal end -->

    <!-- Scroll to top start -->
    {{-- <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div> --}}
    <!-- Scroll to Top End -->

    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 70 70">
        <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
    </svg> </a>


    {{-- <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
    {!! Html::script('galio/assets/js/vendor/modernizr-3.6.0.min.js') !!}
    <!-- Jquery Min Js -->
    {!! Html::script('galio/assets/js/vendor/jquery-3.3.1.min.js') !!}
    <!-- Popper Min Js -->
    {!! Html::script('galio/assets/js/vendor/popper.min.js') !!}
    <!-- Bootstrap Min Js -->
    {!! Html::script('galio/assets/js/vendor/bootstrap.min.js') !!}
    <!-- Plugins Js-->
    {!! Html::script('galio/assets/js/plugins.js') !!}
    <!-- Ajax Mail Js -->
    {!! Html::script('galio/assets/js/ajax-mail.js') !!}
    <!-- Active Js -->
    {!! Html::script('galio/assets/js/main.js') !!}
    <!--  {!! Html::script('galio/assets/js/main.js') !!}  -->
    <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
    {!! Html::script('galio/assets/js/switcher.js') !!}

    {!! Html::script('js/typeahead.bundle.min.js') !!}

    {!! Html::script('bootstrap_star_rating/js/star-rating.js') !!}
    {!! Html::script('bootstrap_star_rating/js/locales/es.js') !!}
    {!! Html::script('bootstrap_star_rating/themes/krajee-fa/theme.js') !!} --}}

    <!-- Plugin JS File -->
    <script src="assets\vendor\jquery\jquery.min.js"></script>
    <script src="assets\vendor\jquery.plugin\jquery.plugin.min.js"></script>
    <script src="assets\vendor\imagesloaded\imagesloaded.pkgd.min.js"></script>
    <script src="assets\vendor\zoom\jquery.zoom.js"></script>
    <script src="assets\vendor\jquery.countdown\jquery.countdown.min.js"></script>
    <script src="assets\vendor\magnific-popup\jquery.magnific-popup.min.js"></script>
    <script src="assets\vendor\skrollr\skrollr.min.js"></script>

    <!-- Swiper JS -->
    <script src="assets\vendor\swiper\swiper-bundle.min.js"></script>

    <!-- Main JS -->
    <script src="assets\js\main.min.js"></script>

    @include('sweetalert::alert')
    
    @yield('scripts')
    @stack('scripts')

    @if ($exibirModal === true)
    <script>
        $(document).ready(function()
        {
          $("#modalInicio").modal("show");
        });
    </script>
    @endif
    
</body>

</html>