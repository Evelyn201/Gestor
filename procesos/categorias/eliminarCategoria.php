<?php 

	session_start();
	require_once "../../clases/Categorias.php";
	$Categorias = new Categorias();

	echo $Categorias->eliminarCategorias($_POST['idCategoria']),

 ?>