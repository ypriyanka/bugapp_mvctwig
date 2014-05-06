
{%for filters in filters %}

   					<tr id="content">
					<td id="cid">{{filters.ID}}</td>
					<td id="cflag">{{filters.flag}}</td>
					<td id="cdescription"><a id="mouse" onmouseover="mouseOver(this,{{filters.ID}})" onmouseout="mouseOut()" href="index.php?action=update&q={{filters.ID}}">{{filters.description}}</a></td>
					<td id="cproject">{{filters.project}}</td>
					<td id="ccategory">{{filters.category}}</td>
					<td id="creportedby">{{filters.reported_by}}</td>
					<td id="creportedon">{{filters.reported_on}}</td>
					<td id="cpriority">{{filters.priority}}</td>
					<td id="cassignedto">{{filters.assigned_to}}</td>
					<td id="cstatus">{{filters.status}}</td>
					<td id="clastupdatedby">{{filters.last_updated_by}}</td>
					<td id="clastupdatedon">{{filters.last_updated_on}}</td>
					</tr>
{%endfor%}
