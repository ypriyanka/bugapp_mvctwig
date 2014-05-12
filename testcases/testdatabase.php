<?php
class ConnectionTest extends PHPUnit_Extensions_Database_TestCase
{
	var $pdo;
	public function getConnection()
	{
		$this->pdo = new PDO('mysql:host=localhost;dbname=bug_tracker;charset=utf8', 'root', 'vsspl');
		return $this->createDefaultDBConnection($this->pdo, 'bug_tracker');
	}
	public function testCreateDataSet()
	{
		$tableNames = array('login_users');
		$dataSet = $this->getConnection()->createDataSet();
		//var_dump($dataSet);
		// var_dump($this->pdo->query('SELECT * FROM bugs;'));
	}
	public function getDataSet()
	{
		return $this->createFlatXMLDataSet(dirname(__FILE__).'/test.xml');
	}
	public function testCreateQueryTable()
	{
		$queryTable = $this->getConnection()->createQueryTable('duplog', 'SELECT * FROM duplog');
		$this->assertEquals(3, $this->getConnection()->getRowCount('duplog'));
	}
	public function testComplexQuery()
	{
		$queryTable = $this->getConnection()->createQueryTable('duplog', 'SELECT * FROM duplog');
		$expectedTable = $this->createFlatXmlDataSet(dirname(__FILE__).'/test.xml')->getTable("duplog");
		$this->assertTablesEqual($expectedTable, $queryTable);
	}
}
?>