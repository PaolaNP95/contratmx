
<!---MODAL NEW USER---->
<div class="modal fade" id="Modal_new_user" tabindex="-1" role="dialog" aria-labelledby="Modal_new_userTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h5 class="modal-title text-white" id="Modal_new_userTitle">NUEVO USUARIO</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation"  action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3 mx-auto text-center">
                            <label for="role">Rol del Usuario</label>
                            <select class="custom-select" id="role" required name="role">
                                <option selected disabled value="">Elegir...</option>
                                @foreach($role_user as $rol)
                                <option value="{{$rol->id}}">{{$rol->description}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Selecciona un rol de usuario
                            </div>
                        </div>
                        <div class="dropdown-divider bg-dark"></div>
                        <div class="col-md-12 mb-3">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required onkeyup="mayus(this);">
                            <div class="invalid-feedback">
                                Ingresa un nombre
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="lastname">Apellidos</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required onkeyup="mayus(this);">
                            <div class="invalid-feedback">
                                Ingresa los apellidos
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="ocupation">Ocupación</label>
                            <input type="text" class="form-control" id="ocupation" name="ocupation" required onkeyup="mayus(this);">
                            <div class="invalid-feedback">
                                Ingresa alguna ocupación
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="phone">Teléfono</label>
                            <input type="text" class="form-control" id="phone" name="phone" required placeholder="Solo 10 dígitos"> 
                            <div class="invalid-feedback">
                                Ingresa un teléfono
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="company">Compañia</label>
                            <input type="text" class="form-control" id="company" name="company" required onkeyup="mayus(this);">
                            <div class="invalid-feedback">
                                Ingresa una compañia
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Ingresa un correo
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="state">Estado</label>
                            <input type="text" class="form-control" id="state" name="state" required onkeyup="mayus(this);">
                            <div class="invalid-feedback">
                                Selecciona un estado
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="state">Ciudad</label>
                            <input type="text" class="form-control" id="city" name="city" required onkeyup="mayus(this);">
                            <div class="invalid-feedback">
                                Selecciona una ciudad
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="zip">Código Postal</label>
                            <input type="text" class="form-control" id="zip" name="zip" required>
                            <div class="invalid-feedback">
                                Ingresa un codigo postal
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" id="address" name="address" required onkeyup="mayus(this);" placeholder="Calle, Número y Colonia">
                            <div class="invalid-feedback">
                                Ingresa alguna direccion
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn bg-orange w-100" type="submit"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---MODAL NEW USER---->