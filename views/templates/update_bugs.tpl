<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./views/css/create_bugs.css">
		
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
	{% include "header.tpl" %}
		
		<div class="labels">
			<form action="index.php?action=update_bugs&q={{bugs.ID}}" method="post" name="form1" onsubmit="return validation()">
				<ul>
					<li>
						<label for="textbox1">Description:</label>
						<input type="input" id="textbox1" value="{{bugs.description}}" maxlength="200" name="descp" onkeyup="countCharacters('mycounter',200,'textbox1')"/>
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
						  	
						  	<option Themes>Shipping</option>
						  	<option {%if bugs.project == 'Checkout' %}selected{% endif %}>Checkout</option>  
						  	<option {%if bugs.project == 'I18N' %}selected{% endif %}>I18N</option>
						  	<option {%if bugs.project == 'API' %}selected{% endif %}>API</option>
						  	<option{%if bugs.project == 'BigPay' %}selected{% endif %}>BigPay</option>
						  	<option {%if bugs.project == 'Themes' %}selected{% endif %} value="themes" >Themes</option>
						  	
						</select>
						
					</li>
					
					<li>
						<label>Category:</label>
						
						<select name="category">
							
							<option >Bug</option>
							<option {%if bugs.category == 'Enhancement' %}selected{% endif %}>Enhancement</option>  
							<option {%if bugs.category == 'Clarification' %}selected{% endif %}>Clarification</option>
							<option {%if bugs.category == 'Questions' %}selected{% endif %}>Questions</option>
							<option {%if bugs.category == 'Requirements' %}selected{% endif %}>Requirements</option>
						</select>
						
					</li>
					<li>
						<label>Priority:</label>
						
						<select name="priority">
							
							
							<option {%if bugs.priority == 'PRIORITY' %}selected{% endif %}>NO PRIORITY</option>
							<option {%if bugs.priority == 'Low' %}selected{% endif %}>Low</option>
							<option {%if bugs.priority == 'Medium' %}selected{% endif %}>Medium</option>  
							<option {%if bugs.priority == 'High' %}selected{% endif %}>High</option>
						</select>
						
					</li>
					<li>
						<label>Assigned To:</label>
						<select name="assgn">
								<option></option>
								
								<option {%if bugs.assigned_to == 'priya' %}selected{% endif %}>priya</option>
								<option {%if bugs.assigned_to == 'pratyusha' %}selected{% endif %}>pratyusha</option>  
								<option {%if bugs.assigned_to == 'jyotsna' %}selected{% endif %}>jyotsna</option>
							</select>
			
						
						
					</li>
					<li>
						<label>Status:</label>

						<select name="status">
								<option></option>
								
								<option {%if bugs.status == 'No PRIORITY' %}selected{% endif %}>No PRIORITY</option>
								<option {%if bugs.status == 'Checked IN' %}selected{% endif %}>Checked IN</option>  
								<option {%if bugs.status == 'Closed' %}selected{% endif %}>Closed</option>
								<option {%if bugs.status == 'In Progress' %}selected{% endif %}>In Progress</option>
								<option {%if bugs.status == 'ReOpen' %}selected{% endif %}>ReOpen</option>
								<option {%if bugs.status == 'Not A Bug' %}selected{% endif %}>Not A Bug</option>
								<option {%if bugs.status == 'Postponed' %}selected{% endif %}>Postponed</option>
						</select>
							
					</li>
					<li>
						<label>Bug Type:</label>
						<select name="bugtype">
							<option></option>
							<option {%if bugs.bugtype == 'Functional' %}selected{% endif %}>Functional</option>
							<option {%if bugs.bugtype == 'UI' %}selected{% endif %}>UI</option>  
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
		
	</body>
</html>