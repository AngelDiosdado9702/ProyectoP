<?php
	require_once "../../controllers/conection/conexion.php";
	$id=$_POST['id'];
	$di = $_POST['dia'];
	$me = $_POST['mes'];
	$is = $_POST['id_empresa'];
	$fi = $_POST['folio'];
	$eqp = $_POST['equipo'];
	$res = $_POST['responsable'];
	$pe = $_POST['pet'];
	$h = $_POST['hdpet'];
	$arc_blanc = $_POST['arc_blanco'];
	$arc = $_POST['arc_mixto'];
	$per = $_POST['periodico'];
	$car = $_POST['carton'];
	$alu = $_POST['aluminio'];
	$met = $_POST['metales'];
	$env_mult = $_POST['env_multicapa'];
	$electron = $_POST['electronicos'];
	$tap = $_POST['tapas'];
	$vaso_enc = $_POST['vaso_encerado'];
	$vi = $_POST['vidrio'];
	$arbol_sal = $_POST['arbol_salvado'];
	$pers = $_POST['persOxiSalvado'];
	$ah_agu = $_POST['ahorro_agua'];
	$ah_energi = $_POST['ahorro_energia'];
	$C = $_POST['CO2'];
	$pl = $_POST['playo'];
	$cas= $_POST['cascaron'];
    $o =$_POST['otro'];
    $tot = $pe+$h+ $arc_blanc+$arc+$per+$car+$alu+$met+ $env_mult+$electron+$tap+$vaso_enc+$vi+$pl+$cas+$o;

	$sql1 ="UPDATE recolecciones Set dia= '$di',mes= '$me',id_empresa='$is',folio='$fi',equipo='$eqp',responsable='$res',pet='$pe',hdpet='$h',arc_blanco='$arc_blanc',arc_mixto='$arc',periodico='$per',carton='$car',aluminio='$alu',metales='$met',env_multicapa='$env_mult',electronicos='$electron',tapas='$tap',vaso_encerado='$vaso_enc',vidrio='$vi',total='$tot',arbol_salvado='$arbol_sal',persOxiSalvado='$pers',ahorro_agua='$ah_agu',ahorro_energia='$ah_energi',CO2='$C',playo='$pl',cascaron='$cas',otro='$o'  WHERE id= '$id'";

	echo $result=mysqli_query($mysqli,$sql1);
	//header("Location: ../recolecciones.php");
?>