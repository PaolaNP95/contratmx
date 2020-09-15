@extends('layouts.app-system')
@extends('system.users.modal_delete_user')
@section('container')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="card form-group">
                <div class="card-header bg-blue text-white">
                    <p class="h5 text-center">CONFIGURAR INFORMACIÓN</p>
                </div>
                <div class="card-body">
                    <div class="">
                        <p class=""><strong>Nombre: </strong>{{$user->user_name}}</p>
                        <p class=""><strong>Apellidos:</strong> {{$user->lastname}}</p>
                        <p class=""><strong>Teléfono: </strong>{{$user->phone}}</p>
                        <p class=""><strong>Ocupación: </strong>{{$user->ocupation}}</p>
                        <p class=""><strong>Compañia: </strong>{{$user->company}}</p>
                        <p class=""><strong>Email:</strong> {{$user->email}}</p>
                        <p class=""><strong>Estado: </strong>{{$user->state}}</p>
                        <p class=""><strong>Municipio:</strong> {{$user->city}}</p>
                        <p class=""><strong>Código Postal: </strong>{{$user->zip}}</p>
                        <p class=""><strong>Dirección: </strong> {{$user->address}}</p>
                    </div>
                    <a class="edit-modal btn bg-orange btn-sm float-right" href="{{action('UserController@edit',$user->id)}}">Editar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card form-group">
                <div class="card-header bg-blue text-white">
                    <p class="h5 text-center">CAMBIAR CONTRASEÑA</p>
                </div>
                <div class="card-body">
                    <form class="needs-validation" role="form" action="{{action('UserController@update_password')}}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-row font-weight-bolder">
                            <div class="dropdown-divider bg-dark"></div>
                            <div class="col-md-12 mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="invalid-feedback">
                                    Ingresa alguna contraseña
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="password_verified">Repetir Contraseña</label>
                                <input type="password" class="form-control" id="password_verified" name="password_verified">
                                <div class="invalid-feedback">
                                    Vuelve a escribir la contraseña
                                </div>
                            </div>
                        </div>
                        <input class="btn bg-orange float-right btn-sm" type="submit" value="Cambiar"></input>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-danger btn-sm deleteUserSetting text-white" data-toggle="modal" data-target="#deleteUserSetting_Modal" data-url="{{ url('/delete_account', $user->id) }}">
                    Eliminar cuenta</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('.deleteUserSetting').click(function () {
        var url = $(this).attr('data-url');
        $("#deleteUserSetting").attr("href", url);
});
</script>
@stop