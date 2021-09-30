<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal" id="formUsuario">Nuevo Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">		
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
							<form id="formUsuario" name="formUsuario">
								<input type="hidden" id="idUsuario" name="idUsuario" value="">
								<p class="text-primary"o>Todos los campos son obligatorios.</p>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtIdentificacion">Cédula</label>
										<input type="text" class="form-control " id="txtIdentificacion" name="txtIdentificacion" required="" >
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtNombre">Nombres</label>
										<input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
									</div>
									<div class="form-group col-md-6">
										<label for="txtApellido">Apellidos</label>
										<input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="">
									</div>									
								</div>

								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtTelefono">Teléfono</label>
										<input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
									</div>
									<div class="form-group col-md-6">
										<label for="txtEmail">Email</label>
										<input type="text" class="form-control valid validEmail" id="txtEmail" name="txtEmail" required="">
									</div>									
								</div>

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="txtDireccion">Dirección</label>
										<input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required="">
									</div>									
								</div>

								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="listRolid">Tipo usuario</label>
										<select class="form-control" data-live-search="true" id="listRolid" name="listRolid" ></select>
									</div>
									<div class="form-group col-md-6">
										<label for="listStatus">Estatus</label>
										<select class="form-control selectpicker" name="listStatus" id="listStatus" required="">
											<option value="1">Activo</option>
											<option value="2">Inactivo</option>
										</select>
									</div>									
								</div>							

								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtPassword">Password</label>
										<input type="password" class="form-control" id="txtPassword" name="txtPassword">
									</div>
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


<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog">
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
							<td>Cédula</td>
							<td id="celIdentificacion">texto_temporal</td>
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
							<td>Teléfono:</td>
							<td id="celTelefono">texto_temporal</td>      						
						</tr>
						<tr>
							<td>Email (Usuario):</td>
							<td id="celEmail">texto_temporal</td>      						
						</tr>
						<tr>
							<td>Dirección :</td>
							<td id="celDireccion">texto_temporal</td>      						
						</tr>
						<tr>
							<td>Tipo usuario:</td>
							<td id="celTipoUsuario">texto_temporal</td>
						</tr>      						
						<tr>
							<td>Estado:</td>
							<td id="celEstado">texto_temporal</td>      						
						</tr>      					     								
						<tr>
							<td>Fecha registro:</td>
							<td id="celFechaRegistro">texto_temporal</td>      						
						</tr>     					
					</tbody>      				
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>


