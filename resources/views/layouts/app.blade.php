<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
<title> @yield(@trans('title')) </title>


  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- theme meta -->
  <meta name="theme-name" content="agen" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">
  <!-- slick slider -->
  <link rel="stylesheet" href="{{asset('plugins/slick/slick.css')}}">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="{{asset('plugins/themify-icons/themify-icons.css')}}">
  <!-- venobox css -->
  <link rel="stylesheet" href="{{asset('plugins/venobox/venobox.css')}}">
  <!-- card slider -->
  <link rel="stylesheet" href="{{asset('plugins/card-slider/css/style.css')}}">

  <!--Favicon-->
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
  <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
  
  <link href= "https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel= "stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet">
  
  <!-- Main Stylesheet -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Main JS -->
  <link href="{{asset('js/script.js')}}" rel="stylesheet">
  
  

</head>
<body>
    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{asset('images/logo.jpg')}}" alt="Home" class="w-35"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            
            <div class="collapse navbar-collapse container-fluid justify-content-end">
            @if(Auth::check())
                <a class="navbar-brand" href="{{ route('dashboard', Auth::user()->id) }}">@lang('lang.welcome')  {{Auth::user()->name}} </a>
            @else 
                <a class="navbar-brand" href="#">@lang('lang.welcome') @lang('lang.nav_guest')</a>
             @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end " id="navbarNavAltMarkup">
                    <div class="navbar-nav">

                    @guest
                            <a class="nav-link" href="{{ route('auth.create') }}">@lang('lang.nav_register')</a>
                            <a class="nav-link" href="{{ route('login') }}">@lang('lang.nav_login')</a>
                    @else
      
                            <a class="nav-link" href="{{ route('logout') }}">@lang('lang.nav_logout')</a>  
                    @endguest

                        <a class="nav-link" href="{{ route('lang', 'en') }}"><i class="flag flag-united-kingdom"></i></a>
                        <a class="nav-link" href="{{ route('lang', 'fr') }}"><i class="flag flag-france"></i></a> 
                    </div>
                </div>
            </div>

            
        </nav>
    </header>


    <main>
        @yield('content')
    </main>



    <!-- footer -->
    <footer class="bg-secondary position-relative">
        <img src="{{asset('images/backgrounds/map.png')}}" class="img-fluid overlay-image" alt="">
        <div class="section">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-6">
                <h4 class="text-white mb-5">Maisonneuve</h4>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light d-block mb-3">@lang('lang.footer_contact')</a></li>
                    <li><a href="#" class="text-light d-block mb-3">@lang('lang.footer_service')</a></li>
                    <li><a href="#" class="text-light d-block mb-3">@lang('lang.footer_about')</a></li>
                    <li><a href="#" class="text-light d-block mb-3">@lang('lang.footer_blog')</a></li>
                    <li><a href="#" class="text-light d-block mb-3">@lang('lang.footer_support')</a></li>
                </ul>
                </div>
                
             
            </div>
            </div>
        </div>
        <div class="pb-4">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left">
                <p class="text-light mb-0">@lang('lang.footer_copy') &copy; 2019 @lang('lang.footer_theme') <a class="text-gradient-primary" href="https://themefisher.com">themefisher.com</a>
                </p>
                </div>
                <div class="col-md-6">
                <ul class="list-inline text-md-right text-center">
                    <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-facebook"></i></a></li>
                    <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-twitter-alt"></i></a></li>
                    <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-instagram"></i></a></li>
                    <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-github"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jQuery/jquery.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- slick slider -->
    <script src="{{asset('plugins/slick/slick.min.js')}}"></script>
    <!-- venobox -->
    <script src="{{asset('plugins/venobox/venobox.min.js')}}"></script>
    <!-- shuffle -->
    <script src="{{asset('plugins/shuffle/shuffle.min.js')}}"></script>
    <!-- apear js -->
    <script src="{{asset('plugins/counto/apear.js')}}"></script>
    <!-- counter -->
    <script src="{{asset('plugins/counto/counTo.js')}}"></script>
    <!-- card slider -->
    <script src="{{asset('plugins/card-slider/js/card-slider-min.js')}}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="{{asset('plugins/google-map/gmap.js')}}"></script>

    <!-- Main Script -->
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>



