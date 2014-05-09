<?php
class Database {

    private $host, $username, $password;
    public function __construct($ihost, $iusername, $ipassword){
        $this->host = $ihost;
        $this->username = $iusername;
        $this->password = $ipassword;
    }
	
	
    public function connectdb(){
        	try{
        $a=mysql_connect($this->host, $this->username, $this->password);
            //OR die("There was a problem connecting to the database.");
        if(!$a){
        throw new Exception(mysqli_connect_error());
		}
			}
		
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
		
        
    }
	
	
    public function select($database){
    	try{
        $b=mysql_select_db($database);
		if(!$b){
        throw new Exception(mysqli_connect_error());
		}
			}
            //OR die("There was a problem selecting the database.");
       catch(Exception $e)
		{
			echo $e->getMessage();
		}
    
	}
	
	
    public function disconnectdb(){
    	try{
       $c= mysql_close($this->connectdb());
	   if(!$c){
        throw new Exception(mysqli_connect_error());
		}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
		
            //OR die("There was a problem disconnecting from the database.");
    }
}


?>