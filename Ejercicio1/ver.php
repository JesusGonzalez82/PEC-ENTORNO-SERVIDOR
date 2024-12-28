<?php
session_start();

if(isset($_SESSION['nombre'])){
    echo ("El nombre introducido es " . htmlspecialchars($_SESSION['nombre']). "<br>");
} else{
    echo "No se ha introducido ningún nombre <br>";
}
if (isset($_SESSION['apellidos'])){
    echo ("Los apellidos introducidos son " . htmlspecialchars($_SESSION['apellidos']));
}else {
    echo "No se han introducido los apellidos";
}


