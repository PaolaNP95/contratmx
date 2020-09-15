<div class="modal fade" id="New_Category_Modal" tabindex="-1" role="dialog" aria-labelledby="New_Category_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <h5 class="modal-title text-white" id="New_Category_ModalLabel">Nueva Categoria</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('inventory.new_category')}}" method="post" id='form-category'>
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Descripción" id="category_name" name="category_name" onkeyup="mayus(this);" required>
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