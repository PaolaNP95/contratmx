@section('header')
    @include('landing-page.header')
@show
<!-- Navbar-->
@section('navbar')
    @include('landing-page.navbar')
@show
<div class="w-100 h-100 d-flex justify-content-center align-content-center p-5 bg-8 mt-5">
    <div class="mt-5">
        <div class="mb-3 text-white" style="">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="img/politics.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body ">
                        <h5 class="card-title text-weight-bold">POLÍTICAS DE CALIDAD</h5>      
                        <div class="dropdown-divider"></div>  
                        <p class="card-text text-justify">El compromiso de nuestros instaladores es ejecutar de manera eficaz 
                            y eficiente nuestros procesos de instalación.
                            A fin de brindar el mejor servicio de calidad, para la entera satisfacción 
                            de los usuarios finales como de la empresa que nos contrata.</p>
                        <h5 class="card-title text-weight-bold">POLÍTICAS DE PRIVACIDAD</h5>
                        <div class="dropdown-divider"></div>
                        <p class="card-text text-justify" >El compromiso de nuestros instaladores es mantenerse al margen con el usuario final, para evitar posibles alianzas de negocios.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>