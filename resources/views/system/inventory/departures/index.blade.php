@extends('system.inventory.layout')
@extends('system.inventory.modals.new_item')
@extends('system.inventory.modals.new_departure_item')
@extends('system.inventory.modals.add_item')
@section('container-inventory')
<div class="pt-3">
  <div class="row form-group text-uppercase">
    <div class="col-sm-9">
        <div class="form-group table-responsive">
            <label for="" class="font-weight-bold">Registro de salidas de productos</label>
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
        </div>
    </div>
    <div class="col-sm-3">
        <div class="row form-group">
            <div class="col-12 col-sm-12">
                <div class="p-1 bg-blue text-white rounded-0 text-center">
                </div>
                <div class="y table-responsive">
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-12 col-sm-12">
                <div class="p-1 bg-blue text-white rounded-0 text-center">
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