<?php

$to = "georgejakes@gmail.com";
$subject = "Test Mail";
$message = "Hello! This is a simple email";
$from = "georgejakes@gmail.com";
$headers = "From:"." ".$from;
$check = mail($to,$subject,$message,$headers);
if($check)
{
	echo "Success";
}
else
{
	echo "no";
}


?>