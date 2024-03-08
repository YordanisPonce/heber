<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <title>{{ $title }} - {{ config('app.name') }}</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">  
  <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  <link href="{{ asset('assets/plugins/datatables/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body class="main-layout">
  <div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
  </div>

  <header>
    <div class="header-top">
      <div class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="{{ url('/') }}"><img src="images/logo.png" alt="#" /></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">
              <div class="header_information">
               <div class="menu-area">
                <div class="limit-box">
                  <nav class="main-menu ">
                    <ul class="menu-area-main">
                      <li class="active"> <a href="{{ url('/') }}">Inicio</a> </li>
                      @if(Auth::user()->role=='student')
                        <li> <a href="{{ url('task') }}">Tareas</a> </li>
                      @endif
                      @if(Auth::user()->role=='administrator' || Auth::user()->role=='teacher')
                        <li> <a href="{{ url('admin') }}">Administraci&oacute;n</a> </li>
                      @endif
                      <li> <a href="{{ url('game') }}">Ejercicios</a> </li>
                      <li> <a href="{{ url('logout') }}">Cerrar Sesi&oacute;n</a> </li>
                     </ul>
                   </nav>
                 </div>
               </div>               
             </div>
           </div>
         </div>
       </div>
     </div>
     @if($active_menu=='home')
     <section class="slider_section">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid padding_dd">
              <div class="carousel-caption">
                <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                    <div class="text-bg">
                      <h1>BIENVENIDO A ESTA ESCUELA VIRTUAL</h1>
                      <p>MATEMÁTICA, LENGUAJE Y ESPAÑOL</p>
                      <a href="{{ url('game') }}">Ejercicios</a> 
                      @if(Auth::user()->role=='student')
                        <a href="{{ url('task') }}">Tareas</a>
                      @endif
                    </div>
                  </div>
                  <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                    <div class="images_box">
                      <figure><img src="images/img2.png"></figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  </section>
  @endif
  </div>
  </header>

    <section>
        @yield('content')
    </section>
    <footer>
      <div class="footer ">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Boletin informativo</h2>
              <span>Acceda a los ejercicios de nuestra plataforma</span>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
              <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                  <div class="address">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="address">
                          <h3>Ejercicios</h3>
                          <ul class="Menu_footer">
                            <li> <a href="{{ url('game') }}">Ejercicios</a> </li>
                            @if(Auth::user()->role=='student')
                            <li><a href="{{ url('task') }}">Tareas</a> </li>
                            @endif
                          </ul>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-6 col-sm-6 ">
                        <div class="address">
                          <a href="{{ url('/') }}"> <img src="images/logo1.jpg" alt="logo"></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
              <div class="copyright">
                <div class="container">
                  <p>Copyright &copy; {{ date('Y') }} by <a href="javascript:void(0);">UMG </a></p>
                </div>
              </div>
            </div>
          </footer>
          <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
          <script src="{{ asset('assets/js/popper.min.js') }}"></script>
          <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
          <script src="{{ asset('assets/js/jquery-3.0.0.min.js') }}"></script>
          <script src="{{ asset('assets/js/plugin.js') }}"></script>
          <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
          <script src="{{ asset('assets/js/custom.js') }}"></script>
          <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
          <script src="{{ asset('assets/plugins/datatables/datatables/js/jquery.dataTables.min.js') }}"></script>
          <script src="{{ asset('assets/plugins/datatables/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
          <script>
            $(document).ready(function(e){
              if($('.table-lng').length){
                  $('.table-lng').DataTable({"columnDefs": [{ targets: 'no-sort', orderable: false }],"language": {"url": "/assets/plugins/datatables/Spanish.json"}});
              }
            });
          </script>
</body>

</html>