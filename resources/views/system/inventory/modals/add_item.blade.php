<div class="modal fade" id="Add_Item_Modal" tabindex="-1" role="dialog" aria-labelledby="Add_Item_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-blue text-white">
        <h5 class="modal-title" id="Add_ItemModalLabel">Agregar Producto</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('inventory.store')}}" method="post">
            @csrf
            <div class="form-group">
                <select class="js-example-basic-single w-100" id="new_item_id" name="new_item_id" required>
                    <option selected disabled value="">Buscar Producto...</option>
                    @foreach($item_registered as $item)
                        <option value="{{$item->id}}">Folio:{{$item->id}}, Nombre:{{$item->name}}, Categoría:{{$item->category->name}}
                        </option>
                    @endforeach
                    </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Cantidad" name="quantity" required>
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