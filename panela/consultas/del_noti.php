<?php 
session_start();
include "../../base/config.php";
include_once "../../bibliotecas/img-upload/subir_imagen_usuario.php"; 

$con = conectaDB();

$id_noti = $_POST['id'];

$query1 =  $con->query("SELECT * FROM comentarios WHERE id_noticia=$id_noti");
foreach ($query1 as $row1) {

	$id_com = $row1['id'];
	$con->query("DELETE FROM comentarios WHERE id='$id_com'");
	
}
$con->query("DELETE FROM noticias WHERE id='$id_noti'");

$_SESSION['exito_noti'] = 3;

header("Location: ../ver_noticias.php");

?>