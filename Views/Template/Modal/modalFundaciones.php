<!-- Modal -->
<div class="modal fade" id="modalFormFundaciones" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">Nueva Institución</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="tile">
						<div class="tile-body">
							<form id="formFundaciones" name="formFundaciones" class="form-horizontal">
								<input type="hidden" id="idFundacion" name="idFundacion" value="">
								<p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>

								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtNombre">Nombre de la Institución <span class="required">*</span></label>
										<input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
									</div>
									<div class="form-group col-md-6">
										<label for="txtApellido">RIF ó Cedula<span class="required">*</span></label>
										<input type="text" class="form-control" id="txtCodigo" name="txtCodigo" required="">
									</div>
								</div>					

								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="txtTelefono">Premio<span class="required">*</span></label>
										<input type="text" class="form-control " id="txtPremio" name="txtPremio" required="">
									</div>
									<div class="form-group col-md-6">
										<label for="listStatus">Estado <span class="required">*</span></label>
										<select class="form-control" id="listStatus" name="listStatus" required="">
											<option value="1">Pendiente por entregar</option>
											<option value="2">Entregado exitosamente</option>
										</select>
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="txtDireccion">Dirección<span class="required">*</span></label>
										<input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required="">
									</div>						
								</div>
								<div class="form-group">
									<label class="control-label">Los fondos serán utilizados para:</label>
									<textarea class="form-control" id="txtDescripcionF" name="txtDescripcionF" ></textarea>
								</div>

								<div class="tile-footer row justify-content-center">
									<button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
									<button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
								</div>

								<div class="tile-footer">
									<div class="form-group col-md-12">
										<div id="containerGallery">
											<span>Agregar foto (440 x 545)</span>
											<button class="btnAddImageFundacion btn btn-info btn-sm" type="button">
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
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewFundaciones" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header header-primary">
				<h5 class="modal-title" id="titleModal">Datos de la Institución</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>Nombre de la Institución:</td>
							<td id="celNombre">Salvemos</td>
						</tr>
						<tr>
							<td>RIF ó C.I.:</td>
							<td id="celCodigo">12345</td>
						</tr>
						<tr>
							<td>Premio:</td>
							<td id="celPremio">Avion</td>
						</tr>
						<tr>
							<td>Fecha:</td>
							<td id="celFecha">00-00-0000</td>
						</tr>
						<tr>
							<td>Dirección:</td>
							<td id="celDireccion">Larry</td>
						</tr>
						<tr>
							<td>Descripción:</td>
							<td id="celDescripcion">Larry</td>
						</tr>
						<tr>
							<td>Estado:</td>
							<td id="celStatus">Activo</td>
						</tr>
						<tr>
              				<td>Fotos:</td>
              				<td id="celFotos">texto_temporal</td>                 
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

