<?php
// Cómo subir el archivo
require_once "../../controllers/conection/conexion.php";

$fichero = $_FILES["file2"];
$nombre = $fichero["name"];


if(isset($_POST['empresaArchivo'])&& isset($nombre)){
	$id= $_POST['empresaArchivo'];

	$sql2 = "UPDATE tabla_archivos SET ev_foto='$nombre' WHERE id='$id'";
// Cargando el fichero en la carpeta 
	$query = $mysqli->prepare( $sql2 );
	if ($query == false) {
	 print_r($mysqli->connect_error());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	 move_uploaded_file($fichero["tmp_name"], "../../Archivos/archivosPlanea/".$fichero["name"]);
} 
// Redirigiendo hacia atrás
header("Location: ../../views/admin/planAnl.php" ); 
?>