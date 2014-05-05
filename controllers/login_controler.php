<?php
	require_once( "lib/twig/Twig/Autoloader.php" );
	require_once("models/login_model.php");
	
	/*class Twig_Environment_APC extends Twig_Environment
{
    protected function writeCacheFile($file, $content)
    {
        parent::writeCacheFile($file, $content);

        // Compile cached file into bytecode cache
        apc_compile_file($file);
    }
}*/
	
	
	
	
	class Home {
		
		public $twig;
		
			public function __construct() {
			Twig_Autoloader::register();
			$this->twig = new Twig_Environment( new Twig_Loader_Filesystem("views/templates"),array('debug' => true));
		}
		
		public function login()
		{
			global $b;
			
			$tpl = $this->twig->loadTemplate("login.tpl");
			$tpl->display(array("feedback"=>$GLOBALS['b']));
			//$tpl->display(array());
			
			
			if(isset ($_POST['submit']))
              { 
                 $valid=new Valid();
	             $b=$valid->validation();
	             
	             echo $GLOBALS['b'];		
	 	         
	 	         if($b=="valid")
	            {
		              header("location:controllers/bugspage_controller.php");
		        }
				
				
				/*$tpl2 = $this->twig->loadTemplate("child.tpl");
			      $tpl2->display(array("feedback"=>$GLOBALS['b']));*/
				 
				/*$file=login.tpl;
				$content=$GLOBALS['b'];
				$refresh= new Twig_Environment_APC();
				$refresh->writeCacheFile($file, $content);*/
				
				//$tpl->enableAutoReload();
				 
				  
				/*else
				 	{
				 	    //echo $tpl->display(array("feedback"=>$GLOBALS['b']));
				 		header("location:index.php");	
				 	}*/
		      }
		
	     }
	}
		
?>	