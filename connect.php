<?php
	require_once("config.php");
	$mysqli=new mysqli($db_host,$db_user,$db_password,$db_name);
	if($mysqli->connect_errno)
	{
	  die("connection error ".$mysqli->connect_error);
	}
	
?>
