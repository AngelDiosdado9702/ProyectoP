<?php
require_once "../../controllers/conection/conexion.php";
$id=$_POST['id'];
$sql="DELETE from Empresas where id='$id'";
$sql1="DELETE from usuarios  where id='$id'";
echo $result=mysqli_query($mysqli,$sql);
?> 