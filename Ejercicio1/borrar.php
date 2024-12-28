<?php
session_start();

if (session_destroy()) {
    echo "<script>
            alert('La sesión ha sido destruida.');
            window.location.href = 'index.php';
          </script>";
} else {

    echo "<script>
            alert('Hubo un problema y no se pudo destruir la sesión.');
            window.location.href = 'index.php';
          </script>";
}
exit;
