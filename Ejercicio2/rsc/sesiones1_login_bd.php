<!-- 
 Modifica el formulario sesiones1_login.php para que compruebe usuario 
 y contraseña usando la tabla usuarios de la base de datos empresa. -->

<?php
function comprobar_usuario($nombre, $clave){
	$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
	$usuario_bd = 'root';
	$clave_bd = '';
	try {
		$bd = new PDO($cadena_conexion, $usuario_bd, $clave_bd);
		// VALIDAR LOS DATOS DEL LOGIN EN LA BASE DE DATOS EMPRESA
		$sql = "SELECT nombre, clave, rol FROM usuarios WHERE nombre = '$nombre'";
		$usuarios = $bd->query($sql);
		if ($usuarios->rowCount() == 1){
			$resultado = $usuarios->fetch();
			if($resultado['clave']==$clave){
				$usu['nombre']=$resultado['nombre'];
				$usu['rol']=$resultado['rol'];
				return $usu;
			}
		}
	} catch (PDOException $e) {
		echo 'Error con la base de datos: ' . $e->getMessage();
	} 
	return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {  	
	$usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
	if($usu==false){
		$err = true;
		$usuario = $_POST['usuario'];
	}else{	
		session_start();
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['rol'] = $usu['rol'];
		header("Location: sesiones1_principal_bd.php");	
	}	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>		
		<meta charset = "UTF-8">
	</head>
	<body>	
		<?php if(isset($_GET["redirigido"])){
			echo "<p>Haga login para continuar</p>";
		}?>
		<?php if(isset($err) and $err == true){
			echo "<p> revise usuario y contraseña</p>";
		}?>
		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
			Usuario
			<input value = "<?php if(isset($usuario))echo $usuario;?>"
			id = "usuario" name = "usuario" type = "text">							
			Clave			
			<input id = "clave" name = "clave" type = "password">						
			<input type = "submit">
		</form>
	</body>
</html>