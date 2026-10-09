<?php

include '../conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id_cliente=$id";

$resultado = mysqli_query($conn,$sql);

$cliente = mysqli_fetch_assoc($resultado);

if($_POST){

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$cp = $_POST['cp'];

$sql = "
UPDATE clientes
SET
nombre_completo='$nombre',
telefono='$telefono',
correo='$correo',
direccion='$direccion',
ciudad='$ciudad',
codigo_postal='$cp'
WHERE id_cliente=$id
";

mysqli_query($conn,$sql);

header("Location:index.php");

}
?>

<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Editar Cliente</h2>

<form method="POST">

<input class="form-control mb-2"
name="nombre"
value="<?= $cliente['nombre_completo'] ?>">

<input class="form-control mb-2"
name="telefono"
value="<?= $cliente['telefono'] ?>">

<input class="form-control mb-2"
name="correo"
value="<?= $cliente['correo'] ?>">

<input class="form-control mb-2"
name="direccion"
value="<?= $cliente['direccion'] ?>">

<input class="form-control mb-2"
name="ciudad"
value="<?= $cliente['ciudad'] ?>">

<input class="form-control mb-2"
name="cp"
value="<?= $cliente['codigo_postal'] ?>">

<button class="btn btn-warning">
Actualizar
</button>

</form>

</div>

</body>
</html>