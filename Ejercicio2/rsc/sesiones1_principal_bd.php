<!-- Modificar sesiones1_principal.php para que se muestre 
 el mensaje “Zona de administrador”  solo visible para los 
 usuarios con rol 1. -->

 <!-- Modifica la página sesiones1_principal.php para que 
  cuando se acceda con un perfil de administrador se muestren 
  los datos de los usuarios registrados en la tabla “usuarios” 
  de la base de datos “empresa” -->

<?php 
	session_start();
	if(!isset($_SESSION['usuario'])){	
		header("Location: sesiones1_login_bd.php?redirigido=true");
	}	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Página principal</title>
			<meta charset = "UTF-8">
	</head>
	<body>		
		<?php echo "Bienvenido ".$_SESSION['usuario'];?>
		<br>
		<?php 
			if ( $_SESSION['rol']==1){
				echo "Zona de administrador";
				$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
				$usuario_bd = 'root';
				$clave_bd = '';
				try {
					$bd = new PDO($cadena_conexion, $usuario_bd, $clave_bd);
					echo "<br>"."Conexión realizada con éxito"."<br>";		
					$sql = 'SELECT código, nombre, clave, rol FROM usuarios';
					// $usuarios = $bd->query($sql);
					// echo "<br>";
					// foreach ($usuarios as $usu) {
					// 	echo "<h5>Usuario: </h5>";
					// 	echo "Código: ". $usu['código']. "<br>";
					// 	echo "Nombre: " . $usu['nombre']. "<br>";
					// 	echo "Clave: " . $usu['clave'] . "<br>";
					// 	echo "Rol: " . $usu['rol'] . "<br>";
					// }
					// $usuarios = $bd->query($sql);
					// echo "<br>";
					echo "fetchall";
					$resultados = $usuarios->fetchAll();
					foreach ($resultados as $clave => $valor) {
						echo "<br>";
						echo "$clave"."<br>";
						// echo "<pre>";
						// print_r($valor);
						// echo "</pre>";
						echo "<pre>";
						var_dump($valor);
						echo "</pre>";
					}
	
				} catch (PDOException $e) {
					echo 'Error con la base de datos: ' . $e->getMessage();
				}
			}
		?>
		<br><a href = "sesiones1_logout.php"> Salir <a>
	</body>
</html>