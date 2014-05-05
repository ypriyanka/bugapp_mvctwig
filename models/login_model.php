
<?php

session_start();
include("db.php");
$database = new database('localhost', 'root', 'vsspl');
$database->connectdb();
$database->select('bug_tracker');

class Valid
{
	public $a;
public function validation()
{
        
       if(!empty($_POST['UserName']) && !empty($_POST['Password']))
{
  $UserNamef = $_POST['UserName'];
  $Passwordf = $_POST['Password'];

   $checklogin = mysql_query('SELECT * from login_users where UserName = "'. $UserNamef.'" ') or die(mysql_error());

    $row = mysql_fetch_array($checklogin);
     
    $UserNamedb = $row['UserName'];
$Passworddb = $row['Password'];
    //comparison start
if($UserNamef != $UserNamedb)
     {
      $feedback="Your account was not found, please try again.";

     }
else
{
if($Passwordf != $Passworddb)
{
$feedback="Your password is incorrect";
$this->a="invalid";
}
else
{
$_SESSION['UserName2']= $_POST['UserName'];
//header('location:model/bugs_page.php');	
$this->a="valid";
}
}
     //comparison done
}
    else
   {
        $feedback="Please fill in all the blank areas.";
		$this->a="invalid";
   }
return $this->a;
}
}
//$database->disconnectdb();
?>
