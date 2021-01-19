<?php 
	session_start();
	require_once "../../clases/Gestor.php";
	$Gestor = new Gestor();
	$idCategoria = $_POST['categoriasArchivos'];
	$idUsaurio = $_SESSION['idUsuario'];

    if ($_FILES['archivos']['size']>0) {

    	$carpetaUsuario = '../../archivos '.$idUsuario;

    	if(file_exixsts(filename)) {
    		mkdir($carpetaUsuario, 0777, true);

    	}

		$totalArchivos = count($_FILES['archivos']['name']);
		for ($i=0; $i < $totalArchivos; $i++){

			$nombrearchivo = $_FILE['archivos']['name'][$i];
			$explode = explode('.', $nombreAarchivo);
			$tipoArchivo = array_pop($explode);

			$rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
			
			$rutaFinal = $carpetaUsuario. "/". $nombreArchivo;
			
			$datosRegistroArchivo = array(
									"idUsuario" => $idUsuario,
									"idCategoria" => $idCategoria,
									"nombreArchivo" => $nombreArchivo,
									"tipo" => $tipoArchivo,
									"ruta" => $rutaFinal,
									);
			if (move_uploaded_file($rutaAlmacenamiento, $rytaFinal)) {
				$respuesta = $Gestor->agregarRegistroArchivo($datosRegistroArchivo);
			}

			
	    }
	}else{
		echo 0;
	}
	
 ?>