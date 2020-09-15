<div class="modal fade" id="New_Departure_Modal" tabindex="-1" role="dialog" aria-labelledby="New_Departure_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-blue text-white">
        <h5 class="modal-title " id="New_Departure_ModalLabel">Salida de producto</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('inventory.new_departure')}}" method="post">
            @csrf
            <div class="form-group col">
                <select class="js-example-basic-single custom-select" id="item_id" name="item_id" required>
                  <option selected value="">Buscar Producto...</option>
                    @foreach($item_registered as $item)
                      <option value="{{$item->id}}">Folio:{{$item->id}}, Nombre:{{$item->name}}, Categoría:{{$item->category->name}},
                          @if($item->stock->isEmpty())
                              Producto No Disponible
                          @else
                              @foreach($item->stock as $quantity)
                              Cantidad: {{$quantity->quantity}}
                              @endforeach
                          @endif
                      </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Cantidad" name="quantity" required>
            </div>
            <div class="form-group">
                <textarea name="reason" id="reason" cols="30" rows="5" class="form-control" placeholder="Razón" onkeyup="mayus(this);" required></textarea>
            </div>
            <div class="dropdown-divider"></div>
            <div class="form-group">
                <button type="submit" class="btn bg-orange w-100">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>