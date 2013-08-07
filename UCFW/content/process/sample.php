<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	$tables = array('departments','colleges','programs','organizations','activities','posts','userdetails');
	$count = 0;
	$counts = array();
	$names = array();
	//$id = $_POST['campusno'];
	foreach ($tables as $t)
	{
		$sql = "select * from $t where campusno = 2";
		$result = mysql_query($sql);
		
		$count += mysql_num_rows($result);
		$arr = array();
		while($row = mysql_fetch_array($result)):
			if($t == 'userdetails')
				$arr[] = $row[0];
			else
				$arr[] = $row[2];
		endwhile;
		$counts [$t] = mysql_num_rows($result);
		$names[$t] = $arr;
	}
	$sql = "SELECT * FROM campuses where campusno = 2";
	$result = mysql_query($sql);			
	$row = mysql_fetch_array($result);
	
	if ($count > 0)
	{
		echo '<div>Cannot proceed delete operation. Campus :',$row['campusabbr'],'</div>';
		echo '<table border="1">';
		echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
		echo '<tr>';
		foreach ($tables as $t)
		{
			echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
		}
		echo '</tr>';
		echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
		echo '</table>';

		
		
	}
	else{
		//$sql = "UPDATE campuses SET campusstat = 'inactive' WHERE campusno = $id";
		//$result = mysql_query($sql);
		
		echo "Successfully Deleted \n\n Campus: ". $row['campusname'];
	}
