<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_eliminar.css">
    <title>Eliminar registros</title>
</head>

<body>


    <form action="" method="post">
        <h1 class="titulo">Eliminar registros</h1>
        Digita el ID que desea borrar: <input type="number" name="id" placeholder="ID">
        <input type="submit" value="Eliminar" name="eliminar">
    </form>

    <?php
    include("conexion.php");
    if (isset($_POST['eliminar'])) {

        $id = $_POST['id'];


        $consulta_id = "SELECT id_paciente FROM citas WHERE id_paciente = $id";
        $ejecutar = mysqli_query($conexion, $consulta_id);
        $convertir_i = mysqli_fetch_array($ejecutar);

        $id_convertido = $convertir_i['id_paciente'];


        if ($id_convertido) {
            $eliminar = "DELETE FROM citas WHERE id_paciente = $id";
            $ejecutar_eliminacion = mysqli_query($conexion, $eliminar);
            if ($ejecutar_eliminacion) {
                echo "Se eliminó correctamente";
            }
        } else {
            echo "NO existe el ID especificado";
        }
        mysqli_close($conexion);
    }
    ?>





</body>

</html>