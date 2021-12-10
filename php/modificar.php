<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_editar.css">
    <title>Modificar Registros</title>
</head>

<body>

    <div class="barra amarillo-c">
        <h1 class="titulo__barra">Modificar Datos</h1>
    </div>


    <div class="volver">
        <!-- Volver a la página principal. -->
        <a href="index.php">←</a>
    </div>

    <form action="" method="post" class="formulario-id">
        <!-- Este primer formulario solicita el ID que se desee modificar. -->

        Digita el ID que desea modificar: <input type="number" name="id" placeholder="ID">
        <input type="submit" value="Modificar" name="modificar">
    </form>

    <?php
    include("conexion.php"); // Incluimos la conexión a la base de datos.
    if (isset($_POST['modificar'])) { // Si el botón de modificar se ha clickeado correctamente, realizamos el proceso de modificar.
        $id = $_POST['id']; // Guardamos el ID.


        $consulta_id = "SELECT id_paciente FROM citas WHERE id_paciente = $id";

        //Sentencia SQL para validar el ID.
        $ejecutar = mysqli_query($conexion, $consulta_id);
        $convertir_i = mysqli_fetch_array($ejecutar);
        $id_convertido = $convertir_i['id_paciente'];

        // Ejecutamos y convertimos el ID a un arreglo.

        if ($id_convertido) { // Si el ID convertido existe, entonces realiza la busqueda para modificar.
            $buscar = "SELECT * FROM citas WHERE id_paciente=$id";
            $consulta = mysqli_query($conexion, $buscar) or die("No se pudo encontrar ese registro");
            // Comando y ejecución SQL para seleccionar los datos asociados con el ID.

            while ($registros = mysqli_fetch_array($consulta)) { // Imprimimos los datos asociados con el ID.

    ?>

                <form class="tabla-actualizacion" method="post" action="">
                    <!-- Forumlario para actualizar los datos. -->
                    <div class="titulo__tabla-actualizacion">Datos encontrados</div>
                    <div class="encabezado__tabla-actualizacion">ID:</div>
                    <input class="campo__tabla-actualizacion" type="number" name="id_nuevo" readonly="readonly" value="<?= $registros['id_paciente']; ?>">
                    <div class="encabezado__tabla-actualizacion">Nombre:</div>
                    <input class="campo__tabla-actualizacion" type="text" name="nombre" value="<?= $registros['nombre']; ?>">
                    <div class="encabezado__tabla-actualizacion">Apellido paterno:</div>
                    <input class="campo__tabla-actualizacion" type="text" name="apellidop" value="<?= $registros['apellido_P']; ?>">
                    <div class="encabezado__tabla-actualizacion">Apellido materno:</div>
                    <input class="campo__tabla-actualizacion" type="text" name="apellidom" value="<?= $registros['apellido_M']; ?>">
                    <div class="encabezado__tabla-actualizacion">Edad:</div>
                    <input class="campo__tabla-actualizacion" type="number" name="edad" value="<?= $registros['edad']; ?>">
                    <div class="encabezado__tabla-actualizacion">Teléfono:</div>
                    <input class="campo__tabla-actualizacion" type="text" name="telefono" value="<?= $registros['telefono']; ?>">
                    <div class="encabezado__tabla-actualizacion">E-mail:</div>
                    <input class="campo__tabla-actualizacion" type="email" name="correo" value="<?= $registros['correo']; ?>">
                    <div class="encabezado__tabla-actualizacion">Estatura (m):</div>
                    <input class="campo__tabla-actualizacion" type="text" name="estatura" value="<?= $registros['estatura']; ?>">
                    <div class="encabezado__tabla-actualizacion">Peso (kg):</div>
                    <input class="campo__tabla-actualizacion" type="text" name="peso" value="<?= $registros['peso']; ?>">
                    <div class="encabezado__tabla-actualizacion">Tipo de sangre:</div>
                    <input class="campo__tabla-actualizacion" type="text" name="sangre" value="<?= $registros['tipo_sangre']; ?>">
                    <div class="encabezado__tabla-actualizacion">Motivo:</div>
                    <input class="campo__tabla-actualizacion" type="text" name="motivo" value="<?= $registros['motivo']; ?>">
                    <div class="encabezado__tabla-actualizacion">Fecha de la cita:</div>
                    <input class="campo__tabla-actualizacion" type="date" name="fecha_cita" value="<?= $registros['fecha_cita']; ?>">
                    <div class="encabezado__tabla-actualizacion">Hora de la cita:</div>
                    <input class="campo__tabla-actualizacion" type="time" name="hora_cita" value="<?= $registros['hora_cita']; ?>">

                    <input type="submit" value="Actualizar" name="actualizar">
                    <!-- Botón para actualizar. -->
                </form>


    <?php



            }
        } else { // Cuando el ID no existe, se mostrará un mensaje de error.
            echo "<p class='datos incorrectos'>¡El ID especificado no existe!</p>";
        }
    }

    ?>

    <?php


    if (isset($_POST['actualizar'])) { // Cuando el botón para actualizar se ha clickeado correctamente, realizamos el proceso de actualización.


        $nvID = $_POST['id_nuevo'];
        $nvNombre = $_POST['nombre'];
        $nvApellidoP = $_POST['apellidop'];
        $nvApellidoM = $_POST['apellidom'];
        $nvEdad = $_POST['edad'];
        $nvTelefono = $_POST['telefono'];
        $nvCorreo = $_POST['correo'];
        $nvEstatura = $_POST['estatura'];
        $nvPeso = $_POST['peso'];
        $nvSangre = $_POST['sangre'];
        $nvMotivo = $_POST['motivo'];
        $nvFecha = $_POST['fecha_cita'];
        $nvHora = $_POST['hora_cita'];

        /* Guardamos las nuevas variables. */




        $actualizar = "UPDATE citas SET nombre = '$nvNombre', apellido_P = '$nvApellidoP', apellido_M = '$nvApellidoM', edad = '$nvEdad', telefono = '$nvTelefono', correo = '$nvCorreo', estatura = '$nvEstatura', peso = '$nvPeso', tipo_sangre = '$nvSangre', motivo = '$nvMotivo',fecha_cita = '$nvFecha', hora_cita = '$nvHora' WHERE id_paciente LIKE '$nvID'";

        /* Sentencia SQL para actualizar los datos en la tabla.*/

        $realizar = mysqli_query($conexion, $actualizar);
        // Ejecutamos la actualización.

        if (!$realizar) { // Si hubo un error al actualizar los datos, lo muestra en un mensaje.
            echo "<p class='datos incorrectos'>¡Error al actualizar!</p>";
        } else { // En caso contrario, mostrar un mensaje que indique que los datos se actualizaron exitosamente.
            echo "<p class='datos'>¡Datos actualizados correctamente!</p>";
        }
    }
    ?>

</body>

</html>