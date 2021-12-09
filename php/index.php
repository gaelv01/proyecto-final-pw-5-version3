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
    include('conexion.php');
    ?>

    <div class="barra">
        <h1 class="titulo__barra">Base de datos IMSS</h1>
    </div>

    <div class="acciones">
        <h2 class="titulo__acciones">¡Bienvenid@!</h2>
        <p class="texto__acciones"> Sé bienvenid@ al sistema de gestión de registros del IMSS. <br>
        <b>¡Selecciona una acción para comenzar!</b> </p>

        <div class="botones">
            <a href="ingresar.php" class="verde">Insertar datos</a>
            <a href="buscar.php" class="azul">Buscar datos</a>
            <a href="" class="amarillo">Modificar datos</a>
            <a href="eliminar.php" class="rojo">Eliminar datos</a>
        </div>
    </div>



    <div class="integrantes">
        <p class="texto__integrantes encabezado">Realizado por:</p>
        <p class="texto__integrantes">Gael Vivas Nieto</p>
        <p class="texto__integrantes">Daniela Berenice Mendoza Ortega</p>
        <p class="texto__integrantes">Victor Leonardo Ruiz Nieves</p>
    </div>

</body>

</html>