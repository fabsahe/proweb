<?php 
session_start();
include "base/config.php";

$id_sec = $_POST['id_sec'];
$id_noti = $_POST['id_noti'];
$autor = $_POST['nombre'];
$contenido = $_POST['contenido'];
$fecha = date("Y-m-d-H:i");

$con = conectaDB();
$query = $con->prepare("INSERT INTO comentarios(id_noticia,contenido,autor,fecha) VALUES ('$id_noti','$contenido','$autor','$fecha')");


$query->execute();

header("Location: ver_noticia.php?id_sec=$id_sec&id_noti=$id_noti");

?>