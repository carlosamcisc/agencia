<?php
include '../conexion.php';

$buscar = "";

if(isset($_GET['buscar'])){
    $buscar = $_GET['buscar'];
}

$sql = "
SELECT v.*, c.nombre_completo
FROM ventas v
INNER JOIN clientes c ON v.id_cliente = c.id_cliente
WHERE v.id_venta LIKE '%$buscar%'
OR c.nombre_completo LIKE '%$buscar%'
";

$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css rel=stylesheet> 
</head>
<body>

<div class="container mt-4">

    <h2>Ventas</h2>

    <a href="agregar.php" class="btn btn-success mb-3">Nueva Venta</a>
     <a href="../index.html" class="btn btn-secondary mb-3">Regresar</a>

    <form method="GET">
        <div class="input-group mb-3">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por ID o cliente">
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
            <th>ID Venta</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($resultado)){ ?>

        <tr>
            <td><?= $row['id_venta'] ?></td>
            <td><?= $row['fecha'] ?></td>
            <td><?= $row['nombre_completo'] ?></td>

            <td>
                <a href="editar.php?id=<?= $row['id_venta'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="eliminar.php?id=<?= $row['id_venta'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('¿Eliminar venta?')">Eliminar</a>
            </td>
        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>