<?php
class ConnectionTest extends PHPUnit_Extensions_Database_TestCase
{
	var $pdo;
   
   /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
       $this->pdo = new PDO('mysql:host=localhost;dbname=bugs_tracker;charset=utf8', 'root', 'vsspl');
       return $this->createDefaultDBConnection($this->pdo, 'bugs_tracker');      
    }
	
    public function testCreateDataSet()
    {
       
        $dataSet = $this->getConnection()->createDataSet();
		
		//var_dump($dataSet);
	   // var_dump($this->pdo->query('SELECT * FROM bugs;'));
		
		
    }
	/**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {	
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/1.xml');
        
        
    }
	public function testCreateQueryTable()
    {
       
       var_dump( $queryTable = $this->getConnection()->createQueryTable('bugs', 'SELECT * FROM bugs'));
		 $this->assertEquals(0, $this->getConnection()->getRowCount('bugs'));
		 $ds = new PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());
		var_dump($ds->addTable('bugs', 'SELECT * FROM bugs'));
    }
	/*
	public function testComplexQuery()
		{
			var_dump($queryTable = $this->getConnection()->createQueryTable(
				'bugs', 'SELECT * FROM bugs where ID=1'
			));
			var_dump($expectedTable = $this->createFlatXmlDataSet(dirname(__FILE__).'/1.xml')
								  ->getTable("bugs"));
			$this->createMySQLXMLDataSet(dirname(__FILE__).'/1.xml');
			 //$expected=array("ID"=>11,"flag"=>'',"description"=>'qwert',"project"=>'asd',"organisation"=>'asd',"category"=>'jfds',"priprity"=>'sfg',"reported_by"=>'priya');
			$this->assertTablesEqual($expectedTable, $queryTable);
					 }*/
	
		
}
?>

 