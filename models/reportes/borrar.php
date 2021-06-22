<?php
require_once('../../controllers/conection/bdd.php');
$id = $_REQUEST["id"];
$sql = "DELETE FROM tbl_reporte WHERE id = '$id'";
$query = $bdd->prepare( $sql );
	if ($query == false) {
	 	print_r($bdd->errorInfo());
	 	die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
		print_r($query->errorInfo());
		die ('Error en la eliminacion');
	}
// Redirigiendo hacia atrás
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>