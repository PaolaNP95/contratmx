<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/">
        <img src="/img/logo3.png" width="30" height="30" class="d-inline-block" alt="" loading="lazy">
        Contratmx
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/#us">Quiénes somos</a></li>
            <li class="nav-item"><a class="nav-link" href="/#advantage">Ventajas</a></li>
            <li class="nav-item"><a class="nav-link" href="/#service">Servicios</a></li>
            <li class="nav-item"><a class="nav-link" href="/#contact">Contacto</a></li>
        </ul>
        <span class="navbar-text">
            <ul class="navbar-nav mr-auto">
            @if (Route::has('login'))
                @auth
                <li class="nav-item"><a class="nav-link btn btn-outline-primary" href="{{ url('/home') }}">Inicio</a></li>  
            @else
                <li class="nav-item"><a class="nav-link btn btn-outline-warning p-2" href="{{ route('login') }}">Iniciar de sesión</a></li>
                @endauth
            @endif
            </ul>
        </span>
    </div>
</nav>