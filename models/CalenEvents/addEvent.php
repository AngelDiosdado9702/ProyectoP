<?php
require_once('../../controllers/conection/bdd.php');
if(isset($_POST['id_empresa'])&&isset($_POST['title'])&&isset($_POST['start'])&&isset($_POST['end'])&&isset($_POST['color'])&&isset($_POST['objetivo'])&&isset($_POST['pers'])){
	$id_empresa = $_POST['id_empresa'];
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$objetivo = $_POST['objetivo'];
	$pers = $_POST['pers'];

	$sql = "INSERT INTO events(id_empresa,title, start, end, color,objetivo,personas) values ('$id_empresa' ,'$title', '$start', '$end', '$color','$objetivo','$pers')";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

	$nombre = "sin documento";

	$s = "INSERT INTO tabla_archivos(id_empresa,archivo,start,title) values ('$id_empresa' ,'$nombre','$start','$title')";
	$q1 = $bdd->prepare( $s );
	if ($q1 == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$s1 = $q1->execute();
	if ($s1 == false) {
	 print_r($q1->errorInfo());
	 die ('Erreur execute');
	}
}
header('Location: '.$_SERVER['HTTP_REFERER']);
?>