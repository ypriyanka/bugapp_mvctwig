<?php
require_once "../controllers/login_controler.php";
require_once "../models/login_model.php";
class UserTest extends PHPUnit_Framework_TestCase
{
	public $obj,$obj2;
	public function setUp(){
		$this->obj = new Valid();
		//$this->obj2= new Home();
        // $this->user->setName("tip");
	} 
	public function testFileExists()
    {
        $this->assertFileExists('../models/login_model.php');
		$this->assertFileExists('../controllers/login_controler.php');
		$this->assertFileExists('../vendor/twig/twig/lib/Twig/Autoloader.php');
    }
	public function testRegistration()
	{
		$_POST['name']='Amruth';
		$_POST['username']='Amruth';
		$_POST['password']='987653';
		$_POST['email']='Amruth123@gmail.com';
		$_POST['gender']='male';
		$regobj = new Valid();
		$result = $regobj -> register();
		$this -> assertEquals("sucess",$result);
	}
}
?>

