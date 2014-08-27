<?php
	session_start();
	require_once("connect.php");
	$password = $_REQUEST['verification'];
	$username = $_REQUEST['username'];
	$query = "SELECT `verification` FROM `users` WHERE `username`='$username'";
	$result = $mysqli->query("$query");
	$row = mysqli_fetch_array($result);
	if($row['verification'] == 1)
	{
		session_destroy();
		die("Already Verified!!");
	}
	else
	{
		$row = mysqli_fetch_array($result);
		$query = "UPDATE `users` SET `verification`= 1 WHERE `username`='$username' AND `password`='$password'";
		$result = $mysqli->query($query);
		if($result)
		{
			echo "Success";
			$query = "SELECT `id` FROM `users` WHERE `username`='$username'";
			$result = $mysqli->query("$query");
			$row = mysqli_fetch_array($result);
			$_SESSION['id']=$row['id'];
			$_SESSION['username'] = $username;
			header("Location: home.php");
		}
		else
		{
			session_destroy();
			echo "error";
		}
    }
?>