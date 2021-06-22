<?php
// simple conexion a la base de datos
function connect(){
       return new mysqli('localhost','id13686875_root','V~QC7lJBP=3ZDLYG','id13686875_promesa');
       //return new mysqli('localhost','root','','promesa');
}
$con = connect();
if (!$con->set_charset("utf8")) {//asignamos la codificación comprobando que no falle
       die("Error cargando el conjunto de caracteres utf8");
}
?>