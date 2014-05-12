<?php
require_once "../models/model.php";
require_once '../models/db.php';
class HomeTest extends PHPUnit_Framework_TestCase
{
	 public $model;
	public function __construct() 
	{
		$this->model=new Model();
		
		if(class_exists('PHPUnit_Extensions_Database_TestCase')) {
			echo "Exists \n";
		}
		//databse connection
    	$databasee = new database('localhost', 'root', 'vsspl');
		$databasee->connectdb();
		$databasee->select('bug_tracker'); 
       
    
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
		 $expected=array("ID"=>11,"flag"=>'',"description"=>'qwert',"project"=>'asd',"organisation"=>'asd',"category"=>'jfds',"priprity"=>'sfg',"reported_by"=>'priya');
		 $row1=array();
		$result = mysql_query("SELECT distinct project FROM bugs");
		while($row = mysql_fetch_assoc($result))
		{
			
		array_push($row1, $row);
		}

  		 
		 $this->assertContains($expected, $row1);
		 
	}
	
}

?>