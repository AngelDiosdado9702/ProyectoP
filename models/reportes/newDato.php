<?php
require('../../controllers/conection/conexion.php');
?>
<nav class="outer-container">
	<form action="" method="post" name="newDato" id="newDato" enctype="multipart/form-data">
		<div>
			<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregar"><i class="far fa-plus-square"></i> Nuevo</a>
		</div>
	</form>
</nav>

<!--Modal agregar dato en reportes-->
<font color="black">
	<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form class="form-horizontal" method="POST" action="../../../models/reportes/newDatoAgregar.php">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel" style="text-align: center;">Agregar</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="id_empresa" class="col-sm-2">Empresa*</label>
							<div class="col-sm-10">
								<select name="id_empresa" id="id_empresa" REQUIRED>
									<option value="">Selecione:</option>
									<?php
									$empresa = mysqli_query($mysqli,"SELECT distinct id_empresa FROM usuarios WHERE tipo='Usuario'");
									while($empre = mysqli_fetch_array($empresa)){
										?>
										<option value="<?php echo $empre['id_empresa']?>">
											<?php echo $empre['id_empresa']?>
										</option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="mes"  class="col-sm-2">Mes*</label>
							<div class="col-sm-10">
								<input type="month" name="mes" id="mes" min="2019-01" REQUIRED>
							</div>						
						</div>
						<div class="form-group">
							<label for="PEt"  class="col-sm-2">PET</label>
							<div class="col-sm-10">
								<input type="text" name="pet" id="pet" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="hdpet"  class="col-sm-2">HDPE</label>
							<div class="col-sm-5">
								<input type="text" name="hdpet" id="hdpet" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="arch_blanco"  class="col-sm-2">Archivo blanco</label>
							<div class="col-sm-10">
								<input type="text" name="arch_blanco" id="arch_blanco" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="arch_mixto"  class="col-sm-2">Archivo mixto</label>
							<div class="col-sm-10">
								<input type="text" name="arch_mixto" id="arch_mixto" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="periodico" class="col-sm-2">Periódico</label>
							<div class="col-sm-10">
								<input type="text" name="periodico" id="periodico" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="carton"  class="col-sm-2">Cartón</label>
							<div class="col-sm-10">
								<input type="text" name="carton" id="carton" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="aluminio"  class="col-sm-2">Aluminio</label>
							<div class="col-sm-10">
								<input type="text" name="aluminio" id="aluminio" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="metales"  class="col-sm-2">Metales</label>
							<div class="col-sm-10">
								<input type="text" name="metales" id="metales" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="env_multi"  class="col-sm-2">Envase multicapa</label>
							<div class="col-sm-10">
								<input type="text" name="env_multi" id="env_multi" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="vaso_enc"  class="col-sm-2">Vaso encerado</label>
							<div class="col-sm-10">
								<input type="text" name="vaso_enc" id="vaso_enc" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="tapas"  class="col-sm-2">Tapas</label>
							<div class="col-sm-10">
								<input type="text" name="tapas" id="tapas" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="electronicos" class="col-sm-2">Electrónicos</label>
							<div class="col-sm-10">
								<input type="text" name="electronicos" id="electronicos" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="vidrio"  class="col-sm-2">Vidrio</label>
							<div class="col-sm-10">
								<input type="text" name="vidrio" id="vidrio" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="co2"  class="col-sm-2">Playo</label>
							<div class="col-sm-10">
								<input type="text" name="playo" id="playo" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="arbol_salv" class="col-sm-2">Àrboles salvados</label>
							<div class="col-sm-10">
								<input type="text" name="arbol_salv" id="arbol_salv" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="ahorro_agua" class="col-sm-2">Ahorro de agua</label>
							<div class="col-sm-10">
								<input type="text" name="ahorro_agua" id="ahorro_agua" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="ahorro_energia" class="col-sm-2">Ahorro de energia</label>
							<div class="col-sm-10">
								<input type="text" name="ahorro_energia" id="ahorro_energia" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="co2"  class="col-sm-2">CO2</label>
							<div class="col-sm-10">
								<input type="text" name="co2" id="co2" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="form-group">
							<label for="total" class="col-sm-2">Total</label>
							<div class="col-sm-10">
								<input type="text" name="total" id="total" placeholder="0.000" value="0">
							</div>						
						</div>
						<div class="modal-footer">
							<input type="reset" class="btn btn-info">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</font>