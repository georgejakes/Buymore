<html>
	<head>
		<title>Buy More!</title>
		<link type="text/css" href="style.css" rel="stylesheet">
		
	</head>
	<body id="home">
		
		<?php
		
			require_once("connect.php");
			$password=isset($_REQUEST['password'])?hash('md5',$_REQUEST['password']):NULL;
			$username=isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
			$fname=isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
			$lname=isset($_REQUEST['lname'])?$_REQUEST['lname']:NULL;
			$phno=isset($_REQUEST['phno'])?$_REQUEST['phno']:NULL;
			$email=isset($_REQUEST['email'])?$_REQUEST['email']:NULL;
			if($username == NULL || $password == NULL || $fname == NULL || $lname == NULL || $phno == NULL || $email == NULL)
				{
				die ("<p id=\"errortext\"> Fields cannot be left Blank <a id=\"errortext\" href=\"index.php\"> Go Back... </a> </p>");
				}
				
			$query="SELECT * FROM `users` WHERE `username` = '$username'";
			$result = $mysqli->query($query);
			$flag1 = mysqli_num_rows($result);
			$query="SELECT * FROM `users` WHERE `email` = '$email'";
			$result = $mysqli->query($query);
			$flag2 = mysqli_num_rows($result);
			if ($flag1 != 0)
			{
				die ("<p id=\"errortext\"> Username already exists! <a id=\"errortext\" href=\"index.php\"> Go Back... </a> </p>");
			}
			else if ($flag2 != 0)
			{
				die ("<p id=\"errortext\"> Email already Registered <a id=\"errortext\" href=\"index.php\"> Go Back... </a> </p>");
			}
			else
			{
				$query = "INSERT INTO `users` (`username`,`password`,`fname`,`lname`,`email`,`phno`) VALUES ('$username','$password','$fname','$lname','$email','$phno')";
				$mysqli->query($query);


					$to = $email;
					$subject = "Verification";
					$message = "Hi there ".$fname." ".$lname." \n Please click on the link below \n "."localhost\\project\\verification.php?verification=".$password."&username=".$username;
					$from = "georgejakes@gmail.com";
					$headers = "From:"."buymore";
					$check = mail($to,$subject,$message,$headers);
					if($check)
					{
						echo "<p id=\"errortext\"> An Email has been sent to your account for Verification <a id=\"errortext\" href=\"index.php\"> Go Back... </a></p>";
						mkdir("itemimages/".$_SESSION['username']);
					}
					else
					{
						echo $check;
					}


				

				
			}
			
			
			
		?>
		
	</body>
</html>
