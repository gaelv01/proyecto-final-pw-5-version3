<?php  // Este archivo tiene como objetivo mostrar y comprobar la conexión a la base de datos IMSS.

$servidor = "localhost"; # EL servidor se define como localhost ya que se ejecuta desde XAMPP.
$usuario = "root"; # El usuario es raíz, por lo que no tiene ninguna contraseña preestablecida.
$base = "imss"; # Ésta será la base a la cual se conectará php.
$contrasena = ""; # La contraseña va vacía.

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base); // Ingresamos las variables en la función para conectarnos.

/* ------- Aclaración ------ 

    Se utiliza la función mysqli_connect en vez de new mysqli().
    Esto es debido a que la anterior función no muestra los errores como tal,
    muestra advertencias.

    Se puede comprobar esto cambiando la función mencianada anteriormente.

*/


if (!$conexion) {  // Si la conexión falla, entonces le indicamos al usuario el número de error.
    echo "<p class='ok no'>IMSS: ERROR NO. #" . mysqli_connect_errno() . "</p>";
} else {
    echo "<p class='ok'>IMSS: CONECTADO </p>";
} // En caso contrario, mandará un mensaje de conexión exitosa.
