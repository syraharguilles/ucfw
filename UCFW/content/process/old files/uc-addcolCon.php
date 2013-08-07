<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
		$colname = mysql_real_escape_string($_POST['txtcolname']);
		$colabbr = mysql_real_escape_string($_POST['txtcolabbr']);
		$colbldgname = mysql_real_escape_string($_POST['txtcolbldgname']);
		$colflrno = mysql_real_escape_string($_POST['txtcolflrno']);
		$collocalno = mysql_real_escape_string($_POST['txtcollocalno']);
		$coldean = mysql_real_escape_string($_POST['txtcoldean']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);

		$tableName = "colleges";
		$field = "colno,colname,colabbr,colbldgname,colflrno,collocalno,coldean,colcampusno,colstat";
		$data = "NULL,'$colname','$colabbr','$colbldgname','$colflrno','$collocalno','$coldean','$campusno','active'";
		
		$result = insertTbl($tableName,$field,$data);
	
		if($result == 1){
			header("location:../../uc-college");
		}
	
	
	
?>