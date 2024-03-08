<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>{{ $title }} - {{ config('app.name') }}</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link href="{{ asset('assets/plugins/datatables/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i class="ft-menu font-large-1"></i></a></li>

                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                                <span class="mr-1 user-name text-bold-700">{{ Auth::user()->name }}</span><span class="avatar avatar-online">
                                    <img src="/storage/{{ Auth::user()->photo }}" alt="avatar">
                                    <i></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('admin/profile') }}"><i class="ft-user"></i> Editar Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('logout') }}"><i class="ft-power"></i> Cerrar Sesi&oacute;n</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item <?php echo ($active_menu=='home')?'active':''; ?>"><a class="nav-link" href="{{ url('admin') }}"><i class="la la-bank"></i><span>Inicio</span></a></li>
                @if(Auth::user()->role=='administrator')
                <li class="nav-item <?php echo ($active_menu=='user')?'active':''; ?>"><a class="nav-link" href="{{ url('admin/user') }}"><i class="la la-user"></i><span>Usuarios</span></a></li>
                @endif
                <li class="nav-item <?php echo ($active_menu=='student')?'active':''; ?>"><a class="nav-link" href="{{ url('admin/student') }}"><i class="la la-users"></i><span>Estudiantes</span></a></li>
                @if(Auth::user()->role=='administrator')
                <li class="nav-item <?php echo ($active_menu=='degree')?'active':''; ?>"><a class="nav-link" href="{{ url('admin/degree') }}"><i class="la la-book"></i><span>Grados</span></a></li>
                @endif
                <li class="nav-item <?php echo ($active_menu=='task')?'active':''; ?>"><a class="nav-link" href="{{ url('admin/task') }}"><i class="la la-file"></i><span>Tareas</span></a></li>
                <li class="nav-item <?php echo ($active_menu=='report')?'active':''; ?>"><a class="nav-link" href="{{ url('admin/report') }}"><i class="la la-file"></i><span>Reportes</span></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}"><i class="la la-eye"></i><span>Ver sitio</span></a></li>
            </ul>
        </div>
    </div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{ config('app.name') }}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('admin') }}">{{ config('app.name') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ $title }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; {{ date('Y') }} <a class="text-bold-800 grey darken-2" href="https://1.envato.market/modern_admin" target="_blank">{{ config('app.name') }}</a></span><span class="float-md-right d-none d-lg-block">{{ config('app.name') }}<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
    </footer>
    <script src="{{ asset('assets/admin/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <script src="{{ asset('assets/admin/js/breadcrumbs-with-stats.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function(e){
            if($('.alert-lng').length>0){
                setTimeout(function(e){
                    $('.alert-lng').remove();
                }, 6000)
            }
            if($('.table-lng').length>0){
                $('.table-lng').DataTable({"columnDefs": [{ targets: 'no-sort', orderable: false }],"language": {"url": "/assets/plugins/datatables/Spanish.json"}});
            }
            if($('#formTask').length>0){
                if($('#operation').val()=='resta'){
                    $('#figure_3').attr('disabled', true);
                    $('#figure_4').attr('disabled', true);
                }else if($('#operation').val()=='multiplicacion'){
                    $('#figure_2').attr('disabled', true);
                    $('#figure_3').attr('disabled', true);
                    $('#figure_4').attr('disabled', true);
                }else if($('#operation').val()=='multiplicacionTradicional'){
                    $('#figure_3').attr('disabled', true);
                    $('#figure_4').attr('disabled', true);
                }else if($('#operation').val()=='divisionTradicional'){
                    $('#figure_3').attr('disabled', true);
                    $('#figure_4').attr('disabled', true);
                }else if($('#operation').val()=='division'){
                    $('#figure_2').attr('disabled', true);
                    $('#figure_3').attr('disabled', true);
                    $('#figure_4').attr('disabled', true);
                }else if($('#operation').val()=='variados'){
                    $('#figure_3').attr('disabled', true);
                    $('#figure_4').attr('disabled', true);
                }
                $('#operation').change(function(e){
                    $('#figure_1').html(
                        '<option value="0">0</option>'+
                        '<option value="1">1</option>'+
                        '<option value="2">2</option>'+
                        '<option value="3">3</option>'+
                        '<option value="4">4</option>'+
                        '<option value="5">5</option>'+
                        '<option value="6">6</option>'+
                        '<option value="7">7</option>'
                    );
                    $('#figure_2').attr('disabled', false);
                    $('#figure_3').attr('disabled', false);
                    $('#figure_4').attr('disabled', false);
                    $('label[for="pages"]').text('Número de Páginas');
                    $('input#pages').attr('placeholder', 'Número de Páginas');
                    $('label[for="figure_1"]').attr('Cifras Número 1');
                    if($('#operation').val()=='resta'){
                        $('#figure_3').attr('disabled', true);
                        $('#figure_4').attr('disabled', true);
                    }else if($('#operation').val()=='multiplicacion'){
                        $('label[for="pages"]').text('Número de Cálculos');
                        $('input#pages').attr('placeholder', 'Número de Cálculos');
                        $('label[for="figure_1"]').attr('Elegir Número');
                        $('#figure_1').html(
                            '<option value="0">0</option>'+
                            '<option value="1">1</option>'+
                            '<option value="2">2</option>'+
                            '<option value="3">3</option>'+
                            '<option value="4">4</option>'+
                            '<option value="5">5</option>'+
                            '<option value="6">6</option>'+
                            '<option value="7">7</option>'+
                            '<option value="8">8</option>'+
                            '<option value="9">9</option>'
                        );
                        $('#figure_2').attr('disabled', true);
                        $('#figure_3').attr('disabled', true);
                        $('#figure_4').attr('disabled', true);
                    }else if($('#operation').val()=='division'){
                        $('label[for="pages"]').text('Número de Cálculos');
                        $('input#pages').attr('placeholder', 'Número de Cálculos');
                        $('#figure_2').attr('disabled', true);
                        $('#figure_3').attr('disabled', true);
                        $('#figure_4').attr('disabled', true);
                    }else if($('#operation').val()=='multiplicacionTradicional'){
                        $('#figure_3').attr('disabled', true);
                        $('#figure_4').attr('disabled', true);
                    }else if($('#operation').val()=='divisionTradicional'){
                        $('#figure_3').attr('disabled', true);
                        $('#figure_4').attr('disabled', true);
                    }else if( $('#operation').val()=='variados'){
                        $('#figure_3').attr('disabled', true);
                        $('#figure_4').attr('disabled', true);
                    }
                });
            }
        });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <script>
        $(document).ready(function(e){
            $('#btn-export').click(function(e){
                var doc = new jsPDF();
                doc.autoTable({ html: '#table-export' });
                doc.save('reporte.pdf');
            });
        });
    </script>
</body>
</html>
