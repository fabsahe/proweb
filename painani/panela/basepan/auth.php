<?php
	session_start();
  require_once "../../base/config.php";
  $con = conectaDB();

	$sql = $con->query("SELECT * FROM usuarios WHERE alias='".$_POST["usuario"]."';");
	$conta = 0;
	foreach ($sql as $row) {
		$user = $row["alias"];
		$hash = $row["password"];	 	
	 	$conta++;
	} 

	if($conta==1) {
		if( password_verify($_POST["password"], $hash) ) {
			$_SESSION['alias'] = $user;
			$_SESSION['invalid'] = 0;
			if(isset($_POST['recordar'])){
				if($_POST['recordar'] == true){
					mt_srand(time());
					$rand = mt_rand(1000000,9999999);
					$con->query("UPDATE usuarios 
									SET cookie='".$rand."' 
									WHERE id=".$row["id"]);
					setcookie("id", $row["id"], time()+(60*60*24*365));
					setcookie("marca", $rand, time()+(60*60*24*365));

				}
			}
			header("Location: ../index.php");		
		}
		else {
			$_SESSION['invalid'] = 1;
			header("Location: ../login.php");
		}
	}
	else {
		$_SESSION['invalid'] = 1;
		header("Location: ../login.php");
	}
?>