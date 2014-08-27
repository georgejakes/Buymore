<?php 
	session_start();
	require_once("connect.php");
	$iname = isset($_SESSION['iname'])?$_SESSION['iname']:NULL;
	$idesc = $_SESSION['idesc'];
	$iloc = $_SESSION['iloc'];
	$sellmode = $_SESSION['sellmode'];
	$username = $_SESSION['username'];

	if($iname == NULL)
	{
		die("Error");
	}

	if ($sellmode == "fixed")
	{
		$iprice = isset($_REQUEST['iprice'])?$_REQUEST['iprice']:NULL;
		if($iprice == NULL) 
		{
			die();
		}

		$query = "INSERT INTO `buysell` (`itemname`,`itemdesc`,`itemcity`,`itemprice`,`selluser`,`sellmode`) VALUES ('$iname','$idesc','$iloc','$iprice','$username','$sellmode')";
	}
	else
	{
		$ibid = isset($_REQUEST['ibid'])?$_REQUEST['ibid']:NULL;
		if($ibid == NULL) 
		{
			die();
		}
		$query = "INSERT INTO `buysell` (`itemname`,`itemdesc`,`itemcity`,`minbid`,`selluser`,`sellmode`) VALUES ('$iname','$idesc','$iloc','$ibid','$username','$sellmode')";
	}
	$result = $mysqli->query($query);
	if($result)
	{
		$query = "SELECT `itemid` FROM `buysell` WHERE `itemname`='$iname' AND `selluser` = '$username'";
		$result = $mysqli->query($query);
		$row = mysqli_fetch_array($result);
		$itemid = isset($row['itemid'])?$row['itemid']:NULL;
		if($itemid!= NULL)
		{
			$istore = "itemimages/".$username."/".$itemid;
			$query = "UPDATE `buysell` SET `imageloc`= '$istore' WHERE `selluser`='$username' AND `itemname`='$iname'";
			$mysqli->query($query);
			move_uploaded_file($_FILES["file"]["tmp_name"],"itemimages/".$username."/".$itemid);
      		unset($_SESSION['iname']); unset($_SESSION['iloc']); unset($_SESSION['idesc']); unset($_SESSION['sellmode']); 
		}
	}
	else
	{
		die ("error");
	}
?>

<html>
	<head></head>
	<body>
		<script>
			alert("Updated :)");
			setTimeout(function() {
				window.location.assign("home.php");
			}, 1000)
		</script>

	</body>
</html>