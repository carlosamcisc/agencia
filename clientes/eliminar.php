<?php

include '../conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE id_cliente=$id";

mysqli_query($conn,$sql);

header("Location:index.php");