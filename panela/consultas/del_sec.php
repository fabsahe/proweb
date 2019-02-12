<?php 
session_start();
include "../../base/config.php";
include_once "../../bibliotecas/img-upload/subir_imagen_usuario.php"; 

$con = conectaDB();

$id_seccion = $_POST['id'];

$query1 =  $con->query("SELECT * FROM noticias WHERE id_seccion=$id_seccion");
foreach ($query1 as $row1) {
	$id_noti = $row1['id'];
	$query2 = $con->query("SELECT * FROM comentarios WHERE id_noticia=$id_noti");
	foreach ($quer as $row2) {
		$id_com = $row2['id'];
		$con->query("DELETE FROM comentarios WHERE id='$id_com'");
	}
	$con->query("DELETE FROM noticias WHERE id='$id_noti'");
}
$con->query("DELETE FROM secciones WHERE id='$id_seccion'");

$_SESSION['exito_com'] = 3;

header("Location: ../ver_comentarios.php");

?>