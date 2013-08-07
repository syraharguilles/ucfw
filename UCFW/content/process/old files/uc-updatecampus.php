<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	$campusno = $_POST['txtcampusno'];
	$campusname = $_POST['txtcampusname'];
	$campusabbr = $_POST['txtcampusabbr'];
	$campusaddr = $_POST['txtcampusaddr'];
	$campuszipcode = $_POST['txtcampuszipcode'];
	$campustel = $_POST['txtcampustel'];
		
	$tableName = "campuses";
	$colValue = "campusname = '$campusname', campusabbr = '$campusabbr', address = '$campusaddr', zipcode = '$campuszipcode', telephone = '$campustel'";
	$id = "campusno = $campusno";
	
	$result = updateTbl($tableName,$colValue,$id);
	//$sql = mysql_query("UPDATE campuses SET campusname = '$txtcampusname', campusabbr = '$txtcampusabbr', campusstat = '$txtstat' WHERE campusno = $campusno ");
	
?>