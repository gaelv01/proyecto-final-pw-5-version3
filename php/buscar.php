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

    <div class="barra verde-c">
        <h1 class="titulo__barra">Buscar datos</h1>
    </div>

    <div class="volver">
        <a href="index.php">←</a>
    </div>

    <form action="" method="post">
        Digita el ID que deseas consultar: <input type="number" name="id" placeholder="ID">
        <input type="submit" value="Buscar" name="buscar">
    </form>

    <?php
    include("conexion.php");
    if (isset($_POST['buscar'])) {
        $id = $_POST['id'];


        $consulta_id = "SELECT id_paciente FROM citas WHERE id_paciente = $id";
        $ejecutar = mysqli_query($conexion, $consulta_id);
        $convertir_i = mysqli_fetch_array($ejecutar);
        $id_convertido = $convertir_i['id_paciente'];

        if ($id_convertido) {

            $buscar = "SELECT * FROM citas WHERE id_paciente=$id";
            $consulta = mysqli_query($conexion, $buscar) or die("No se pudo encontrar ese registro");

            while ($registros = mysqli_fetch_array($consulta)) : ?>

                <div class="tabla">
                    <div class="titulo__tabla">Resultados de la búsqueda</div>
                    <div class="encabezado__tabla">ID</div>
                    <div class="encabezado__tabla">Nombre</div>
                    <div class="encabezado__tabla">Apellido paterno</div>
                    <div class="encabezado__tabla">Apellido materno</div>
                    <div class="encabezado__tabla">Edad</div>
                    <div class="encabezado__tabla">Teléfono</div>
                    <div class="encabezado__tabla">Correo electrónico</div>
                    <div class="encabezado__tabla">Estatura en metros</div>
                    <div class="encabezado__tabla">Peso en kilogramos</div>
                    <div class="encabezado__tabla">Tipo de sangre</div>
                    <div class="encabezado__tabla">Motivo de la cita</div>
                    <div class="encabezado__tabla">Fecha de la cita</div>
                    <div class="encabezado__tabla">Hora de la cita</div>
                    <div class="elemento__tabla"> <?= $registros['id_paciente']; ?> </div>
                    <div class="elemento__tabla"> <?= $registros['nombre']; ?> </div>
                    <div class="elemento__tabla"> <?= $registros['apellido_P']; ?> </div>
                    <div class="elemento__tabla"> <?= $registros['apellido_M']; ?> </div>
                    <div class="elemento__tabla"><?= $registros['edad']; ?> </div>
                    <div class="elemento__tabla"><?= $registros['telefono']; ?> </div>
                    <div class="elemento__tabla"><?= $registros['correo']; ?> </div>
                    <div class="elemento__tabla"><?= $registros['estatura']; ?> </div>
                    <div class="elemento__tabla"><?= $registros['peso']; ?> </div>
                    <div class="elemento__tabla"><?= $registros['tipo_sangre']; ?> </div>
                    <div class="elemento__tabla"><?= $registros['motivo']; ?> </div>
                    <div class="elemento__tabla"><?= $registros['fecha_cita']; ?> </div>
                    <div class="elemento__tabla"><?= $registros['hora_cita']; ?> </div>
                </div>




    <?php endwhile;
        } else {
            echo "<p class='datos incorrectos'>El registro que estás buscando no existe. </p>";
        }
    }

    ?>

</body>

</html>