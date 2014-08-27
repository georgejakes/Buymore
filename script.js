
			$(document).ready(function() {
				$("p").click(function {
					$(this).hide();
				});
			});

			
			var element=document.getElementById("bmain");
			var sidebar=document.getElementById("sidebar");
			var leftbar=document.getElementById("leftbar");
				element.style.marginTop = "400px";
				
				
				function insert()
				{
					element.style.opacity = "0";
					sidebar.style.marginLeft = "60em";
					
					
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
					var email = document.forms["sup"]["email"].value;
					if (password == "" || password2 == "" || username == "")
						{
							alert ("Password cannot be blank");
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
				
			