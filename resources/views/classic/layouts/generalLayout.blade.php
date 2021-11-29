<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! config('app.name') !!}</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <style>
        .text-primary1 {
            color: #53BB5D !important;
        }
    </style>
    <!-- Estilos de página -->
    @stack('plugins-styles')

    <!-- page style -->
    @stack('page-styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="{{route('web.dashboard')}}">
                <img src="{{asset('images/logo.png')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Acme
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{$dashActivated ?? ''}}" aria-current="page" href="{{route('web.dashboard')}}">
                        <i class="bi bi-house-door-fill"></i> Inicio
                    </a>
                </li>
                <li class="nav-item" title="Agregar Conductor o propietario">
                    <a class="nav-link {{$personActivated ?? ''}}" href="{{route('web.person.formCreate')}}">
                        <i class="bi bi-plus-circle-fill"></i> Conductor / Propietario
                    </a>
                </li>
                <li class="nav-item" title="Agregar Vehículo">
                    <a class="nav-link {{$vehicleActivated ?? ''}}" href="{{route('web.vehicle.formCreate')}}">
                        <i class="bi bi-plus-circle-fill"></i> Vehículo
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 border rounded pt-2">
    @yield('page_content')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- plugins scripts -->
@stack('plugins-scripts')

<!-- optional scripts -->
@stack('page-scripts')
</body>
</html>
