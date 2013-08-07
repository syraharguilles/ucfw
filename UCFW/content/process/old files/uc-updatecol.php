<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	$colno = $_POST['txtcolno'];
	$colname = $_POST['txtcolname'];
	$colabbr = $_POST['txtcolabbr'];
	$bldgname = $_POST['txtbldgname'];
	$flrno = $_POST['txtflrno'];
	$localno = $_POST['txtlocalno'];
	$coldean = $_POST['txtcoldean'];
	$actno = $_POST['txtactno'];
	$campusno = $_POST['txtcampusno'];
		
	$tableName = "colleges";
	$colValue = "colname = '$colname',  colabbr = '$colabbr', colbldgname = '$bldgname', colflrno = '$flrno', collocalno = '$localno', coldean = '$coldean', colactno = '$actno', colcampusno = '$campusno'";
	$id = "colno = $colno";
	
	$result = updateTbl($tableName,$colValue,$id);
	//$sql = mysql_query("UPDATE campuses SET campusname = '$txtcampusname', campusabbr = '$txtcampusabbr', campusstat = '$txtstat' WHERE campusno = $campusno ");
	
?>