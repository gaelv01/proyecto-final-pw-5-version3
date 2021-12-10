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
        <h1 class="titulo__barra">Buscar Registros</h1>
    </div>

    <div class="volver">
        <!-- Este será un botón para regresar a la página principal. -->
        <a href="index.php">←</a>
    </div>


    <form action="" method="post"> <!-- Este es el formulario para buscar un registro por ID. -->

        Digite el ID que desea consultar: <input type="number" name="id" placeholder="ID">
        <input type="submit" value="Buscar" name="buscar">

        <!-- Aquí hay una opción para mostrar todos los registros de la tabla. -->
        <a href="mostrar.php">ó revise todos los registros...</a>
    </form>

    <?php
    include("conexion.php");  // Incluímos la conexión a la base de datos.
    if (isset($_POST['buscar'])) { // Si el botón de buscar está activado, procedemos a buscar.
        $id = $_POST['id']; // Guardamos el ID.


        $consulta_id = "SELECT id_paciente FROM citas WHERE id_paciente = $id";
        // Seleccionamos el ID en SQL para comprobar su existencia.
        $ejecutar = mysqli_query($conexion, $consulta_id);

        $convertir_i = mysqli_fetch_array($ejecutar);
        $id_convertido = $convertir_i['id_paciente'];
        // Convertimos el ID guardado a un arreglo para poder evaluarlo.

        if ($id_convertido) {  // Si el id convertido existe, procedemos a realizar la búsqueda.

            $buscar = "SELECT * FROM citas WHERE id_paciente=$id";
            // Comando SQL para buscar el id.
            $consulta = mysqli_query($conexion, $buscar) or die("No se pudo encontrar ese registro");
            // Ejecutamos la consulta.

            while ($registros = mysqli_fetch_array($consulta)) {
                
                /* Mientras existan registros, se van a ir imprimiendo con las sentencias HTML. */
                
                ?>

                <div class="tabla">
                    <div class="titulo__tabla">Resultado de la búsqueda</div>
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
                    <!-- Mostramos los arreglos. -->
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

    <?php
            }
        } else { // En caso de que el ID sea inválido, se manda un mensja diciendo que no existe.
            echo "<p class='datos incorrectos'>¡Ese registro no existe!</p>";
        }
    }

    ?>

</body>

</html>