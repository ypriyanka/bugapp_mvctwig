<?php
	
	require_once( "lib/twig/Twig/Autoloader.php" );
	/**
	 * 
	 */
	class Home {
		
		public $twig;
		
		public function __construct() {
			Twig_Autoloader::register();
			$this->twig = new Twig_Environment( new Twig_Loader_Filesystem("views"));
		}
		
		public function welcome()
		{
			$tpl = $this->twig->loadTemplate("welcome.tpl");
			$tpl->display(array());
		}
		
	}
	