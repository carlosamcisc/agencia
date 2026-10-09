<?php
include '../conexion.php';

$buscar = "";

if(isset($_GET['buscar'])){
    $buscar = $_GET['buscar'];
}

$sql = "
SELECT i.*, v.marca, v.modelo, v.tipo
FROM inventario i
INNER JOIN vehiculos v ON i.id_vehiculo = v.id_vehiculo
WHERE i.id_inventario LIKE '%$buscar%'
OR v.marca LIKE '%$buscar%'
OR v.modelo LIKE '%$buscar%'
";

$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css rel=stylesheet> 
</head>
<body>

<div class="container mt-4">

    <h2>Inventario</h2>

    <a href="agregar.php" class="btn btn-success mb-3">Agregar</a>
    <a href="../index.html" class="btn btn-secondary mb-3">Regresar</a>

    <form method="GET">
        <div class="input-group mb-3">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por ID, marca o modelo">
                        <button class="btn btn-primary">
            <i class="bi bi-search"></i> Buscar
            </button>

            <a href="index.php" class="btn btn-success ms-2">
            <i class="bi bi-x-circle"></i> Limpiar busqueda
            </a>
        </div>
    </form>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Vehículo</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($resultado)){ ?>

        <tr>
            <td><?= $row['id_inventario'] ?></td>
            <td><?= $row['tipo'] ?> - <?= $row['marca'] ?> <?= $row['modelo'] ?></td>
            <td><?= $row['stock'] ?></td>
            <td>$<?= $row['precio'] ?></td>

            <td>
                <a href="editar.php?id=<?= $row['id_inventario'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="eliminar.php?id=<?= $row['id_inventario'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('¿Eliminar registro?')">Eliminar</a>
            </td>
        </tr>

        <?php } ?>

        </tbody>
    </table>

</div>

</body>
</html>