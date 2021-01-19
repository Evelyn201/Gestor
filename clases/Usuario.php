<?php 

	require_once "Conexion.php";

	class Usuario extends Conectar{

		public function agregarUsuario($datos){
			$conexion = Conectar::conexion();

			if(self::buscarUsuarioRepetido($datos['usuario'])){
				return 2;
			} else { 
				$sql = "INSERT INTO t_usuario (nombre,
											fechaNacimiento,
											email,
											usuario,
											password)
							VALUES (?, ?, ?, ?, ?)";
					$query = $conexion->prepare($sql);
					$query->bind_param('sssss', $datos['nombre'],
												$datos['fechaNacimiento'],
												$datos['email'],
												$datos['usuario'],
												$datos['password']);

					$exito = $query->execute();
					$query->close();
					return $exito;
				}

			}

		public function buscarUsuarioRepetido($usuario){
			$conexion = Conectar::conexion();

			$sql = "SELECT usuario
					 FROM t_usuario 
					 WHERE usuario = '$usuario'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if ($datos['usuario'] != "" || $datos['usuario'] == $usuario){
				return 1;
			} else{
				return 0;
			}
		}
		public function loign($usuario, $password){
			$conexion = Conector::conexion();

			$sql = "SELECT count(*) as exixteUsuario
					FROM t_usuarios
					WHERE usuario = '$usuario'
					AND password = '$password'";
			$result = mysqli_query($conexion. $sql);

			$respuesta = mysqli_fetch_array($result)['esisteUsuario'];

			if($respuesta > 0){
				$_SESSION['usuario'] = $usuario;

				$sql = "SELECT id_usuario
						FROM t_usuarios
						WHERE usuario = '$usuario'
						AND password = '$password'";
				$result = mysqli_query($conexion ,$sql);
				$idUsuario = mysqli_fetch_row($result)[0];

				$_SESSION['idUsiario'] = $idUsuario;

				return 1;
			}else{
				return 0;
			}

		}
	}

 ?>