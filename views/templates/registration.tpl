<html>
	<head>
		<link rel="stylesheet" href="views/css/registration.css">
		<link rel="stylesheet" href="views/css/home.css" />
		<script type="text/javascript">
		function validate()
		{
			var name1 = document.getElementById("name").value;
			var name=document.getElementById("username").value;
			var password=document.getElementById("password").value;
			var rpassword=document.getElementById("rpassword").value;
			var email1=document.getElementById("email").value;
			var ck_name = /^[A-Za-z0-9 ]{3,20}$/;
			var ck_username = /^[A-Za-z0-9_]{6,20}$/;
			var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
			var a = true;
				if(name1 == "" || !ck_name.test(name1)){ 
					document.getElementById("name_emsg").innerHTML = "Please enter your name";
					document.getElementById("name").value = "";
					a = false;
				}
				else
				{
				 document.getElementById("name_emsg").innerHTML="valid";
				
			    }
				if(name == "" || !ck_username.test(name))
				{	
					document.getElementById("username_emsg").innerHTML="please re enter username";
					document.getElementById("username").value="";
					a = false;
				}
				else
				{
				 document.getElementById("username_emsg").innerHTML="valid";
				}
				if(password == "" || !ck_password.test(password))
				{	
					document.getElementById("password_emsg").innerHTML="please re enter password";
					document.getElementById("password").value="";
					a = false;
				}
				else
				{
				 document.getElementById("password_emsg").innerHTML="valid";
				}
				if(password == rpassword)
				{	
					if(password=="")
					{
			           document.getElementById("password_emsg").innerHTML="enter valid password";
						a = false;
					}
					else
					{
						document.getElementById("password_emsg").innerHTML="valid";
					}
				}
				else
				{
					
					a=false;
				}
				if(email=="")
				{
						
					document.getElementById("email_emsg").innerHTML="enter valid emailid";
					a = false;
				}
				else
				{
					document.getElementById("email_emsg").innerHTML="valid email";
				}
		   return a;
			
		}
		</script>
	</head>
	<body>
		<div class="logo"><b>BugTracker</b></div>
		<h1>Registration</h1>
		<form  id = "myform" name="myform" action="?action=signupcheck" method="post" onsubmit="return validate();">
			Name: <input type="text" id="name" name="name"/><span id="name_emsg">enter your name </span>
			<br />
			E-mail: <input type="email" id="email" name="email" /><span id="email_emsg">enter email</span><br>
			user name:<input type="text"  id="username" name="username"/><span id="username_emsg">minimun 6 char</span><br>
			password<input type="password" id="password"  name="password"/><span id="password_emsg">minimun 6 char</span><br>
			confirm password:<input type="password" id="rpassword"  name="confirmpwd"/><br>
			Gender:
			<input type="radio" name="gender" value="female">Female
			<input type="radio" name="gender"  value="male">male
			<br><br>
			<input type="submit" name="register" value="submit"  /><br>
		</form>
	</body>
</html>