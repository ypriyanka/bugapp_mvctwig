<?php
require_once dirname(__FILE__)."/home.php";
class ModelTest extends PHPUnit_Framework_TestCase
{
	 public  $stub;
	
	 public function teststub()
	 {
	   $this->stub = $this->getMockBuilder('Home')
                     ->disableOriginalConstructor()
                     ->getMock();

        // Configure the stub.
       
		$this->assertClassHasAttribute('model', 'Home');
	 }
	


	public function testfindvariable_property()
	{
	$stub = $this->getMockBuilder('Home')
                     ->disableOriginalConstructor()
                     ->getMock();
        // Configure the stub.
	$reflect = new ReflectionClass($stub);
	$props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
	foreach ($props as $prop) 
	{
	    $test[]=$prop->getName();
	}
	$this->assertContains('model',$test);
	$this->assertContains('twig',$test);
	}
}
?>