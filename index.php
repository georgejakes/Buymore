<?php session_start();
		if (isset($_SESSION['id']))
		{
			header("Location: home.php");
		}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Buy More!</title>
		<link type="text/css" href="style.css" rel="stylesheet">
		<script src="jquery-2.0.3.js"></script>
		

	</head>
	<body id="home">
		
		
		<div id="bmain" onclick="insert()"><p>LOGIN</p></div>
		<div id="sidebar">
		<form name="signin" action="redirect.php" method="post">
		<table>
		
		<tr><td class="usertext">Username: <td></tr>
		<tr><td><input class="input" type="text" name="username"></td></tr>
		<tr><td class="usertext">Password: <td></tr>
		<tr><td><input class="input" type="password" name="password"></td></tr>
		
		</table>
		<br>
		
		<input id="sub"		type="Submit" name="submit" value="Sign In">
		<a style="color:white; font-size: 20px; font-family:buymore; margin-left: 1em;" href="retrieve.php"> Forgot Password? </a>
		
		</form>
		<p class="input" style="margin-left: 6.5em; color: white;">Don't have an account? <br> <span onclick="signup()">Sign Up!</span></p>
		
		</div>	
		<div id="leftbar">
			<form action="verify.php" onsubmit="return validate()" method="post" name="sup" >
			<table id="signbar">
		
			<tr><td class="signtext">Username: <td></tr>
			<tr><td><input class="input" type="text" name="username"></td></tr>
			<tr><td class="signtext">Password: <td></tr>
			<tr><td><input class="input" type="password" name="password"></td></tr>
			<tr><td class="signtext">Re-Type Password: <td></tr>
			<tr><td><input class="input" type="password" name="repassword"></td></tr>
			<tr><td class="signtext">First Name: <td></tr>
			<tr><td><input class="input" type="text" name="fname"></td></tr>
			<tr><td class="signtext">Last Name: <td></tr>
			<tr><td><input class="input" type="text" name="lname"></td></tr>
			<tr><td class="signtext">Phone Number: <td></tr>
			<tr><td><input class="input" type="tel" name="phno"></td></tr>
			<tr><td class="signtext">E-Mail: <td></tr>
			<tr><td><input class="input" type="email" name="email"></td></tr>
			<tr><td><pre>       </pre></td></tr>
			
			<td><input id="sub" style="margin-left: 16em;" type="Submit" name="submit2" value="Sign Up"></td></tr>
			</table>
			<br>
		
		
		</form>
		</div>	
			
			
			<script>
			
			var element=document.getElementById("bmain");
			var sidebar=document.getElementById("sidebar");
			var leftbar=document.getElementById("leftbar");
				element.style.marginTop = "400px";
				element.style.cursor = 'pointer';
				
				
				function insert()
				{
					element.style.opacity = "0";
					sidebar.style.marginLeft = "50%";
					
					
				}
				
				function signup()
				{
					sidebar.style.marginLeft = "120em";
					leftbar.style.marginLeft = "-50%"
				}	
				
				function validate()
				{
				
					var username = document.forms["sup"]["username"].value;
					var password = document.forms["sup"]["password"].value;
					var password2 = document.forms["sup"]["repassword"].value;
					var fname = document.forms["sup"]["fname"].value;
					var lname = document.forms["sup"]["lname"].value;
					var phno = document.forms["sup"]["phno"].value;
					var email = document.forms["sup"]["email"].value;
					
					if(email.split("@")[1] != "nitc.ac.in")
					{
						alert("Enter nitc mail");
						return false;
					}
					if (password == "" || password2 == "" || username == "" ||fname =="" ||lname == "" ||phno == "" ||email == "" || password == null || fname == null || lname == null)
						{
							alert ("Fields cannot be left blank");
							return false;
						}
						else if (password !== password2)
						{
							alert("Password Mismatch");
							return false;
						}
				
						else
						{
							
								leftbar.style.opacity = "0";
								return true;
							  
							
						}
				}
				
			</script>			
	</body>
	
</html>