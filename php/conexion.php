<?php

$servidor = "localhost";
$usuario = "root";
$base = "imss";
$contrasena = "";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base);

if (!$conexion) {
    echo "<p class='no'>Conexion fallida, codigo #" . mysqli_connect_errno() . "</p>";
} else {
    echo "<p class='ok'>Conexion exitosa </p>";
}
