<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	$deptno = $_POST['txtdeptno'];
	$deptname = $_POST['txtdeptname'];
	$deptabbr = $_POST['txtdeptabbr'];
	$bldgname = $_POST['txtbldgname'];
	$flrno = $_POST['txtflrno'];
	$localno = $_POST['txtlocalno'];
	$depthead = $_POST['txtdepthead'];
	$actno = $_POST['txtactno'];
	$orgno = $_POST['txtorgno'];
	$campusno = $_POST['txtcampusno'];
		
	$tableName = "departments";
	$colValue = "deptname = '$deptname', deptabbr = '$deptabbr', deptbldgname = '$bldgname', deptflrno = '$flrno', deptlocalno = '$localno', depthead = '$depthead', actno = '$actno', orgno = '$orgno', campusno = '$campusno'";
	$id = "deptno = $deptno";
	
	$result = updateTbl($tableName,$colValue,$id);
	
?>