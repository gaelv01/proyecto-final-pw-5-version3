<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de datos IMSS</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <?php
    include('conexion.php');  // Incluímos la conexión a la base de datos. En pantalla se nos mostrará el estatus de la base.
    ?>

    <div class="barra">
        <h1 class="titulo__barra">Base de datos IMSS</h1>
    </div>

    <div class="acciones"> <!-- Una pequeña bienvenida :3 -->
        <h2 class="titulo__acciones">¡Bienvenid@!</h2>
        <p class="texto__acciones"> Sé bienvenid@ al sistema de gestión de registros del IMSS. <br>
            <b>¡Selecciona una acción para comenzar!</b>
        </p>

        <div class="botones">
            <!--- Aquí podemos elegir las diferentes operaciones en la base de datos del IMSS. --->
            <a href="ingresar.php" class="verde">Insertar datos</a> <!-- Insertar datos -->
            <a href="buscar.php" class="azul">Buscar datos</a> <!-- Buscar datos -->
            <a href="modificar.php" class="amarillo">Modificar datos</a> <!-- Modificar los datos -->
            <a href="eliminar.php" class="rojo">Eliminar datos</a> <!-- Eliminar los datos -->
        </div>
    </div>



    <div class="integrantes">  <!-- Esto muestra los integrantes del equipo. -->
        <p class="texto__integrantes encabezado">Realizado por:</p>
        <p class="texto__integrantes">Gael Vivas Nieto</p>
        <p class="texto__integrantes">Daniela Berenice Mendoza Ortega</p>
        <p class="texto__integrantes">Victor Leonardo Ruiz Nieves</p>
    </div>

</body>

</html>