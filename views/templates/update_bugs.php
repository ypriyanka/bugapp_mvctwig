<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/create_bugs.css">
		
		<title>Bugs Reporting Page</title>
		<script type="text/javascript">  
		
							function countCharacters(id,max_chars,myelement)  
							{  
								counter = document.getElementById(id);  
								field = document.getElementById(myelement).value;  
								field_length = field.length;  
			 					if (field_length <= max_chars)  {     
								remaining_characters = max_chars-field_length;     
								counter.innerHTML = remaining_characters;  }  
			 				}
			 				function change_size(rowid)
							{
								ela=document.getElementById("comment");
								if(ela.rows+rowid<1)
								{
									ela.rows=1;
								}
								else
								{
								 	 ela.rows+=rowid;
								}
							}
							function validation ()
							{
								var descp=document.forms["form1"]["descp"].value;
								if(descp==null || descp=="")
								{
								alert("A short description is necessary!!");
								return false;
								}
								var proj=document.forms["form1"]["proj"].value;
								if(proj==null || proj=="")
								{
								alert("Project Name is necessary!!");
								return false;
								}
								var org=document.forms["form1"]["org"].value;
								if(org==null || org=="")
								{
								alert("A Organisation name is necessary!!");
								return false;
								}
								var category=document.forms["form1"]["category"].value;
								if(category==null || category=="")
								{
								alert("Please select a category!!");
								return false;
								}
								var priority=document.forms["form1"]["priority"].value;
								if(priority==null || priority=="")
								{
								alert("Please select a priority!!");
								return false;
								}
								var assign=document.forms["form1"]["assign"].value;
								if(assign==null || assign=="")
								{
								alert("Please select a to whom the project is assigned to!!");
								return false;
								}
								var status=document.forms["form1"]["status"].value;
								if(status==null || status=="")
								{
								alert("Please select the current status of the project!!");
								return false;
								}
								var bugtype=document.forms["form1"]["bugtype"].value;
								if(bugtype==null || bugtype=="")
								{
								alert("Please select a bug type!!");
								return false;
								}
								var build=document.forms["form1"]["build"].value;
								if(build==null || build=="")
								{
								alert("Please select the build of the project!!");
								return false;
								}
								var app=document.forms["form1"]["app"].value;
								if(app==null || app=="")
								{
								alert("Please select a Application!!");
								return false;
								}
								var modapp=document.forms["form1"]["modapp"].value;
								if(modapp==null || modapp=="")
								{
								alert("Please select a modules or an application!!");
								return false;
								}
								var comments=document.forms["form1"]["comments"].value;
								if(comments==null || comments=="")
								{
								alert("Please enter any comments!!");
								return false;
								}
							}
			 			</script>  
	</head>
	<body>
		<?php
	
		ini_set('display_errors',1);
     
     
             include("temp1.php");
             $layout=new layout();
             $layout->printHeader();
     
		
		include ('db.php');
		$database = new database('localhost', 'root', 'vsspl');
		$database->connectdb();
		$database->select('bug_tracker');
		$q1 = $_GET['q'];
		$result = mysql_query('SELECT * FROM bugs where ID="'.$q1.'"');
		//var_dump(mysql_fetch_assoc($result));
   		$row = mysql_fetch_assoc($result);
	 
  		//var_dump($row);
  
   
		?>
		
		<div class="labels">
			<form action="updated_bugs.php?q=<?php echo $row['ID'];?>" method="post" name="form1" onsubmit="return validation()">
				<ul>
					<li>
						<label for="textbox1">Description:</label>
						<input type="input" id="textbox1" value="<?php echo $row['description'];?>" maxlength="200" name="descp" onkeyup="countCharacters('mycounter',200,'textbox1')"/>
						<div id="characters_remaining">
						<span id="mycounter">200</span> <span>Characters remaining</span>
						</div><br>
						<div class="sidebar">
							<p>Presets:
								<a href="#">use</a> /
								<a href="#">save</a>
							</p>
						</div>
						<br>
						<br>
					</li>
					<li>
						<label>Project:</label>
						<select name="project">
						  	
						  	<option<?php if ($row['project'] == 'Shipping') echo 'selected';?>>Shipping</option>
						  	<option<?php if ($row['project'] == 'Checkout') echo 'selected';?>>Checkout</option>  
						  	<option<?php if ($row['project'] == 'I18N') echo 'selected';?>>I18N</option>
						  	<option<?php if ($row['project'] == 'API') echo 'selected';?>>API</option>
						  	<option<?php if ($row['project'] == 'Bigpay') echo 'selected';?>>BigPay</option>
						  	<option value="themes" <?php if ($row['project'] == 'Themes') echo 'selected';?>>Themes</option>
						  	
						</select>
						
					</li>
					
					<li>
						<label>Category:</label>
						
						<select name="category">
							
							<option <?php if ($row['category'] == 'Bug') echo 'selected';?>>Bug</option>
							<option <?php if ($row['category'] == 'Enhancement') echo 'selected';?>>Enhancement</option>  
							<option <?php if ($row['category'] == 'Clarrification') echo 'selected';?>>Clarification</option>
							<option <?php if ($row['category'] == 'Questions') echo 'selected';?>>Questions</option>
							<option <?php if ($row['category'] == 'Requirements') echo 'selected';?>>Requirements</option>
						</select>
						
					</li>
					<li>
						<label>Priority:<?php echo $row['priority'];?></label>
						
						<select name="priority">
							
							<option <?php if ($row['priority'] == 'NO PRIORITY') echo 'selected';?>></option>
							<option <?php if ($row['priority'] == 'NO PRIORITY') echo 'selected';?>>NO PRIORITY</option>
							<option <?php if ($row['priority'] == 'LOW') echo 'selected';?>>Low</option>
							<option <?php if ($row['priority'] == 'Medium') echo 'selected';?>>Medium</option>  
							<option <?php if ($row['priority'] == 'High') echo 'selected';?>>High</option>
						</select>
						
					</li>
					<li>
						<label>Assigned To:</label>
						<select name="assgn">
								<option></option>
								
								<option <?php if ($row['assigned_to'] == 'priya') echo 'selected';?>>priya</option>
								<option <?php if ($row['assigned_to'] == 'pratyusha') echo 'selected';?>>pratyusha</option>  
								<option <?php if($row['assigned_to']=='jyotsna') echo 'selected';?>>jyotsna</option>
							</select>
			
						
						
					</li>
					<li>
						<label>Status:</label>

						<select name="status">
								<option></option>
								
								<option <?php if ($row['status'] == 'No PRIORITY') echo 'selected';?>>No PRIORITY</option>
								<option <?php if ($row['status'] == 'Checked IN') echo 'selected';?>>Checked IN</option>  
								<option <?php if($row['status']=='Closed') echo 'selected';?>>Closed</option>
								<option <?php if($row['status']=='In Progress') echo 'selected';?>>In Progress</option>
								<option <?php if($row['status']=='ReOpen') echo 'selected';?>>ReOpen</option>
								<option <?php if($row['status']=='Not A Bug') echo 'selected';?>>Not A Bug</option>
								<option <?php if($row['status']=='Postponed') echo 'selected';?>>Postponed</option>
						</select>
							
					</li>
					<li>
						<label>Bug Type:</label>
						<select name="bugtype">
							<option></option>
							<option <?php if($row['bugtype']=='Functional') echo 'selected';?>>Functional</option>
							<option <?php if($row['bugtype']=='UI') echo 'selected';?>>UI</option>  
						</select>	
							
					
					</li>
				
				</ul>
			<div id="comments_section">
			<label class="commentsize" onclick="change_size(5)" name="+">[+]</label>&nbsp;
			<label class="commentsize" onclick="change_size(-5);" name="-">[-]</label>
			<label for="comment">Comments:</label>
			
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!--<label id="textoncomment">Entering "bugid#999" in comment creates link to id 999</label>-->
			<textarea rows="5" cols="83" id="comment" name="comments"></textarea><br>
			<div id="submit">
				<input type="submit" value="update" />
			</div>
			</div>
			</form>
		</div>
		<?php echo'<div>';
		 $query='SELECT comment_desp from comments WHERE bid='.$q1.'';
  
     $a = mysql_query($query);
	 if (!$a)
  {
  die('Error: ' .mysql_error());
  }
else
	{ echo '<table>';
		 while($row = mysql_fetch_assoc($a))
    {
    	echo'<tr ><td style=border-style:double;>'.
    	
    	 $row['comment_desp'].'<br></td></tr>';
		 
	}
	echo '</table>';
	}
		
		echo '</div>';?>
	</body>
</html>