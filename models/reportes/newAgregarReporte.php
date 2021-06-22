<?php  
//agregar datos a la tabla de reportes
require_once('../../controllers/conection/bdd.php');

if(isset($_POST['id_empresa'])&&isset($_POST['mes'])){
	
	$id_empresa = $_POST['id_empresa'];
	$mes = $_POST['mes'];
	
	$sql ="INSERT INTO tbl_reporte(mes,id_empresa,pet,hdpe,arch_blanc,arch_mixt,periodico,carton,aluminio,metales,env_multi,vaso_enc,tapas,electronicos,vidrio,arbol_salv,ahorro_agua,ahorro_energia,co2,total,playo)SELECT mes,id_empresa ,SUM(pet),SUM(hdpet),SUM(arc_blanco),SUM(arc_mixto),SUM(periodico),SUM(carton),SUM(aluminio), SUM(metales),SUM(env_multicapa),SUM(vaso_encerado),SUM(tapas),SUM(electronicos),SUM(vidrio),SUM(arbol_salvado),SUM(ahorro_agua),SUM(ahorro_energia),SUM(co2),SUM(total),SUM(playo) FROM recolecciones WHERE id_empresa = '$id_empresa' && mes = '$mes'";
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
header('Location: ../../views/admin/reportes/excelRep.php');
?>