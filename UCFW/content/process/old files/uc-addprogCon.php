<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");

		$progname = mysql_real_escape_string($_POST['txtprogname']);
		$progacro = mysql_real_escape_string($_POST['txtprogacronyms']);
		$colno = mysql_real_escape_string($_POST['txtcolno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);

		$tableName = "programs";
		$field = "progno,progname,progacronyms,progcolno,progcampusno,progstat";
		$data = "NULL,'$progname','$progacro','$colno','$campusno','active'";
		
		$result = insertTbl($tableName,$field,$data);
	
		if($result == 1){
			header("location:../../uc-program");
		}
	
?>