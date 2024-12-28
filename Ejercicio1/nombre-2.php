<?php

// echo $_POST['nombreInput'];
session_start();
$nombre = htmlspecialchars($_POST['nombreInput'] ?? ''); // utilizamos htmlspecialchars por si hubiera caracteres especiales

if (!empty($nombre)){
    $_SESSION['nombre'] = $nombre;
    header("location: index.php");
    exit;
}else {
    // creamos una alerta con JavaScript para avisar al cliente de que no ha introducido un nombre
    echo "<script>
            alert('Debes Introducir un nombre.');
            window.location.href = 'nombre-1.php';
          </script>";
    exit;
}

?>
