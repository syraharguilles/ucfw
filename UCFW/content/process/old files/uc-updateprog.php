<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	$progno = $_POST['txtprogno'];
	$progname = $_POST['txtprogname'];
	$progacro = $_POST['txtprogacronyms'];
	$colno = $_POST['txtcolno'];
	$orgno = $_POST['txtorgno'];
	$campusno = $_POST['txtcampusno'];
		
	$tableName = "programs";
	$colValue = "progname = '$progname', progacronyms = '$progacro', progcolno = '$colno', progorgno = '$orgno', progcampusno = '$campusno'";
	$id = "progno = $progno";
	
	$result = updateTbl($tableName,$colValue,$id);
	//$sql = mysql_query("UPDATE campuses SET campusname = '$txtcampusname', campusabbr = '$txtcampusabbr', campusstat = '$txtstat' WHERE campusno = $campusno ");
	
?>