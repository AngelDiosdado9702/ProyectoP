<?php
// Cómo subir el archivo
require_once('../../controllers/conection/bdd.php');
$fichero = $_FILES["file"];
// Cargando el fichero en la carpeta "subidas"
$nombre = $fichero["name"];

if(isset($nombre)&&isset($_POST['fechaArchivo'])){

    list($start,$id_empresa,$title) = explode("//", $_POST['fechaArchivo']);

    $sql = "UPDATE tabla_archivos SET archivo='$nombre' WHERE id_empresa='$id_empresa' && start= '$start' && title='$title'";

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
    move_uploaded_file($fichero["tmp_name"], "../../Archivos/".$fichero["name"]);
}
// Redirigiendo hacia atrás
header('Location: '.$_SERVER['HTTP_REFERER']);
?>