<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");

		$deptname = mysql_real_escape_string($_POST['txtdeptname']);
		$deptabbr = mysql_real_escape_string($_POST['txtdeptabbr']);
		$deptbldgname = mysql_real_escape_string($_POST['txtdeptbldgname']);
		$deptflrno = mysql_real_escape_string($_POST['txtdeptflrno']);
		$deptlocalno = mysql_real_escape_string($_POST['txtdeptlocalno']);
		$depthead = mysql_real_escape_string($_POST['txtdepthead']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);

		$tableName = "departments";
		$field = "deptno,deptname,deptabbr,deptbldgname,deptflrno,deptlocalno,depthead,deptcampusno,deptstat";
		$data = "NULL,'$deptname','$deptabbr','$deptbldgname','$deptflrno','$deptlocalno','$depthead','$campusno','active'";
		
		$result = insertTbl($tableName,$field,$data);
	
		if($result == 1){
			header("location:../../uc-department");
		}
	
?>