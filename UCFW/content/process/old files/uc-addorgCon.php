<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
		$orgname = mysql_real_escape_string($_POST['txtorgname']);
		$orgabbr = mysql_real_escape_string($_POST['txtorgabbr']);
		$orgtype = mysql_real_escape_string($_POST['txttype']);
		$orgbldgname = mysql_real_escape_string($_POST['txtorgbldgname']);
		$orgflrno = mysql_real_escape_string($_POST['txtorgflrno']);
		$orglocalno = mysql_real_escape_string($_POST['txtorglocalno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		
		$tableName = "organizations";
		$field = "orgno,orgname,orgabbr,orgtype,orgbldgname,orgflrno,orglocalno,orgcampusno,orgstat";
		$data = "NULL,'$orgname','$orgabbr','$orgtype','$orgbldgname','$orgflrno','$orglocalno','$campusno','active'";
	
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-organization");
		}
	
?>