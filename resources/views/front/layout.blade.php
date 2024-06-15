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
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <link href="{{ asset('assets/plugins/datatables/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        body,
        html {
            min-height: 100vh;
        }


        input.form-control:focus,
        select.form-control:focus {
            border: 1px solid rgba(128, 128, 128, 0.857) !important;
        }
    </style>
    @yield('css')
</head>

<body class="main-layout h-100 d-flex flex-column">
    <div class="loader_bg">
        <div class="loader"><img src="/images/loading.gif" alt="#" /></div>
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
                                        <a href="{{ url('/') }}" class="text-dark d-flex align-items-center"><img
                                                src="/images/logo.png" width="80" style="transform: scale(.7)"
                                                alt="#" />
                                            <span style="font-size: 24px">{{ config('app.name') }}</span></a>
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
                                                @guest
                                                    <li> <a href="{{ url('login') }}">Iniciar Sessi&oacute;n</a> </li>
                                                    <li> <a href="{{ url('register') }}">Registrarme</a> </li>
                                                @else
                                                    <li class="{{ $active_menu == 'home' ? 'active' : '' }}"> <a
                                                            href="{{ url('/') }}">Inicio</a> </li>
                                                    <li class="{{ $active_menu == 'profile' ? 'active' : '' }}"> <a
                                                            href="{{ url('profile') }}">Perfil</a> </li>
                                                    @if (Auth::user()->role == 'student')
                                                        <li class="{{ $active_menu == 'task' ? 'active' : '' }}"> <a
                                                                href="{{ url('task') }}">Tareas</a> </li>
                                                    @endif
                                                    <li class="{{ $active_menu == 'game' ? 'active' : '' }}"> <a
                                                            href="{{ url('game') }}">Ejercicios</a> </li>
                                                    @if (Auth::user()->role == 'administrator' || Auth::user()->role == 'teacher')
                                                        <li> <a href="{{ url('admin') }}">Administraci&oacute;n</a> </li>
                                                    @endif
                                                    <li> <a href="{{ url('logout') }}">Cerrar Sesi&oacute;n</a> </li>
                                                @endguest
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($active_menu == 'home')
                <section class="slider_section">
                    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active cursor-pointer"></li>
                            <li data-target="#myCarousel" data-slide-to="1" class="cursor-pointer"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active" style="height: 85vh;">
                                <div class="container-fluid padding_dd">
                                    <div class="carousel-caption">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                                                <div class="text-bg">
                                                    <h1>BIENVENIDO A ESTA ESCUELA VIRTUAL</h1>
                                                    <p class="text-uppercase">MATEMÁTICA y Diversi&oacute;n</p>
                                                    <a href="{{ url('game') }}">Ejercicios</a>
                                                    @auth
                                                        @if (Auth::user()->role == 'student')
                                                            <a href="{{ url('task') }}">Tareas</a>
                                                        @endif
                                                    @endauth
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                                                <div class="images_box">
                                                    <figure>
                                                        <img src="{{ asset('images/img2.png') }}">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item" style="height: 85vh;">
                                <div class="container-fluid padding_dd">
                                    <div class="carousel-caption">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                                                <div class="text-bg text-uppercase">
                                                    <h1>Educamos contigo</h1>
                                                    <p>Razonaminto matem&aacute;tico</p>
                                                    <a href="{{ url('game') }}">Ejercicios</a>
                                                    @auth
                                                        @if (Auth::user()->role == 'student')
                                                            <a href="{{ url('task') }}">Tareas</a>
                                                        @endif
                                                    @endauth
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                                                <div class="images_box">
                                                    <figure>
                                                        <img src="{{ asset('images/educacion.png') }}"
                                                            style="height: 500px;" class="object-contain">
                                                    </figure>
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
    <footer class="mt-auto" style="margin-top: auto">
        <div class="footer pt-5">
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
                                        @auth
                                            @if (Auth::user()->role == 'student')
                                                <li><a href="{{ url('task') }}">Tareas</a> </li>
                                            @endif
                                        @endauth
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6 ">
                                <div class="d-flex align-items-center ">
                                    <div class="address">
                                        <a href="{{ url('/') }}"> <img width="350"
                                                src="{{ asset('images/logo1.jpg') }}" alt="logo"></a>
                                    </div>
                                    <div class="address">
                                        <a href="{{ url('/') }}"> <img width="350"
                                                src="{{ asset('images/etecsa.png') }}" alt="logo"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="copyright">
                <div class="container">
                    <p>Copyright &copy; {{ date('Y') }} Por <a href="javascript:void(0);">UCI </a></p>
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
        $(document).ready(function(e) {
            if ($('.table-lng').length) {
                $('.table-lng').DataTable({
                    "columnDefs": [{
                        targets: 'no-sort',
                        orderable: false
                    }],
                    "language": {
                        "url": "/assets/plugins/datatables/Spanish.json"
                    }
                });
            }
        });
    </script>
    @stack('js')
</body>

</html>
