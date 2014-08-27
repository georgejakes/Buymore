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
										$_SESSION['iname'] = $_REQUEST['iname'];
										$_SESSION['idesc'] = $_REQUEST['idesc'];
										$_SESSION['iloc'] = $_REQUEST['iloc'];
										$_SESSION['sellmode'] = $_REQUEST['sellmode'];
										echo " ".$fname." ".$lname;
											 ?></span></p>
		<!-- <a href="sellconfirm.php"><div class="sell" id="sellbutton" style="margin-top: 820px; margin-left: 44.25%;  opacity: 0;"><br><p style="margin-top: 14px;"><b>Sell</b></p></div></a> -->

		<!-- End session and Main Box-->
		<a href="endsession.php"><Button style="position: absolute; color: white; font-family: buymore; font-size: 20px;" id="logout" value="Logout"><p >Logout</p></Button></a>
		
		<div class="sellbox" style="width: 900px; height: 700px; margin-top: 80px; margin-left: 500px; display:none; text-align: center;">
			<form name="sell" action="sellconfirm.php" method="post" enctype="multipart/form-data">
				<table>
					<?php
						if($_REQUEST['sellmode'] == "fixed")
						{
					echo ("<tr><td><p>Item Price:  <p></td>
						<td><pre>  </pre></td>
						<td><input type=\"text\" name=\"iprice\" placeholder=\"Item Price (Max. 20 Chars)\"></td>
					</tr>
					<tr> 
						<td><pre>                     </pre></td>

					</tr>
					<tr>
						<td><pre>                     </pre></td>

					</tr> "); }
						else
					{
					 echo ("<tr>
						<td><p>Minimum Bid:  <p></td>
						<td><pre>  </pre></td>
						<td><input type=\"text\" name=\"ibid\" placeholder=\"Item Price (Max. 20 Chars)\"></td>
					</tr>
					<tr> <td><pre>                     </pre></td>

					</tr>
					<tr>
						<td><pre>                     </pre></td>

					</tr>"); } ?>
						<td><pre>                     </pre></td>

					</tr>
					<tr>
						<td><pre>                     </pre></td>

					</tr>
					<br><br><br><br>

					<tr>
						<td><p>Image:  <p></td>
						<td><pre>  </pre></td>
						<td><input type="file" name="file" id="file" placeholder="Upload Image"></td>
					</tr>

					

					

				</table>
			
		</div>		

					<input id="sellbutton" class="sell" type="submit" value="SELL" style="margin-top: 820px; margin-left: 44.25%;  opacity: 0;"><br><p style="margin-top: 14px;"> </form>
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
