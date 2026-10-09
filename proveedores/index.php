<?php
include '../conexion.php';

$buscar = "";

if(isset($_GET['buscar'])){
    $buscar = $_GET['buscar'];
}

$sql = "
SELECT *
FROM proveedores
WHERE id_proveedor LIKE '%$buscar%'
OR nombre LIKE '%$buscar%'
OR ciudad LIKE '%$buscar%'
";

$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css rel=stylesheet> 
</head>
<body>

<div class="container mt-4">

    <h2>Proveedores</h2>

    <a href="agregar.php" class="btn btn-success mb-3">Agregar Proveedor</a>
    <a href="../index.html" class="btn btn-secondary mb-3">Regresar</a>

    <form method="GET">
        <div class="input-group mb-3">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por ID, nombre o ciudad">
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
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Ciudad</th>
                    <th>Codigo Postal</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($resultado)){ ?>

        <tr>
            <td><?= $row['id_proveedor'] ?></td>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['telefono'] ?></td>
            <td><?= $row['correo'] ?></td>
            <td><?= $row['ciudad'] ?></td>
            <td><?= $row['codigo_postal'] ?></td>

            <td>
                <a href="editar.php?id=<?= $row['id_proveedor'] ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="eliminar.php?id=<?= $row['id_proveedor'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('¿Eliminar proveedor?')">Eliminar</a>
            </td>
        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>