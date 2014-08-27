<?php 
	require_once("connect.php");
	$itemid = $_REQUEST['itemid'];
	$sold = "sold";
	$query = "UPDATE `buysell` SET `itemstatus`= '$sold' WHERE `itemid`='$itemid'";
	$result = $mysqli->query($query);
	header("Location: redirectbuy.php?itemid=".$itemid);
?>