<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Umadblu') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

    <!-- Bootstrap table
    <link href="{{ asset('css/bootstrap-table.css') }}" rel="stylesheet" />
    !-->

    <link type="text/css" rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">

    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />

    @yield('styles')


    <!--  Fonts and icons     -->
    <!--link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"-->
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/pretty-checkbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">

</head>
<body>

<img src="{{ asset('img/loading.gif') }}" style="display: none" />

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ route('admin.dashboard') }}" class="simple-text">
                    <img src="{{ asset('img/logo-umadblu.png') }}">
                </a>
            </div>

            <ul class="nav">
                <li class="{{ Route::currentRouteName()=='' ? 'active' : '' }}">
                    <a href="{{ url('admin/') }}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @check(auth()->user(), 'manage-banners')
                <li class="{{ Route::currentRouteName()=='admin.banners.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.banners.index') }}">
                        <i class="ti-image"></i>
                        <p>Banners</p>
                    </a>
                </li>
                @endcheck

                @check(auth()->user(), 'manage-contatos')
                <li class="{{ Route::currentRouteName()=='admin.contatos.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.contatos.index') }}">
                        <i class="ti-email"></i>
                        <p>Contatos</p>
                    </a>
                </li>
                @endcheck

                @check(auth()->user(), 'manage-banners')
                <li class="{{ Route::currentRouteName()=='admin.clientes.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.clientes.index') }}">
                        <i class="ti-briefcase"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                @endcheck

                @check(auth()->user(), 'manage-leads')
                <li class="{{ Route::currentRouteName()=='admin.leads.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.leads.index') }}">
                        <i class="ti-view-list-alt"></i>
                        <p>Leads</p>
                    </a>
                </li>
                @endcheck

                @check(auth()->user(), 'manage-paginas')
                <li class="{{ Route::currentRouteName()=='admin.paginas.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.paginas.index') }}">
                        <i class="ti-layout"></i>
                        <p>Páginas</p>
                    </a>
                </li>
                @endcheck

                @check(auth()->user(), 'manage-usuarios')
                <li class="{{ Route::currentRouteName()=='admin.usuarios.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.usuarios.index') }}">
                        <i class="ti-user"></i>
                        <p>Usuários</p>
                    </a>
                </li>
                @endcheck

                @master
                <li class="{{ Route::currentRouteName()=='admin.modulos.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.modulos.index') }}">
                        <i class="ti-support"></i>
                        <p>Módulos do Sistema</p>
                    </a>
                </li>
                @endmaster

                <li class="active-pro">
                    <a href="" class="button_logout">
                        <i class="ti-na"></i>
                        <p>Sair</p>
                    </a>

                    <form id="" class="frm_logout" method="post" action="{{ route('logout') }}">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">

        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://www.natelaweb.com.br/contato" target="_blank">
                                Precisa de Ajuda?
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.linkedin.com/in/lucas-lulu-92991bb9" target="_blank">Lucas Lulu</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

<script>
    var _url = '{{ url('admin') }}';
    var _img = '{{ asset('img') }}';
</script>

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('js/bootstrap-checkbox-radio.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>

<!-- Bootstrap table -->
<script src="{{ asset('js/datatables.min.js') }}"></script>
<!--
<script src="{{ asset('js/bootstrap-table.js') }}"></script>
<script src="{{ asset('js/bootstrap-table-pt-BR.js') }}"></script>
!-->

<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>

<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script src="{{ asset('js/masks.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')

</html>
