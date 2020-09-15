
@extends('system.inventory.layout')
@section('container-inventory')
@extends('system.inventory.modals.modal_delete_item')
@if(Auth::user()->hasRole('admin'))
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-primary" href="{{route('inventory.index')}}">Index</a></li>
    </ol>
</nav>
<div class="form-group pl-3 pr-3">
    @foreach($item as $item)
        <div class="container w-50 border justify-content-center shadow">
            <div class="row text-uppercase">
                <div class="col-auto border bg-white">
                    <div class="form-group my-auto mx-auto">
                        <img src="{{asset('storage/'.$item->item_image)}}" alt="" class="card-img-top img-item"> 
                    </div>
                </div>
                <div class="col-auto p-4 my-auto">
                    <div class="form-group">
                            <strong>Nombre:</strong>{{$item->name}}
                    </div>
                    <div class="form-group">
                            @if($item->stock->isEmpty())
                                <strong class="text-danger">Producto No Disponible</strong> <br>
                            @else
                                @foreach($item->stock as $quantity)
                                <strong>Cantidad Disponible:</strong>  {{$quantity->quantity}}<br>
                                @endforeach
                            @endif
                            <strong>Descripción:</strong>{{$item->details}}<br>
                            <strong>Precio:</strong>{{$item->price}}<br>
                            <strong>Unidad:</strong>{{$item->unit}}<br>
                            <strong>Categoría:</strong>{{$item->category->name}}<br>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-sm text-dark updateItem" href="{{action('InventoryController@edit',$item->id)}}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        <a class="btn btn-sm deleteItem" data-toggle="modal" data-target="#deleteItem_Modal" data-url="{{ url('/delete_item', $item->id) }}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
Acceso usuario
@endif
</div>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$('.deleteItem').click(function () {
        var url = $(this).attr('data-url');
        $("#deleteItem").attr("href", url);
});
</script>
@stop