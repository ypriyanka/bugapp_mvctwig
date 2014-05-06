
<?php

session_start();
include("db.php");
$database = new database('localhost', 'root', 'vsspl');
$database->connectdb();
$database->select('bug_tracker');

class Valid
{
	public $feedback1;
	
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
      $this->feedback1="Your account was not found, please try again.";

     }
else
{
if($Passwordf != $Passworddb)
{
$this->feedback1="Your password is incorrect";
//$this->a="invalid";
}
else
{
$_SESSION['UserName2']= $_POST['UserName'];
$this->feedback1="valid";
}
}
     //comparison done
}
    else
   {
        $this->feedback1="Please fill in all the blank areas.";
		//$this->a="invalid";
   }
return $this->feedback1;
}
}
//$database->disconnectdb();
?>
