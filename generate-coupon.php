<?php
session_start();
include('db.php');
if(isset($_SESSION["uid"])){
	// include config file
	$uid=$_SESSION["uid"];
	require_once 'config.php';
	
	$sql = "SELECT * FROM coupons WHERE userid='$uid'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
			echo"Already taken!";
			
			die();
		
		}
	else echo couponCodeGenerator();
}
?>

