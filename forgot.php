<html>
	<head>
		<title>Forgot Password!?</title>
		<link type="text/css" href="style.css" rel="stylesheet">
	</head>
	<body id="home">
		<div id="centerbox">
		<form name="signin" action="redirect.php" method="post">
		<table>
		<tr><td style="font-family: buymore; font-size: 20px; color: white;">Username/Password Invalid!</td></tr>
		<tr><td class="usertext">Username: <td></tr>
		<tr><td><input class="input" type="text" name="username"></td></tr>
		<tr><td class="usertext">Password: <td></tr>
		<tr><td><input class="input" type="password" name="password"></td></tr>
		</table>
		<br>
		
		<input id="sub"	type="Submit" name="submit" value="Sign In">
		<a style="color:white; font-size: 20px; font-family:buymore; margin-left: 1em;" href="retrieve.php"> Forgot Password? </a>
		
		
		</form>
		<p class="input" style="margin-left: -0.5em; color: white;">Don't have an account? <br> <span onclick="signup()">Sign Up!</span></p>
		</div>
	</body>
</html>