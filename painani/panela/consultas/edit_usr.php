<?php 
session_start();
include "../../base/config.php";
include_once "../../bibliotecas/img-upload/subir_imagen_usuario.php"; 

$subir = new subirImgUsr;
$con = conectaDB();

$id = $_POST['id'];
$alias = $_POST['alias'];
$nombre = $_POST['nombre'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if( isset($_FILES['fotografia']) && $_FILES['fotografia']['name']!="" ) {
	$subir->init($_FILES['fotografia']);
	$nombre_foto = $subir->getName();
	$update =  "UPDATE usuarios SET nombre='$nombre', alias='$alias', password='$password', foto='$nombre_foto' WHERE id=$id";
}
else {
	$update =  "UPDATE usuarios SET nombre='$nombre', alias='$alias', password='$password' WHERE id=$id";
}

$query = $con->prepare($update);
$query->execute();

$_SESSION['exito_us'] = 2;

header("Location: ../ver_usuarios.php");

?>