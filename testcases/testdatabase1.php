<?php
ini_set('display_error', 1);
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
       
        $queryTable = $this->getConnection()->createQueryTable('bugs', 'SELECT * FROM bugs');
		 $this->assertEquals(0, $this->getConnection()->getRowCount('bugs'));
		 $ds = new PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());
		$ds->addTable('bug12', 'SELECT * FROM bugs');
    }
	
	public function testComplexQuery()
		{
			$queryTable = $this->getConnection()->createQueryTable(
				'bugs', 'SELECT * FROM bugs where ID=11'
			);
			$expectedTable = $this->createFlatXmlDataSet(dirname(__FILE__).'/1.xml')
								  ->getTable("bugs");
			$expectedTable1 = $this->createFlatXmlDataSet(dirname(__FILE__).'/1.xml')
								  ->getTable("guestbook");
								  
			
			 //$expected=array("ID"=>11,"flag"=>'',"description"=>'qwert',"project"=>'asd',"organisation"=>'asd',"category"=>'jfds',"priprity"=>'sfg',"reported_by"=>'priya');
			$this->assertTablesEqual($expectedTable, $queryTable);
		}
			
	public function testdata_array()
	{
		echo 1;
	 	$dataSet = $this->_dbDefault->createDataSet(array('bugs'));
		echo 3;
		$actualDataSet = new PHPUnit_Extensions_Database_DataSet_DataSetFilter($dataSet, array('bugs' => array('ID')));
		 echo 2;
		// it's asking for the <mysqldump> when ever we are calling the create sqlxmldataset
		$dataSet = $this->createMySQLXMLDataSet(dirname(__FILE__) . '/datasets/testAddNewSupplier.xml');
		$expectedDataSet = new PHPUnit_Extensions_Database_DataSet_DataSetFilter($dataSet, array('suppliers' => array('created')));
		// Check that they are the same
		$this->assertDataSetsEqual($expectedDataSet, $actualDataSet);
		echo 4;
		
	}
	public function add_entry()
	{//not working
		$ds = new PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());
		$ds->addTable('guestbook','SELECT * FROM bugs');
		$ds->addEntry('12','12');
	}
	
}
?>

 