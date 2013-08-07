<?php
	require_once("../../library/dbcon.php");
	
	$id = $_POST['txtID'];
	$id = intval($id);
	
	$sql = "SELECT * 
			from userdetails ud 
			left join userheader uh on ud.idno = uh.idno 
			left join departments d on ud.deptno = d.deptno 
			left join colleges co on ud.colno = co.colno 
			left join programs p on ud.progno = p.progno 
			left join organizations o on ud.orgno = o.orgno 
			left join campuses c on uh.campusno = c.campusno";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	
	$data = array(
			'idno' => $row['idno'],
			'userfname' => $row['userfname'],
			'usermidname' => $row['usermidname'],
			'userlname' => $row['userlname'],
			//'actno' => $row['actno'],
			'progacronyms' => $row['progacronyms'],
			'orgabbr' => $row['orgabbr']
			);
	echo json_encode($data);
?>