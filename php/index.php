<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de datos IMSS</title>
</head>

<body>
    <?php
    include('conexion.php');
    ?>
    <a href="ingresar.php"><input type="submit" name="insertar" value="Insertar"></a>
    <input type="submit" name="modificar" value="Modificar">
    <a href="eliminar.php"><input type="submit" name="eliminar" value="Eliminar"></a>
    <input type="submit" name="buscar" value="buscar">

</body>

</html>