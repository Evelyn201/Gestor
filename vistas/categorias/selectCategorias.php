<?php 

	session_start();
	require_once "../../clases/Conexion.php";
	$c = new Conectar();
	$conexion = $c->conexion();

	$idUsuario = $_SESSION['idUsuario'];
	$sql = "SELECT id_categoria, 
					nombre 
			FROM t_categorias
			WHERE id_usuario = '$id_Usuario'";
	$result = mysqli_query($conexion, $sql);

?>

	 <select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
	 	<?php  
	 		while($mostrar = mysqli_fetch_array($result)){
	 			$idCategoria = $mostrar['id_categoria'];
	 	?>
	 		<option value="<?php echo $idCategoria ?>"><?php echo $mostrar['nombre']; ?></option>
	 	<?php 
	 		}
	 	 ?>
	 </select>