function formulario1(datos){
	d=datos.split('||');
	$('#id').val(d[0]);
	$('#id_empres').val(d[1]);
	$('#FechaInici').val(d[2]);
	$('#Paquet').val(d[3]);
	$('#Aseso').val(d[4]);
	$('#Encargad').val(d[5]);
	$('#numer').val(d[6]);
	$('#corre').val(d[7]);	
	$('#Direccio').val(d[8]);
	$('#pass').val(d[11]);
	$('#Usuario').val(d[13]);
	
}
function actualizarDatos1(){
	id=$('#id').val();
	id_empresa = $('#id_empres').val();
	FechaInicio = $('#FechaInici').val();
	Paquete = $('#Paquet').val();
	Asesor = $('#Aseso').val();
	Encargado =$('#Encargad').val();
	numero = $('#numer').val();
	correo = $('#corre').val();
	Direccion = $('#Direccio').val();
	password = $('#pass').val();
	usuario = $('#Usuario').val();

	cadena= "id=" + id +
			"&id_empresa=" + id_empresa +
			"&FechaInicio=" + FechaInicio +
			"&Paquete="+ Paquete +
			"&Asesor="+ Asesor +
			"&Encargado="+ Encargado +
			"&numero="+ numero +
			"&correo="+ correo +
			"&Direccion="+ Direccion +
			"&usuario="+ usuario +
			"&password="+ password;

	$.ajax({
		type:"POST",
		url:"../../models/general/editar.php",
		data:cadena,
		success:function(r){
			if(r==1){
				location.reload();
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error(r);//para revisar donde aparece linea por linea el error
				alertify.error("Fallo c:");
			}
		}
	});

}
function preguntar1(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDato1(id) }
                , function(){ alertify.error('Se cancelo')});
}
function eliminarDato1(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"../../models/general/borrarEmpresa.php",
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