<?php
session_start();
if (isset($_SESSION["s_usuario"])) {
	require('../../controllers/conection/conexion.php');
}else{
	header('Location: ../../index.html');
	    //header("Location: ../index.html");
}
$usua = $_SESSION['s_usuario'];
$sql="SELECT * from Empresas WHERE usuario = '$usua'";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result)){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/perfil.css"/>
		<title>
		    PERFIL
		</title>
		<script src="https://kit.fontawesome.com/57eb4f38bf.js" crossorigin="anonymous"></script>
	</head>
	<body>
	    <div class="caja"> 
		<div>
			<div class="header">
				<div>GRUPO PROMESA<p></p></div>
				<div class="conteiner">
					<nav class="nav-menu">
						<img src="../imagenes/logo.ico"  alt="GRUPO PROMESA" class="nav-menu-logo">
						<ul class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hospopup="true" aria-expanded="false">
								<font color="black">
									<?php echo $usua; ?>
								</font>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
							<center>
								<li>
									<img height="50px" src="../../Logos/<?php echo $mostrar['Logo'];?>"/>
								</li>
							</center>
							<li>
								<a href="calviscliente.php">Perfil</a>	
							</li>
								<li>
								<a href="datosreco.php">Logros</a>	
							</li>
							<li>
								<a href="cal.php">Actividades</a>	
							</li>

							<li>
								<a href="recoleccionClientes.php">Recolecciones</a>	
							</li>

							<li>
								<a href="../../controllers/logout.php">Cerrar sesión</a>	
							</li>	
							</div>
						</ul>
					</nav>
				</div>	
			</div>
				<hr>
			<center>
			    <h2 style="color:white;">
			        PERFIL
			    </h2>
			</center>
			<div class ="container-all">
				<tr class="imagenRedonda">
					<img src="../../Logos/<?php echo $mostrar['Logo'];?>" />
			    </tr>
				    <div class="table">
				        <h1 class="sub-title"><td><?php echo $mostrar['id_empresa'] ?></td> </h1>
						<tr>	
							<p>Nombre del responsable: <td><?php echo $mostrar['Encargado'] ?></td>
							<p>Correo:	<td><?php echo $mostrar['correo'] ?></td></p>
							<p>Número:  <td><?php echo $mostrar['numero'] ?></td> </p>	
							<p>Dirección: <td><?php echo $mostrar['Direccion'] ?></td></p>
							<p>Asesor Promesa: <td><?php echo $mostrar['Asesor'] ?></td></p>
							<p>Programa: <td><?php echo $mostrar['Paquete'] ?></td></p>
							<p>Fecha de inicio del programa: <td><?php echo $mostrar['FechaInicio'] ?></td></p>
						</tr>
					</div>
			</div>
            <?php 
			}
			?>
			</div>
		<hr>
		<div class ="fin">
		 <p align="center"> © Copyright Grupo Promesa. Todos los derechos reservados</p>
		 </div>
	</table>
	<script src="../js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>