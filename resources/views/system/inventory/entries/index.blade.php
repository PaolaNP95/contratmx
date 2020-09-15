@extends('system.inventory.layout')
@extends('system.inventory.modals.new_item')
@extends('system.inventory.modals.new_departure_item')
@extends('system.inventory.modals.add_item')
@section('container-inventory')
<div class="pt-3">
  <div class="row form-group text-uppercase">
    <div class="col-sm-9">
        <div class="form-group table-responsive">
            <label for="" class="font-weight-bold">Registro de entradas de productos</label>
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
        </div>
    </div>
    <div class="col-sm-3">
        <div class="row form-group">
            <div class="col-12 col-sm-12">
                <div class="p-1 bg-blue text-white rounded-0 text-center">
                </div>
                <div class="table-responsive">
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-12 col-sm-12">
                <div class="p-1 bg-blue text-white rounded-0 text-center ">
                </div>
                <div class="">
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@stop