<?php 
	require_once "../../controllers/conection/conexion.php";
	$id=$_POST['id'];
	
	$sql="DELETE from tabla_archivos where id='$id'";
	echo $result=mysqli_query($mysqli,$sql);
	
	$sql1="DELETE from events where id='$id'";
	echo $result=mysqli_query($mysqli,$sql1);
 ?> 