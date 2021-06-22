<?php
require_once "../../controllers/conection/conexion.php";

$id=$_POST['id'];

$sql="DELETE from recolecciones where id='$id'";
echo $result=mysqli_query($mysqli,$sql);
?> 