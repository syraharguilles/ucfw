<?php
	require_once("../../library/dbcon.php");
	
	$id = $_POST['txtID'];
	$id = intval($id);
	
	
	$sql = "SELECT * 
			FROM departments d
			left join campuses c on d.deptcampusno = c.campusno
			left join organizations o on d.deptorgno = o.orgno	
			left join activities a on d.deptactno = a.actno 
			WHERE d.deptno = $id";
			/*
				SELECT * 
				FROM departments
				WHERE deptno = $id";

				SELECT * 
				FROM departments d 
				left join campuses c on d.campusno = c.campusno
				left join organizations o on d.orgno = o.orgno 
			
			WHERE d.deptno = $id";
					echo "$result";
					left join activities a on d.actno = a.actno 
			*/
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	
	$data = array(
			'deptno' => $row['deptno'],
			'deptname' => $row['deptname'],
			'deptabbr' => $row['deptabbr'],
			'deptbldgname' => $row['deptbldgname'],
			'deptflrno' => $row['deptflrno'],
			'deptlocalno' => $row['deptlocalno'],
			'depthead' => $row['depthead'],
			'actname' => $row['actname'],
			'orgname' => $row['orgname'],
			'campusname' => $row['campusname']
			);
	echo json_encode($data);
?>