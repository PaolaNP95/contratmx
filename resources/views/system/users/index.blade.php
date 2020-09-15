
@extends('layouts.app-system')
@extends('system.users.modalNewUser')
@extends('system.users.modal_validation_delete')
@section('container')
@if(count($errors)>0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</div>
@endif
<header class="pt-4">
    <div class="row">
        <div class="col-sm-3 d-flex justify-content-center">
            <div class="p-2">
                <a href="{{ url('/costumer') }}" class="btn bg-orange btn-sm" data-toggle="clients" data-placement="top" title="Clientes">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-people text-white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zm7.973.056v-.002.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg>
                </a>
            </div>
            <div class="p-2">
                <a  class="btn bg-orange btn-sm" data-toggle="modal" data-target="#Modal_new_user" >
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-person-plus text-white" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                </svg>
                </a>
            </div>
        </div>
        <div class="col-sm-7 justify-content-center">
            <div class="row form-group">
                <div class="col-12 col-sm-12">
                    <div class="p-2 flex-grow-1">
                        <form class="needs-validation"  action="/search" method="get">
                            @csrf
                            <select class="js-example-basic-single w-100" name="search_user" onchange="this.form.submit();">
                                <option selected disabled value="">Buscar...</option>
                                @foreach($fulldata as $item)
                                    <option value="{{$item->id}}">{{$item->user_name}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="form-group table-responsive pl-3 pr-3">
    <table class="table table-hover text-center">
        <thead class="bg-blue">
            <tr>
            <th scope="col">Rol de Usuario</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col" colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($fulldata  as $item)
                <tr>
                    @foreach($item->roles as $role)
                        <td>{{$role->description}}</td>   
                    @endforeach                                
                    <td>{{$item->user_name}}</td>
                    <td>{{$item->lastname}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td><a class="btn btn-success btn-sm" href="/select_user/{{$item->id}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                    </a></td>
                    <td><a class="edit-modal btn btn-primary btn-sm" href="{{action('UserController@edit',$item->id)}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a></td>
                    <td><a class="btn btn-danger btn-sm deleteUser text-white" data-toggle="modal" data-target="#deleteUser_Modal" data-url="{{ url('/delete_user', $item->id) }}" >
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<script>
$('#Moda_new_user').on('shown.bs.modal', function () {
    $('#input_new_user').trigger('focus')
})

$('.deleteUser').click(function () {
        var url = $(this).attr('data-url');
        $("#deleteUser").attr("href", url);
});

$(document).on('click', '.edit-modal', function() {
    $("#up_id").val($(this).data("id"));
});
$("#role").change( function() {
        if ($(this).val() === "2") {
            $("#company").prop("disabled", false);
        } else {
            $("#company").prop("disabled", true);
        }
});

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

var phone=document.getElementById('phone');
var age=document.getElementById('age');

phone.addEventListener('input',function(){
    if(this.value.length>10)
        this.value=this.value.slice(0,10);
})
$(function () {
  $('[data-toggle="clients"]').tooltip()
})
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

</script>
@stop