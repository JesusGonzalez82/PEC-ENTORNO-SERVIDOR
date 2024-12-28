
<?php

function rellenarTabla($rol)
{
	$cadena_conexion = 'mysql:dbname=empresa2;host=127.0.0.1';
	$usuario_bd = 'root';
	$clave_bd = '';
	try {
		$bd = new PDO($cadena_conexion, $usuario_bd, $clave_bd);
		//echo "<br>"."Conexión realizada con éxito"."<br>";		
		$sql = "SELECT código, nombre, clave, rol FROM usuarios WHERE rol = '$rol'";
		$usuarios = $bd->query($sql);

		//echo "fetchall";

		$resultados = $usuarios->fetchAll(); ?>
		<table>
			<thead>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Clave</th>
				<th>Rol</th>
			</thead>
			<tbody>

				<?php
				foreach ($resultados as $usu) {
					echo "<tr>";
					echo "<td>" . $usu["código"] ."</td> <td>". $usu["nombre"] . "</td>  <td>" . $usu["clave"] . "</td> <td>" . $usu["rol"] . "</td>";
					echo "</tr>";
				} ?>
			</tbody>
		</table>
<?php
	} catch (PDOException $e) {
		echo 'Error con la base de datos: ' . $e->getMessage();
	}
}
session_start();
if (!isset($_SESSION['usuario'])) {
	header("Location: sesiones1_login.php?redirigido=true");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	rellenarTabla($_POST['selector']);
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Página principal</title>
	<meta charset="UTF-8">
	<link href="style/style1.css" rel="stylesheet"> <!-- Estilo para los formularios -->
	<link href="style/style2.css" rel="stylesheet"> <!-- Estilo para las tablas -->
</head>

<body>
	<?php echo "Bienvenido " . $_SESSION['usuario']; ?>
	<br>
	<?php
	if ($_SESSION['rol'] == 1) {
		echo "Zona de administrador"; ?>
		<form action="" method="POST">
			<select name="selector">
				<option value="1">Administradores</option>
				<option value="0">No Administradores</option>
			</select>
			<input type="submit" value="Enviar">
		</form>
	<?php
	}
	?>
	<br><a href="sesiones1_logout.php"> Salir <a>
</body>

</html>