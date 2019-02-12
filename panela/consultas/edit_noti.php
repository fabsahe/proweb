<?php 
session_start();
include "../../base/config.php";
include_once "../../bibliotecas/img-upload/subir_imagen_noticia.php"; 

$subir = new subirImgNoti;
$con = conectaDB();


$id = $_POST['id'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = $_POST['fecha']." ".date("H:i");
$autor = $_SESSION['alias'];
$seccion = $_POST['seccion'];



if( isset($_FILES['fotografia']) && $_FILES['fotografia']['name']!="" ) {
	$subir->init($_FILES['fotografia']);
	$nombre_foto = $subir->getName();
	$update =  "UPDATE noticias SET titulo='$titulo', contenido='$contenido', fecha='$fecha', id_seccion='$seccion', foto='$nombre_foto' WHERE id=$id";
}
else {
	$update =  "UPDATE noticias SET titulo='$titulo', contenido='$contenido', fecha='$fecha', id_seccion='$seccion' WHERE id=$id";
}


$query = $con->prepare($update);
$query->execute();

$_SESSION['exito_noti'] = 2;

header("Location: ../ver_noticias.php");

?>