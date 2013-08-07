<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
		$campusname = mysql_real_escape_string($_POST['txtcampusname']);
		$campusabbr = mysql_real_escape_string($_POST['txtcampusabbr']);
		$campusaddr = mysql_real_escape_string($_POST['txtcampusaddr']);
		$campuszipcode = mysql_real_escape_string($_POST['txtcampuszipcode']);
		$campustel = mysql_real_escape_string($_POST['txtcampustel']);
		
		$tableName = "campuses";
		$field = "campusno,campusname,campusabbr,address,zipcode,telephone,campusstat";
		$data = "NULL,'$campusname','$campusabbr','$campusaddr','$campuszipcode','$campustel','active'";
		
		//echo "$timeadded";
		$result = insertTbl($tableName,$field,$data);
		//echo "$result";
		if($result == 1){
			header("location:../../uc-campus");
		}
	
	
	//date_default_timezone_set('Asia/Manila');
	//$time_logged_in = date('Y-m-d, h:i:s A');
	//$par_date_birth = strtotime("$date_birth_day $date_birth_month $date_birth_year");
	//$date_birth = date('Y-m-d',$par_date_birth);
?>
