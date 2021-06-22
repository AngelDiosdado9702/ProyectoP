<?php
require('../../controllers/conection/conexion.php');

    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM recolecciones WHERE id='$id'";
        $res = $mysqli->query($sql);
        $row = $res->fetch_assoc();
    }else{
        $sql = "SELECT * FROM recolecciones ";
        $res = $mysqli->query($sql);
        $row = $res->fetch_assoc();
    }
    
?>
<nav class="outer-container">
	<form action="" method="post" name="newDatoRecoleciones.php?id=<?php echo $row['id'];?>" id="newDatoRecoleciones.php?id=<?php echo $row['id'];?>" >
		<div>
			<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarReco"><i class="far fa-plus-square"></i> Nuevo</a>
		</div>
	</form>
</nav>

<!--Modal agregar dato en reportes-->
<font color="black">
<div class="modal fade" id="agregarReco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" action="../../models/reportes/newDatoAgregarReco.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel" style="text-align: center;">Agregar</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="id_empresa" class="col-sm-3">Empresa*</label>
						<div class="col-sm-5">
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
						<label for="mes"  class="col-sm-3">Fecha*</label>
						<div class="col-sm-5">
							<div class="nav-menu">
								<input type="number" name="dia" id="dia" min="1" max="31" REQUIERED>
								&nbsp;
								<input type="month" name="mes" id="mes" min="2019-01" REQUIRED>
							</div>
						</div>						
					</div>
					<div class="form-group">
						<label for="folio"  class="col-sm-3">Folio*</label>
						<div class="col-sm-5">
							<input type="text" name="folio" id="folio" placeholder="D 000"  REQUIRED>
						</div>						
					</div>
					<div class="form-group">
						<label for="equipo"  class="col-sm-3">Equipo*</label>
						<div class="col-sm-5">
							<input type="text" name="equipo" id="equipo"  REQUIRED>
						</div>						
					</div>
					<div class="form-group">
						<label for="responsable"  class="col-sm-3">Responsable(s)* </label>
						<div class="col-sm-5">
							<input type="text" name="responsable" id="responsable" placeholder="nombre"  REQUIRED>
						</div>						
					</div>
					<div class="form-group">
						<label for="PEt"  class="col-sm-3">PET</label>
						<div class="col-sm-5">
							<input type="text" name="pet" id="pet" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="hdpet"  class="col-sm-3">HDPE</label>
						<div class="col-sm-5">
							<input type="text" name="hdpet" id="hdpet" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="arch_blanco"  class="col-sm-3">Archivo blanco</label>
						<div class="col-sm-5">
							<input type="text" name="arch_blanco" id="arch_blanco" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="arch_mixto"  class="col-sm-3">Archivo Mixto</label>
						<div class="col-sm-5">
							<input type="text" name="arch_mixto" id="arch_mixto" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="periodico" class="col-sm-3">Periódico</label>
						<div class="col-sm-5">
							<input type="text" name="periodico" id="periodico" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="carton"  class="col-sm-3">Cartón</label>
						<div class="col-sm-5">
							<input type="text" name="carton" id="carton" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="aluminio"  class="col-sm-3">Aluminio</label>
						<div class="col-sm-5">
							<input type="text" name="aluminio" id="aluminio" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="metales"  class="col-sm-3">Metales</label>
						<div class="col-sm-5">
							<input type="text" name="metales" id="metales" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="env_multi"  class="col-sm-3">Envase multicapa</label>
						<div class="col-sm-5">
							<input type="text" name="env_multi" id="env_multi" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="vaso_enc"  class="col-sm-3">Vaso encerado</label>
						<div class="col-sm-5">
							<input type="text" name="vaso_enc" id="vaso_enc" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="tapas"  class="col-sm-3">Tapas</label>
						<div class="col-sm-5">
							<input type="text" name="tapas" id="tapas" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="electronicos" class="col-sm-3">Electrónicos</label>
						<div class="col-sm-5">
							<input type="text" name="electronicos" id="electronicos" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="vidrio"  class="col-sm-3">Vidrio</label>
						<div class="col-sm-5">
							<input type="text" name="vidrio" id="vidrio" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="playo" class="col-sm-3">Playo</label>
						<div class="col-sm-5">
							<input type="text" name="playo" id="playo" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="cascaron" class="col-sm-3">Cascarón</label>
						<div class="col-sm-5">
							<input type="text" name="cascaron" id="cascaron" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="otro" class="col-sm-3">Otro</label>
						<div class="col-sm-5">
							<input type="text" name="otro" id="otro" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="total" class="col-sm-3">Total</label>
						<div class="col-sm-5">
							<input type="text" name="total" id="total" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="arbol_salv" class="col-sm-3">Àrboles Salvados</label>
						<div class="col-sm-5">
							<input type="text" name="arbol_salv" id="arbol_salv" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="persOxiSalvado" class="col-sm-3">Personas Salvados Oxigeno</label>
						<div class="col-sm-5">
							<input type="text" name="persOxiSalvado" id="persOxiSalvado" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="ahorro_agua" class="col-sm-3">Ahorro de agua</label>
						<div class="col-sm-5">
							<input type="text" name="ahorro_agua" id="ahorro_agua" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="ahorro_energia" class="col-sm-3">Ahorro de energia</label>
						<div class="col-sm-5">
							<input type="text" name="ahorro_energia" id="ahorro_energia" placeholder="0.000" value="0">
						</div>						
					</div>
					<div class="form-group">
						<label for="co2"  class="col-sm-3">CO2</label>
						<div class="col-sm-5">
							<input type="text" name="co2" id="co2" placeholder="0.000" value="0">
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