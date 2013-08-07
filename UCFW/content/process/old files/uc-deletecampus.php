<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	if(isset($_GET["id"])){
		$id = $_GET['id'];
		
		$tables = array('departments','colleges','programs','organizations','activities');
		$count = 0;
		$counts = array();
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
			echo "message = Cannot be deleted unless the department, colleges and programs are deleted. <br>";
			
		}
		else 
			{
			//$sql = mysql_query("DELETE FROM campuses where campusno = $id");
			//echo "successfully deleted";
			//header("location:uc-campus");
			echo "wa nay sud. <br>";
			}
		echo "count = $count";
	}
?>