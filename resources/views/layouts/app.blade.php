<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">

    <!-- End Bootstrap CSS -->

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    @stack('scripts')
    @yield('css')
    <title>Document</title>
</head>
<body >
    <nav>
        <div class="container-fluid">

            <div class="row flex-nowrap">
                <div class="col-2 col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start justify-content-between px-3 pt-2 min-vh-100">
                        <div>
                                <!-- MENU ALUMNO -->
                                @if(auth()->guard('alumno')->check())
                                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                    <span class="fs-5 d-none d-sm-inline">@lang("common.alumno")</span>
                                </a>
                                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                                        <li class="nav-item">
                                            <a href="{{ route('home') }}" class="nav-link align-middle px-0 " >
                                                <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">@lang("common.inicio")</span>
                                            </a>
                                        </li>

                                    <!-- Menu alumno -->
                                    <!-- NOTAS -->
                                    <li>
                                        <a href="{{ route('student.notas') }}" class="nav-link px-0 align-middle">
                                            <i class="fs-4 bi-card-checklist text-white"></i><span class="ms-1 d-none d-sm-inline text-white">@lang("common.notas")</span></a>
                                    </li>
                                    <!-- SEGUIMIENTO -->
                                    <li>
                                        <a href="{{ route('student.seguimiento') }}" class="nav-link px-0 align-middle">
                                            <i class="fs-4 bi-table text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Mis seguimientos</span></a>
                                    </li>
                                    <!-- HISTORIAL -->
                                    <!--
                                    <li>
                                        <a href="{{ route('student.historial') }}" class="nav-link px-0 align-middle ">
                                            <i class="fs-4 bi-journal-bookmark-fill text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">@lang("common.historial")</span></a>
                                    </li>
                                    -->
                                </ul>
                                @endif
                                <!-- MENU TUTOR -->
                                @if(auth()->guard('profesorado')->check())
                                @if(auth()->guard('profesorado')->user()->isTutor())
                                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                    <span class="fs-5 d-none d-sm-inline">Tutor</span>
                                </a>
                                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                                    <!-- INICIO -->
                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" class="nav-link align-middle px-0 " >
                                            <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">@lang("common.inicio")</span>
                                        </a>
                                    </li>
                                    <!-- ALUMNOS -->
                                    <li>
                                        <a href="{{ route('tutor.alumnos') }}" class="nav-link px-0 align-middle">
                                        <i class="bi bi-people-fill text-white"></i><span class="ms-1 d-none d-sm-inline text-white">@lang("common.alumnos")</span></a>
                                    </li>
                                    <!-- SEGUIMIENTO -->
                                    <li>
                                        <a href="{{ route('tutor.seguimientos') }}" class="nav-link px-0 align-middle">
                                            <i class="fs-4 bi-card-checklist text-white"></i><span class="ms-1 d-none d-sm-inline text-white">@lang("common.seguimientos")</span></a>
                                    </li>
                                    <!-- TUTORES DE EMPRESA -->
                                    <li>
                                        <a href="{{ route('tutor.ficha_seguimiento') }}" class="nav-link px-0 align-middle">
                                            <i class="fs-4 bi-table text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">@lang("common.fichaSeguimiento")</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tutor.show.ficha_seguimiento') }}" class="nav-link px-0 align-middle">
                                        <i class="fs-4 bi-card-checklist text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">@lang("common.misSeguimientos")</span></a>
                                    </li>
                                </ul>
                                @endif
                                @endif


                                <!--TUTOR_EMPRESA-->
                                @if(auth()->guard('empresa')->check())
                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu-empresa">
                                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                    <span class="fs-5 d-none d-sm-inline text-white">Tutor Empresa</span>
                                </a>
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link align-middle px-0 " >
                                        <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">@lang("common.inicio")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('tutor_empresa.ficha_seguimiento') }}" class="nav-link px-0 align-middle">
                                        <i class="fs-4 bi-card-checklist text-white"></i><span class="ms-1 d-none d-sm-inline text-white">@lang("common.seguimientos")</span></a>
                                </li>
                            </ul>
                            @endif


                            <!--CORDINADOR-->
                            @if(auth()->guard('profesorado')->check())
                            @if(auth()->guard('profesorado')->user()->isCoordinador())
                            <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                <span class="fs-5 d-none d-sm-inline">@lang("common.coordinador")</span>
                            </a>
                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                                <!-- INICIO -->
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link align-middle px-0 " >
                                        <i class="fs-4 bi-house text-white"></i> <span class="ms-1 d-none d-sm-inline pl-2 text-white">@lang("common.inicio")</span>
                                    </a>
                                </li>

                                <!-- Profesorado -->
                                <li>
                                    <a href="{{ route('cordinador.profesorado') }}" class="nav-link px-0 align-middle">
                                        <i class="bi bi-person-video3 text-white"></i><span class="ms-1 d-none d-sm-inline pl-2 text-white">@lang("common.profesorado")</span></a>
                                </li>
                                <!-- ALUMNOS -->
                                <li>
                                    <a href="{{ route('cordinador.alumno') }}" class="nav-link px-0 align-middle">
                                        <i class="bi bi-people-fill text-white"></i><span class="ms-1 d-none d-sm-inline pl-2 text-white">@lang("common.alumno")</span></a>
                                </li>
                                <!-- Tutor-Empresa -->
                                <li>
                                    <a href="{{ route('cordinador.tutorEmpresa') }}" class="nav-link px-0 align-middle">
                                        <i class="bi bi-person-badge text-white"></i><span class="ms-1 d-none d-sm-inline pl-2 text-white">@lang("common.tutorEmpresa")</span></a>
                                </li>
                            </ul>
                            @endif
                            @endif
                        </div>
                        <div class="mb-4">
                        <!-- PERFIL -->
                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
                                    <li>
                                        <a class="nav-link px-0 align-middle" href="{{ route('ajustes') }}">
                                            <img src="{{ Vite::asset('resources/images/avatar.png') }}" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                            @if(auth()->guard('profesorado')->check())
                                                <span class="d-none d-sm-inline mx-1 text-white">{{auth()->guard('profesorado')->user()->name}}</span>
                                            @endif

                                            @if(auth()->guard('empresa')->check())
                                                <span class="d-none d-sm-inline mx-1 text-white">{{auth()->guard('empresa')->user()->name}}</span>
                                            @endif
                                            @if(auth()->guard('alumno')->check())
                                                <span class="d-none d-sm-inline mx-1 text-white">{{auth()->guard('alumno')->user()->name}}</span>
                                            @endif
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a class="nav-link px-0 align-middle" href="{{ route('logout') }}">
                                            <i class="bi bi-x-circle text-white"></i>
                                            <span class="ms-1 d-none d-sm-inline pl-2 text-white">@lang("common.cerrarsesion")</span>
                                        </a>
                                    </li>
                            </ul>
                        </div>
                            
                    </div>
                </div>
                <div class="col-10 col-md-9 col-xl-10 p-3 min-vh-100">
                    @yield('content')
                </div>
            </div>
        </div>
    </nav>
    @include('common.footer')
    @yield("script")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
