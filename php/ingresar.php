<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de datos</title>
    <link rel="stylesheet" href="../css/estilo_ingresar-datos.css">
</head>


<body>

    <?php
    include('conexion.php');
    ?>


    <form method="post" action="">
        <h1> Base de datos IMSS</h1>
        Nombre: <input type="text" name="nombre">
        Apellido Paterno: <input type="text" name="apellidop" required>
        Apellido Materno <input type="text" name="apellidom" required>
        Edad: <input type="number" name="edad" required>
        Telefono: <input type="text" name="telefono" required>
        Correo: <input type="text" name="correo" required>
        Estatura: <input type="text" name="estatura" required>
        Peso: <input type="text" name="peso" required>
        Tipo Sangre: <input type="text" name="sangre" required>
        Motivo: <input type="text" name="motivo" required>
        Fecha de la cita: <input type="date" name="fecha" required>
        Hora de la cita: <input type="time" name="hora" required>

        <input type="submit" name="registrar" value="Registrar">
        <input type="reset" value="Reiniciar">
    </form>

    <?php

    // Datos
    if (isset($_POST['registrar'])) {

        $nombre = trim($_POST['nombre']);
        $apellidop = trim($_POST['apellidop']);
        $apellidom = trim($_POST['apellidom']);
        $edad = trim($_POST['edad']);
        $telefono = trim($_POST['telefono']);
        $correo = trim($_POST['correo']);
        $estatura = trim($_POST['estatura']);
        $peso = trim($_POST['peso']);
        $sangre = trim($_POST['sangre']);
        $motivo = trim($_POST['motivo']);
        $fecha = trim($_POST['fecha']);
        $hora = trim($_POST['hora']);

        $insertar = "INSERT INTO citas(nombre, apellido_P, apellido_M, edad, telefono, correo, estatura, peso, tipo_sangre, motivo, fecha_cita, hora_cita) VALUES ('$nombre','$apellidop','$apellidom', '$edad','$telefono','$correo','$estatura','$peso','$sangre','$motivo','$fecha','$hora')";

        $resultado = mysqli_query($conexion, $insertar);

        $consultar_id = "SELECT id_paciente from citas WHERE telefono = '$telefono'";
        $ejecutar = mysqli_query($conexion, $consultar_id);


        $id = mysqli_fetch_array($ejecutar);

        if ($resultado) {
            echo '<p class="datos_correctos">¡Los datos se registraron correctamente! Tu ID es: ' . $id['id_paciente'] . '</p>';
        } else {
            echo '<p class="datos_incorrectos">¡Hubo un error al registrar los datos!</p>';
        }
    }


    ?>







</body>

</html>