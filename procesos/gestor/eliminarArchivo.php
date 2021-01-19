<?php 

	session_start();
	require_once "../../clases/Gestor.php";
	$Gestor = new Gestor();
	$idArchivo =$_POST['idArchivo'];
	$idUsuario = $_SESSION['idUsuario'];

	$nombreArchivo = $Gestor->obtenNombreArchivos($idArchivo);

	$ruteEliminar = "../../archivos/" . $idUsuario . "/" . $nombreArchivos;

		if(unlink($rutaEliminar)) {
			echo $Gestor->eliminarRegistroArchivo($idArchivo);
	}else{
		echo 0;
	}

echo $Gestor->eliminarRegistroArchivo($idArchivo);
?>