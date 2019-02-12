<?php 
session_start();
include "base/config.php";

$id_noti = $_POST['postid'];

$con = conectaDB();

$query1 = $con->query("SELECT likes FROM noticias WHERE id=$id_noti");
$res1 = $query1->fetch();
$likes_ori = intval( $res1['likes'] );
$likes_new = $likes_ori+1;

$query2 = $con->prepare("UPDATE noticias SET likes='$likes_new' WHERE id=$id_noti");
$query2->execute();

$return_arr = array("likes"=>$likes_new);

echo json_encode($return_arr);

?>