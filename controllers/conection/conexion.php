<?php
    $mysqli=new mysqli('localhost','id13686875_root','V~QC7lJBP=3ZDLYG','id13686875_promesa');
    //$mysqli=new mysqli('localhost','root','','PROMESA');
    if ($mysqli->connect_errno) {
    echo "Error al conectarse con My SQL debido al error".$mysqli->connect_error;
    }
?>