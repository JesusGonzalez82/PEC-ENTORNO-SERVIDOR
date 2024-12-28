<?php

// echo $_POST['nombreInput'];
session_start();
$apellido1 = trim(htmlspecialchars($_POST['apellido1Input'] ?? ''));
$apellido2 = trim(htmlspecialchars($_POST['apellido2Input'] ?? ''));

if (!empty($apellido1) && !empty($apellido2)){
    $_SESSION['apellidos'] = $apellido1 . " " . $apellido2;
    header("location: index.php");
    exit; // Detenemos después de la redirección
}else {
    echo "<script>
            alert('Debes Introducir ambos apellidos.');
            window.location.href = 'apellidos-1.php';
          </script>";
    exit;
}

?>