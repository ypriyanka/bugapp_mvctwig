<?php
require_once( "../vendor/twig/twig/lib/Twig/Autoloader.php" );
require_once("../models/login_model.php");
class Home {
	public $twig;
	public $data;
	public function __construct() {
		Twig_Autoloader::register();
		$this->twig = new Twig_Environment( new Twig_Loader_Filesystem("views/templates"));
	}
	public function login(){
		global $b;
		$tpl = $this->twig->loadTemplate("login.tpl");
		$tpl->display(array("feedback"=>$GLOBALS['b']));
		if(isset ($_POST['submit']))
		{
			$valid=new Valid();
			$b=$valid->validation();
			echo $b;
			if($b=="valid")
			{
				header("location:controllers/bugspage_controller.php");
			}
			else{
				$tpl->display(array("feedback"=>$GLOBALS['b']));
			}
		}
	}
	public function signuppage(){
		$tpl = $this -> twig -> loadTemplate("registration.tpl");
		$tpl -> display(array());
	}
	public function signupcheck(){
		if(isset($_POST['register']))
		{
			$model=new Model();
			$result=$model -> register();
			if($result="sucess")
			{
				$tpl = $this -> twig -> loadTemplate("login.tpl");	
				$tpl -> display(array("feedback"=>"plaeselogin"));
			}
		}
	}
}
?>	