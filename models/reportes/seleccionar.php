<?php
session_start();
if (isset($_SESSION["s_usuario"])) {
	$usua = $_SESSION['s_usuario'];
}else{
	header('Location: ../../index.html');
	    //header("Location: ../index.html");
}
include '../../controllers/conection/conexion.php';
$guardada = $_FILES['imagen']['name'];
$ima = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$guardado = $_FILES['imagen']['tmp_name'];
$nombrearchivo = $_FILES['imagen']['name'];
move_uploaded_file($guardado, 'imagenes/'.$nombrearchivo);
	$codigo = $_POST['codigo'];
	$query = "SELECT * FROM tbl_reporte WHERE id = '$codigo'";
	$result = mysqli_query($mysqli,$query);
	$fondo = "imagenes/".$guardada;
	while ($mostrar = mysqli_fetch_array($result)){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Reporte Imagen</title>
		<link href="../../views/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../views/css/reportes/reporte.css">
	</head>
	<body>
		<img height="700px" src="<?php echo "$fondo"?>"/>
		<div class="textencima">
			<table class="primerlinea">
				<tr>
					<td ><?php  echo $mostrar['pet']?></td>
					<td class="HDPE"><?php  echo $mostrar['hdpe']?></td>
					<td class="archviBlanco" ><?php  echo $mostrar['arch_blanc']?></td>
					<td class="archivoMixto" ><?php  echo $mostrar['arch_mixt']?></td>
					<td class="periodico" ><?php  echo $mostrar['periodico']?></td>
					<td class="carton"><?php  echo $mostrar['carton']?></td>
					<td class="aluminio"><?php  echo $mostrar['aluminio']?></td>
					<td class="metales" ><?php  echo $mostrar['metales']?></td>
					<td class="envacesMulti"><?php  echo $mostrar['playo']?></td>
					<td class="electronicos"><?php  echo $mostrar['vaso_enc']?></td>		
				</tr>
			</table>
			<table class="contuayuda">
				<tr>
					<td><?php  echo $mostrar['ahorro_energia']?></td>
					<td class="derechaarriba"><?php  echo $mostrar['arbol_salv']?></td>
				</tr>
				<tr>
					<td class="seg"><?php  echo $mostrar['ahorro_agua']?></td>
					<td class="derechaabajo"><?php  echo $mostrar['co2']?></td>
					<td class="totalAll"><font color="black"><?php  echo $mostrar['total']?></font></td>
				</tr>
			</table>
			<table class="recibimosmateriales" >
				<tr>
					<td class="reciseg2"><?php  echo $mostrar['vidrio']?></td>
				</tr>
				<tr>
					<td class="reciseg"><?php  echo $mostrar['env_multi']?></td>
					<td class="reciseg3"><?php  echo $mostrar['tapas']?></td>
				</tr>
			</table>
			<?php
				$id_empresa = $mostrar['id_empresa'];
				$sql ="SELECT Logo FROM Empresas WHERE id_empresa='$id_empresa'";
				$query1 = mysqli_query($mysqli,$sql);
				while($row = mysqli_fetch_array($query1)){
			?>
					<td>
					<img  loading="lazy" src="../../Logos/<?php echo $row['Logo']?>" class="img-logo"/>
					</td>
			<?php
				}
			?>
		</div>
</div>
<div class="nav-menu">
	<div class="inforeporte">
		<div class="dropdown">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hospopup="true" aria-expanded="false">
				<font color="black">
					<?php echo $usua; ?>
				</font>
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<li>
					<a href="../../views/admin/calvisusua.php">Calendario</a>
				</li>
				<li>
					<a href="../../views/admin/General.php">General</a>  
				</li>
				<li>
					<a href="../../views/admin/reportes/excelRep.php">Reportes</a>
				</li>
				<li>
					<a href="../../views/admin/recolecciones.php">Recolecciones</a>
				</li>
				<li>
					<a href="../../views/admin/planAnl.php">Planeación Anual</a>  
				</li>
				<li>
					<a href="../../controllers/logout.php">Cerrar sesión</a>  
				</li>
			</div>
		</div>
	</div>
	<ul>
		<li>
			<p>Empresa: <?php  echo $mostrar['id_empresa']?></p>
			<p>Mes: <?php  echo $mostrar['mes']?></p>
		</li>
	</ul>
</div>
<?php
}
?>
<script src="../../views/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../../views/js/bootstrap.min.js"></script>
</body>
</html>