<?php
	require_once( "lib/twig/Twig/Autoloader.php" );
	require_once("models/login_model.php");
	
	class Home {
		
		public $twig;
		
			public function __construct() {
			Twig_Autoloader::register();
			//$this->twig = new Twig_Environment( new Twig_Loader_Filesystem("views/templates"),array('debug' => true),array('auto_reload' => true));
		     $this->twig = new Twig_Environment( new Twig_Loader_Filesystem("views/templates"));
			}
		
		public function login()
		{
			global $b;
			
			if(isset ($_POST['submit']))
              { 
                 $valid=new Valid();
	             $b=$valid->validation();
	            
	 	         if($b=="valid")
	            {
		              header("location:controllers/bugspage_controller.php");
		        }
				
			  }
				
			$tpl = $this->twig->loadTemplate("login.tpl");
			$tpl->display(array("feedback"=>$GLOBALS['b']));
				
		   }
	}
		
?>	