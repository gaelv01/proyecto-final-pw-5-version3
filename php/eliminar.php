<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_eliminar-datos.css">
    <title>Eliminar registros</title>
</head>

<body>

    <div class="barra rojo-c">
        <h1 class="titulo__barra">Eliminar registros</h1>
    </div>

    <div class="volver">
        <!-- Este será un botón para regresar a la página principal. -->
        <a href="index.php">←</a>
    </div>


    <form action="" method="post">
        <!-- Este formulario se encarga de seleccionar el ID que se desea eliminar. -->

        Digite el ID que desea borrar: <input type="number" name="id" placeholder="ID">

        <input type="submit" value="Eliminar" name="eliminar">
    </form>

    <?php
    include("conexion.php");  // Incluímos la conexion de la base de datos.

    if (isset($_POST['eliminar'])) {  // Si el botón de eliminar es clickeado correctamente, realizamos el proceso de eliminación.

        $id = $_POST['id']; // Recibimos el ID a través del POST.


        $consulta_id = "SELECT id_paciente FROM citas WHERE id_paciente = $id"; // Consultamos que el ID exista.
        $ejecutar = mysqli_query($conexion, $consulta_id); // Ejecutamos.
        $convertir_i = mysqli_fetch_array($ejecutar); // Convertimos el ID en un arreglo.

        /* AQUÍ COMPROBAMOS EL ID DIGITADO: SI EXISTE, PROCEDE CON LA ELIMINACIÓN, SI NO, SE ENVÍA UN MENSAJE DE ERROR.*/


        $id_convertido = $convertir_i['id_paciente'];

        /* Guardamos el ID convertido. */


        if ($id_convertido) {  // SI EL ID CONVERTIDO EXISTE, PROCEDEMOS CON LA ELIMINACIÓN
            $eliminar = "DELETE FROM citas WHERE id_paciente = $id";
            $ejecutar_eliminacion = mysqli_query($conexion, $eliminar);
            if ($ejecutar_eliminacion) { // Se hace saber si se eliminó el ID.
                echo "<p class='datos'>Se eliminó correctamente</p>";
            }
        } else {
            echo "<p class='datos incorrectos'>No existe el ID especificado</p>";
        }
        mysqli_close($conexion); // Cerramos la conexión por seguridad.
    }
    ?>


</body>

</html>