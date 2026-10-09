<?php
include '../conexion.php';

$clientes = mysqli_query($conn, "SELECT * FROM clientes");

if($_POST){

    $fecha = $_POST['fecha'];
    $id_cliente = $_POST['id_cliente'];

    $sql = "
    INSERT INTO ventas (fecha, id_cliente)
    VALUES ('$fecha', '$id_cliente')
    ";

    mysqli_query($conn, $sql);

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nueva Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Nueva Venta</h2>

<form method="POST">

    <label>Fecha</label>
    <input type="date" name="fecha" class="form-control mb-3" required>

    <label>Cliente</label>
    <select name="id_cliente" class="form-select mb-3" required>

        <option value="">Seleccione cliente</option>

        <?php while($c = mysqli_fetch_assoc($clientes)){ ?>
            <option value="<?= $c['id_cliente'] ?>">
                <?= $c['nombre_completo'] ?>
            </option>
        <?php } ?>

    </select>

    <button class="btn btn-success">Guardar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

</form>

</div>

</body>
</html>