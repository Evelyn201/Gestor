<?php 

session_start();
	require_once "../../clases/Gestor.php";
	$c = new Conectar();
	$conexion = $c->conexion();
	$idUsuario = $_SESION['idUsuario'];

	echo $Gestor->obtenerRutaArchivo($idArchivo);
 ?>