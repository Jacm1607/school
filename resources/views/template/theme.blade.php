<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  {{-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('template/img/appl') }}e-icon.png"> --}}
  {{-- <link rel="icon" type="image/png" href="{{ asset('template/im') }}g/favicon.png"> --}}
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Paper Dashboard 2 PRO by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="{{ asset('template/css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('template/css/paper-dashboard.min1036.css?v=2.1.1') }}" rel="stylesheet" />
  <link href="{{ asset('template/css/font-awesome/flaticon.css') }}" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.1/dist/sweetalert2.min.css">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


</head>
@auth
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="default" data-active-color="danger">
      <div class="logo">
          <a href="{{ url('/') }}" class="simple-text logo-mini">
              <div class="logo-image-small">

              </div>
          <!-- <p>CT</p> -->
          </a>
          <a href="{{ url('/') }}" class="simple-text logo-normal">
          Education
          <!-- <div class="logo-image-big">

          </div> -->
          </a>
      </div>
      <div class="sidebar-wrapper">
          <div class="user">
              <div class="d-flex justify-content-center m-1">
                    @php
                        $photo = Auth::user()->img;
                    @endphp
                    <img style="width: 80px; height: 80px;" src='{{ asset("img/bitemoji/$photo") }}' alt="">
              </div>
              <div class="info">
                  <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                      <span>{{ Auth::user()->email }}<b class="caret"></b></span>
                  </a>
                  <div class="clearfix"></div>
                  <div class="collapse" id="collapseExample">
                      <ul class="nav">
                          <li>
                              <a href="{{ route('user.perfil', Auth::user()->id ) }}">
                                  <span class="sidebar-normal d-flex justify-content-center"><i class="nc-icon nc-single-02"></i>Ajuste de Perfil</span>
                              </a>
                              <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                <span class="sidebar-normal d-flex justify-content-center"><i class="nc-icon nc-single-02"></i>Cerrar Sesion</span>
                            </a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <ul class="nav">
            @foreach ($mainComposer as $item)
              @if ($item["idMenus"] != 0)
                  @break
              @endif
              @include("template.sidebar-item", ["item"=>$item])
            @endforeach
          </ul>
      </div>
  </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-icon btn-round">
                <i class="nc-icon nc-minimal-right text-center visible-on-sidebar-mini"></i>
                <i class="nc-icon nc-minimal-left text-center visible-on-sidebar-regular"></i>
              </button>
            </div>
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        @yield('content')
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</body>
@endauth
@guest
    @yield('content2')
@endguest
  <!--   Core JS Files   -->
  {{-- <script src="{{ asset('template/js/core/jquery.min.js') }}"></script> --}}
  <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="{{ asset('template/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('template/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('template/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  {{-- <script src="{{ asset('template/js/plugins/moment.min.js') }}"></script> --}}
  <script src="{{ asset('template/js/paper-dashboard.min1036.js?v=2.1.1"') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <!-- Sharrre libray -->
  <script src="{{ asset('template/demo/jquery.sharrre.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.1/dist/sweetalert2.all.min.js"></script>
  @stack('scripts')
</html>
