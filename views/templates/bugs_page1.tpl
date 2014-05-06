
<html>
<head>
<title>bugs page</title>
<link rel="stylesheet" href="./views/css/bugs_page.css">

<script >
function mouseOver(obj,str1)
{
	
document.getElementById("content").offsetHeight;
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
	
document.getElementById("messageBox").style.top=obj.offsetTop;
document.getElementById("messageBox").style.left=obj.offsetLeft;


document.getElementById("contents").innerHTML=xmlhttp.responseText;
document.getElementById("messageBox").style.display="block";
}
}
xmlhttp.open("GET","index.php?action=comments&q="+str1 ,true);
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
xmlhttp.open("GET","index.php?action=filtering&q="+str1 +"&s="+str2,true);
xmlhttp.send();
}
</script>
</head>
<body>
	{% include "header.tpl" %}
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
					
  							<option value="[nofilter]">[nofilter]</option>
							
							{%for flag in flags %}
					           <option>{{flag.flag}}</option>
					          {%endfor%}
    							
							

					</select>
				</td>
				<td id="fdesc"></td>
				<td >			{{dump(project)}}	       		
							<select id="fproject" name="project" onchange="filter(this.value,this.name)">
					    	
							<option value="[nofilter]">[nofilter]</option>';
							
							{%for project in project %}
							
					           <option>{{project.project}}</option>
					          {%endfor%}   	
							</select>
				</td>
				<td >
					<select id="fcategory" name="category" onchange="filter(this.value,this.name)">
					
  							<option value="[nofilter]">[nofilter]</option>';
							
							{%for category in category %}
					           <option>{{category.category}}</option>
					          {%endfor%}
							
							
  							
  							
					</select>
				</td>
				<td >
					<select id="freportedby" name="reported_by" onchange="filter(this.value,this.name)">
  							
  							<option value="[nofilter]">[nofilter]</option>';
							
						
							
							{%for reported_by in reported_by %}
					           <option>{{reported_by.reported_by}}</option>
					          {%endfor%}
							
				  
				   echo '</select>
				</td>
				<td id="freportedon"></td>
				<td >
					<select id="fpriority" name="priority" onchange="filter(this.value,this.name)">
  							
  							<option value="[nofilter]">[nofilter]</option>';
							{%for priority in priority %}
					           <option>{{priority.priority}}</option>
					         {%endfor%}	
							
					</select>
				</td>
				<td >
					<select id="fassignto" name="assigned_to" onchange="filter(this.value,this.name)">
  							
  							<option value="[nofilter]">[nofilter]</option>';
							
							{%for assigned_to in assigned_to %}
					           <option>{{assigned_to.assigned_to}}</option>
					          {%endfor%}
					          
							
							
					
				</select>
				</td>
				<td >
					<select id="fstatus" name="status" onchange="filter(this.value,this.name)">
  							
  							<option value="[nofilter]">[nofilter]</option>';
							{%for status in status %}
					           <option>{{status.status}}</option>
					          {%endfor%}
							
							
					
				</select>
				</td>
				<td id="fupdateby">  </td>
				<td id="fupdateon">  </td>
				
			</tr>
			</table>
			<table id="tabledata">
				
				{%for bugs in bugs_data %}
				
				<tr id="content">
					<td id="cid">{{bugs.ID|e}}</td>
					<td id="cflag">{{bugs.flag}}</td>
					<td id="cdescription"><a id="mouse" onmouseover="mouseOver(this,{{bugs.ID}})" onmouseout="mouseOut()" href="index.php?action=update&q={{bugs.ID}}">{{bugs.description}}</a></td>
					<td id="cproject">{{bugs.project}}</td>
					<td id="ccategory">{{bugs.category}}</td>
					<td id="creportedby">{{bugs.reported_by}}</td>
					<td id="creportedon">{{bugs.reported_on}}</td>
					<td id="cpriority">{{bugs.priority}}</td>
					<td id="cassignedto">{{bugs.assigned_to}}</td>
					<td id="cstatus">{{bugs.status}}</td>
					<td id="clastupdatedby">{{bugs.last_updated_by}}</td>
					<td id="clastupdatedon">{{bugs.last_updated_on}}</td>   
					</tr>
			{%endfor%}
			
			
			</table>
			
			{% for i in 1..total_pages %}
			{%set page_string=i%}
			{%if i == on_page %}
			
			<b class="paging">{{i}}</b>
			{% else %}
			{%set page=i*(per_page)-3%}
			<a class="paging" href="index.php?action=displayBugs&start={{page}}">{{i}}</a>
			{% endif %}
			{%endfor%}
			
	</div>
<div id="messageBox">
<div id="contents"></div>
</div>
</body>
</html	
			
			
			


