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
										$itemid = $_REQUEST['itemid'];

										$query = "SELECT * FROM `buysell` WHERE `itemid`='$itemid' ";
										$result = $mysqli->query($query);
										$flag = mysqli_num_rows($result);
										$row = mysqli_fetch_array($result);
										$_SESSION['sellmode'] = $row['sellmode'];
										$_SESSION['itemid'] = $itemid;
											 ?></span></p>
		<div id="itembox">
			<table>
				<form action="buyitem.php" method="post">
					<tr><td><a href=<?php echo $row['imageloc']; ?> ><img src=<?php echo $row['imageloc']; ?> height = "200" width="200"> </a></td></tr>	
					<tr><td id="itempage_desc">Item Name: </td><td><p id="itempage_desc"><?php echo $row['itemname']; ?></p></td></tr>
					<tr><td id="itempage_desc">Item Description: </td><td><p id="itempage_desc"><?php echo $row['itemdesc']; ?></p></td></tr>
					<tr><td id="itempage_desc">Item City: </td><td><p id="itempage_desc"><?php echo $row['itemcity']; ?></p></td></tr>
					<tr><td id="itempage_desc">Seller Name: </td><td><p id="itempage_desc"><?php echo $row['selluser']; ?></p></td></tr>
					<tr><td id="itempage_desc">Selling Mode: </td><td><p id="itempage_desc"><?php echo $row['sellmode']; ?> </p></td></tr>
					<?php if($row['sellmode'] != "fixed")
						{ ?>
					<tr><td id="itempage_desc">Min Bid: </td><td><p id="itempage_desc"><?php echo $row['minbid']; ?></p></td></tr>
					<tr><td id="itempage_desc">Current Bid: </td><td><p id="itempage_desc"><?php echo $row['currentbid']; ?></p></td></tr>	
					<tr><td id="itempage_desc">Bid: </td><td><input type="number" name="bid" min=<?php 
					if($row['minbid'] > $row['currentbid'])
						echo $row['minbid']+1; 
					else
						echo $row['currentbid']+1;
					?>> 
						<?php
							if($_SESSION['username'] == $row['selluser'] && $row['itemstatus'] != "sold")
							{
								echo "<tr><td id=\"itempage_desc\"><a href=\"stopauction.php?itemid=".$itemid."\">Stop Auction</a></td></tr>";
							}
						 ?>
					<?php
						$_SESSION['mail_selluser'] = $row['selluser'];
						$_SESSION['mail_buyuser'] = $_SESSION['username'];
						if($row['minbid'] < $row['currentbid'])
						{
							$_SESSION['mail_prevuser'] = $row['biduser'];
						}
						else
						{
							$_SESSION['mail_prevuser'] = "null";
						}

					 }
					else {
							 ?>
					<tr><td id="itempage_desc">Item Price: </td><td><p id="itempage_desc"><?php echo $row['itemprice']; ?></p></td></tr>
					<?php 

						$_SESSION['mail_selluser'] = $row['selluser'];
						$_SESSION['mail_buyuser'] = $_SESSION['username'];

				} ?>

				<?php if($row['itemstatus'] != "sold")
					{
				 ?>
					<tr><td><input type="submit" name="sub"></td></tr>	
					<?php  }  
						else {
					?>
					<tr><td id="itempage_desc">Sold</td></tr>
					<?php } ?>
				</form>
			</table>
		</div>
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
