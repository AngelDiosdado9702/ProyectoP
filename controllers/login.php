<?php
session_start();
require('conection/conexion.php');
sleep(2);
$usu=$_POST['usuariolg'];
$pass=$_POST['passlg'];
$usuarios=$mysqli->query("SELECT *
                        FROM  usuarios WHERE usuario='".$usu."' AND password='".$pass."'");
if ($usuarios->num_rows==1):
  $datos= $usuarios->fetch_assoc();
  $_SESSION["s_usuario"] = $usu;
  $_SESSION["id_empresa"] = $datos['id_empresa'];
    echo json_encode(array('error'=>false,'tipo'=>$datos['tipo']));
else:
    echo json_encode(array('error'=>true));
endif;
$mysqli->close();
 ?>
