<?php

include '../conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM vehiculos WHERE id_vehiculo = $id";

$resultado = mysqli_query($conn, $sql);

$vehiculo = mysqli_fetch_assoc($resultado);

if($_POST){

    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];

    $sql = "
    UPDATE vehiculos
    SET
        tipo='$tipo',
        marca='$marca',
        modelo='$modelo',
        anio='$anio'
    WHERE id_vehiculo=$id
    ";

    mysqli_query($conn, $sql);

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Vehículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Editar Vehículo</h2>

    <form method="POST">

        <label>Tipo</label>

        <select name="tipo" class="form-select mb-3">

            <option value="Auto"
                <?= ($vehiculo['tipo'] == 'Auto') ? 'selected' : '' ?>>
                Auto
            </option>

            <option value="Moto"
                <?= ($vehiculo['tipo'] == 'Moto') ? 'selected' : '' ?>>
                Moto
            </option>

        </select>

        <label>Marca</label>

        <input
            type="text"
            name="marca"
            value="<?= $vehiculo['marca'] ?>"
            class="form-control mb-3">

        <label>Modelo</label>

        <input
            type="text"
            name="modelo"
            value="<?= $vehiculo['modelo'] ?>"
            class="form-control mb-3">

        <label>Año</label>

        <input
            type="number"
            name="anio"
            value="<?= $vehiculo['anio'] ?>"
            class="form-control mb-3">

        <button class="btn btn-warning">
            Actualizar
        </button>

        <a href="index.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

</body>
</html>