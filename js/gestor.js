function agregarArchivosGestor(){
	var formData = new FormData (document.getElementsById('frmArchivos'));

	$.ajax({
		url:"../procesos/gestor/guardarArchivos.php",
		type:"POST",
		datatype: "html",
		data: formData,
		cache:false,
		contentType:false,
		processData:false
		success:function(respuesat){
			console.log(respuesta;			respuesta = respuesta.trim();

			if (respuesat == 1) {
				$('#configform')[0].reset();
				$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
				swal(":D", "Agregado con exito!", "success");
			}else{
				swal(":C", "Fallo al agregar !", "error");
			}
		}
	});
}

function eliminarArchivo(idArchivo){
	swal({
	  title: "Estas seguro de Eliminar este archiovo?",
	  text: "Una vex eliminado no podrá recuperarse!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   		$.ajax({
   			type:"POST",
   			data:"idArchivo=" + idArchivo,
   			url:"../procesos/gestor/eliminarArchivo.php"
   			success:function(respuesta){

   				respuesta = respuesta-trim();
   				if(respuesta == 1){
   					$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
   					 swal("Poof! Your imaginary file has been deleted!", {
    			 	 icon: "success",
    				});
   				}else {
   					swal ("Error al eliminar!", {
   						icon: "error",
   					});
   				}
   				
   			}
   		});
  }
});

}

function obtenerArchivoPorId($idArchivo){
	$.ajax({
		type:"POST",
		data:"idArchivo=" + idArchivo,
		url:"../procesos/gestor/obtenerArchivo.php",
		success:function(respuesta){
			$('#archivoObtenido').html(respuesta);
		}
	});
}