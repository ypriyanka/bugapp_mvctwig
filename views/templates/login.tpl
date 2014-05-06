<html>
	<head>
		<title>bugapp login page</title>
		<meta charset="utf-8">
        <link rel="stylesheet" href="views/css/home.css">
        </head>
	<body style="size: 100%;">
	
	<div class="logo"><b>BugTracker</b></div>
	
	<div class="first">
		<h1>SIGN IN TO YOUR ACCOUNT</h1>
		<form action="" method="post"  name="myForm" > 
			<ul>
			<div class="error">
            {{feedback}}               
            </div>
				<li>
				<label for="UserName" >UserName</label>
				<input id="UserName" name="UserName" class="input">
				</li>
				<li>
				<label for="Password">Password</label>
				<input type="Password" id="Password" name="Password" class="input">	
				</li>
				<li>
				<input type="submit" id="submit" name="submit" value="submit"  >
				</li>
			</ul>
		</form>
		
	</div>
	
	<sidebar>
	<ul>
		<li><a href="#">BugTracker</a></li>
		<li><a href="#">Help</a></li>
		<li><a href="#">Feedback</a></li>
		<li><a href="#">About</a></li>
		<li><a href="#">Donate</a></li>
	</ul>	
	</sidebar>
	
	
	</body>
</html>

