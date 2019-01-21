<?php

define("MYSQL_HOST", "mysql:host=localhost;dbname=fabsahec_pw");
define("MYSQL_USER", "fabsahec_fab");
define("MYSQL_PASSWORD", "secreto");

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