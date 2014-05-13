<?php
class DbTest extends PHPUnit_Extensions_Database_TestCase
{
var $pdo;
/**
 * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
public function getConnection()
{
$this->pdo = new PDO('mysql:host=localhost;dbname=bug_tracker;charset=utf8', 'root', 'vsspl');
return $this->createDefaultDBConnection($this->pdo, 'bug_tracker');
}

public function getDataSet()
{
return $this->createFlatXMLDataSet(dirname(__FILE__).'/login_test.xml');
}
public function testRowCount()
{
$this->assertEquals(2, $this->getConnection()->getRowCount('login_dummy'));
}
public function testComplexQuery()
{
//$queryTable = $this->getConnection()->createQueryTable('login_dummy', 'SELECT * FROM login_dummy where username="priyanka"');
$queryTable = $this->getConnection()->createQueryTable('login_dummy', 'SELECT * FROM login_dummy');
$expectedTable = $this->createFlatXmlDataSet(dirname(__FILE__).'/login_test.xml')->getTable("login_dummy");
$this->assertTablesEqual($expectedTable, $queryTable);
}

}
?>