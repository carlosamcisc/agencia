<?php
include '../conexion.php';

$id = $_GET['id'];

$clientes = mysqli_query($conn, "SELECT * FROM clientes");

$sql = "SELECT * FROM ventas WHERE id_venta=$id";
$resultado = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($resultado);

if($_POST){

    $fecha = $_POST['fecha'];
    $id_cliente = $_POST['id_cliente'];

    $sql = "
    UPDATE ventas
    SET fecha='$fecha',
        id_cliente='$id_cliente'
    WHERE id_venta=$id
    ";

    mysqli_query($conn, $sql);

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Editar Venta</h2>

<form method="POST">

    <label>Fecha</label>
    <input type="date" name="fecha" class="form-control mb-3"
           value="<?= $data['fecha'] ?>" required>

    <label>Cliente</label>
    <select name="id_cliente" class="form-select mb-3">

        <?php while($c = mysqli_fetch_assoc($clientes)){ ?>

            <option value="<?= $c['id_cliente'] ?>"
                <?= ($c['id_cliente'] == $data['id_cliente']) ? 'selected' : '' ?>>

                <?= $c['nombre_completo'] ?>

            </option>

        <?php } ?>

    </select>

    <button class="btn btn-warning">Actualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

</form>

</div>

</body>
</html>