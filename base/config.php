<?php
define("MYSQL_HOST", "mysql:host=localhost;dbname=noticias");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "secreto");

date_default_timezone_set('America/Mexico_City');
// FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS MYSQL
function conectaDb()
{
    try {
        $con = new PDO(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD);
        $con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $con->exec("set names utf8mb4");
        return($con);
    } catch(PDOException $e) {
        echo "    <p>Error: No puede conectarse con la base de datos.</p>\n";
        echo "\n";
        echo "    <p>Error: " . $e->getMessage() . "</p>\n";
        exit();
    }
}
?>