<?php
	$dblocalhost = "localhost";
	$dbusername = "root";
	$dbpassword = ""; 
	$dbname = "uc_community";
	
	$con = mysql_connect($dblocalhost,$dbusername,$dbpassword) or die("Connection error: Could not connect to server.");
	
	if ($con)
	{
		$db = mysql_select_db($dbname) or die("Connection error: Could not connect to database");
	}
	/*
		$status = "";
		$tables = array('departments','colleges','programs','organizations','activities');
		$count = 0;
		$counts = array();
		$id = "4";
		foreach ($tables as $t)
		{
			$sql = "select * from $t where campusno = $id";
			$result = mysql_query($sql);
			$count += mysql_num_rows($result);
			$counts [$t] = mysql_num_rows($result);

		}
		
		if ($count > 0)
		{
		
			foreach($counts as $table => $ctr)
			{
				echo "$table = $ctr <br>";
			}
			$status = "Cannot be deleted unless the department, colleges and programs are deleted. <br>";
			
		}
		else{
			$sql = "UPDATE campuses SET campusstat = 'inactive' WHERE campusno = $id";
			$result = mysql_query($sql);
			
			$status = "Successfully Deleted";
		}
				
		echo "Total = $count";
		echo "<br/>",$status;
	*/
	/*$sql = "select * 
	from campuses c 
	left join departments d on c.campusno = d.deptcampusno
	left join colleges col on c.campusno = col.colcampusno
	left join programs p on c.campusno = p.progcampusno
	left join organizations o on c.campusno = o.orgcampusno
	left join activities a on c.campusno = a.actcampusno 
	where c.campusno = 1";*/
	
	
	
?>