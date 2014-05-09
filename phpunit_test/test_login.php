<?php
require_once "../controllers/login_controler.php";
class UserTest extends PHPUnit_Framework_TestCase
{
	public $obj,$obj2;
	public function setUp()
	{
		$this->obj = new Valid();
		//$this->obj2= new Home();
			
		if(class_exists('PHPUnit_Extensions_Database_TestCase')) 
		{
			echo "Exists \n";
		}
    } 
	public function testFileExists()
    {
        $this->assertFileExists('../models/login_model.php');
		$this->assertFileExists('../controllers/login_controler.php');
		$this->assertFileExists('../lib/twig/Twig/Autoloader.php');
    }
	public function testValidation1()
	{
		$_POST['UserName']="priyanka";
  		$_POST['Password']="priya";
        $expected="valid";
        $actual= $this->obj->validation();
		$this->assertEquals($expected, $actual);
    }
	public function testValidation2()
	{
		$_POST['UserName']="priyanka";
  		$_POST['Password']="p";
        $expected="Your password is incorrect";
        $actual= $this->obj->validation();
		$this->assertEquals($expected, $actual);
   	}
	public function testValidation3()
	{
  		$_POST['UserName']="pr";
  		$_POST['Password']="priya";
        $expected="Your account was not found, please try again.";
        $actual= $this->obj->validation();
		$this->assertEquals($expected, $actual);
   	}
	public function testValidation4()
	{
  		$_POST['UserName']="priyanka";
  		$_POST['Password']="";
        $expected="Please fill in all the blank areas.";
        $actual= $this->obj->validation();
		$this->assertEquals($expected, $actual);
   	}
	public function testValidation5()
	{
  		$_POST['UserName']="";
  		$_POST['Password']="";
        $expected="Please fill in all the blank areas.";
        $actual= $this->obj->validation();
		$this->assertEquals($expected, $actual);
   	}
	
	public function testAttribute()
    {
        $this->assertClassHasAttribute('twig', 'Home');
		$this->assertClassHasAttribute('feedback1', 'Valid');
		
    }
	/*public function provider()
    {
         return array(
         array('twig', 'Home'),
         array('feedback1', 'Valid')          
         );
    }*/
	public function testInstance()
    {
        $this->assertInstanceOf('valid', new Valid);
    }
	 /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testFailingInclude()
    {
        include 'not_existing_file.php';
    }
    
	
	
	public function tearDown()
	{
        unset($this->obj);
		//unset($this->obj2);
    }
}
?>