<div class="modal fade" id="Edit_Category_Modal" tabindex="-1" role="dialog" aria-labelledby="Edit_Category_ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-blue text-white">
        <h5 class="modal-title" id="Edit_Category_ModalLabel">Editar Categoría</h5>
        
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <form action="" method="post" id="updateCategory">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nuevo nombre" name="name_category" id="name_category" required onkeyup="mayus(this);">
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