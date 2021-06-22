<?php
session_start();
if (isset($_SESSION["s_usuario"])) {
	include '../../controllers/conection/conexion.php';
}else{
	header('Location: ../../index.html');
	    //header("Location: ../index.html");
}
if(isset($_POST['empresas'])) {
	$id_empresa=$_POST['empresas'];
	if ($id_empresa == "") {
		$events = mysqli_query($mysqli,"SELECT * FROM events");
		$result =mysqli_query($mysqli,"SELECT * FROM tabla_archivos");
	}else{
		$events = mysqli_query($mysqli,"SELECT * FROM events WHERE id_empresa = '$id_empresa'");
		$result =mysqli_query($mysqli,"SELECT * FROM tabla_archivos  WHERE id_empresa = '$id_empresa'");
	}
}else{
	$events = mysqli_query($mysqli,"SELECT * FROM events");
	$result =mysqli_query($mysqli,"SELECT * FROM tabla_archivos");
}
$usua = $_SESSION['s_usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- FullCalendar -->
	<link href='../css/fullcalendar.css' rel='stylesheet' />
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
	<!-- Latest compiled and minified JavaScript -->
	<!--font roboto-->
	<script src="https://kit.fontawesome.com/57eb4f38bf.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	
</head>
<body>
	<div class="caja"> 
		<div>
			<div class="header">
				<div>GRUPO PROMESA<p></p></div>
				<div class="conteiner">
					<nav class="nav-menu">
						<img src="../imagenes/logo.ico" alt="GRUPO PROMESA" class="nav-menu-logo">
						<ul class="nav-menu">
							<ul class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-hospopup="true" aria-expanded="false"><font color="black">
									<?php echo $usua; ?></font>
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="navegador">
								</div>
							</ul>
						</ul>
					</nav>
				</div>	
			</div>		
		</div>
		<br>
		<hr>
		<center>
            <h2>CALENDARIO</h2>
             <br><br>
        </center>
		<div class="selectorcliente">	<!--parte del selec de id de la empresa-->
			<form  method="POST"  name="frm" action="calvisusua.php">
				<ul class="nav-menu">
					<div >
						<label color="white">Seleccione la empresa deseada</label>
					</div>
					<div class="col-sm-10">
						<font color="black">
							<select name="empresas">
								<option value="">Seleccione:</option>
								<?php
								$empresa = mysqli_query($mysqli,"SELECT distinct id_empresa FROM usuarios WHERE tipo='Usuario' ");
								while($empre = mysqli_fetch_array($empresa)){
									?>
									<option value="<?php echo $empre['id_empresa']?>">
										<?php echo $empre['id_empresa']?>
									</option>
									<?php
								}
								?>
							</select>
							<button type="submit">Buscar</button>
						</font>
					</div>
				</ul>
			</form>
		</div>
		<div class="container">
			<div id="calendar" class="col-md-12">
			</div>
			<!-- /.row -->
			<!-- Modal agregar evento -->
			<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" method="POST" action="../../models/CalenEvents/addEvent.php" enctype="multipart/form-data">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel" ><font color="black">Agregar Evento</font></h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="id_empresa" class="col-sm-2 control-label"><font color="black">Empresa</font></label>
									<div class="col-sm-10">
										<input type="text" name="id_empresa" class="form-control" id="id_empresa" placeholder="Nombre empresa">
									</div>
								</div>
								<div class="form-group">
									<label for="title" class="col-sm-2 control-label"><font color="black">Evento</font></label>
									<div class="col-sm-10">
										<input type="text" name="title" class="form-control" id="title" placeholder="Evento">
									</div>
								</div>
								<div class="form-group">
									<label for="color" class="col-sm-2 control-label"><font color="black">Color</font></label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Seleccionar</option>
											<option style="color:#0071c5;" value="#0071c5">&#9724; Azul</option>
											<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
											<option style="color:#008000;" value="#008000">&#9724; Verde</option>			
											<option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
											<option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
											<option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
											<option style="color:#FCFBFA;" value="#FCFBFA">&#9724;Blanco</option>
											<option style="color:#FF00FF;" value="#FF00FF">&#9724;Fiusia</option>
											<option style="color:#EE82EE;" value="#EE82EE">&#9724;Violeta</option>
											<option style="color:#0000FF;" value="#0000FF">&#9724;Azul oscuro</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="start" class="col-sm-2 control-label"><font color="black">Fecha Inicial</font></label>
									<div class="col-sm-10">
										<input type="text" name="start" class="form-control" id="start">
									</div>
								</div>
								<div class="form-group">
									<label for="end" class="col-sm-2 control-label"><font color="black">Fecha Final</font></label>
									<div class="col-sm-10">
										<input type="text" name="end" class="form-control" id="end">
									</div>
								</div>
								<div class="form-group">
									<label for="objetivo" class="col-sm-2 control-label"><font color="black">Objetivo</font></label>
									<div class="col-sm-10">
										<input type="text" name="objetivo" class="form-control" id="objetivo">
									</div>
								</div>
								<div class="form-group">
									<label for="perso" class="col-sm-2 control-label"><font color="black">Personas alcanzadas</font></label>
									<div class="col-sm-10">
										<input type="text" name="pers" class="form-control" id="pers">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Modal editar eventp-->
			<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form class="form-horizontal" method="POST" action="../../models/CalenEvents/editEventTitle.php">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel"><font color="black">Modificar Evento</font></h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="title" class="col-sm-2 control-label"><font color="black">Titulo</font></label>
									<div class="col-sm-10">
										<input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
									</div>
								</div>
								<div class="form-group">
									<label for="id_empresa" class="col-sm-2 control-label"><font color="black">Empresa</font></label>
									<div class="col-sm-10">
										<input type="text" name="id_empresa" class="form-control" id="id_empresa" placeholder="Empresa">
									</div>
								</div>
								<div class="form-group">
									<label for="color" class="col-sm-2 control-label"><font color="black">Color</font></label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Seleccionar</option>
											<option style="color:#0071c5;" value="#0071c5">&#9724; Azul</option>
											<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
											<option style="color:#008000;" value="#008000">&#9724; Verde</option>			
											<option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
											<option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
											<option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
											<option style=color="black"; value="#FCFBFA">&#9724;Blanco</option>
											<option style="color:#FF00FF;" value="#FF00FF">&#9724;Fiusia</option>
											<option style="color:#EE82EE;" value="#EE82EE">&#9724;Violeta</option>
											<option style="color:#0000FF;" value="#0000FF">&#9724;Azul oscuro</option>
										</select>
									</div>
								</div>
								<div class="form-group"> 
									<div class="col-sm-offset-2 col-sm-10">
										<div class="checkbox">
											<label class="text-danger"><input type="checkbox"  name="delete"> Eliminar Evento</label>
										</div>
									</div>
								</div>  
								<input type="hidden" name="id" class="form-control" id="id">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
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
		</div>
		<!-- /.container -->
		<!-- jQuery Version 1.11.1 -->
		<script src='../js/jquery.js'></script>
		<!-- Bootstrap Core JavaScript -->
		<script src='../js/bootstrap.min.js'></script>
		<!-- FullCalendar -->
		<script src='../js/moment.min.js'></script>
		<script src='../js/fullcalendar/fullcalendar.min.js'></script>
		<script src='../js/fullcalendar/fullcalendar.js'></script>
		<script src='../js/fullcalendar/locale/es.js'></script>
		<script>

			$(document).ready(function() {
				$('#navegador').load('navegador.php');
				var date = new Date();
				var yyyy = date.getFullYear().toString();
				var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
				var dd  = (date.getDate()).toString().length == 0 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

				$('#calendar').fullCalendar({
					header: {
						language: 'es',
						left: 'prev,next, prevYear,nextYear today',
						center: 'title',
						right: 'month,basicWeek,basicDay,listYear',
					},
					defaultDate: yyyy+"-"+mm+"-"+dd,
					editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #id_empresa').val(event.id_empresa);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},/*
			eventRender: function(event, element) {
				element.bind('', function() {
					$('#ModalMostrar #title').html(event.title);
					$('#ModalMostrar #inicio').html(event.start);
					$('#objetivoEvento').html(event.objetivo);
					$('#personaEvento').html(event.personas);
					$('#ModalMostrar').modal('show');
				});
			},*/
			eventDrop: function(event, delta, revertFunc) { // si changement de position
				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
				edit(event);
			},
			events: [
			<?php
			foreach($events as $event): 
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
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
				},
			<?php endforeach; ?>
			]
		});
				function edit(event){
					start = event.start.format('YYYY-MM-DD HH:mm:ss');
					if(event.end){
						end = event.end.format('YYYY-MM-DD HH:mm:ss');
					}else{
						end = start;
					}
					id =  event.id;
					Event = [];
					Event[0] = id;
					Event[1] = start;
					Event[2] = end;
					$.ajax({
						url: 'editEventDate.php',
						type: "POST",
						data: {Event:Event},
						success: function(rep) {
							if(rep == 'OK'){
								alert('Evento se ha guardado correctamente');
							}else{
								alert('No se pudo guardar. Inténtalo de nuevo.'); 
							}
						}
					});
				}
			});
		</script>
		<font color="black">
			<div class="container">
				<div class="row">
					<font color="white"><h4>Agregar nueva descarga </h4></font>
					<hr style="margin-top:5px;margin-bottom: 5px;">
					<div class="content"> </div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Cargar Archivos</h3>
						</div>
						<div class="panel-body">
							<div class="col-lg-6">
								<form method="POST" action="../../models/CalenEvents/cargarFicheros.php" enctype="multipart/form-data">
									<div class="form-group">
										<label for="fechaArchivo">Seleccione: </label>
										<select name ="fechaArchivo" id="fechaArchivo">
											<option value="">Empresa y Fecha</option>			
											<?php
											$fechaArch = mysqli_query($mysqli,"SELECT id_empresa,start,title FROM events");
											while ($fech = mysqli_fetch_array($fechaArch)) {
												?>
												<option value="<?php echo $fech['start']."//".$fech['id_empresa']
												."//".$fech['title']
												?>">
													<?php echo $fech['id_empresa']." // ".$fech['start']?>
												</option>
												<?php
											}
											?>											
										</select>
									</div>
									<div class="form-group">
										<label class="btn btn-primary" for="my-file-selector">
											<input required="" type="file" name="file" id="exampleInputFile">
										</label>
									</div>
									<button class="btn btn-primary" type="submit">Cargar Archivo</button>
								</form>
							</div>
							<div class="col-lg-6"> </div>
						</div>
					</div>
					<!--tabla-->
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Archivos Disponibles</h3>
						</div>
						<div class="panel-body">
							<table class="table">
								<thead >
									<tr class="table1">
										<th width="20%">Empresa</th>
										<th width="30%">Nombre del archivo</th>
										<th width="30%">Fecha y Hora</th>
										<th width="10%">Descargar</th>
										<th width="10%">Eliminar</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (mysqli_num_rows($result) > 0)
									{
										while ($row = mysqli_fetch_array($result)) {
											$nombreArc = $row['archivo'];
											$CODIFICACION=mb_detect_encoding($nombreArc,"UTF-8,ISO-8859-1");
											$nombreArc = iconv($CODIFICACION, 'UTF-8', $nombreArc)
											?>
											<tr class="table1">
												<td><?php echo $row['id_empresa'];?></td>
												<td><?php echo $nombreArc?></td>
												<td><?php echo $row['start'] ?></td>
												<td><a title="Descargar Archivo" href="../../Archivos/<?php echo $nombreArc;?>" download="<?php echo $nombreArc; ?>" style="color: black; font-size:18px;"> <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> </a></td>
												<td><a title="Eliminar Archivo" href="../../models/CalenEvents/Eliminar.php?name=<?php echo $row['id']."//".$nombreArc; ?>" style="color: black; font-size:18px;" onclick="return confirm('Esta seguro de eliminar el archivo?');"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a></td>
											</tr>
										</font>
									<?php }}?> 
								</tbody>
							</table>
						</div>
					</div>
					<!-- Fin tabla--> 
				</div>
			</div>
		</body>
	</font>
	<hr>
</html>