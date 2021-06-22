function formulario(datos){

	d=datos.split('||');
	$('#id').val(d[0]);
	$('#di').val(d[1]);
	$('#me').val(d[2]);
	$('#id_empres').val(d[3]);
	$('#foli').val(d[4]);
	$('#equip').val(d[5]);
	$('#responsabl').val(d[6]);
	$('#pe').val(d[7]);
	$('#hdpe').val(d[8]);
	$('#arc_blanco').val(d[9]);
	$('#arc_mixto').val(d[10]);
	$('#periodic').val(d[11]);
	$('#carto').val(d[12]);
	$('#alumini').val(d[13]);
	$('#metale').val(d[14]);
	$('#env_multicapa').val(d[15]);
	$('#electronico').val(d[16]);
	$('#tapa').val(d[17]);
	$('#vaso_encerado').val(d[18]);
	$('#vidri').val(d[19]);
	$('#tota').val(d[20]);
	$('#arbol_salvado').val(d[21]);
	$('#persOxiSalvad').val(d[22]);
	$('#ahorro_agu').val(d[23]);
	$('#ahorro_energi').val(d[24]);
	$('#CO2').val(d[25]);
	$('#play').val(d[26]);
	$('#cascaro').val(d[27]);
	$('#otr').val(d[28]);
}

function actualizarDatos(){

	id=$('#id').val();
	dia=$('#di').val();
	mes=$('#me').val();
	id_empresa=$('#id_empres').val();
	folio=$('#foli').val();
	equipo=$('#equip').val();
	responsable=$('#responsabl').val();
	pet=$('#pe').val();
	hdpet=$('#hdpe').val();
	arc_blanco=$('#arc_blanco').val();
	arc_mixto=$('#arc_mixto').val();
	periodico=$('#periodic').val();
	carton=$('#carto').val();
	aluminio=$('#alumini').val();
	metales=$('#metale').val();
	env_multicapa=$('#env_multicapa').val();
	electronicos=$('#electronico').val();
	tapas=$('#tapa').val();
	vaso_encerado=$('#vaso_encerado').val();
	vidrio=$('#vidri').val();
	total=$('#tota').val();
	arbol_salvado=$('#arbol_salvado').val();
	persOxiSalvado=$('#persOxiSalvad').val();
	ahorro_agua=$('#ahorro_agu').val();
	ahorro_energia=$('#ahorro_energi').val();
	CO2=$('#CO2').val();
	playo=$('#play').val();
	cascaron=$('#cascaro').val();
	otro=$('#otr').val();

	cadena= "id=" + id +
			"&dia=" + dia + 
			"&mes=" + mes +
			"&id_empresa=" + id_empresa +
			"&folio=" + folio +
			"&equipo=" + equipo +
			"&responsable=" + responsable +
			"&pet=" + pet +
			"&hdpet=" + hdpet +
			"&arc_blanco=" + arc_blanco +
			"&arc_mixto=" + arc_mixto +
			"&periodico=" + periodico +
			"&carton=" + carton +
			"&aluminio=" + aluminio +
			"&metales=" + metales +
			"&env_multicapa=" + env_multicapa +
			"&electronicos=" + electronicos +
			"&tapas=" + tapas +
			"&vaso_encerado=" + vaso_encerado +
			"&vidrio=" + vidrio +
			"&total=" + total +
			"&arbol_salvado=" + arbol_salvado +
			"&persOxiSalvado=" + persOxiSalvado +
			"&ahorro_agua=" + ahorro_agua + 
			"&ahorro_energia=" + ahorro_energia +
			"&CO2=" + CO2 +
			"&playo=" + playo +
			"&cascaron=" + cascaron +
			"&otro=" + otro;

	$.ajax({
		type:"POST",
		url:"../../models/reportes/editar.php",
		data:cadena,
		success:function(r){
			if(r==1){
				location.reload();
				alertify.success("Actualizado con exito :)");
			}else{
			//	document.write(cadena);//para revisar donde aparece linea por linea el error
			    alertify.error(r);
				alertify.error("Fallo c:");
			}
		}
	});

}
function preguntar(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDato(id) }
                , function(){ alertify.error('Se cancelo')});
}
function eliminarDato(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"../../models/reportes/borrarReco.php",
			data:cadena,
			success:function(r){
				if(r==1){
					location.reload();
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :");
				}
			}
		});
}