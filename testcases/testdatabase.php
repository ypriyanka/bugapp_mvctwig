<?php


class MyTestCase extends PHPUnit_Extensions_Database_TestCase
{
    public function testGetDataSet()
    {
    	echo "asdf";
		$this->assertEquals(true, true);
   
    }
	
    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
       $pdo = new PDO('mysql:host=localhost;dbname=bugs_tracker;charset=utf8', 'root', 'vsspl');
       return $this->createDefaultDBConnection($pdo, 'bug_tracker');      
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {	
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/1.xml');
        
        
    }	
	
}
?>