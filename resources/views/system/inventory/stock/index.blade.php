
@extends('system.inventory.layout')
@extends('system.inventory.modals.new_item')
@extends('system.inventory.modals.new_departure_item')
@extends('system.inventory.modals.add_item')
@extends('system.inventory.modals.modal_validation_delete_stock')
@extends('system.inventory.modals.modal_validation_delete_category')
@extends('system.inventory.modals.new_category')
@section('container-inventory')
<style>
@keyframes svg-most-used {
  from {top: 5px;}
  to {top: 0px;}
}
.svg-most-used{
  position: relative;
  animation-fill-mode: forwards;
  animation: svg-most-used 1.5s infinite;
}
@keyframes svg-supplu-needed{
  from {top: 0px;}
  to {top: 5px;}
}
.svg-supply_needed{
  position: relative;
  animation-fill-mode: forwards;
  animation: svg-supplu-needed 1.5s infinite;
}
@keyframes svg-warning{
  from {width: 1.5em;}
  to {width: 2em;}
}
.svg-warning{
  position: relative;
  animation-fill-mode: forwards;
  animation: svg-warning 1.5s infinite;
}
.inventory-icons .links {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}
.inventory-icons .links a {
    margin: 0px 20px;
}

</style>
<div class="pt-3">
    <div class="inventory-icons">
        <div class="links form-group">
            <a data-toggle="modal" data-target="#New_Item_Modal">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus-square-fill color-orange" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
                </svg> 
            </a>
            <a data-toggle="modal" data-target="#Add_Item_Modal">
                <svg   width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-down color-orange" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 8.146a.5.5 0 0 1 .708 0L8 10.793l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/>
                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0v-9A.5.5 0 0 1 8 1z"/>
                <path fill-rule="evenodd" d="M1.5 13.5A1.5 1.5 0 0 0 3 15h10a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 13 4h-1.5a.5.5 0 0 0 0 1H13a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5v-8A.5.5 0 0 1 3 5h1.5a.5.5 0 0 0 0-1H3a1.5 1.5 0 0 0-1.5 1.5v8z"/>
                </svg>
            </a>  
            <a data-toggle="modal" data-target="#New_Departure_Modal">
                <svg  width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-box-arrow-up color-orange" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 4.354a.5.5 0 0 0 .708 0L8 1.707l2.646 2.647a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708z"/>
                <path fill-rule="evenodd" d="M8 11.5a.5.5 0 0 0 .5-.5V2a.5.5 0 0 0-1 0v9a.5.5 0 0 0 .5.5z"/>
                <path fill-rule="evenodd" d="M2.5 14A1.5 1.5 0 0 0 4 15.5h8a1.5 1.5 0 0 0 1.5-1.5V7A1.5 1.5 0 0 0 12 5.5h-1.5a.5.5 0 0 0 0 1H12a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H4a.5.5 0 0 1-.5-.5V7a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 0 0-1H4A1.5 1.5 0 0 0 2.5 7v7z"/>
                </svg>
            </a>
            <a data-toggle="modal" data-target="#New_Category_Modal">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-tags-fill color-orange" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 7.586 1H3zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                <path d="M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                </svg>
            </a>
        </div>
    </div>
</div>
<div class="row form-group text-uppercase">
    <div class="col-sm-9">
        <div class="form-group table-responsive ">
            <label for="" class="font-weight-bold">productos disponibles</label>
            <table class="table table-hover table-sm text-center">
                <thead class="bg-blue">
                    <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody class="table-borderless bg-white ">
                    @foreach($stocks as $stock)
                    <tr>
                    <th scope="row">{{$stock->id}}</th>
                    <td>{{$stock->item->name}}</td>
                    <td>{{$stock->item->category->name}}</td>
                    <td>
                    {{$stock->quantity}}
                    @if($stock->quantity<=5)
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-exclamation text-danger svg-warning" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        </svg>
                    @endif</td>
                    <td>
                        <a class="btn btn-danger btn-sm deleteFromStock text-white" data-toggle="modal" data-target="#deleteFromStock_Modal" data-url="{{ url('/delete_item_from_intenvory', $stock->id) }}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-sm">
                    @if($stocks->links()==true)
                        {{$stocks->links()}}
                    @endif
                </ul>
            </nav>
        </div>
        <div class="form-group table-responsive ">
            <label for="" class="font-weight-bold">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-tags-fill color-orange" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 7.586 1H3zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                <path d="M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                </svg>
                categorías registradas</label>
            <table class="table table-hover table-sm text-center">
                <thead class="bg-blue">
                    <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Concepto</th>
                        <th scope="col" colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody class="table-borderless bg-white">
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td >{{$category->name}}</td>
                            <td>
                                <a class="btn btn-sm text-dark updateCategory" data-toggle="modal" data-target="#Edit_Category_Modal" data-url="{{ url('update_category', $category->id) }}" data-name="{{$category->name}}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm deleteCategory text-white" data-toggle="modal" data-target="#deleteCategory_Modal" data-url="{{ url('/delete_category', $category->id) }}" >
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @include('system.inventory.modals.edit_category')
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-sm">
                    @if($categories->links()==true)
                        {{$categories->links()}}
                    @endif
                    
                </ul>
            </nav>

        </div>
        <div class="form-group table-responsive ">
            <label for="" class="font-weight-bold">
                <svg   width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-down color-orange" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 8.146a.5.5 0 0 1 .708 0L8 10.793l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/>
                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0v-9A.5.5 0 0 1 8 1z"/>
                <path fill-rule="evenodd" d="M1.5 13.5A1.5 1.5 0 0 0 3 15h10a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 13 4h-1.5a.5.5 0 0 0 0 1H13a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5v-8A.5.5 0 0 1 3 5h1.5a.5.5 0 0 0 0-1H3a1.5 1.5 0 0 0-1.5 1.5v8z"/>
                </svg>
                entradas de productos registradas</label>
            <table class="table table-hover table-sm text-center">
                <thead class="bg-blue">
                    <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody class="table-borderless bg-white">
                    @foreach($entries as $entry)
                    <tr>
                        <th scope="row">{{$entry->id}}</th>
                        <td>{{$entry->item->name}}</td>
                        <td>{{$entry->item->category->name}}</td>
                        <td>{{$entry->quantity}}</td>
                        <td>{{$entry->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-sm">
                    @if($entries->links()==true)
                        {{$entries->links()}}
                    @endif
                </ul>
            </nav>
        </div>
        <div class="form-group table-responsive ">
            <label for="" class="font-weight-bold">
                <svg  width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-box-arrow-up color-orange" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.646 4.354a.5.5 0 0 0 .708 0L8 1.707l2.646 2.647a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708z"/>
                <path fill-rule="evenodd" d="M8 11.5a.5.5 0 0 0 .5-.5V2a.5.5 0 0 0-1 0v9a.5.5 0 0 0 .5.5z"/>
                <path fill-rule="evenodd" d="M2.5 14A1.5 1.5 0 0 0 4 15.5h8a1.5 1.5 0 0 0 1.5-1.5V7A1.5 1.5 0 0 0 12 5.5h-1.5a.5.5 0 0 0 0 1H12a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H4a.5.5 0 0 1-.5-.5V7a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 0 0-1H4A1.5 1.5 0 0 0 2.5 7v7z"/>
                </svg>salidas de productos registradas</label>
            <table class="table table-hover table-sm text-center">
                <thead class="bg-blue">
                    <tr>
                        <th scope="col">Folio</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Razón</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody class="table-borderless bg-white">
                    @foreach($departures as $departure)
                    <tr>
                        <th scope="row">{{$departure->id}}</th>
                        <td>{{$departure->item->name}}</td>
                        <td>{{$departure->item->category->name}}</td>
                        <td>{{$departure->quantity}}</td>
                        <td>{{$departure->reason}}</td>
                        <td>{{$departure->user->lastname}}, {{$departure->user->user_name}}</td>
                        <td>{{$departure->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-sm">
                    @if($departures->links()==true)
                    {{$departures->links()}}
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="row form-group">
            <div class="col col-sm-12">
                <div class="p-1 bg-dark text-white rounded-0 text-center">
                    Productos Más Usados
                </div>
                <div class="table-responsive">
                    <table class="table table-sm text-center">
                            <thead class="bg-blue">
                                <tr>
                                    <th scope="col">Concepto</th>
                                    <th scope="col">No Salidas</th>
                                </tr>
                            </thead>
                            <tbody class="table-borderless bg-white">
                                @foreach($actives as $active)
                                <tr>
                                    <td>{{$active->item->name}}</td>
                                    <td>
                                        {{$active->total}}
                                        <svg style="color:#4CAF50"  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-short svg-most-used" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8 5.707 5.354 8.354a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-sm-12">
                <div class="p-1 bg-dark text-white rounded-0 text-center">
                    Próximos en terminar
                </div>
                <div class="table-responsive">
                    <table class="table table-sm p-1 text-center">
                        <thead class="bg-blue">
                            <tr>
                                <th scope="col">Concepto</th>
                                <th scope="col" colspan="2">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody class="table-borderless bg-white">
                            @foreach($supply_needed as $supply_need)
                            <tr>
                                <td>{{$supply_need->item->name}}</td>
                                <td>
                                    {{$supply_need->quantity}}
                                    <svg style="color:#E74C3C" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down-short svg-supply_needed" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.646 7.646a.5.5 0 0 1 .708 0L8 10.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/>
                                    <path fill-rule="evenodd" d="M8 4.5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-sm-12">
                <div class="p-1 bg-dark text-white rounded-0 text-center">
                    Sin Uso
                </div>
                <div class="table-responsive">
                    <table class="table table-sm p-1 text-center">
                        <thead class="bg-blue">
                            <tr>
                                <th scope="col">Concepto</th>
                                <th scope="col">Categoría</th>
                            </tr>
                        </thead>
                        <tbody class="table-borderless bg-white">
                            @foreach($inactives as $inactive)
                            <tr>
                                <td>{{$inactive->name}}</td>
                                <td>{{$inactive->category->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

setTimeout(function(){ $('#card_notify').hide() }, 6000);

$('.updateCategory').click(function () {
        var url = $(this).attr('data-url');
        $("#updateCategory").attr("action", url);
});
$('.deleteCategory').click(function () {
        var url = $(this).attr('data-url');
        $("#deleteCategory").attr("href", url);
});
$('.deleteFromStock').click(function () {
        var url = $(this).attr('data-url');
        $("#deleteFromStock").attr("href", url);
});
</script>
@stop