<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apellidos-1.php</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['apellidos'])) {
        echo htmlspecialchars($_SESSION['apellidos']);
    } else {
        echo "Debes introducir tu apellido"; ?>
        <br><br>
        <form action="apellidos-2.php" method="post">
            <!-- Creamos los botones para hacer la petición -->
            <label for="apellido1Input">Introduce tu primer apellido: </label>
            <input type="text" name="apellido1Input" id="apellido1Input"><br><br>
            <label for="apellido2Input">Introduce tu segundo apellido: </label>
            <input type="text" name="apellido2Input" id="apellido2Input"><br><br>
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    ?>

</body>

</html>