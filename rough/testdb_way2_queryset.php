<?php
class LoginUsers extends PHPUnit_Extensions_Database_TestCase
{
    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    var $pdo;
    public function getConnection()
    {	$user="root";
    	$password="vsspl";
        $database = 'bug_tracker';
        $this->pdo = new PDO('mysql:host=localhost;dbname=bug_tracker;charset=utf8',$user, $password);
        return $this->createDefaultDBConnection($this->pdo, $database);
    }
	
	public function getDataSet()
    {
         return $this->createFlatXMLDataSet(dirname(__FILE__).'/login_test.xml');
		//$this->pdo->addTable('login_dummy2', 'SELECT * from login_users');  
    }

	public function testmyQuery()
    {
        $queryTable = $this->getConnection()->createQueryTable(
            'login_dummy', 'SELECT * from login_dummy where username ="priyanka"');
        $expectedTable = $this->createFlatXmlDataSet("login_test.xml")
                              ->getTable("login_dummy");
        $this->assertTablesEqual($expectedTable, $queryTable);
    }
	/*public function testCreateQueryTable()
    {
        $tableNames = array('LoginUsers');
        $queryTable = $this->getConnection()->createQueryTable('LoginUsers', 'SELECT * from login_users where UserName ="priyanka"');
    }
	  public function testGetRowCount()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('LoginUsers'));
    }*/
    public function testCreateQueryTable()
	{
	$queryTable = $this->getConnection()->createQueryTable('login_dummy', 'SELECT * FROM login_dummy');
	$this->assertEquals(1, $this->getConnection()->getRowCount('login_dummy'));
	}
}
?>