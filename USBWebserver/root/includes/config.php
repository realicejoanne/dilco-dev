<?php
	global $connection;
	$servername = "localhost";
	$username = "root";
	$password = "usbw";
	$dbname = "dilco";
	$connection = mysqli_connect($servername, $username, $password, $dbname);
	if(!$connection){
		die("connection failed: ". mysqli_connect_error());
	}
?>