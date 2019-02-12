<?php 
session_start();
include "../../base/config.php";
include_once "../../bibliotecas/img-upload/subir_imagen_usuario.php"; 

$con = conectaDB();

$id = $_POST['id'];
$nombre = $_POST['seccion'];

$update =  "UPDATE secciones SET nombre='$nombre' WHERE id=$id";


$query = $con->prepare($update);
$query->execute();

$_SESSION['exito_sec'] = 2;

header("Location: ../ver_secciones.php");

?>