<?php
include '../conexion.php';

if($_POST){

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $cp = $_POST['cp'];

    $sql = "INSERT INTO clientes
    (
    nombre_completo,
    telefono,
    correo,
    direccion,
    ciudad,
    codigo_postal
    )
    VALUES
    (
    '$nombre',
    '$telefono',
    '$correo',
    '$direccion',
    '$ciudad',
    '$cp'
    )";

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

<h2>Agregar Cliente</h2>

<form method="POST">

<input class="form-control mb-2" name="nombre" placeholder="Nombre">

<input class="form-control mb-2" name="telefono" placeholder="Teléfono">

<input class="form-control mb-2" name="correo" placeholder="Correo">

<input class="form-control mb-2" name="direccion" placeholder="Dirección">

<input class="form-control mb-2" name="ciudad" placeholder="Ciudad">

<input class="form-control mb-2" name="cp" placeholder="Código Postal">

<button class="btn btn-success">
Guardar
</button>

</form>

</div>

</body>
</html>