@extends('layouts.app-system')
@section('container')
@extends('system.order.modal_validation_delete_budget')
@foreach($budgets as $budget)
<header class="bg-blue text-white p-2">
    <p class="h5 text-center">Nº FOLIO: {{$budget->id}} </p>
</header>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-primary" href="{{route('order.index')}}">Index</a></li>
        <li class="breadcrumb-item"><a class="text-primary" href="/select_order/{{$order}}">Información del Pedido</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a class="text-dark">Visualizar Cotización</a></li>
    </ol>
</nav>
@endforeach
<div class="ml-3 mr-3 bg-white">
    <div class="row">   
        <div class="col">
            <table class="table table-hover table-sm text-center">
                <thead class="bg-blue">
                    <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody class="">
                @foreach($budget_item as $items)
                    <tr>
                    <th scope="row">{{$items->id}}</th>
                    <td><p >{{$items->name}} </p></td>
                    <td><p >${{$items->price}} </p></td>
                    <td><p >{{$items->quantity}} </p></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="dropdown-divider"></div>
    @foreach($budgets as $budget)
    <div class="text-center">
        <div>
            <p><strong> Detalles: </strong>{{$budget->details}}</p>
        </div>
        <div>
            <p><strong>Subtotal: </strong>${{$budget->subtotal}}</p>
        </div>
        <div>
            <p><strong>IVA: </strong>${{$budget->iva}}</p>
        </div>
        <div>
            <p><strong>Total: </strong>${{$budget->total}}</p>
        </div>
        
    </div>
    <div class="dropdown-divider"></div>
    <div class="row form-group">
        <div class="col-sm d-flex justify-content-center">
            <div class="p-2">
                <a href="{{route('budget.printpdf',$budget->id)}}" class="btn bg-orange btn-sm">PDF</a>
            </div>
    @endforeach
            @if(Auth::user()->hasRole('admin'))
            <div class="p-2">
                <a class="btn btn-danger btn-sm deleteBudget text-white" data-toggle="modal" data-target="#deleteBudget_Modal" data-url="{{ url('/delete_budget', $budget->id) }}">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
$('.deleteBudget').click(function () {
        var url = $(this).attr('data-url');
        $("#deleteBudget").attr("href", url);
});
</script>
@stop