<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	$idno = $_POST['txtidno'];
	$userfname = $_POST['txtfname'];
	$usermidname = $_POST['txtmidname'];
	$userlname = $_POST['txtlname'];
	$progno = $_POST['txtprogno'];
	$orgno = $_POST['txtorgno'];
		
	$tableName = "userdetails";
	$colValue = "userfname = '$userfname', usermidname = '$usermidname', userlname = '$userlname', progno = '$progno', orgno = '$orgno'";
	$id = "idno = $idno";
	
	$result = updateTbl($tableName,$colValue,$id);
	//$sql = mysql_query("UPDATE campuses SET campusname = '$txtcampusname', campusabbr = '$txtcampusabbr', campusstat = '$txtstat' WHERE campusno = $campusno ");
	
?>