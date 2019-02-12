<?php 
session_start();
include "../../base/config.php";
include_once "../../bibliotecas/img-upload/subir_imagen_usuario.php"; 

$subir = new subirImgUsr;
if( isset($_FILES['fotografia']) && $_FILES['fotografia']['name']!="" ) {
	$subir->init($_FILES['fotografia']);
	$nombre_foto = $subir->getName();
}
else {
	$nombre_foto = "default.png";
}

$alias = $_POST['alias'];
$nombre = $_POST['nombre'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$con = conectaDB();

$validar = $con->query("SELECT * FROM usuarios WHERE alias='$alias'");

if( $validar->rowCount()>0 ) {
	$_SESSION['error_us'] = 1;
	header("Location: ../agregar_usuario.php");
	return;
}

$query = $con->prepare("INSERT INTO usuarios(nombre,alias,password,cookie,admin,foto) VALUES ('$nombre','$alias','$password','0','0','$nombre_foto')");
$query->execute();

$_SESSION['exito_us'] = 1;

header("Location: ../ver_usuarios.php");

?>