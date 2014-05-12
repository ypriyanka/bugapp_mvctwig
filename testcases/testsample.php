<?php
//require_once "home/bigc/composer/vendor/autoload.php";
require_once "sample.php";
 
class UserTest extends PHPUnit_Framework_TestCase
{
	
	// test the talk method
    public function test1()
	{
        // make an instance of the user
        $user = new User();
		
		/* protected function setUp() 
		 {
        $this->user = new User();
        $this->user->setName("Tom");
        } 
				
		protected function tearDown()
		 {
        unset($this->user);
         }*/
 
        // use assertEquals to ensure the greeting is what you
        $expected = "Hello world!";
        $actual = $user->talk();
        $this->assertEquals($expected, $actual);
	}
	public function testVariables()
	{
		$user1 = new User();
		$user1-> setName ('Gerald');
    	$this -> assertTrue ($user1->getName() == 'Gerald');
	}
	
	/*public function testCount()
	{
		$this->assertCount(0, array(new Foo(),new UserTest()));
	}*/
	/*public function testInsatances()
	{
		$test=array();
	$too = new Foo();
		$this->assertContainsOnlyInstancesOf('Foo', array(new Foo(), $test, $too));
	} */
	
	
public function testPublic1()
{
	 $test=array();
	$too = new Foo();
	$reflect = new ReflectionClass($too);
	$props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
	foreach ($props as $prop) 
	{
	    $test[]=$prop->getName();
	}
	$this->assertContains('foo',$test);
}
public function testPrivate()
{
	 $test=array();
	$too = new Foo();
	$reflect = new ReflectionClass('Foo');
	$props   = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
	foreach ($props as $prop) {
	    $test[]=$prop->getName();
		}
		$this->assertContains('baz',$test);
	}

public function testgetMethod() {
  $class = new ReflectionClass('User2');
  $method = $class->getMethod('talk');
  $method->setAccessible(true);
  return $method;
	}

public function teststringmatches()
{
	$this->assertRegExp('/foo/', 'foo bar');

	if(1==1)
	{
		try{
			$this->assertContains('foo','bar');
		}
		catch (Exception $e)
		{
			throw new Exception("first exception", 1);
			
		}
	}
}
    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage second exception
     */
    public function testExceptionHasRightMessage()
    {
        throw new InvalidArgumentException("second exception", 10);
    }
}


?>