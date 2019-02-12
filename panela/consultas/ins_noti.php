<?php 
session_start();
include "../../base/config.php";
include_once "../../bibliotecas/img-upload/subir_imagen_noticia.php"; 

$subir = new subirImgNoti;
if( isset($_FILES['fotografia']) && $_FILES['fotografia']['name']!="" ) {
	$subir->init($_FILES['fotografia']);
	$nombre_foto = $subir->getName();
}
else {
	$nombre_foto = "default_noti.png";
}

$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = $_POST['fecha']." ".date("H:i");
$autor = $_SESSION['alias'];
$seccion = $_POST['seccion'];

$con = conectaDB();


$query = $con->prepare("INSERT INTO noticias(titulo,contenido,autor,fecha,likes,id_seccion,foto) VALUES ('$titulo','$contenido','$autor','$fecha','0','$seccion','$nombre_foto')");
$query->execute();

$_SESSION['exito_noti'] = 1;

header("Location: ../ver_noticias.php");

?>