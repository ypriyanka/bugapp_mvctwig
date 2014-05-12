<?php
ini_set("display_errors",1);
include("db.php");
$databasee = new database('localhost', 'root', 'vsspl');
$databasee->connectdb() ;
$databasee->select('bug_tracker');
$q = $_GET['q'];


 echo $query= 'UPDATE bugs SET description="'.$data['descp'].'",project="'.$data['project'].'",category="'.$data['category'].'",priority="'.$data['priority'].'",assigned_to="'.$data['assgn']. '"
,status="'.$data['status']. '"
,bugtype="'.$data['bugtype'].'"
 WHERE ID='.$q.'';
   echo $query1='INSERT INTO comments(comment_desp, bid) VALUES ("'.$data['comments'].'","'.$q.'")';
   $c=mysql_query($query1);
     $a = mysql_query($query); 
if (!$a||!$c)
  {
  die('Error: ' .mysql_error());
  }
else
	{
	header('location:bugs_page.php');
	}
 	
?>