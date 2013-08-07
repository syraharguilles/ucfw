<?php
	require_once("../../library/dbcon.php");
	
	$id = $_POST['txtID'];
	$id = intval($id);
	
	$sql = "SELECT * FROM campuses WHERE campusno = $id";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	
	$data = array(
			'campusno' => $row['campusno'],
			'campusname' => $row['campusname'],
			'campusabbr' => $row['campusabbr'],
			'address' => $row['address'],
			'zipcode' => $row['zipcode'],
			'telephone' => $row['telephone'],
			);
	echo json_encode($data);
?>