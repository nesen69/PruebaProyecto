<!-- Modal -->
<div class="modal fade" id="modalGanadorFinal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header headerRegister">
            <h5 class="modal-title" id="titleModalFinal" id="formUsuario">Nuevo Ganador pero quemado para actualizar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">    
        <div class="col-md-12">
              <div class="tile">
               
                  <div class="tile-body">
                    <form id="formGanador" name="formGanador">
                      <input type="hidden" id="idGanador" name="idGanador" value="">
                      <p class="text-primary"o>Todos los campos son obligatorios.</p>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtIdentificacion">Identificacion</label>
                    <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion"  placeholder="Ingrese la cedula del cliente" >
                  </div>
                  
                </div>


                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtNombre">Nombres</label>
                    <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="txtApellido">Apellidosa</label>
                    <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" >
                  </div>                  
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtTelefono">Telefono</label>
                    <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono"  onkeypress="return controlTag(event);">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="txtEmail">Email</label>
                    <input type="text" class="form-control valid validEmail" id="txtEmail" name="txtEmail" >
                  </div>                  
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtNombre">Premio</label>
                    <input type="text" class="form-control valid validText" id="txtNombrePremio" name="txtNombrePremio"  placeholder="Escriba el nombre del premio">
                  </div> 
                                   
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="listStatus">Estatus</label>
                    <select class="form-control selectpicker" name="listStatus" id="listStatus" >
                      <option value="1">Pendiente por cobrar</option>
                      <option value="2">Pago concretado</option>
                    </select>
                  </div>
                  <div class="tile-footer row justify-content-center">
                    <button id="btnActionForm" class="btn btn-primary" type="submit" onclick="fntGuaradaGanadorFinal();"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                  </div>
                </div>
                <div class="tile-footer">
                 <div class="form-group col-md-12">
                     <div id="containerGallery">
                         <span>Agregar foto (440 x 545)</span>
                         <button class="btnAddImageGanador btn btn-info btn-sm" type="button">
                             <i class="fas fa-plus"></i>
                         </button>
                     </div>
                     <hr>
                     <div id="containerImages"></div>
                     </div>
                 </div>                                
              </div>

                   
                </form>
                  </div>                  
                </div>
          </div>
          </div>
      </div>
    </div>
</div>


<div class="modal fade" id="modalViewGanador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal" id="formUsuario">Datos del Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">    
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nro. de Sorteo</td>
              <td id="nroSorteo">texto_temporal</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre">texto_temporal</td>                  
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellido">texto_temporal</td>                  
            </tr>
            <tr>
              <td>Cedula:</td>
              <td id="celCedula">texto_temporal</td>                  
            </tr>
            <tr>
              <td>Telefono:</td>
              <td id="celTelefono">texto_temporal</td>                  
            </tr>
            <tr>
              <td>Email:</td>
              <td id="celEmail">texto_temporal</td>                 
            </tr>
            <tr>
              <td>Premio:</td>
              <td id="celPremio">texto_temporal</td>                  
            </tr>                 
            <tr>
              <td>Estado:</td>
              <td id="celEstado">texto_temporal</td>                  
            </tr>                                   
            <tr>
              <td>Fotos:</td>
              <td id="celFotos">texto_temporal</td>                 
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


