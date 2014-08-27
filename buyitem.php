<?php session_start(); ?>

<html>
	<head>
		<title>Buy More!</title>
		<link type="text/css" href="stylebody.css" rel="stylesheet">
		<script src="jquery-2.0.3.js"></script>
	</head>
	<body id="mainbody">
		
		<?php
			
			require_once("connect.php");
			if(!isset($_SESSION['id']))
			{
				
				header("Location: index.php");
			}	
		?>
		<p id="welcome">Welcome to BUYMORE<span><?php 
										$fname = $_SESSION['fname']; 
										$lname = $_SESSION['lname'];
										echo " ".$fname." ".$lname;
										$itemid = $_SESSION['itemid'];
										$sellmode = $_SESSION['sellmode'];
										$userid = $_SESSION['id'];
										$bid = $_REQUEST['bid'];
										$sold = "sold";
										if($sellmode == "fixed")
										{
											$query = "UPDATE `buysell` SET `itemstatus`= '$sold',`biduser` = '$userid' WHERE `itemid`='$itemid'";
											
										}
										else
										{
											$query = "UPDATE `buysell` SET `currentbid`= '$bid',`biduser` = '$userid' WHERE `itemid`='$itemid'";
										}

										
										$result = $mysqli->query($query);
										$selluser = $_SESSION['mail_selluser'];
										$buyuser = $_SESSION['mail_buyuser'];
										$prevuser = $_SESSION['mail_prevuser'];
										$query = "SELECT * FROM `users` WHERE `username` = '$selluser'";
										$result = $mysqli->query($query);
										$row = mysqli_fetch_array($result);
										$selluser_email = $row['email'];
										//to get any selluser details fetch from row now and store to a var I have only taken email for now
										$query = "SELECT * FROM `users` WHERE `username` = '$buyuser'";
										$result = $mysqli->query($query);
										$row = mysqli_fetch_array($result);
										$buyuser_email = $row['email'];
										//to get any buyuser details fetch from row now and store to a var
										if($prevuser != "null")
										{
											$query = "SELECT * FROM `users` WHERE `id` = '$prevuser'";
											$result = $mysqli->query($query);
											$row = mysqli_fetch_array($result);
											$prevuser_email = $row['email'];
											//to get any prevuser details fetch from row now and store to a var
										}
										if($sellmode == "fixed")
										{
											//insert mail function--- to selluser, to buyuser
										}
										else
										{
											//insert mail function--- to selluser, to buyuser in case of bid
											if($prevuser != "null")
											{
												//insert mail function--- to prevuser
											}
										}

										header("Location: home.php");
										
											 ?></span></p>
		


		<script>
			

			welcome.style.cursor = "pointer";
			setTimeout(function() {

				var sellb = document.getElementById("sellbutton");
				sellb.style.opacity = "1";
			}, 500);

			setTimeout(function() {

				$(".sellbox").slideDown('slow');
			}, 2000);

			$("#logout").hover(function() {
					/* Stuff to do when the mouse enters the element */
					$(this).animate({
						marginTop: '-1%'
						/* stuff to do after animation is complete */
					});
				}, function() {
					/* Stuff to do when the mouse leaves the element */
					$(this).animate({
						marginTop: '-4%'
						/* stuff to do after animation is complete */
					});
				});

		</script>

		
	</body>
</html>
