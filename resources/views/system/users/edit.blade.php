@extends('layouts.app-system')
@section('container')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-primary" href="{{route('user.index')}}">Index</a></li>
        <li class="breadcrumb-item active" aria-current="page">Actualizar Información</li>
    </ol>
</nav>
<div class="card ml-3 mr-3 mb-3">
    <div class="card-header bg-blue">
        <p class="text-white h5 text-center">Actualizar Información de Usuario</p>
    </div>
    <div class="card-container p-4 bg-5 font-weight-bold">
        <form class="needs-validation" role="form" action="{{action('UserController@update',$id)}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="form-row">
                <div class="dropdown-divider bg-dark"></div>
                <div class="col-md-12 mb-3">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required value="{{$user->user_name}}" onkeyup="mayus(this);">
                    <div class="invalid-feedback">
                        Ingresa un nombre
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="lastname">Apellidos</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required value="{{$user->lastname}}" onkeyup="mayus(this);">
                    <div class="invalid-feedback">
                        Ingresa los apellidos
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="ocupation">Ocupación</label>
                    <input type="text" class="form-control" id="ocupation" name="ocupation" required onkeyup="mayus(this);" value="{{$user->ocupation}}">
                    <div class="invalid-feedback">
                        Ingresa alguna ocupación
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" id="phone" name="phone" required value="{{$user->phone}}">
                    <div class="invalid-feedback">
                        Ingresa un teléfono
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="company">Compañia</label>
                    <input type="text" class="form-control" id="company" name="company" required value="{{$user->company}}" onkeyup="mayus(this);">
                    <div class="invalid-feedback">
                        Ingresa una compañia
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required value="{{$user->email}}">
                    <div class="invalid-feedback">
                        Ingresa un correo
                    </div>
                </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="up_state">Estado</label>
                    <input type="text" class="form-control" id="state" name="state" required value="{{$user->state}}" onkeyup="mayus(this);">
                    <div class="invalid-feedback">
                        Selecciona un estado
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="up_state">Ciudad</label>
                    <input type="text" class="form-control" id="city" name="city" required value="{{$user->city}}" onkeyup="mayus(this);">
                    <div class="invalid-feedback">
                        Selecciona una ciudad
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="up_zip">Código Postal</label>
                    <input type="text" class="form-control" id="zip" name="zip" required value="{{$user->zip}}">
                    <div class="invalid-feedback">
                        Ingresa un codigo postal
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" required onkeyup="mayus(this);" value="{{$user->address}}">
                    <div class="invalid-feedback">
                        Ingresa alguna direccion
                    </div>
                </div>
            </div>
            <input class="btn bg-orange float-right" type="submit" value="Actualizar"></input>
        </form>
    </div>
</div>
<script>
phone.addEventListener('input',function(){
    if(this.value.length>10)
        this.value=this.value.slice(0,10);
})

</script>
@stop