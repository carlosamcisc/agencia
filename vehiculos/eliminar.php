<?php

include '../conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM vehiculos WHERE id_vehiculo = $id";

mysqli_query($conn, $sql);

header("Location:index.php");
exit();
?>