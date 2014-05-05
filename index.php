<?php
	ini_set("display_errors", 1);	
	include 'controllers/home.php';
	
	$action = (isset($_REQUEST['action']))?$_REQUEST['action']:"";
	
	$controller = new Home();
	switch ($action) {
		case 'loginProcess':
			
			break;
			
		case 'signUpProcess':
			
			break;
			
		case 'displayBugs':
			
			break;
			
		case 'loginProcess':
			
			break;
		
		default:
			$controller->welcome();			
			break;
	} 
