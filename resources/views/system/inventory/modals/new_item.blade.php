
<div class="modal fade" id="New_Item_Modal" tabindex="-1" role="dialog" aria-labelledby="New_Item_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <h5 class="modal-title text-white" id="New_ItemModalLabel">Nuevo Producto</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('inventory.new_item')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nombre" name="name" required onkeyup="mayus(this);">
            </div>
            <div class="form-group">
                <select class="custom-select" id="category_id" name="category_id" required>
                    <option selected>Categoría...</option>
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="$ Precio" name="price" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Unidad de medida" name="unit" required onkeyup="mayus(this);">
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file"  class="form-control" name="item_image">
                  <div>{{$errors->first('image')}}</div>
                </div>
              </div>
            </div>
            <div class="form-group">
                <textarea cols="30" rows="5" class="form-control" placeholder="Caracteristicas" name="details" required onkeyup="mayus(this);"></textarea>
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