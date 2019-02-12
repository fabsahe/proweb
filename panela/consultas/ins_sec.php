<?php 
session_start();
include "../../base/config.php";


$seccion = $_POST['seccion'];

$con = conectaDB();
$query = $con->prepare("INSERT INTO secciones(nombre) VALUES ('$seccion')");
$query->execute();

$_SESSION['exito_sec'] = 1;

header("Location: ../ver_secciones.php");

?>