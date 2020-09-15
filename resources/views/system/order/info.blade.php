@extends('layouts.app-system')
@section('container')
<header class="bg-blue text-white p-2">
    <p class="h5 text-center">INFORMACIÓN DEL TRABAJO</p>
</header>
<nav aria-label="breadcrumb"> 
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-primary" href="{{route('order.index')}}">Index</a></li>
        <li class="breadcrumb-item active" aria-current="page">Información del Trabajo</li>
    </ol>
</nav>
<div class="m-4">
@foreach($order_user as $user)
    @switch($user->status)
        @case(0)
            <div class="alert alert-dark text-center" role="alert">
                ESTATUS: PENDIENTE
            </div>
            
            <div class="row">
                <div class="col justify-content-center  d-flex">
                    @if(Auth::user()->hasRole('admin'))
                    <a class="btn bg-orange btn-sm mr-1" href="/accept_order/{{$user->id}}">Aceptar Trabajo</a>
                    <a class="btn bg-orange btn-sm mr-1" href="/budget_order/{{$user->id}}">Hacer Cotización</a>
                    @endif
                    @foreach($budgets as $budget)
                        <a class="btn bg-blue btn-sm text-white mr-1" href="{{route('budget.show',$budget->id)}}">Cotización Nº {{$budget->id}}</a>
                    @endforeach
                </div>
            </div>
            
            
        @break
        @case(1)
            <div class="alert alert-warning text-center" role="alert">
                ESTADO: EN PROCESO
            </div>
            @if(Auth::user()->hasRole('admin'))
            <div class="row">
                <div class="col justify-content-center  d-flex">
                <a class="btn bg-blue btn-sm" href="/complete_order/{{$user->id}}">Finalizar Trabajo</a>
                </div>
            </div>
            @endif
        @break
        @case(2)
            <div class="alert alert-success text-center" role="alert">
                ESTADO: COMPLETADA
            </div>
        @break
    @endswitch
@endforeach
    <div class="container border mt-3 p-3 bg-white">
        @foreach($order_user as $user)
            <p class=""><strong> Nombre del cliente:</strong> {{$user->lastname}}, {{$user->user_name}}</p>
            <p class=""><strong> Compañia:</strong>{{$user->company}}</p>
            <p class=""><strong> Tipo de Trabajo:</strong>
            @switch($user->type)
                @case(1)
                    INDUSTRIAL</p>
                @break
                @case(2)
                    COMERCIAL</p>
                @break
                @case(3)
                    RESIDENCIAL</p>
                @break
                @default
                    {{$user->type}}</p>
                @break
            @endswitch
            <p class=""><strong> Detalles Adicionales:</strong>{{$user->add_details}}</p>
        @endforeach
            <p class=""><strong> Servicios solicitados:</strong> </p>
        @foreach($order_service as $service)
            <p class="">{{$service->description}}</p>
        @endforeach
    </div>
</div>
@stop