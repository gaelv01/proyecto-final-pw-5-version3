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
    include('conexion.php'); // Incluímos la conexión a la base de datos.
    ?>

    <div class="barra verde-c">
        <h1 class="titulo__barra">Insertar datos</h1>
    </div>

    <div class="volver">  <!-- Este será un botón para regresar a la página principal. -->
        <a href="index.php">←</a>
    </div>


    <form method="post" action="" class="formulario">  <!-- Este formulario se encargará de recoger todos los datos que queramos obtener. -->

        <p class="encabezado__formulario">COMPLETE LOS SIGUIENTES CAMPOS</p>

        <p>Nombre:</p>
        <input type="text" name="nombre">
        <p>Apellido Paterno:</p>
        <input type="text" name="apellidop" required>
        <p>Apellido Materno:</p>
        <input type="text" name="apellidom" required>
        <p>Edad:</p>
        <input type="number" name="edad" required>
        <p>Telefono:</p>
        <input type="text" name="telefono" required>
        <p>Correo:</p>
        <input type="text" name="correo" required>
        <p>Estatura:</p>
        <input type="text" name="estatura" required>
        <p>Peso:</p> <input type="text" name="peso" required>
        <p>Tipo de sangre:</p>
        <input type="text" name="sangre" required>
        <p>Motivo:</p>
        <input type="text" name="motivo" required>
        <p>Fecha de la cita:</p>
        <input type="date" name="fecha" required>
        <p>Hora de la cita:</p>
        <input type="time" name="hora" required>

        <input type="submit" name="registrar" value="Registrar">
        <input type="reset" value="Reiniciar">
    </form>

    <?php

    // Datos
    if (isset($_POST['registrar'])) {  // Si el botón de registrar ha sido clickeado correctamente, realizamos el proceso de inserción.


        // Guardamos los datos de método POST en variables, y con trim(), que recorta los espacios accidentales.

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

        # Ésta es la sentencia SQL. En ella se aprecia que insertamos todos los datos de la base en sus respectivos campos.

        $resultado = mysqli_query($conexion, $insertar);

        # Ejecutamos la sentencia SQL adjuntando la conexión establecida.

        // Aquí realizamos el proceso de devolverle el ID al que está registrando los datos...

        $consultar_id = "SELECT id_paciente from citas WHERE telefono = '$telefono'";
        // Seleccionamos el ID del paciente comparandolo con su número de teléfono, ya que este no puede ser diferente.
        $ejecutar = mysqli_query($conexion, $consultar_id); // Ejecutamos la consulta.


        $id = mysqli_fetch_array($ejecutar);

        // Colocamos el resultado de la consulta por medio de un arreglo, en donde las posiciones serán los campos de la base de datos.

        if ($resultado) { // Si el resultado se imprimió correctamente, mostramos un mensaje exitoso con el ID correspondiente.
            echo '<p class="datos">¡Los datos se registraron correctamente! Tu ID es: ' . $id['id_paciente'] . '</p>';
        } else {
            echo '<p class="datos incorrectos">¡Hubo un error al registrar los datos!</p>';
        }
    }


    ?>

</body>

</html>