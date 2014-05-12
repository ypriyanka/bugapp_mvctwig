<?php
require_once "../models/model.php";
class HomeTest extends PHPUnit_Framework_TestCase
{
	 public $model;
	public function __construct() 
	{
		$this->model=new Model();
		
		if(class_exists('PHPUnit_Extensions_Database_TestCase')) {
			echo "Exists \n";
		}
	}

	public function testcategory()
	{
		$i=0;
		$flag=array();
		$flag=$this->model->category();
		
		
		$this->assertInternalType('array',$flag);	
				foreach ($flag as $key => $value) {
					foreach ($value as $key => $value2) {
					$this->assertContains( $value2, array('Bug','Enhancement','Questions','Bugcvx'));	
					}
				}
		 $this->assertCount(4, $flag);
		 
	}
	
	



}

?>