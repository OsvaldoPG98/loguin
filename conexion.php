<?php
	$server="localhost";
	$user="root";
	$password="";
	$bd="loguin";
	
	$mysqli = new mysqli($server,$user,$password,$bd);
	if($mysqli->connect_errno):
		echo "error al conectarse a la base de datos" .$mysqli->connect_error;
	endif;
	
 ?>