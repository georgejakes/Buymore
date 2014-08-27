<?php
			
			require_once("connect.php");
			$password=isset($_REQUEST['password'])?hash('md5',$_REQUEST['password']):NULL;
			$username=isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
			$query = "SELECT * FROM `users` WHERE `username` = '$username' and `password`='$password'";
			$result = $mysqli->query($query);
			$flag = mysqli_num_rows($result);
			
			if($flag == 0)
			{
				header("Location: forgot.php");
			}
			
			else
			{
					$row = mysqli_fetch_array($result);
					if($row['verification'] != 1)
					{
						die("Verify first");
					}
					session_start();
					$_SESSION['id']=$row['id'];
					$_SESSION['username']=$row['username'];
					
					
				
			}
			
		?>

<html>
	<head>
		<title>Buy More!</title>
		<link type="text/css" href="style.css" rel="stylesheet">
	</head>
	<body>
		<script>
			window.location.assign("home.php");
		</script>
	</body>
</html>
