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
		<iframe id="like" style="position: absolute;" src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Ftathva&amp;width=450&amp;height=80&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;send=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
		<p id="welcome">Welcome to BUYMORE<span><?php $username = $_SESSION['username']; 
										$id = $_SESSION['id'];
										$query = "SELECT * FROM `users` WHERE `username` = '$username' AND `id`='$id'";
										$result = $mysqli->query($query);
										$row = mysqli_fetch_array($result);
										$fname = $row['fname'];
										$lname = $row['lname'];
										$_SESSION['fname'] = $fname;
										$_SESSION['lname'] = $lname;
										echo " ".$fname." ".$lname;
											 ?></span></p>

		<div id="googlesearch"><script>
			  (function() {
			    var cx = '002261792341390032115:ath5lojkpwq';
			    var gcse = document.createElement('script');
			    gcse.type = 'text/javascript';
			    gcse.async = true;
			    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
			        '//www.google.com/cse/cse.js?cx=' + cx;
			    var s = document.getElementsByTagName('script')[0];
			    s.parentNode.insertBefore(gcse, s);
			  })();
			</script>
			<gcse:search></gcse:search> </div>
		<a href="myitems.php"><Button style="position: absolute; color: white; font-family: buymore; font-size: 20px;" id="myitems" value="myitems"><p>My Items</p></Button></a>
		<a href="endsession.php"><Button style="position: absolute; color: white; font-family: buymore; font-size: 20px;" id="logout" value="Logout"><p >Logout</p></Button></a>
		<div class="buy" id="buybutton"><br><p style="margin-top: 14px;"><b>Buy</b></p>
		</div>
		<div class="sell" id="sellbutton"><br><p style="margin-top: 14px;"><b>Sell</b></p>
		</div>
		<div class="buybox" id="buyb">
			<form name="buysearch" action="home.php" method="get">
				<input type="search" name="search" class="searchbox" placeholder="Search for stuff..."></input>
				<input type="submit" name="buysubmit" class="searchsubmit" value=" "></input>
			</form>
			<?php 
			  if(isset($_REQUEST['buysubmit']))		
				{   require_once("connect.php");
					echo "<br><br><br>";
					$search = $_REQUEST['search'];
					$query = "SELECT * FROM `buysell` WHERE `itemname` LIKE '%$search%'";
					$result = $mysqli->query($query);
					$flag = mysqli_num_rows($result);
					if($flag != 0)
					{
						$i = 1;
					  while($row = mysqli_fetch_array($result))
					  {

					  	
					  	echo ". <a href=\"redirectbuy.php?itemid=".$row['itemid']."\">".$i.". ".$row['itemname']."  ".$row['itemdesc']."</a><br><br>";
					  	
					  }
					}
					else
					{
						echo "<a>No Results!!</a>";
					}
				}

			?>
		</div>
		<div class="sellbox" id="sellb">
			<form name="sell" action="sell.php" method="get" onsubmit="return validate()">
				<table>
					<tr>
						<td><p>Item Name:  <p></td>
						<td><pre>  </pre></td>
						<td><input type="text" name="iname" placeholder="Item Name (Max. 20 Chars)"></td>
					</tr>

					<tr>
						<td><p>Item Description:  <p></td>
						<td><pre>  </pre></td>
						<td><textarea cols="30" rows="10" name="idesc" placeholder="Item Description (Max. 70 Chars)"></textarea></td>
					</tr>


					<tr>
						<td><p>Item Current City:  <p></td>
						<td><pre>  </pre></td>
						<td><input type="text" name="iloc" placeholder="Item Location (Max. 20 Chars)"></td>
					</tr>

					<tr>
						<td><p>Mode of Sale:  <p></td>
						<td><pre>  </pre></td>
						<td><input type="radio" name="sellmode" value="auction"><span>Auction</span><br><input type="radio" name="sellmode" id="check" value="fixed" checked="checked"><span>Fixed Price</span></td>
					</tr>


					<tr>
						<td><pre>  </pre></td>
						<td><pre>  </pre></td>
						<td><pre>  </pre></td>

					</tr>
					<br>
					<br>
					<br>
					<br>
					<br>
					<tr>
						<td><input id="sellsubmit" type="submit" value="Next >>"></td>
					</tr>


				</table>
			</form>
		</div>


			
		<script>
				var buybutton = document.getElementById("buybutton");
				var sellbutton = document.getElementById("sellbutton");
				var logout = document.getElementById("logout");
				var welcome = document.getElementById("welcome");
				buybutton.style.cursor = "pointer";
				sellbutton.style.cursor = 'pointer';
				logout.style.cursor = 'pointer';
				welcome.style.cursor = "pointer";
				

				var validate = function() {
					var itemname = document.forms["sell"]["iname"].value;
					var itemdesc = document.forms["sell"]["idesc"].value;
					var itemloc = document.forms["sell"]["iloc"].value;
					if(itemname.length >= 20)
					{
						alert("Maximum of 20 characters for item name!");
						return false;
					}
					else if(itemloc.length >= 20)
					{
						alert("Maximum of 20 characters for item location");
						return false;
					}
					else if(itemdesc.length >= 70)
					{
						alert("Maximum of 70 characters for item description");
						return false;
					}
					else if(itemname == "" || itemdesc == "" || itemloc == "" || itemname == null || itemdesc == null || itemloc == null)
					{
						alert("Fields cannot be left empty!");
						return false;
					}
					else
					{
						buybutton.style.opacity = "0";
						sellbutton.style.opacity = "0";
						$(".buybox").hide();
						$(".sellbox").hide();
						$("#googlesearch").toggle('slow');
						$("#myitems").toggle('slow');
						$("#like").toggle('slow');
						return true;
						

					}
				}

				var check = <?php if(isset($_REQUEST['buysubmit']))
									{
										echo "0";
									}
									else
									{
										echo "1";
									}
								 ?>;

				$(".sellbox").hide();

				if(check == "1")
					{
						$(".buybox").hide();
					}
				else
					{
						$(".buy").addClass('buychange');
						var box = document.getElementById("buyb");
						box.style.overflow = "scroll";
					}	

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

				$("#myitems").hover(function() {
					/* Stuff to do when the mouse enters the element */
					$(this).animate({
						marginTop: '46.5%'
						/* stuff to do after animation is complete */
					});
				}, function() {
					/* Stuff to do when the mouse leaves the element */
					$(this).animate({
						marginTop: '49.5%'
						/* stuff to do after animation is complete */
					});
				});



				$(document).ready(function() {
					$(".buy").click(function() {
					/* Act on the event */
						$(this).toggleClass('buychange');
						$(".buybox").toggle('slow');
						
					});
				});

				$(document).ready(function() {
					$(".sell").click(function() {
					/* Act on the event */
						$(this).toggleClass('sellchange');
						$(".sellbox").toggle('slow');
					});
				});
		
		</script>
		

		
	</body>
</html>
