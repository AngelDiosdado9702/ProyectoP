function agregaform(datos){
	d=datos.split('||');
    $('#idpersona').val(d[0]);
    $('#idperson').val(d[0]);
	$('#elabu').val(d[4]);
	$('#ev_fotou').val(d[6]);
}

function actualizaDatos(){
    id=$('#idpersona').val();
	elab=$('#elabu').val();
	cadena= "id=" + id +
			"&elab=" + elab; 
	$.ajax({
		type:"POST",
		url:"../../models/componentes/actualizaDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('../../models/componentes/tabla.php');
				location.reload();
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo c:");
			}
		}
	});
}
function actualizaDato(ev_fotou){
  
    id=$('#idperson').val();
    
cadenas= "id=" + id +
      "&ev_foto=" + ev_fotou;

  $.ajax({
    type:"POST",
    url:"../../models/componentes/actualizaDatos2.php",
    data: cadenas,
        contentType: false,
        cache: false,
        processData:false,

    success:function(r){
      
      if(r==1){
        $('#tabla').load('../../models/componentes/tabla.php');
               
        location.reload();
        
        alertify.success("Actualizado con exito :)");
           alert(cadenas);

      }else{
          document.write(cadenas);
        alertify.error("Fallo c: Actualizar 2 ");
      }
    }
  });
}
function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos',' ¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}
function eliminarDatos(id){
	cadena="id=" + id;
	$.ajax({
		type:"POST",
		url:"../../models/componentes/eliminarDatos.php",
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