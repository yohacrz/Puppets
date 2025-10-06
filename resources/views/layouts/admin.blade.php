<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PUPETOS | Panel de Administrador</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link href="{{ asset('admin-template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/css/nifty.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="{{ asset('admin-template/plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('admin-template/plugins/pace/pace.min.js') }}"></script>

    <style>
        /* Estilo para los botones en estado normal */
        .navbar-top-links .btn-default {
            background-color: #d40e7b !important;
            color: #fff !important;
            border-color: #d40e7b !important;
        }

        /* Estilo para los botones al pasar el cursor (hover) */
        .navbar-top-links .btn-default:hover,
        .navbar-top-links .btn-default:focus {
            background-color: #d40e7b !important;
            border-color: #d40e7b !important;
        }
    </style>
</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <div class="navbar-header">
                    <a href="{{ url('admin') }}" class="navbar-brand">
                        <img src="{{ asset('user-template/images/puppets/logo2.png') }}" alt="PUPETOS Logo" class="brand-icon">
                    </a>
                </div>

                <div class="navbar-content">
                    <ul class="nav navbar-top-links pull-right">
                        <li>
                            <a href="{{ route('logout') }}" class="btn btn-default"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                title="Cerrar Sesión">
                                <i class="fas fa-sign-out-alt"></i> </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default" title="Perfil">
                                <i class="fas fa-user-circle"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="boxed">
            <div id="content-container">
                <div id="page-content">

                    {{-- CONTENIDO DE LA VISTA ESPECÍFICA --}}
                    @yield('content')

                </div>
            </div>

            <nav id="mainnav-container">
                <div id="mainnav">
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <ul id="mainnav-menu" class="list-group">
                                    <li class="list-header">Navegación</li>

                                    <li>
                                        <a href="{{ url('admin') }}">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span class="menu-title">Pagina principal</span>
                                        </a>
                                    </li>

                                    <li>
                                        {{-- Corregido para que coincida con el nombre de la ruta resource --}}
                                        <a href="{{ route('admin.gestion.productos.index') }}">
                                            <i class="fas fa-boxes"></i>
                                            <span class="menu-title">Inventario</span>
                                            <i class="arrow"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.gestion.citas.index') }}">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span class="menu-title">Citas</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('admin.gestion.clientes.index') }}">
                                            <i class="fas fa-users"></i>
                                            <span class="menu-title">Clientes Registrados</span>
                                        </a>
                                    </li>

                                    {{-- 4. NUEVO: GESTIÓN DE PAGOS (Órdenes) --}}
                                    <li>
                                        <a href="{{ route('admin.gestion.pagos.index') }}">
                                            <i class="fas fa-credit-card"></i>
                                            <span class="menu-title">Órdenes/Pagos</span>
                                        </a>
                                    </li>

                                    {{-- 5. NUEVO: GESTIÓN DE MASCOTAS --}}
                                    <li>
                                        <a href="{{ route('admin.gestion.mascotas.index') }}">
                                            <i class="fas fa-paw"></i>
                                            <span class="menu-title">Mascotas (Pets)</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

        </div>

        <footer id="footer">
            <div class="hide-fixed pull-right pad-rgt">
                Versión 1.0
            </div>
            2024 © PUPETOS
        </footer>

        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
    </div>

    {{-- SCRIPTS DE LA PLANTILLA BASE --}}
    <script src="{{ asset('admin-template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-template/js/nifty.min.js') }}"></script>
    <script src="{{ asset('admin-template/plugins/pace/pace.min.js') }}"></script>

    {{-- 💡 ARREGLO CLAVE: AQUÍ SE INSERTARÁ EL CÓDIGO DE CHART.JS DE LAS VISTAS --}}
    @yield('scripts') 

</body>

</html>