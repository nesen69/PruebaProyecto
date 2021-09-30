<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalFormPerfil" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header headerUpdate">
        		<h5 class="modal-title" id="titleModal" id="formUsuario">Actualizar Datos</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">		
				<div class="col-md-12">
			        <div class="tile">
			            <div class="tile-body">
				            <form id="formPerfil" name="formPerfil">
				            	<p class="text-primary">Los campos con asterisco [<span class="required">*</span>] son obligatorios</p>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtIdentificacion">Identificación <span class="required">*</span> </label>
										<input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" value="<?= $_SESSION['userData']['identificacion']; ?>" required="">
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtNombre">Nombres<span class="required">*</span></label>
										<input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?= $_SESSION['userData']['nombres']; ?>" required="">
									</div>
									<div class="form-group col-md-6">
										<label for="txtApellido">Apellidos<span class="required">*</span></label>
										<input type="text" class="form-control" id="txtApellido" name="txtApellido" value="<?= $_SESSION['userData']['apellidos']; ?>" required="">
									</div>									
								</div>

								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtTelefono">Teléfono<span class="required">*</span></label>
										<input type="text" class="form-control" id="txtTelefono" name="txtTelefono" value="<?= $_SESSION['userData']['telefono']; ?>" required="">
									</div>
									<div class="form-group col-md-6">
										<label for="txtEmail">Email</label>
										<input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?= $_SESSION['userData']['email_user']; ?>" required="" readonly disabled>
									</div>									
								</div>	

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="txtDireccion">Dirección <span class="required">*</span> </label>
										<input type="text" class="form-control" id="txtDireccion" name="txtDireccion" value="<?= $_SESSION['userData']['direccion']; ?>" required="">
									</div>
								</div>						

								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtPassword">Password</label>
										<input type="password" class="form-control" id="txtPassword" name="txtPassword">
									</div>
									<div class="form-group col-md-6">
										<label for="txtPasswordConfirm">Confirmar Password</label>
										<input type="password" class="form-control" id="txtPasswordConfirm" name="txtPasswordConfirm">
									</div>
								</div>

					         	<div class="tile-footer row justify-content-center">
					     			<button id="btnActionForm" class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Actualizar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
					   	 		</div>
				     		</form>
			            </div>			            
			          </div>
			    </div>
      		</div>
    	</div>
  	</div>
</div>
