<?php
class User {
   public $name;
   public $stack =array();
 
    public function getName() {
   
        return $this->name;
    }
 
    public function setName($name) {
        $this->name = $name;
    }
 
    public function talk() {
    	
        return "Hello world!";
    }
	public function checkArray()
	{
		
		return $this->stack;
	}
}
class User2 extends User
{
	 
	public function talk2()
	{
      
	 return $this->name;
	}
	
}
class Foo {

	public    $foo  = 1;
	public      $go=4;
    protected $bar  = 2;
    private   $baz  = 3;
}
class MyException

{
public function testException()
{
	
}	
}

?>