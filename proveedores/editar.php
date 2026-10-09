<?php
include '../conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM proveedores WHERE id_proveedor=$id";
$resultado = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($resultado);

if($_POST){

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $cp = $_POST['cp'];

    $sql = "
    UPDATE proveedores
    SET
        nombre='$nombre',
        telefono='$telefono',
        correo='$correo',
        direccion='$direccion',
        ciudad='$ciudad',
        codigo_postal='$cp'
    WHERE id_proveedor=$id
    ";

    mysqli_query($conn, $sql);

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

<h2>Editar Proveedor</h2>

<form method="POST">

    <input class="form-control mb-2" name="nombre" value="<?= $data['nombre'] ?>" required>
    <input class="form-control mb-2" name="telefono" value="<?= $data['telefono'] ?>">
    <input class="form-control mb-2" name="correo" value="<?= $data['correo'] ?>">
    <input class="form-control mb-2" name="direccion" value="<?= $data['direccion'] ?>">
    <input class="form-control mb-2" name="ciudad" value="<?= $data['ciudad'] ?>">
    <input class="form-control mb-2" name="cp" value="<?= $data['codigo_postal'] ?>">

    <button class="btn btn-warning">Actualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

</form>

</div>

</body>
</html>