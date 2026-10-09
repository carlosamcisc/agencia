<?php
include '../conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM inventario WHERE id_inventario=$id";

mysqli_query($conn, $sql);

header("Location:index.php");
exit();
?>