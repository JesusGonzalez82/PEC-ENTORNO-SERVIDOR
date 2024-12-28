<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre-1.php</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['nombre'])){
        echo htmlspecialchars($_SESSION['nombre']);
    }else {
        echo "Debes introducir tu nombre";?>
        <form action="nombre-2.php" method="post">
        <!-- Creamos el boton para hacer la petición -->
         <label for="nombreLabel">Introduce tu nombre: </label>
         <input type="text" name="nombreInput" id="nombreInput"><br>
         <input type="submit" value="Enviar">
    </form>
    <?php
    }
    ?>
    
</body>
</html>