<?php 
session_start();
include "../../base/config.php";

$con = conectaDB();

$id = $_POST['id'];
$autor = $_POST['autor'];
$contenido = $_POST['contenido'];

$update =  "UPDATE comentarios SET autor='$autor', contenido='$contenido' WHERE id=$id";

$query = $con->prepare($update);
$query->execute();

$_SESSION['exito_com'] = 2;

header("Location: ../ver_comentarios.php");

?>