<?php 
	session_start();
	require_once ("../../controllers/conection/conexion.php");
 ?>
<div class="row">
 <center>
            <h2>PLANEACIÓN ANUAL DE ACTIVIDADES</h2>
             <br><br>
        </center>
		<table class="table table-hover table-condensed table-bordered">
		<caption>
		</caption>
			<tr>
			    <td style="background-color: #258294;">Id empresa</td>
				<td style="background-color: #258294;">Empresa</td>
				<td style="background-color: #258294;">Fecha/Hora</td>
				<td style="background-color: #258294;">Actividad</td>
			    <td style="background-color: #258294;">Status</td>
				<td style="background-color: #258294;">Documentos</td>
				<td style="background-color: #258294;">Evidencia fotográfica </td>
				<td style="background-color: #258294;">Eliminar</td>
			</tr>
			<?php 
			 $query = "SELECT id,id_empresa,start,title,elaborado,archivo,ev_foto FROM tabla_archivos ORDER BY id ASC";
        $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $datos=$row[0]."||".
                $row[1]."||".
                $row[2]."||".
                $row[3]."||".
                $row[4]."||".
                $row[5]."||".
                $row[6];
                ?>
			<tr>
			    <td><?php echo $row[0] ?>
				</td>
				<td><?php echo $row[1] ?>
				</td>
				<td><?php echo $row[2] ?></td>
				<td><?php echo $row[3] ?></td>
				<td><?php echo $row[4] ?>
                	<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
					</button>				
				</td>
				<td><?php echo $row[5] ?></td>
				<td><?php echo $row[6] ?>
					<button class="btn btn-warning glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalEdicion2" onclick="agregaform('<?php echo $datos;?>')">
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $row[0] ?>')">	
					</button>
				</td>
			</tr>
			<?php }}?>
		</table>
	</div>
</div>