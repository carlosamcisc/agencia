<?php

$config = parse_ini_file(__DIR__ . '/.env', false, INI_SCANNER_RAW);

if ($config === false) {
    die("Error: no se pudo leer el archivo .env.");
}

foreach (['host', 'user', 'password', 'database'] as $key) {
    if (!array_key_exists($key, $config)) {
        die("Error: falta la variable '$key' en el archivo .env.");
    }
}

$conn = mysqli_connect(
    $config['host'],
    $config['user'],
    $config['password'],
    $config['database']
);

if(!$conn){
    die("Error de conexión: " . mysqli_connect_error());
}
?>