<?php
include '../conexion.php';

$id = $_GET['id'];

$vehiculos = mysqli_query($conn, "SELECT * FROM vehiculos");

$sql = "
SELECT * FROM inventario WHERE id_inventario=$id
";

$resultado = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($resultado);

if($_POST){

    $id_vehiculo = $_POST['id_vehiculo'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];

    $sql = "
    UPDATE inventario
    SET id_vehiculo='$id_vehiculo',
        stock='$stock',
        precio='$precio'
    WHERE id_inventario=$id
    ";

    mysqli_query($conn, $sql);

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Editar Inventario</h2>

<form method="POST">

    <label>Vehículo</label>
    <select name="id_vehiculo" class="form-select mb-3">

        <?php while($v = mysqli_fetch_assoc($vehiculos)){ ?>

            <option value="<?= $v['id_vehiculo'] ?>"
                <?= ($v['id_vehiculo'] == $data['id_vehiculo']) ? 'selected' : '' ?>>

                <?= $v['tipo'] ?> - <?= $v['marca'] ?> <?= $v['modelo'] ?>

            </option>

        <?php } ?>

    </select>

    <label>Stock</label>
    <input type="number" name="stock" value="<?= $data['stock'] ?>" class="form-control mb-3">

    <label>Precio</label>
    <input type="number" step="0.01" name="precio" value="<?= $data['precio'] ?>" class="form-control mb-3">

    <button class="btn btn-warning">Actualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

</form>

</div>

</body>
</html>