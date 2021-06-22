<?php
// Cómo subir el archivo
require_once "../../controllers/conection/conexion.php";
$fichero = $_FILES["file2"];
$nombre = $fichero["name"];
$id = $_POST['id'];
$nombre = $_POST['ev_foto'];

	$sql = "UPDATE tabla_archivos SET ev_foto='$nombre' WHERE id='$id'";
	 move_uploaded_file($fichero["tmp_name"], "../../Archivos/archivoPlanea/".$fichero["name"]);
	 echo $result=mysqli_query($mysqli,$sql);
?>