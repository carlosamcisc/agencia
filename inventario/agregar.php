<?php
include '../conexion.php';

$vehiculos = mysqli_query($conn, "SELECT * FROM vehiculos");

if($_POST){

    $id_vehiculo = $_POST['id_vehiculo'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO inventario (id_vehiculo, stock, precio)
            VALUES ('$id_vehiculo', '$stock', '$precio')";

    mysqli_query($conn, $sql);

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Agregar Inventario</h2>

<form method="POST">

    <label>Vehículo</label>
    <select name="id_vehiculo" class="form-select mb-3" required>

        <option value="">Seleccione</option>

        <?php while($v = mysqli_fetch_assoc($vehiculos)){ ?>
            <option value="<?= $v['id_vehiculo'] ?>">
                <?= $v['tipo'] ?> - <?= $v['marca'] ?> <?= $v['modelo'] ?>
            </option>
        <?php } ?>

    </select>

    <label>Stock</label>
    <input type="number" name="stock" class="form-control mb-3" required>

    <label>Precio</label>
    <input type="number" step="0.01" name="precio" class="form-control mb-3" required>

    <button class="btn btn-success">Guardar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

</form>

</div>

</body>
</html>