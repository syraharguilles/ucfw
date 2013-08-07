<?php
session_start();
//	require_once("content/process/redirect.php");
	require_once("dbcon.php");

echo '<label>View Record(Campuses Admin)</label>';
	echo'<table cellpadding = "2px" class="ui-widget ui-widget-content">';	
			
				$sql = mysql_query("SELECT * FROM userheader uh
									left join userdetails ud on uh.idno = ud.idno 
									left join campuses c on ud.usercampusno = c.campusno WHERE uh.usertype = 'campus-admin' 
									AND ud.userstat = 'active' AND ud.useraddedby = ".$_SESSION['id']."
									ORDER BY uh.idno ASC");
				if(!mysql_num_rows($sql) > 0){
					echo "No record as off now";				
				}
				else
				{
			
			
			
				echo"<tr class = 'ui-widget-header'>
						<th>ID NO</th>
						<th>USER FIRT NAME</th>
						<th>USER LAST NAME</th>
						<th>USER MIDNAME</th>
						<th>GENDER</th>
						<th>CAMPUS NAME</th>
						<th>EMAIL</th>
						<th colspan = '2'>ACTION</th>
					</tr>";
				while($row = mysql_fetch_array($sql)):
			
			echo '<tr class = "checking">';
			echo '<td>'.  $row[0].'</td>';
			echo '<td>'.  $row[1].'</td>';
			echo '<td>'.  $row[2].'</td>';
			echo '<td>'.  $row[3].'</td>';
			echo '<td>'.  $row[4].'</td>';
			echo '<td>'.$row['campusabbr'].'</td>';
			echo	'<td>'. $row['useremail'].'</td>';
			echo'	<td><a href = "javascript:void(0);" class = "updatecampusadmin" id = "'.$row[0].'">UPDATE</a></td>
				<td><a href = "javascript:void(0);" class = "deletecampusadmin" id = "'.$row[0].'">DELETE</a></td>
			</tr>';
			
				endwhile;
				}
			
			echo '</table>';
?>