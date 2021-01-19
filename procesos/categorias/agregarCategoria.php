<?php 

session_start();

REQUIRE_ONCE "../../clases/Categorias.php";
$Categorias = new Categorias();

	$datos = array(
					"idUsuario"=> $_SESSION['idUsuario'],
					"categoria" => $_POST['categoria']
					);

	echo $Categorias->agregarCategoria($datos);
	
 ?>