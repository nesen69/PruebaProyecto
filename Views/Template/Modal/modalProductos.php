<!-- Modal -->
<div class="modal fade" id="modalFormProductos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formProductos" name="formProductos" class="form-horizontal">
              <input type="hidden" id="idProducto" name="idProducto" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="row">
                <div class="col-md-8">

                  <div class="row">
                    <div class="form-group col-md-8">
                      <label class="control-label">Nombre Producto<span class="required">*</span></label>
                      <input class="form-control" id="txtNombre" name="txtNombre" type="text" required="">
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label">Código del producto<span class="required">*</span></label>
                      <input class="form-control" id="txtCodigo" name="txtCodigo" type="text" placeholder="Codigo del sorteo" required="">
                    </div>
                    </div> 
                    <div class="form-group">
                      <label class="control-label">Descripción Producto</label>
                      <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" ></textarea>
                    </div> 
                </div>

                <div class="col-md-4">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label class="control-label">Fecha y hora del sorteo<span class="required">*</span></label>
                      <input class="form-control" id="txtFecha" name="txtFecha" type="text" placeholder="Digite la fecha y hora del sorteo" required="">                    
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label">Precio<span class="required">*</span></label>
                      <input class="form-control" id="txtPrecio" name="txtPrecio" type="text" required=""> <!-- pattern valida que se ingresen solo numeros y comas -->
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label">Stock<span class="required">*</span></label>
                      <input class="form-control" id="txtStock" name="txtStock" type="text" required="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="listCategoria">Categoria<span class="required">*</span></label>
                      <select class="form-control" data-live-search="true" name="listCategoria" id="listCategoria" required=""></select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="listStatus">Estado <span class="required">*</span></label>
                        <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                          <option value="1">Activo</option>
                          <option value="2">Inactivo</option>
                        </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="txtDescripcionCorta">Descripción corta<span class="required">*</span> <small>(Se utilizará al compartir el producto en las redes sociales)</small>   </label>
                      <textarea class="form-control" id="txtDescripcionCorta" name="txtDescripcionCorta" rows="6"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <button id="btnActionForm" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                    </div>
                    <div class="form-group col-md-6">
                      <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                  </div>

                </div>
              </div>
              
              <div class="tile-footer">
                 <div class="form-group col-md-12">
                     <div id="containerGallery">
                         <span>Agregar foto (440 x 545)</span>
                         <button class="btnAddImage btn btn-info btn-sm" type="button">
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
<div class="modal fade" id="modalViewProducto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Código:</td>
              <td id="celCodigo"></td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td id="celPrecio"></td>
            </tr>
            <tr>
              <td>Stock:</td>
              <td id="celStock"></td>
            </tr>
            <tr>
              <td>Categoría:</td>
              <td id="celCategoria"></td>
            </tr>
            <tr>
              <td>Status:</td>
              <td id="celStatus"></td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td id="celDescripcion"></td>
            </tr>
            <tr>
              <td>Descripción corta: <p><small>(Solo para compartir contenido en redes sociales)</small></p> </td>
              <td id="celDescripcionCorta"></td>
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

