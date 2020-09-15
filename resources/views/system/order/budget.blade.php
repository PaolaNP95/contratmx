@extends('layouts.app-system')
@section('container')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-primary" href="{{route('order.index')}}">Index</a></li>
        <li class="breadcrumb-item"><a class="text-primary" href="/select_order/{{$order}}">Información del Pedido</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a class="text-dark">Cotización</a></li>
    </ol>
</nav>
<div class="card ml-3 mr-3">
    <div class="card-header bg-dark text-white h6">
        <div class="row">
            <div class="col text-uppercase">
                <p class="text-center d-inline">Cotización a la empresa</p>
                @foreach($orders as $order)
                    <p class="text-center d-inline color-orange">{{$order->company}}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <p class="d-inline"><strong> Detalles Adicionales:</strong></p>
            <div class="dropdown-divider"></div>
        </div>
        @foreach($orders as $order)
            <p class="">{{$order->add_details}}</p>
        @endforeach
        <div class="form-group">
            <p class="d-inline"><strong>Servicios solicitados:</strong></p>
            <div class="dropdown-divider"></div>
        </div>
        @foreach($order_service as $service)
            <p class="">{{$service->description}}</p>
        @endforeach
    </div>
</div>
<div class="card ml-3 mr-3">
    <div class="card-header bg-dark text-white h6">
        <label class="">PRODUCTOS</label>
    </div>
    <div class="card-body table-responsive">
        <form action="{{route('order.budget_create',$order->id)}}" method="post">
            <table class="table table-hover">
                <thead class="bg-blue">
                    <tr>
                        <th scope="col" class="col">CONCEPTO</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody id="newproduct-section">
                </tbody>
            </table>
            @csrf
            <div class="dropdown-divider"></div>
                <button type="button" class="btn btn-outline-success btn-sm" id="newproduct">+</button>
                <button type="button" class="btn btn-outline-danger btn-sm" id="deleteproduct">-</button>
            <div class="dropdown-divider"></div>
            <div class="form-group"><strong>
                Subtotal:</strong><input type='text' class='form-control' placeholder='$' id="subtotal" readonly name="subtotal">
            </div>
            <div class="form-group"> <strong>
                IVA: </strong><input type='text' class='form-control' placeholder='5%' id="iva" readonly name="iva">
            </div>
            <div class="form-group"> <strong>
                Total: </strong><input type='text' class='form-control' placeholder='$' id="total" readonly name="total">
            </div>
            <div class="dropdown-divider"></div>
            <div class="form-group mt-2">
                <label class="font-weight-bolder">Anotaciones Extra</label>
                <textarea class="form-control" id="extra-details" name="extra-details" rows="3" onkeyup="mayus(this);"></textarea>
            </div>
            <div class="form-group">
                <input class="btn bg-orange w-100" type="submit"></input>
            </div>
        </form>
    </div>
</div>
<script>
$(document).ready(function(){
  $("#newproduct").click(function(){
    var cont = $(".numb").length;
    var index = cont + 1;
    var add= "<tr id='new_item'>"+
                "<td><select class='js-example-basic-single w-100' name='item[]' id='item_"+index+"'>"+
                    "<option selected disabled value=''>Buscar Producto...</option>"+
                    "@foreach($item_registered as $item)"+
                        "<option value='{{$item->id}}'>{{$item->name}}, Precio: ${{$item->price}}"+
                            "@if($item->stock->isEmpty())"+
                                ", Producto No Disponible"+
                            "@else"+
                            "@foreach($item->stock as $quantity)"+
                            ", Cantidad: {{$quantity->quantity}}"+
                            "@endforeach"+
                            "@endif"+
                        "</option>"+
                    "@endforeach"+
                "</select></td>"+
                "<td><input type='text' class='form-control numb' placeholder='Ud' name='quantity[]' id='quantity_"+index+"' onblur='calcularMult(" + index + ")'></td>"+
                "<td><input type='text' class='form-control' placeholder='$' name='price[]' id='price_"+index+"' onblur='calcularMult(" + index + ")'></td>"+
                "<td><input type='text' class='form-control' placeholder='Sub' name='subtotal[]' id='subtotal_"+index+"' onblur='calcularMult(" + index + ")' readonly></td>"+
            "</tr>";
    
    
    $("#newproduct-section").append(add);
    $('.js-example-basic-single').select2();
  });
  $("#deleteproduct").click(function(){
    $("#new_item").remove();
  });
  
});
$(document).ready(function() {
    
});
function calcularMult(idx){
  $("#subtotal_" + idx).val($("#quantity_" + idx).val() * $("#price_" + idx).val());
  var sub = 0;
  var porcent = 0.05;
  var iva = 0;
  var total = 0;
  $("input[id^='subtotal_']").each(function() {
    sub += Number($(this).val());
   });         
    $("#subtotal").val(sub);
    iva=(sub*porcent);
    iva.toFixed(2);
    $("#iva").val(iva);
    total=sub+iva;
    $("#total").val(total);
  }
</script>
@stop