<?php
require_once('../../controllers/conection/bdd.php');
$vacio="sin documento"; 

list($id,$archivos) = explode("//", $_REQUEST["name"]);

$sql = "UPDATE tabla_archivos SET archivo='$vacio' WHERE id='$id' && archivo='$archivos' ";
$query = $bdd->prepare( $sql );
	if ($query == false) {
	 	print_r($bdd->errorInfo());
	 	die ('Erreur prepare');
	}
	$res = $query->execute();
	if (!$res == false) {
		// Usamos el comando "unlink" para borrar el fichero
		unlink("../../Archivos/".$archivos);
	}else{
		print_r($query->errorInfo());
		die ('Error en la eliminacion');
	}

// Redirigiendo hacia atrás
header("Location: " . $_SERVER["HTTP_REFERER"])
?>