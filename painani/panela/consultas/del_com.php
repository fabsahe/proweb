<?php 
session_start();
include "../../base/config.php";
include_once "../../bibliotecas/img-upload/subir_imagen_usuario.php"; 

$con = conectaDB();

$id = $_POST['id'];

$delete =  "DELETE FROM comentarios WHERE id='$id'";


$query = $con->prepare($delete);
$query->execute();

$_SESSION['exito_com'] = 3;

header("Location: ../ver_comentarios.php");

?>