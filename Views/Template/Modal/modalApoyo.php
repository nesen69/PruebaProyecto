<!-- Modal -->
<div class="modal fade" id="modalFormApoyo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Apoyo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <form id="formApoyo" name="formApoyo" class="form-horizontal">

              <input type="hidden" id="idApoyo" name="idApoyo" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="row">
                <div class="col-md-12">

                  <div class="row">
                    <div class="form-group col-md-8">
                      <label class="control-label">Nombre de la organización:<span class="required">*</span></label>
                      <input class="form-control" id="txtNombreOrg" name="txtNombreOrg" type="text" required="">
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label">Rif:<span class="required">*</span></label>
                      <input class="form-control" id="txtCodigoOrg" name="txtCodigoOrg" type="text" required="" placeholder="Ingrese su RIF">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label">Responsable por la organización:<span class="required">*</span></label>
                      <input class="form-control" id="txtResponsable" name="txtResponsable" type="text" required="">
                    </div>
                    <div class="form-group col-md-3">
                      <label class="control-label">Cedula:<span class="required">*</span></label>
                      <input class="form-control" id="txtCedula" name="txtCedula" type="text" required="" placeholder="Cedula / RIF / Pasaporte / etc... ">
                    </div>
                    <div class="form-group col-md-3">
                      <label class="control-label">Telefono:<span class="required">*</span></label>
                      <input class="form-control" id="txtTelefono" name="txtTelefono" type="text" required="" placeholder="Telefono">
                    </div>
                  </div>

                  
                    <div class="form-group">
                      <label class="control-label">Descripción de la organización:</label>
                      <textarea class="form-control" id="txtDescripcionOrg" name="txtDescripcionOrg" rows="4"></textarea>
                    </div>
                  
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="listProductos">Tipo de sorteojjj<span class="required">*</span></label>
                        <select class="form-control " data-live-search="true" name="listSorteos" id="listSorteos" required=""></select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="listStatus">Estado <span class="required">*</span></label>
                        <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                          <option value="1">Activo</option>
                          <option value="2">Inactivo</option>
                        </select>
                      </div>
                    </div> 

                  <div class="row justify-content-center">
                    <div class="form-group col-md-3 ">
                      <button id="btnActionForm" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                    </div>
                    <div class="form-group col-md-3">
                      <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                  </div> 
                </div>
                
              </div>
              
              <div class="tile-footer">
                 <div class="form-group col-md-12">
                     <div id="containerGallery">
                         <span>Agregar foto (440 x 545)</span>
                         <button class="btnAddImageApoyo btn btn-info btn-sm" type="button">
                             <i class="fas fa-plus"></i>
                         </button>
                     </div>
                     <hr>
                     <div id="containerImages">
                        
                     </div>
                 </div>                                
              </div>

            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewApoyo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del apoyo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nombre de la organización:</td>
              <td id="nombre_org"></td>
            </tr>
            <tr>
              <td>RIF:</td>
              <td id="codigo_org"></td>
            </tr>
            <tr>
              <td>Responsable:</td>
              <td id="responsable"></td>
            </tr>
            <tr>
              <td>Cedula:</td>
              <td id="cedula"></td>
            </tr>
            <tr>
              <td>Telefono:</td>
              <td id="telefono"></td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td id="descripcion_org"></td>
            </tr>
            <tr>
              <td>Tipo de sorteo:</td>
              <td id="producto"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="estado">
              </td>
            </tr>
            <tr>
              <td>Fotos de referencia:</td>
              <td id="celFotos">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

