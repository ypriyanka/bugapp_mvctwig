<html>
	<head>
		<title>bugapp login page</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./css/home.css">
		<script>
			function register(){
				window.location="/mvc/view/registration.php";
			}
		</script>
	</head>
	<body style="size: 100%;">
		<div class="logo"><b>BugTracker</b></div>
		<div class="first">
			<h1>SIGN IN TO YOUR ACCOUNT</h1>
			<div id="formborder">
			<form action="" method="post" name="myForm" >
				<ul>
					<li>
						<label for="UserName" >UserName</label>
						<input id="UserName" name="UserName" class="input">
					</li>
					<li>
						<label for="Password">Password</label>
						<input type="Password" id="Password" name="Password" class="input">
					</li>
					<li>
						<input type="submit" id="submit"  name="submit" value="submit">

					</li>
				</ul>
			</form>
			<input type="submit" id="register" onclick=register(); value="Register" />
			</div>
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