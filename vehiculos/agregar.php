<?php
include '../conexion.php';

if($_POST){

    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];

    $sql = "
    INSERT INTO vehiculos
    (
        tipo,
        marca,
        modelo,
        anio
    )
    VALUES
    (
        '$tipo',
        '$marca',
        '$modelo',
        '$anio'
    )";

    mysqli_query($conn, $sql);

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Vehículo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Agregar Vehículo</h2>

    <form method="POST">

        <label>Tipo</label>

        <select name="tipo" class="form-select mb-3" required>

            <option value="">Seleccione</option>
            <option value="Auto">Auto</option>
            <option value="Moto">Moto</option>

        </select>

        <label>Marca</label>

        <input
            type="text"
            name="marca"
            class="form-control mb-3"
            required>

        <label>Modelo</label>

        <input
            type="text"
            name="modelo"
            class="form-control mb-3"
            required>

        <label>Año</label>

        <input
            type="number"
            name="anio"
            min="1900"
            max="2100"
            class="form-control mb-3"
            required>

        <button class="btn btn-success">
            Guardar
        </button>

        <a href="index.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

</body>
</html>