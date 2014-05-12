<?php
ini_set("display_errors", 1);
include 'controllers/login_controler.php';
$action = (isset($_REQUEST['action']))?$_REQUEST['action']:"";
$controller = new Home();
switch ($action) {
	case 'loginProcess':$controller->login();break;
	case 'registrationProcess': $controller -> signuppage();break;
	case 'bugsPage':$controller -> bugs_display();break;
	case 'signupcheck':$controller->signupcheck();break;
	default:$controller->login();break;
} 
