
<?php
ini_set("display_errors",1);
include("db.php");
class Model {
	public $id;
    public function __construct() {
    	$databasee = new database('localhost', 'root', 'vsspl');
		$databasee->connectdb();
		$databasee->select('bug_tracker'); 
       
    }
	public function flags()
	{
			$row1=array();
		$result = mysql_query("SELECT distinct flag FROM bugs");
		while($row = mysql_fetch_assoc($result))
  							{
    						array_push($row1, $row);
							}
					
  			return $row1;
	}
	public function project()
	{
			$row1=array();
		$result = mysql_query("SELECT distinct project FROM bugs");
		while($row = mysql_fetch_assoc($result))
  							{
  								
    						array_push($row1, $row);
							}
					
  			return $row1;
	}
	public function category()
	{
			$row1=array();
		$result = mysql_query("SELECT distinct category FROM bugs");
		while($row = mysql_fetch_assoc($result))
  							{
    						array_push($row1, $row);
							}
					
  			return $row1;
	}
	public function reported_by()
	{
			$row1=array();
		$result = mysql_query("SELECT distinct reported_by FROM bugs");
		while($row = mysql_fetch_assoc($result))
  							{
    						array_push($row1, $row);
							}
					
  			return $row1;
	}
	public function priority()
	{
			$row1=array();
		$result = mysql_query("SELECT distinct priority FROM bugs");
		 while($row = mysql_fetch_assoc($result))
  							{
    						array_push($row1, $row);
							}
					
  			return $row1;
	}
	public function assigned_to()
	{
			$row1=array();
		$result = mysql_query("SELECT distinct assigned_to FROM bugs");
	 	while($row = mysql_fetch_assoc($result))
  							{
    						array_push($row1, $row);
							}
					
  			return $row1;
	}
	public function status() 
	 {
	 	$row1=array();
	 	$result = mysql_query("SELECT distinct status FROM bugs");
	 	while($row = mysql_fetch_assoc($result))
  							{
    						array_push($row1, $row);
							}
					
  			return $row1;
	 }
	 public function bugs_data()
	 {
	 		$row1=array();
			$per_page=3;
			$start=(isset($_GET['start'])) ? $_GET['start'] : 0;
			$q1='select * from bugs';
			$query=mysql_query($q1);
			$maxRow=mysql_num_rows($query).'<br>';
			$q1.=' order by id asc limit '.$start.','.$per_page.'';
			$result=mysql_query($q1);
  			while($row = mysql_fetch_assoc($result))
  							{
    						array_push($row1, $row);
							}
					
  			return $row1;
   	 }
	public function comments($q)
	{
		$row1=array();
		$query='SELECT comment_desp from comments WHERE bid='.$q.'';
			$result=mysql_query($query);	
  			while($row = mysql_fetch_assoc($result))
  							{
    						array_push($row1, $row);
							}
					
					
  			return $row1;
	}
	public function filters($q)
	{
		$row1=array();
		$query='SELECT * FROM bugs where project="'.$q.'"';
			$result=mysql_query($query);	
  			while($row = mysql_fetch_assoc($result))
  							{
    						array_push($row1, $row);
							}
					
					
  			return $row1;
		
	}
	public function no_of_rows()
	{
			$q1='select * from bugs';
			$query=mysql_query($q1);
			$maxRow=mysql_num_rows($query);
			return $maxRow;
	}
	        
} 






?>