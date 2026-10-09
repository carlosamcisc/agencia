<?php
include '../conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM ventas WHERE id_venta=$id";

mysqli_query($conn, $sql);

header("Location:index.php");
exit();
?>