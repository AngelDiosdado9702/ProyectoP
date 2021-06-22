<?php
session_start();
unset($_SESSION["s_usuario"]);
unset($_SESSION["id_empresa"]);
session_destroy();
header('Location: ../index.html');
?>