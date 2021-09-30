<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header headerRegister">
            <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

        <div class="col-md-12">
              <div class="tile">
                  <h3 class="tile-title">Vertical Form</h3>
                  <div class="tile-body">
                    <form id="formRol" name="formRol">
                      <input type="hidden" id="idRol" name="idRol" value="">
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                      <input class="form-control valid validText" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre" required="">
                    </div>
                          
                    <div class="form-group">
                      <label class="control-label">Descripción</label>
                        <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripcion del rol" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Estado</label>
                        <select class="form-control" id="listStatus" name="listStatus" required="">
                          <option value="1">Activo</option>
                          <option value="2">Inactivo</option>                             
                        </select>
                    </div>

                    <div class="tile-footer row justify-content-center">
                    <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                  </div>
                </form>
                  </div>                  
                </div>
          </div>
          </div>
      </div>
    </div>
</div>





