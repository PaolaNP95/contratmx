
@extends('layouts.app-system')
@extends('system.order.modalNewOrder')
@extends('system.order.modal_validation_delete')
@section('container')
<header class="pt-3 pl-3">
    <div class="form-group">
        <button type="button" class="btn bg-orange btn-sm" data-toggle="modal" data-target="#Modal_new_order">nuevo</button>
    </div>
</header>
<div class="form-group table-responsive pl-3 pr-3">
    <table class="table table-hover text-center">
        <thead class="bg-blue">
            <tr>
            <th scope="col">Vista Previa</th>
            <th scope="col">Tipo</th>
            <th scope="col">Detalles</th>
            <th scope="col">Compañia</th>
            <th scope="col" colspan="2">Estatus</th>
            </tr>
        </thead>
        <tbody class="bg-white">
        @if(Auth::user()->hasRole('admin'))
            @foreach ($orders  as $item)
                <tr>
                    <td><a class="btn btn-sm btn-success" href="/select_order/{{$item->id}}">Seleccionar</a></td>
                    @switch($item->type)
                        @case (1)
                            <td>INDUSTRIAL</td> 
                            @break;
                        @case (2)
                            <td>COMERCIAL</td> 
                            @break;
                        @case (3)
                            <td>RESIDENCIAL</td> 
                            @break;
                        @default
                            <td>{{$item->type}}</td> 
                            @break;
                    @endswitch
                    <td>{{$item->add_details}}</td>
                    <td>{{$item->user->company}}</td>
                    @switch($item->status)
                        @case(0)
                            <td><span class="btn btn-sm btn-secondary">Pendiente</span></td>
                            <td><a  class="btn btn-danger btn-sm deleteOrder text-white" data-toggle="modal" data-target="#deleteOrder_Modal" data-url="{{ url('/delete_order', $item->id) }}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            </a></td>
                        @break
                        @case(1)
                            <td><span class="btn btn-sm btn-warning">En proceso</span></td>
                            <td></td>
                        @break
                        @case(2)
                            <td><span class="btn btn-sm btn-success">Completada</span></td>
                            <td><a class="btn btn-danger btn-sm deleteOrder text-white" data-toggle="modal" data-target="#deleteOrder_Modal" data-url="{{ url('/delete_order', $item->id) }}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                            </a></td>
                        @break
                    @endswitch
                </tr>
            @endforeach
        @endif
        @if(Auth::user()->hasRole('costumer'))
            @foreach ($order_user  as $item)
                <tr>
                    <td><a class="btn btn-sm btn-success" href="/select_order/{{$item->id}}">seleccionar</a></td>                              
                    @switch($item->type)
                        @case (1)
                            <td>INDUSTRIAL</td> 
                            @break;
                        @case (2)
                            <td>COMERCIAL</td> 
                            @break;
                        @case (3)
                            <td>RESIDENCIAL</td> 
                            @break;
                        @default
                            <td>{{$item->type}}</td> 
                            @break;
                    @endswitch                       
                    <td>{{$item->add_details}}</td>
                    <td>{{$item->user->company}}</td>
                    @switch($item->status)
                        @case(0)
                            <td><span class="btn btn-sm btn-secondary">Pendiente</span></td>
                            <td><a class="btn btn-sm btn-danger" href="/delete_order/{{$item->id}}">x</a></td>
                        @break
                        @case(1)
                            <td><span class="btn btn-sm btn-warning">En proceso</span></td>
                        @break
                        @case(2)
                            <td><span class="btn btn-sm btn-success">Completada</span></td>
<!--                             <td><a class="badge badge-danger" href="/delete_order/{{$item->id}}">x</a></td>
 -->                        @break
                    @endswitch
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
<script>
$(document).ready(function() {
    $("#type").change( function() {
        if ($(this).val() === "4") {
            $('#div-other').removeClass('d-none').addClass('d-inline',true);
        } else {
            $("#div-other").removeClass('d-inline').addClass("d-none", true);
        }
    });
});
$('.deleteOrder').click(function () {
        var url = $(this).attr('data-url');
        $("#deleteOrder").attr("href", url);
});
</script>
@stop