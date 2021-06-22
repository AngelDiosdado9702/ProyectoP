<?php
	require_once "../../controllers/conection/conexion.php";
	$id = $_POST['id'];
	$i = $_POST['id_empresa'];
	$F = $_POST['FechaInicio'];
	$P = $_POST['Paquete'];
	$A = $_POST['Asesor'];
	$E = $_POST['Encargado'];
	$n = $_POST['numero'];
	$c = $_POST['correo'];
	$D = $_POST['Direccion'];
	$u = $_POST['usuario'];
	$p = $_POST['password'];
	$sql1 ="UPDATE Empresas Set id_empresa= '$i',FechaInicio= '$F',Paquete='$P',Asesor='$A',Encargado='$E',numero='$n',correo='$c',Direccion='$D',password='$p',usuario='$u' WHERE id= '$id'";
	$sql = "UPDATE usuarios SET usuario='$u', password='$p',correo='$c', id_empresa='$i' WHERE id= '$id'";
	echo $result=mysqli_query($mysqli,$sql1);
	//header("Location: ../recolecciones.php");
?>