<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "onlineshop";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);
// Include functions file
	require_once 'functions.php';

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>