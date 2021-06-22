<?php
session_start();
if (isset($_SESSION["s_usuario"])) {
	include '../../controllers/conection/conexion.php';
}else{
	header('Location: ../../index.html');
	    //header("Location: ../index.html");
}
$usua = $_SESSION['s_usuario'];
$id_empresa = $_SESSION["id_empresa"];
$events = mysqli_query($mysqli,"SELECT * FROM events WHERE id_empresa = '$id_empresa'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calendario</title>
	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- FullCalendar -->
	<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
	<link href='../css/fullcalendar.css' rel='stylesheet' />
	<!-- Custom CSS -->
	<!--font roboto-->
	<script src="https://kit.fontawesome.com/57eb4f38bf.js" crossorigin="anonymous"></script>
</head>
<body>
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
							<?php
							$sql="SELECT id_empresa, imagen from usuarios WHERE usuario = '$usua'";
							$result=mysqli_query($mysqli,$sql);
							while($mostrar=mysqli_fetch_array($result)){
								?>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<center>
										<li>
											<img height="50px" src="../../Logos/<?php echo $mostrar['imagen'];?>"/>
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
								<?php
							}
							?>
						</ul>
					</nav>
			</div>	
			<hr>		
		</div>
	</div>
	<div class="container">
	    <h2>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;ACTIVIDADES
        </h2>
		<div>
			<div id="calendar" class="col-md-12">
			</div>
		</div>
		<!-- Modal mostrar evento-->
		<div class="modal fade" id="ModalMostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 id="title" style="text-align: center;"></h2>
					</div>
					<font size="3">
						<div class="modal-body">
							<div>Fecha y hora: <p id="eventStart"></p></div>
							<div>OBJETIVO: <p id="objetivoEvento"></p></div>
							<div>Personas Alcanzadas: <p id="personaEvento"></p></div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						</div>
					</font>
				</div>
			</div>
		</div>
		<!-- /.row -->
		<hr>
	</div>
	<div>
		<font color="black">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Descargas Disponibles</h3>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
							    <th width="30%">Actividad</th>
								<th width="30%">Nombre del Archivo</th>
								<th width="25%">Fecha y hora</th>
                                <th width="15%">Evidencia fotografica</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = mysqli_query($mysqli,"SELECT id, id_empresa, archivo, start, title, ev_foto FROM tabla_archivos WHERE id_empresa = '$id_empresa' ");
							if (mysqli_num_rows($result) > 0)
							{
								while ($row = mysqli_fetch_array($result)) {
									?>
									<tr>
									    <td><?php echo $row ['title'];?></td>
										<td><?php echo $row['archivo'];?> <a title="Descargar Archivo" href="../../Archivos/<?php echo $row['archivo'];?>" download="<?php echo $row['archivo']; ?>" style="color: black; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a></td>
										<td><?php echo $row['start'];?> </td>
										<td><?php echo $row['ev_foto'];?><a title="Descargar Archivo" href="../../Archivos/archivosPlanea/<?php echo $row['ev_foto'];?>" download="<?php echo $row['ev_foto']; ?>" style="color: black; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a></td>
									</tr>
								</font>
							<?php }}?> 
						</tbody>
					</table>
				</div>
			</div>
		</font>
	</div>
	<!-- /.container -->
	<!-- jQuery Version 1.11.1 -->
	<script src="../js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- FullCalendar -->
	<script src='../js/moment.min.js'></script>
	<script src='../js/fullcalendar/fullcalendar.min.js'></script>
	<script src='../js/fullcalendar/fullcalendar.js'></script>
	<script src='../js/fullcalendar/locale/es.js'></script>
	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				header: {
					language: 'es',
					left: 'prev,next today',
					center: 'title',
					right: 'month,basicWeek,basicDay,listYear',
				},
				eventLimit: true,
				eventRender: function(event, element,date,view,jsEvent) {
					element.bind('click', function() {
						$('#ModalMostrar #title').html(event.title);
						$('#ModalMostrar #start').html(event.start);
						$('#eventStart').html(event.fecha);
						$('#objetivoEvento').html(event.objetivo);
						$('#personaEvento').html(event.personas);
						$('#ModalMostrar').modal('show');
					});
				},
				events: [
				<?php
				foreach($events as $event): 
					$start = explode(" ", $event['start']);
					$end = explode(" ", $event['end']);
					if($start[1] == '12:00:00'){
						$start = $start[0];
					}else{
						$start = $event['start'];
					}
					if($end[1] == '13:00:00'){
						$end = $end[0];
					}else{
						$end = $event['end'];
					}
					?>
					{
						id: '<?php echo $event['id']; ?>',
						id_empresa: '<?php echo $event['id_empresa'];?>',
						title: '<?php echo $event['title']; ?>',
						start: '<?php echo $start; ?>',
						end: '<?php echo $end; ?>',
						color: '<?php echo $event['color']; ?>',
						objetivo: '<?php echo $event['objetivo']?>',
						personas: '<?php echo $event['personas']?>',
						fecha:'<?php echo $start; ?>',
					},
				<?php endforeach; ?>
				]
			});
		});
	</script>
	<hr>
	<footer><font size="2">
		CONTÁCTANOS
		<div class="footer-nav">
			<p>Empresa Promesa: g.aguilar@grupopromesa.mx</p>
			<p>General: contacto@grupopromesa.mx</p>
			<i class="fab fa-whatsapp"> 52(55)21734204</i> 
		</div>
		<a href="https://www.facebook.com/escuelapromesa"><i class="fab fa-facebook"></i></a>
		<a href="https://www.instagram.com/grupopromesa/"><i class="fab fa-instagram"></i></a>
		<a href="https://www.youtube.com/channel/UCcsICzbcPfIoohpsHWqyydg"><i class="fab fa-youtube"></i></a>
		<a href="https://www.tiktok.com/@grupopromesa"><i class="fab fa-tiktok"></i></a>
		<hr>
		<div class="footer-copy">
			© Copyright Grupo Promesa. Todos los derechos reservados
		</div></font>
	</footer>
</body>
</html>