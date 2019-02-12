<?php
	session_start();
  require_once "../../base/config.php";
  $con = conectaDB();
  if( isset($_COOKIE['id'] ) && isset( $_COOKIE['marca'] ) ) { 
  	unset($_COOKIE['id']);
  	unset($_COOKIE['marca']);
  }
  session_destroy();
  header("Location: ../login.php")
?>