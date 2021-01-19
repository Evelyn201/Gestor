<?php 
	session_start();
	require_once "../../../clases/Usuario.php";

	$usuario = $_POST['login'];
	$password = shal($_POST['password']);

	$usuarioObj = new Usuario();

	echo $usuarioObj-> login($usuario, $password);
 ?> 