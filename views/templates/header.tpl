<html>
	<head>
		<link rel="stylesheet" href="./views/css/header.css">
		         
	</head>
	<body>
		<header>
		<div class="logo"><b>BugTracker</b></div>
		<div class="first" >
			<form action="header_searchbuttons.php" method="post">
			<ul>
				<li style="padding-left:0px";><a href="bugs_page.php">bugs</a></li>
				<li><a href="header_bugsearch.php">search</a></li>
				<li><a href="#"> queries</a></li>
				<li><input type="submit" value="goto Id" class="gotobutton"><input type="input" class="search1" name="search1"/></li>
				<li ><input type="button" value="search Text" class="searchbutton"><input type="text" class="search2" name="search2"/></li>
				<li ><a href="#">advanced</a></li>
			</ul>
			</form>
		</div>
		
		<div class="second">
			<ul style="padding:0px;">
				<li><a href="header_logoff.php">log off</a></li>
				<li><a href="#">settings</a></li>
				<li><a href="#">about</a></li>
				<li><a href="#">help</a></li>
			</ul>
			
		</div>
		<div class="uname"><p style="margin-top:5px;">logged in as <br><?php echo $_SESSION['UserName2'];?></p></div>
		
		</header>
		<div class="third">
			<ul>
				
				<li><a href="create_bugs.php">&nbsp;<span class="plus">+</span>add new bug</a></li>
				<li><select class="select" name="bugs"><option value="allbugs">All bugs</option>
					<option>bugs with attachments</option>
					<option>bugs with related bugs</option>
					<option>checked in bugs -for QA</option>
					<option>days in status</option>
					<option>demo last comment as column</option>
					<option>demo use of css classes</option>
					<option>open bugs</option>
					<option>open bugs assigned to me</option>
				</select></li>
				<li><a href="#">print list</a></li>
				<li><a href="#">print detail</a></li>
				<li><a href="#">export to excel</a></li>
				<li style="padding-left:1086px;padding-right:0px;"><a href="#">screen capture</a></li>
					
			</ul>
		</div>
	</body>
</html>