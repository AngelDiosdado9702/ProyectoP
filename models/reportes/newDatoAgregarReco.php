<?php  
//agregar datos a la tabla de reportes
require_once('../../controllers/conection/bdd.php');

if (isset( $_POST['id_empresa'])&&isset( $_POST['dia'])&&isset($_POST['mes'])&&isset( $_POST['folio'])	&&isset( $_POST['equipo'])&&isset( $_POST['responsable'])&&isset( $_POST['persOxiSalvado'])&&isset( $_POST['pet'])&&isset( $_POST['hdpet'])&&isset( $_POST['arch_blanco'])&&isset( $_POST['arch_mixto'])&&isset( $_POST['periodico'])&&isset( $_POST['carton'])&&isset( $_POST['aluminio'])&&isset( $_POST['metales'])&&isset( $_POST['env_multi'])&&isset( $_POST['vaso_enc'])&&isset( $_POST['tapas'])&&isset( $_POST['electronicos'])&&isset( $_POST['vidrio'])&&isset( $_POST['arbol_salv'])&&isset( $_POST['ahorro_agua'])&&isset( $_POST['ahorro_energia'])&&isset( $_POST['co2'])&&isset( $_POST['total'])&&isset( $_POST['playo'])&&isset( $_POST['cascaron'])&&isset( $_POST['otro'])){
	
	$id_empresa = $_POST['id_empresa'];
	$dia = $_POST['dia'];
	$mes = $_POST['mes'];
	$folio = $_POST['folio'];
	$equipo = $_POST['equipo'];
	$responsable = $_POST['responsable'];
	$persOxiSalvado = $_POST['persOxiSalvado'];
	$pet = $_POST['pet'];
	$hdpe = $_POST['hdpet'];
	$arch_blanc = $_POST['arch_blanco'];
	$arch_mixt = $_POST['arch_mixto'];
	$periodico = $_POST['periodico'];
	$carton = $_POST['carton'];
	$aluminio = $_POST['aluminio'];
	$metales = $_POST['metales'];
	$env_multi = $_POST['env_multi'];
	$vaso_enc = $_POST['vaso_enc'];
	$tapas = $_POST['tapas'];
	$electronicos = $_POST['electronicos'];
	$vidrio = $_POST['vidrio'];
	$arbol_salv = $_POST['arbol_salv'];
	$ahorro_agua = $_POST['ahorro_agua'];
	$ahorro_energia = $_POST['ahorro_energia'];
	$co2 = $_POST['co2'];
	$playo = $_POST['playo'];
	$cascaron = $_POST['cascaron'];
	$otro = $_POST['otro'];
	$total = $pet + $hdpe + $arch_blanco + $arch_mixt + $periodico +  $carton + $aluminio + $metales + $env_multi+$vaso_enc + $tapas + $electronicos + $vidrio + $playo +  $cascaron + $otro;
	
	$sql ="INSERT INTO recolecciones(dia,mes, id_empresa, folio, equipo, responsable, pet, hdpet, arc_blanco, arc_mixto, periodico, carton, aluminio,metales, env_multicapa, electronicos, tapas, vaso_encerado,vidrio, total,arbol_salvado, persOxiSalvado, ahorro_agua, ahorro_energia, CO2,playo,cascaron,otro) VALUES('$dia','$mes','$id_empresa','$folio','$equipo','$responsable','$pet','$hdpe','$arch_blanc','$arch_mixt','$periodico','$carton','$aluminio','$metales','$env_multi','$electronicos','$tapas','$vaso_enc','$vidrio','$total','$arbol_salv','$persOxiSalvado','$ahorro_agua','$ahorro_energia','$co2','$playo','$cascaron','$otro')";
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
}
header('Location: '.$_SERVER['HTTP_REFERER']);
?>