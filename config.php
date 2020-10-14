
<?php
include('errores.php');

define('USER', 'root');
define('PASSWORD', 'sasa');
define('HOST', 'localhost');
define('DATABASE', 'autofact');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    log_message_text("usuario", "Error De Conexion a la base de datos");
    exit("Error: " . $e->getMessage());
}

$db = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'sasa',
    'db' => 'autofact'
];
?>