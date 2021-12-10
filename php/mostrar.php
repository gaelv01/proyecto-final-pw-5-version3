<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_buscar.css">
    <title>Buscar Registros</title>
</head>

<body>


    <div class="barra">
        <h1 class="titulo__barra">Todos los registros</h1>
    </div>

    <div class="volver">
        <!-- Este será un botón para regresar a la página para buscar. -->
        <a href="buscar.php">←</a>
    </div>

    <br><br><br>

    <div class="tabla">
        <!-- Mostramos los encabezados de la tabla -->
        <div class="encabezado__tabla">ID</div>
        <div class="encabezado__tabla">Nombre</div>
        <div class="encabezado__tabla">Apellido paterno</div>
        <div class="encabezado__tabla">Apellido materno</div>
        <div class="encabezado__tabla">Edad</div>
        <div class="encabezado__tabla">Teléfono</div>
        <div class="encabezado__tabla">E-mail</div>
        <div class="encabezado__tabla">Estatura (m)</div>
        <div class="encabezado__tabla">Peso (kg)</div>
        <div class="encabezado__tabla">Tipo de sangre</div>
        <div class="encabezado__tabla">Motivo de la cita</div>
        <div class="encabezado__tabla">Fecha de la cita</div>
        <div class="encabezado__tabla">Hora de la cita</div>
    </div>

    <?php
    include("conexion.php"); // Incluímos la conexion a la base de datos.

    $consulta = "SELECT * FROM citas";
    // Consulta SQL para mostrar todos los registros
    $ejecutar = mysqli_query($conexion, $consulta);
    // Ejecutamos.

    while ($registros = mysqli_fetch_array($ejecutar)) {


        /* Mientras existan registros, se van a ir imprimiendo con las sentencias HTML. */


    ?>
        <!-- Mostramos los arreglos. -->
        <div class="tabla">
            <div class="elemento__tabla"><?= $registros['id_paciente']; ?></div>
            <div class="elemento__tabla"><?= $registros['nombre']; ?></div>
            <div class="elemento__tabla"><?= $registros['apellido_P']; ?></div>
            <div class="elemento__tabla"><?= $registros['apellido_M']; ?></div>
            <div class="elemento__tabla"><?= $registros['edad']; ?></div>
            <div class="elemento__tabla"><?= $registros['telefono']; ?></div>
            <div class="elemento__tabla"><?= $registros['correo']; ?></div>
            <div class="elemento__tabla"><?= $registros['estatura']; ?></div>
            <div class="elemento__tabla"><?= $registros['peso']; ?></div>
            <div class="elemento__tabla"><?= $registros['tipo_sangre']; ?></div>
            <div class="elemento__tabla"><?= $registros['motivo']; ?></div>
            <div class="elemento__tabla"><?= $registros['fecha_cita']; ?></div>
            <div class="elemento__tabla"><?= $registros['hora_cita']; ?></div>
        </div>

    <?php } ?>





</body>

</html>