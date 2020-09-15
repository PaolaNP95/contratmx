
<!---MODAL NEW ORDER---->
<div class="modal fade" id="Modal_new_order" tabindex="-1" role="dialog" aria-labelledby="Modal_new_orderTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h5 class="modal-title text-white text-center" id="Modal_new_orderTitle">NUEVA ORDEN</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation"  action="{{route('order.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="col-lg-6 mb-3 mx-auto text-center d-block">
                            <label for="role"><strong>Tipo de Instalación</strong></label>
                            <select class="custom-select h1" id="type" name="type" required>
                                <option selected disabled value="">Elegir...</option>
                                <option value="1">Industrial</option>
                                <option value="2">Comercial</option>
                                <option value="3">Residencial</option>
                                <option value="4">Otro</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecciona un tipo de instalación
                            </div>
                        </div>
                        <div class="col-md-8 mb-3 mx-auto text-center d-none" id="div-other" name="div-other">
                            <input type="text" class="form-control" id="other" name="other" onkeyup="mayus(this);" placeholder="Ingresa el tipo de instalación">
                            <div class="invalid-feedback">
                                Ingresa un tipo de instalación
                            </div>
                        </div>
                        <div class="col-md-12 container"> 
                            <label for="role"><strong>Selecciona algún servicio</strong></label>
                            <div class="form-check row m-3">
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="1" name="services_01">
                                    <label class="form-check-label">
                                        Alarma cableada o inalámbrica
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="2" name="services_02">
                                    <label class="form-check-label">
                                        Cámaras de seguridad
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="3" name="services_03">
                                    <label class="form-check-label">
                                        Barreras vehiculares
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="4" name="services_04">
                                    <label class="form-check-label">
                                        Control de acceso y asistencia
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="5" name="services_05">
                                    <label class="form-check-label">
                                        Cerca electrificada
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="6" name="services_06">
                                    <label class="form-check-label">
                                        Sistema contra incendio
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="7" name="services_07">
                                    <label class="form-check-label">
                                        Cableado estructurado
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="8" name="services_08">
                                    <label class="form-check-label">
                                        Telefonía
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="9" name="services_09">
                                    <label class="form-check-label">
                                        Site
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="10" name="services_10">
                                    <label class="form-check-label">
                                        Fibra óptica
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="11" name="services_11">
                                    <label class="form-check-label">
                                        Charola o escalerilla
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="12" name="services_12">
                                    <label class="form-check-label">
                                        Tubería conduit pared delgada y gruesa
                                    </label>
                                </div>
                                <div class="col-md-auto">
                                    <input class="form-check-input" type="checkbox" value="13" name="services_13">
                                    <label class="form-check-label">
                                        Cableado de cualquier tipo
                                    </label>
                                </div>
                            </div>
                        </div>        
                        <div class="col-md-12">
                            <label for="details"><strong>Especifica dimensiones del área a instalar o algún detalle adicional</strong></label>
                            <textarea class="form-group w-100" rows="5" id="details" name="details" required onkeyup="mayus(this);"></textarea>
                            
                            <div class="invalid-feedback">
                                Ingresa los detalles
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
<!---MODAL NEW ORDER---->