<?php
require_once('../../controllers/conection/bdd.php');
if (isset($_POST['delete']) && isset($_POST['id'])){	
	$id = $_POST['id'];	
	$sql = "DELETE FROM events WHERE id = $id";
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
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id']) && isset($_POST['id_empresa'])){
	$id = $_POST['id'];
	$id_empresa =$_POST['id_empresa'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$sql = "UPDATE events SET  id_empresa= '$id_empresa', title = '$title', color = '$color' WHERE id = $id ";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error en la actuzalizacion');
	}
}
header('Location: '.$_SERVER['HTTP_REFERER']);
?>