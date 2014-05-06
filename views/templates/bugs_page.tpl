<?php
echo '<link rel="stylesheet" href="../css/bugs_page.css">';
 
 include("db.php");
$databasee = new database('localhost', 'root', 'vsspl');
$databasee->connectdb();
$databasee->select('bug_tracker');
 
echo'
<html>
<head>
<title>bugs page</title>
<style>
#messageBox{
border-right: 1px solid #000000;
position:absolute;
width: 217px;
height: 100px;
z-index: 1;
background-color: white;
border-style: solid;
border-width: 1px;
display:none;
}
#closeButt{
width: 100%;
height: 10px;
z-index: 1;
cursor: pointer;
left: 0px;
top: 0px;
background-color: white;
}
#contents{
width: auto;
height: auto;
z-index: 2;
}
</style>
<script >
function mouseOver(obj,str1)
{
	
document.getElementById("mouse").offsetHeight;
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();

}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function()
{
	
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
	
messageBox.style.top=document.getElementById("tabledata").offsetTop;
messageBox.style.left=obj.offsetLeft;


document.getElementById("contents").innerHTML=xmlhttp.responseText;
messageBox.style.display="block";
}
}
xmlhttp.open("GET","/bugapp/php/comments.php?q="+str1 ,true);
xmlhttp.send();


}
function mouseOut()
{
messageBox.style.display="none";
}

function filter(str1,str2)
{
if (str1=="")
{
document.getElementById("tabledata").innerHTML="";
return;
}
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("tabledata").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","/bugapp/php/bugs_page_filtering.php?q="+str1 +"&s="+str2,true);
xmlhttp.send();
}
</script>
</head>
<body>';
ini_set('display_errors',1);
include("temp1.php");
$layout=new layout();
$layout->printHeader();

echo'
	<div class="wrap">
		<table class="tablehead">
			<tr id="theader">
				<th id="Id">Id</th>
				<th id="flag" style="">Flag</th>
				<th id="desc">Description</th>
				<th id="project" style="">Project</th>
				<th id "category">Category</th>
				<th id="reportedby">Reproted By</th>
				<th id="reportedon">Reported On</th>
				<th id="priority">Priority</th>
				<th id="assignto"style="">Assigned to</th>
				<th id="status">Status</th>
				<th id="updateby">Last Updated by</th>
				<th id="updateon">Last Updated on</th>
			
			</tr >
			<tr id="filter">
				
				<td id="fId"></td>
				
				<td>
					<select id="fflag" name="flag" onchange="filter(this.value,this.name)">
					
  							<option value="[nofilter]">[nofilter]</option>';
							
							$result = mysql_query("SELECT distinct flag FROM bugs");
							while($row = mysql_fetch_assoc($result))
  							{
    							echo "<option>".$row['flag']."</option>";
							}

					echo '</select>
				</td>
				<td id="fdesc"></td>
				<td >				       		
							<select id="fproject" name="project" onchange="filter(this.value,this.name)">
					    	
							<option value="[nofilter]">[nofilter]</option>';
							
							$result = mysql_query("SELECT distinct project FROM bugs");
							while($row = mysql_fetch_assoc($result))
  							{
    							echo "<option>".$row['project']."</option>";
							}
 
 				   	
				echo' </select>
				</td>
				<td >
					<select id="fcategory" name="category" onchange="filter(this.value,this.name)">
					
  							<option value="[nofilter]">[nofilter]</option>';
							
							$result = mysql_query("SELECT distinct category FROM bugs");
							while($row = mysql_fetch_assoc($result))
  							{
    							echo "<option>".$row['category']."</option>";
							}
  							
  							
					echo'</select>
				</td>
				<td >
					<select id="freportedby" name="reported_by" onchange="filter(this.value,this.name)">
  							
  							<option value="[nofilter]">[nofilter]</option>';
							
							$result = mysql_query("SELECT distinct reported_by FROM bugs");
							while($row = mysql_fetch_assoc($result))
  							{
    							echo "<option>".$row['reported_by']."</option>";
							}
				  
				   echo '</select>
				</td>
				<td id="freportedon"></td>
				<td >
					<select id="fpriority" name="priority" onchange="filter(this.value,this.name)">
  							
  							<option value="[nofilter]">[nofilter]</option>';
							
							$result = mysql_query("SELECT distinct priority FROM bugs");
							while($row = mysql_fetch_assoc($result))
  							{
    							echo "<option>".$row['priority']."</option>";
							}
					
				  echo '</select>
				</td>
				<td >
					<select id="fassignto" name="assigned_to" onchange="filter(this.value,this.name)">
  							
  							<option value="[nofilter]">[nofilter]</option>';
							
							$result = mysql_query("SELECT distinct assigned_to FROM bugs");
							while($row = mysql_fetch_assoc($result))
  							{
    							echo "<option>".$row['assigned_to']."</option>";
							}
					
				echo '</select>
				</td>
				<td >
					<select id="fstatus" name="status" onchange="filter(this.value,this.name)">
  							
  							<option value="[nofilter]">[nofilter]</option>';
							
							$result = mysql_query("SELECT distinct status FROM bugs");
							while($row = mysql_fetch_assoc($result))
  							{
    							echo "<option>".$row['status']."</option>";
							}
					
				echo'</select>
				</td>
				<td id="fupdateby">  </td>
				<td id="fupdateon">  </td>
				
			</tr>
			</table>
			
			<table id="tabledata">';
			
			$per_page=3;
			$start=(isset($_GET['start'])) ? $_GET['start'] : 0;
			$q1='select * from bugs';
			$query=mysql_query($q1);
			$maxRow=mysql_num_rows($query).'<br>';
			$q1.=' order by id desc limit '.$start.','.$per_page.'';
			$result=mysql_query($q1);
			

   while($row = mysql_fetch_assoc($result))
    {
  $data=$row['ID'];
    echo '<tr id=content><td id="cid">'.$row['ID'].'</td><td id="cflag">'.$row['flag'].'</td><td id="cdescription"><a id="mouse" onmouseover="mouseOver(this,'.$row['ID'].')" onmouseout="mouseOut()" href="/bugapp/php/update_bugs.php?q='.$data.'">'.$row['description'].'</a></td><td id="cproject">'.$row['project'].'</td><td id="ccategory">'.$row['category'].'</td><td id="creportedby">'.$row['reported_by'].'</td><td id="creportedon">'.$row['reported_on'].'</td><td id="cpriority">'.$row['priority'].'</td><td id="cassignedto">'.$row['assigned_to'].'</td><td id="cstatus">'.$row['status'].'<td id="clastupdatedby">'.$row['last_updated_by'].'</td><td id="clastupdatedon">'.$row['last_updated_on'].'</td></tr>';
   
    }	
echo'</table>
</div>';


$str = '../php/bugs_page.php';
echo $pagination = portal_pagination($str,$maxRow, $per_page, $start);
function portal_pagination($base_url,$num_items,$per_page,$start_item)
{
    $total_pages = ceil($num_items/$per_page);

	if ( $total_pages == 1 )
	{
		return '';
	}
$on_page = floor($start_item / $per_page) + 1;
$page_string = '';
		
		for($i = 1; $i < $total_pages + 1; $i++)
		{
			$page_string .= ( $i == $on_page ) ? '<b class="paging">' . $i . '</b>' : '<a class="paging" href="' . $base_url . "?start=" . ( ( $i - 1 ) * $per_page ) . '">
			' . $i . '</a>';
			if ( $i <  $total_pages )
			{
				$page_string .= '<b ></b> ';
			}
		}
// 	$page_string = 'Goto page'. ' ' . $page_string;

	return $page_string;
}

echo'
<div id="messageBox">
<div id="contents"></div>
</div>
</body>
</html>';

?>
