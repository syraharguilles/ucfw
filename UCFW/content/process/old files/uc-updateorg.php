<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	$orgno = $_POST['txtorgno'];
	$orgname = $_POST['txtorgname'];
	$orgabbr = $_POST['txtorgabbr'];
	$orgtype = $_POST['txttype'];
	$bldgname = $_POST['txtbldgname'];
	$flrno = $_POST['txtflrno'];
	$localno = $_POST['txtlocalno'];
	$actno = $_POST['txtactno'];
	$campusno = $_POST['txtcampusno'];
		
	$tableName = "organizations";
	$colValue = "orgname = '$orgname', orgabbr = '$orgabbr', orgtype = '$orgtype',orgbldgname = '$bldgname', orgflrno = '$flrno', orglocalno = '$localno', orgactno = '$actno', orgcampusno = '$campusno'";
	$id = "orgno = $orgno";
	
	$result = updateTbl($tableName,$colValue,$id); 
	//$sql = mysql_query("UPDATE campuses SET campusname = '$txtcampusname', campusabbr = '$txtcampusabbr', campusstat = '$txtstat' WHERE campusno = $campusno ");
	
?>