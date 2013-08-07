<?php
	require_once("../../library/dbcon.php");
	
	$id = $_POST['txtID'];
	$id = intval($id);

	$sql = "SELECT * from colleges co 
			left join activities a on co.colactno = a.actno 
			left join campuses c on co.colcampusno = c.campusno WHERE co.colno = $id";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	
	$data = array(
			'colno' => $row['colno'],
			'colname' => $row['colname'],
			'colabbr' => $row['colabbr'],
			'colbldgname' => $row['colbldgname'],
			'colflrno' => $row['colflrno'],
			'collocalno' => $row['collocalno'],
			'coldean' => $row['coldean'],
			'actname' => $row['actname'],
			'orgname' => $row['orgname'],
			'campusname' => $row['campusname']
			);
	echo json_encode($data);
?>