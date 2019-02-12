<?php 
session_start();
include "../../base/config.php";
include_once "../../bibliotecas/img-upload/subir_imagen_usuario.php"; 

$con = conectaDB();

$autor = $_POST['autor'];

echo "SELECT * FROM noticias WHERE autor=$autor";

$query1 =  $con->query("SELECT * FROM noticias WHERE autor='$autor'");
foreach ($query1 as $row1) {
	$id_noti = $row1['id'];
	$query2 = $con->query("SELECT * FROM comentarios WHERE id_noticia=$id_noti");
	foreach ($query2 as $row2) {
		$id_com = $row2['id'];
		$con->query("DELETE FROM comentarios WHERE id='$id_com'");
	}
	$con->query("DELETE FROM noticias WHERE id='$id_noti'");
} 
$con->query("DELETE FROM usuarios WHERE alias='$autor'");

$_SESSION['exito_us'] = 3;

header("Location: ../ver_usuarios.php");

?>