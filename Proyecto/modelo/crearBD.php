<?php
include ('config.php');
try {
    $pdo = new PDO('mysql:host='.Config::$mvc_bd_hostname, Config::$mvc_bd_usuario, Config::$mvc_bd_clave);
    $pdo->exec("set names utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlBD = file_get_contents("BD_usuarios.sql");
    $pdo->exec($sqlBD);
    echo ("La BD ha sido creada");
    $pdo = null;
}
 catch (PDOException $e) {
    error_log($e->getMessage() . "## Fichero: " . $e->getFile() . "## Línea: " . $e->getLine() . "##Código: " . $e->getCode() . "##Instante: " . microtime() . PHP_EOL, 3, "logBD.txt");
    $errores['datos'] = "Ha habido un error <br>";
}
?>