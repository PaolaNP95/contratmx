<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contratmx System</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script src="{{ asset('js/gtag.js') }}" defer></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173553746-1"></script>

    </head>
    <style>
    body{
        font-size:12px;
        background-color:#f3f3f3; 
    }
    nav a{
        font-size:15px;
    }
    .bg-whiteDark{
        background-color:#f3f3f3;
    }
    .access-info{font-size:13px; font-weight: 200;}
    a:link,a:hover{color:#EAECEE}
    a:link,a{color:#EAECEE;font-size:12px; }
    .color-orange{color:#EB984E;}.bg-orange{background-color:#EB984E; color:white;}
    .color-blue{color:#0D47A1;}.bg-blue{background-color:#0D47A1;color:white;}.link-blue a:hover{color:#0D47A1;}

    table{
        font-size:12px;
    }
    .card-nofity{
        width: auto; 
        z-index:100; 
        text-align:center;
        position:absolute;
        margin-top:10px;
        margin-left:10px;
    }
    @keyframes LoadWindow {
        0% {
           opacity:0;
        }
        100% {
            opacity:1;
        }
    }
    .content-inside
    {
        animation: 1s ease-out 0s 1 LoadWindow;
    }
    @media only screen and (max-width: 2000px){
        .img-item{
            width:300px;
        }
    }
    @media only screen and (max-width: 1000px){
        .img-item{
            width:100%;
        }
    }
    @media only screen and (max-width: 800px){
        .img-item{
            width:100%;
        }
    }
    @media only screen and (max-width: 600px) {
        .img-item{
            width:100%;
        }
    }
    @media only screen and (max-width: 400px) { 
        .img-item{
            width:100%;
        }
    }

    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/">
                    <img src="/img/logo3.png" width="30" height="30" class="d-inline-block" alt="">
                    Contratmx
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    
                    @if(Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link {{!Route::is('home.index')?: 'active'}}" href="{{ route('home.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{!Route::is('user.index')?: 'active'}} {{!Route::is('user.costumer')?: 'active'}}" href="{{ route('user.index') }}">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{!Route::is('inventory.index')?: 'active'}} {{!Route::is('entries.index')?: 'active'}} {{!Route::is('departures.index')?: 'active'}} {{!Route::is('catalogue.index')?: 'active'}}" href="{{ route('inventory.index') }}">Inventario</a>
                    </li>
                    @endif
                    <li class="nav-item"> 
                        <a class="nav-link {{!Route::is('order.index')?: 'active'}}" href="{{ route('order.index') }}">Trabajos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{!Route::is('noty.index')?: 'active'}}" href="{{ route('noty.index') }}">Notificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{!Route::is('user.settings')?: 'active'}}" href="{{ route('user.settings') }}">Configuración</a>
                    </li>
                </ul>
                <a class="btn btn-outline-warning my-2 my-sm-0" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                    Cerrar Sesión
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="my-2 my-lg-0">
                        @csrf
                    </form>
                </a>
            </div>
        </nav>
        @if(session()->has('success'))
        <div class="card position-absolute card-nofity bg-success alert" id="card_notify" role="alert">
            <div class="card-body text-white p-1">
                <button type="button" class="close ml-5" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                </svg>
                <strong>{{ session()->get('success') }}</strong>
            </div>
        </div>
        @endif
        @if(session()->has('error'))
        <div class="card position-absolute card-nofity bg-danger alert" id="card_notify" role="alert">
            <div class="card-body text-white p-1">
                <button type="button" class="close ml-5" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-exclamation-triangle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.938 2.016a.146.146 0 0 0-.054.057L1.027 13.74a.176.176 0 0 0-.002.183c.016.03.037.05.054.06.015.01.034.017.066.017h13.713a.12.12 0 0 0 .066-.017.163.163 0 0 0 .055-.06.176.176 0 0 0-.003-.183L8.12 2.073a.146.146 0 0 0-.054-.057A.13.13 0 0 0 8.002 2a.13.13 0 0 0-.064.016zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                </svg>
                <strong>{{ session()->get('error') }}</strong>
            </div>
        </div>
        @endif
        <div class="position-relative bg-whiteDark content-inside">
            @yield('container')
        </div>
        <script>
            function mayus(e) {
                e.value = e.value.toUpperCase();
            }
            setTimeout(function(){ $('#card_notify').hide() }, 6000);
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    </body>
</html>