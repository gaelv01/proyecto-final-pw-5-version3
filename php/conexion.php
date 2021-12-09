<?php

$servidor = "localhost";
$usuario = "root";
$base = "imss";
$contrasena = "";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base);

if (!$conexion) {
    echo "<p class='ok no'>IMSS: ERROR NO. #" . mysqli_connect_errno() . "</p>";
} else {
    echo "<p class='ok'>IMSS: CONECTADO </p>";
}
