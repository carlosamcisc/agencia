<?php
include '../conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM proveedores WHERE id_proveedor=$id";

mysqli_query($conn, $sql);

header("Location:index.php");
exit();
?>