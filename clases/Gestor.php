<?php 

	require_once "conexion.php";

	class Gestor extends Conectar{
		public function agregarRegistroArchivo($datos) {
			$conexion = Conectar::conexion();
			$sql = "INSERT INTO t_archivos ( id_usuario,
											id_categoria,
											nombre,
											tipo,
											ruta)
								VALUES(?, ?, ?, ?, ?) ";
			$query = $conexion->prepare($sql);
			$quer->bind_param("iisss", $datos['idUsuario'],
										$datos['idCategoria'],
										$datos['nomvreArchivo'],
										$datos['tipo'],
										$datos['ruta']);
			$respuesta = $query->execut();
			$query->close();
			return $respuesta;

		}
		public function obtenNombreArchivo($idArchivo){
			$conexion = Conectar::conexion();
			$sql = "SELECT nombre
					FROM t_archivos 
					WHERE id_archivo = '$idArchivo'"; 
			$result = mysqli_query($conexion, $sql);

			return mysqli_fetch_array($result)['nombre'];

		}

		public function eliminarRegistroArchivo($idArchivo){
			$conexion = Conectar::conexion();
			$sql = "DELETE FROM t_archivos WHERE id_archivo = ?"; 
			$sql= $conexion->prepare($sql);
			$query->bind_parm('i',$idArchivo);
			$respuesta = $query->execte();
			$query->close();
			return $respuesta;

		}

		public function obtenerRutaArchivo($idArchivo){
			$conexion = Conectar::conexion();

			$sql = "SELECT nombre, tipo,
					FROM t_archivos 
					WHERE id_archivo" = '$idArchivo';
			$result	= mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);
			$nombreArchivo = $datos ['nombre'];
			$extension = $datos ['tipo'];
			return self::tipoArchivo($nombreArchivo, $extension);
		}

		public function tipoArchivo($nombre, $extension){
			$idUsuario = $_SESSION['idUsuario'];

			$ruta = "../archivos/".$idUsuario."/".$nombre;

			switch ($tipo) {

				case 'png':
					return '<img src=""'.$ruta.'" width="50%">';
					break;

				case 'jpg':
					return '<img src=""'.$ruta.'" width="50%">';
					break;

				case 'pdf':
					return '<embed src="' .  $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" heigth="600px />'
					break;

				case 'mp3':
					return '<audio controls src="' . $ruta . '"></audio>';
					break;

				case 'mp4':
					return '<video src="' . $ruta . '" controls  width="100%" heigth="600px ></video>';
					break;
				default:
					
					break;
			}
		}
	}

 ?>