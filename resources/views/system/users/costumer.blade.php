@extends('layouts.app-system')
@extends('system.users.modalNewUser')
@section('container')
<header class="bg-blue text-white p-2">
    <p class="h5 text-center">CLIENTES</p>
</header>
<header class="pt-3">
    <div class="row">
        <div class="col-sm-3 d-flex justify-content-center">
            <div class="form-group">
                <button type="button" class="btn bg-orange btn-sm" data-toggle="modal" data-target="#Modal_new_user">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="col-sm-9 justify-content-center">
            <div class="row form-group">
                <div class="col-12 col-sm-12 pr-5 pl-5">
                    <form class="needs-validation"  action="/search" method="get">
                        @csrf
                        <select class="js-example-basic-single w-100" name="search_user" onchange="this.form.submit();">
                            <option selected disabled value="">Buscar...</option>
                            @foreach($fulldata2 as $item)
                                <option value="{{$item->id}}">{{$item->user_name}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
     </div>
</header>

<div class="form-group table-responsive pl-3 pr-3">
    <table class="table table-hover text-center">
        <thead class="bg-blue">
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Empresa</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col" colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($fulldata as $item)
                @foreach($item->users as $user)
                <tr>
                        <td>{{$user->user_name}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->company}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <td><a class="badge badge-success" href="/select_user/{{$user->id}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                        </a></td>
                        <td><a class="edit-modal badge badge-primary" href="{{action('UserController@edit',$user->id)}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        </a></td>
                        <td><a class="badge badge-danger" href="/delete_user/{{$user->id}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                        </a></td>
                </tr>
                @endforeach
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

phone.addEventListener('input',function(){
    if(this.value.length>10)
        this.value=this.value.slice(0,10);
})
</script>
@stop