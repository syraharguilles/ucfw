<?php
	require_once("../../library/dbcon.php");
	
	$id = $_POST['txtID'];
	$id = intval($id);
	
	$sql = "SELECT * from organizations o 
			left join activities a on o.orgactno = a.actno
			left join campuses c on o.orgcampusno = c.campusno WHERE o.orgno = $id";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	
	$data = array(
			'orgno' => $row['orgno'],
			'orgname' => $row['orgname'],
			'orgabbr' => $row['orgabbr'],
			'orgtype' => $row['orgtype'],
			'orgbldgname' => $row['orgbldgname'],
			'orgflrno' => $row['orgflrno'],
			'orglocalno' => $row['orglocalno'],
			'actname' => $row['actname'],
			'campusname' => $row['campusname'],
			);
	echo json_encode($data);
?>