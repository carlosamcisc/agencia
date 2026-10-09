<?php
include '../conexion.php';

$buscar = "";

if(isset($_GET['buscar'])){
    $buscar = $_GET['buscar'];
}

$sql = "
SELECT *
FROM clientes
WHERE id_cliente LIKE '%$buscar%'
OR nombre_completo LIKE '%$buscar%'
";

$resultado = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Clientes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link href=https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css rel=stylesheet> 

</head>

<body>

<div class="container mt-4">

<h2>Clientes</h2>

<a href="agregar.php" class="btn btn-success mb-3">
Agregar Cliente
</a>
 <a href="../index.html" class="btn btn-secondary mb-3">Regresar</a>
<form method="GET">

<div class="input-group mb-3">

<input
type="text"
name="buscar"
class="form-control"
placeholder="Buscar por ID o Nombre">

<button class="btn btn-primary">
<i class="bi bi-search"></i> Buscar
</button>

<a href="index.php" class="btn btn-success ms-2">
<i class="bi bi-x-circle"></i> Limpiar busqueda
</a>


</div>

</form>

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Teléfono</th>
<th>Correo</th>
<th>Dirreccion</th>
<th>Ciudad</th>
<th>Codigo postal</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

<tr>

<td><?= $fila['id_cliente'] ?></td>

<td><?= $fila['nombre_completo'] ?></td>

<td><?= $fila['telefono'] ?></td>

<td><?= $fila['correo'] ?></td>

<td><?= $fila['direccion'] ?></td>

<td><?= $fila['ciudad'] ?></td>

<td><?= $fila['codigo_postal'] ?></td>

<td>

<a href="editar.php?id=<?= $fila['id_cliente'] ?>"
class="btn btn-warning">
Editar
</a>

<a href="eliminar.php?id=<?= $fila['id_cliente'] ?>"
class="btn btn-danger"
onclick="return confirm('¿Eliminar cliente?')">
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