<?php
require('../../controllers/conection/conexion.php');
?>
<nav class="outer-container">
	<form action="" method="post" name="newReporte" id="newReporte" enctype="multipart/form-data">
		<div>
			<a type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarReporte"><i class="far fa-file-image">&nbsp;</i>Generar Reporte</a>
		</div>
	</form>
</nav>
<font color="black">
<div class="modal fade" id="agregarReporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" action="../../models/reportes/newAgregarReporte.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel" style="text-align: center;">Generar</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="id_empresa" class="col-sm-2">Empresa*</label>
						<div class="col-sm-10">
							<select name="id_empresa" id="id_empresa" REQUIRED>
							<option value="">Selecione:</option>
							<?php
							$empresa = mysqli_query($mysqli,"SELECT distinct id_empresa FROM recolecciones");
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
							<select name="mes" id="mes" REQUIRED>
							<option value="">Selecione:</option>
							<?php
							$emp = mysqli_query($mysqli,"SELECT distinct mes FROM recolecciones");
							while($em = mysqli_fetch_array($emp)){
								?>
								<option value="<?php echo $em['mes']?>">
									<?php echo $em['mes']?>
								</option>
								<?php
							}
							?>
							</select>
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