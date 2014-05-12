<?php
	ini_set("display_errors", 1);	
	include 'controllers/home.php';
	
	$action = (isset($_REQUEST['action']))?$_REQUEST['action']:"";
	
	try{
		$controller = new Home();
	switch ($action) {
		case 'loginProcess':
			break;
		case 'signUpProcess':
			break;
		case 'displayBugs':
			$controller->bugs_display();
			break;	
		case 'comments':
			$controller->comments($_GET['q']);
			break;
		case 'filtering':
			$controller -> filter($_GET['q'],$_GET['s']);
			break;
		case 'update':
			$controller->update($_GET['q']);
			break;
			case 'update_bugs':
				$controller->update_bugs($_POST,$_GET['q']);
				
				break;
		
		default:
			$controller->welcome();			
			break;
			}
		}
		catch(Exception $e)
		{
		echo $e;	
	} 
	