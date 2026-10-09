<?php
include '../conexion.php';

$buscar = "";

if(isset($_GET['buscar'])){
    $buscar = $_GET['buscar'];
}

$sql = "
SELECT *
FROM vehiculos
WHERE id_vehiculo LIKE '%$buscar%'
OR marca LIKE '%$buscar%'
OR modelo LIKE '%$buscar%'
";

$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vehículos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css rel=stylesheet> 
</head>
<body>

<div class="container mt-4">

    <h2>Vehículos</h2>

    <a href="agregar.php" class="btn btn-success mb-3">
        Agregar Vehículo
    </a>

    <a href="../index.html" class="btn btn-secondary mb-3">Regresar</a>

    <form method="GET">

        <div class="input-group mb-3">

            <input
                type="text"
                name="buscar"
                class="form-control"
                placeholder="Buscar por ID, Marca o Modelo">

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
            <th>Tipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Acciones</th>
        </tr>

        </thead>

        <tbody>

        <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

            <tr>

                <td><?= $fila['id_vehiculo'] ?></td>
                <td><?= $fila['tipo'] ?></td>
                <td><?= $fila['marca'] ?></td>
                <td><?= $fila['modelo'] ?></td>
                <td><?= $fila['anio'] ?></td>

                <td>

                    <a
                        href="editar.php?id=<?= $fila['id_vehiculo'] ?>"
                        class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <a
                        href="eliminar.php?id=<?= $fila['id_vehiculo'] ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Desea eliminar este vehículo?')">
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>