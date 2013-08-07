<?php
	require_once("../../library/dbcon.php");
	
	$id = $_POST['txtID'];
	$id = intval($id);
	
	$sql = "SELECT * from programs p 
					left join colleges co on p.progcolno = co.colno 
					left join organizations o on p.progorgno = o.orgno 
					left join campuses c on p.progcampusno = c.campusno WHERE p.progno = $id";
					
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	
	$data = array(
			'progno' => $row['progno'],
			'progname' => $row['progname'],
			'progacronyms' => $row['progacronyms'],
			'colname' => $row['colname'],
			'orgname' => $row['orgname'],
			'campusname' => $row['campusname'],
			);
	echo json_encode($data);
?>