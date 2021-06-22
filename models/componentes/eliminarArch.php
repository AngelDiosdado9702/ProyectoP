<?php
require_once "../../controllers/conection/conexion.php";
if(isset($_REQUEST["id"]) && isset($_REQUEST["name"])){

$di = $_REQUEST["id"]; 
$sql = "UPDATE tabla_archivos SET archivo= 'Campo vacio'  WHERE id='$di'"; 

$query = $mysqli->prepare( $sql );
    if ($query == false) {
     print_r($mysqli->connect_error());
     die ('Erreur prepare');
    }
    $sth = $query->execute();
    if ($sth == false) {
     print_r($query->errorInfo());
     die ('Erreur execute');
    } 
}
// Redirigiendo hacia atrás
header("Location: ../../views/admin/planAnl.php"); 
?>  

