<?php 
	require_once "../../controllers/conection/conexion.php";
	$id=$_POST['id'];
	$e=$_POST['elab'];
	$sql="UPDATE tabla_archivos set elaborado='$e'
				where id='$id'";
	echo $result=mysqli_query($mysqli,$sql);
 ?>