<?php
	require_once("../../library/dbcon.php");
	/*
		campus
		department
		college
		program
		organization
	*/
	
	if(isset($_POST['idnoSearch'])){
		$idno = $_POST['idno'];
		$sql = "SELECT * FROM userheader WHERE idno = $idno";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if($idno != ""){
			$data = array(
					'idno' 			=> $row['idno'],
					'userfname' 	=> $row['userfname'],
					'usermidname'	=> $row['usermidname'],
					'userlname'		=> $row['userlname'],
					'usergender' 	=> $row['usergender'],
					'useremail' 	=> $row['useremail'],			
					);
		}
		echo json_encode($data);
	}
	if(isset($_POST['idnoSearchAlum'])){
		$idno = $_POST['idno'];
		$sql = "SELECT * FROM userheader WHERE idno = $idno";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if($idno != ""){
			$data = array(
					'idno' 			=> $row['idno'],
					'userfname' 	=> $row['userfname'],
					'usermidname'	=> $row['usermidname'],
					'userlname'		=> $row['userlname'],
					'usergender' 	=> $row['usergender'],
					'useremail' 	=> $row['useremail'],			
					'userbdate' 	=> $row['userbdate']			
					);
		}
		echo json_encode($data);
	}
	//campus
	if(isset($_POST['campus'])){
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
				'telephone' => $row['telephone']
				);
		echo json_encode($data);
	}
	
	if(isset($_POST['campusabbr'])){
		$abbr = $_POST['abbr'];
		$sql = mysql_query("SELECT * FROM campuses where campusabbr = '$abbr'");
		$row = mysql_fetch_array($sql);
		if($abbr === $row['campusabbr']){
			$check ="Already Taken";
		}
		else{
			$check = "Available";
		}
		$data = array(
			'status' => $check,
		);
		echo json_encode($data);
	}
	//deparments
	if(isset($_POST['department'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT d.*, c.campusno, c.campusname, o.orgno, o.orgname 
				FROM departments d
				left join campuses c on d.campusno = c.campusno
				left join organizations o on d.orgno = o.orgno
				WHERE d.deptno = $id";
				
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
				'campusname' => $row['campusname'],				
				'campusno' => $row['campusno'],				
				'orgno' => $row['orgno']				
				);
		echo json_encode($data);
	}
	
	if(isset($_POST['deptabbr'])){
		$abbr = $_POST['abbr'];
		$sql = mysql_query("SELECT * FROM departments where deptabbr = '$abbr'");
		$row = mysql_fetch_array($sql);
		if($abbr === $row['deptabbr']){
			$check ="Already Taken";
		}
		else{
			$check = "Available";
		}
		$data = array(
			'status' => $check,
		);
		echo json_encode($data);
	}
	//colleges
	if(isset($_POST['college'])){
		$id = $_POST['txtID'];
		$id = intval($id);

		$sql = "SELECT co.*, c.campusno, c.campusname
				FROM colleges co
				left join campuses c on co.campusno = c.campusno WHERE co.colno = $id";
				 
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
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno']
				);
		echo json_encode($data);
	}
	
	if(isset($_POST['colabbr'])){
		$abbr = $_POST['abbr'];
		$sql = mysql_query("SELECT * FROM colleges where colabbr = '$abbr'");
		$row = mysql_fetch_array($sql);
		if($abbr === $row['colabbr']){
			$check ="Already Taken";
		}
		else{
			$check = "Available";
		}
		$data = array(
			'status' => $check,
		);
		echo json_encode($data);
	}
	//programs
	if(isset($_POST['program'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT p.*, c.campusno, c.campusname, co.colno, co.colname, o.orgno, o.orgname
						from programs p 
						left join colleges co on p.colno = co.colno 
						left join organizations o on p.orgno = o.orgno 
						left join campuses c on p.campusno = c.campusno WHERE p.progno = $id";
						
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'progno' => $row['progno'],
				'progname' => $row['progname'],
				'progacronyms' => $row['progacronyms'],
				'colname' => $row['colname'],
				'colno' => $row['colno'],
				'orgno' => $row['orgno'],
				'orgname' => $row['orgname'],
				'campusname' => $row['campusname']
				);
		echo json_encode($data);
	}	
	//org
	if(isset($_POST['orgcampus'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT o.*, c.campusno, c.campusname from organizations o 
				left join activities a on o.actno = a.actno
				left join campuses c on o.campusno = c.campusno WHERE o.orgno = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'orgno' => $row['orgno'],
				'orgname' => $row['orgname'],
				'orgabbr' => $row['orgabbr'],
				//'orgtype' => $row['orgtype'],
				'orgbldgname' => $row['orgbldgname'],
				'orgflrno' => $row['orgflrno'],
				'orglocalno' => $row['orglocalno'],
				'actname' => $row['actname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno']
				);
		echo json_encode($data);
	}
	
	if(isset($_POST['orgcol'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT o.*, c.campusname, c.campusno, co.colno, co.colname, p.progno, p.progname from organizations o 
				left join activities a on o.actno = a.actno
				left join programs p on o.progno = p.progno
				left join colleges co on o.colno = co.colno
				left join campuses c on o.campusno = c.campusno WHERE o.orgno = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'orgno' => $row['orgno'],
				'orgname' => $row['orgname'],
				'orgabbr' => $row['orgabbr'],
				'orgbldgname' => $row['orgbldgname'],
				'orgflrno' => $row['orgflrno'],
				'orglocalno' => $row['orglocalno'],
				'actname' => $row['actname'],
				'campusname' => $row['campusname'],
				'colname' => $row['colname'],
				'progname' => $row['progname'],
				'campusno' => $row['campusno'],
				'colno' => $row['colno'],
				'progno' => $row['progno']
				);
		echo json_encode($data);
	}
	
	//super activity
	if(isset($_POST['activity'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM activities WHERE actno = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'actno' => $row['actno'],
				'actname' => $row['actname'],
				'actheld' => $row['actheld'],
				'actdatefrom' => $row['actdatefrom'],
				'actdateto' => $row['actdateto'],
				'actsem' => $row['actsem'],
				'actyear' => $row['actyear']
				);
		echo json_encode($data);
	}
	
	//campus activity
	if(isset($_POST['campusact'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT a.*, c.campusno, c.campusname FROM activities a, campuses c WHERE a.campusno = c.campusno and a.actno = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'actno' => $row['actno'],
				'actname' => $row['actname'],
				'actheld' => $row['actheld'],
				'actdate' => $row['actdate'],
				'acttimestart' => $row['acttimestart'],
				'acttimeend' => $row['acttimeend'],
				'actsem' => $row['actsem'],
				'actyear' => $row['actyear'],
				'campusno' => $row['campusno'],
				'campusname' => $row['campusname']
				);
		echo json_encode($data);
	}
	//dept activity
	if(isset($_POST['deptact'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT a.*, c.campusno, c.campusname, d.deptno, d.deptname from activities a
				left join campuses c on a.campusno = c.campusno 
				left join departments d on a.deptno = d.deptno WHERE a.actno = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'actno' => $row['actno'],
				'actname' => $row['actname'],
				'actheld' => $row['actheld'],
				'actdate' => $row['actdate'],
				'acttimestart' => $row['acttimestart'],
				'acttimeend' => $row['acttimeend'],
				'actsem' => $row['actsem'],
				'actyear' => $row['actyear'],
				'campusno' => $row['campusno'],
				'campusname' => $row['campusname'],
				'deptname' => $row['deptname'],
				'deptno' => $row['deptno']
				);
		echo json_encode($data);
	}
	//col activity
	if(isset($_POST['colact'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT a.*, c.campusno, c.campusname, co.colno, co.colname, p.progno, p.progname from activities a
				left join campuses c on a.campusno = c.campusno 
				left join colleges co on a.colno = co.colno
				left join programs p on a.progno = p.progno WHERE a.actno = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'actno' => $row['actno'],
				'actname' => $row['actname'],
				'actheld' => $row['actheld'],
				'actdate' => $row['actdate'],
				'acttimestart' => $row['acttimestart'],
				'acttimeend' => $row['acttimeend'],
				'actsem' => $row['actsem'],
				'actyear' => $row['actyear'],
				'campusno' => $row['campusno'],
				'campusname' => $row['campusname'],
				'colname' => $row['colname'],
				'colno' => $row['colno'],
				'progname' => $row['progname'],
				'progno' => $row['progno']
				);
		echo json_encode($data);
	}
	
	//org campus activity
	if(isset($_POST['orgcampusact'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT a.*, o.orgno, o.orgname, c.campusno, c.campusname FROM activities a, organizations o, campuses c WHERE a.orgno = o.orgno and a.campusno = c.campusno and a.actno = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'actno' => $row['actno'],
				'actname' => $row['actname'],
				'actheld' => $row['actheld'],
				'actdate' => $row['actdate'],
				'acttimestart' => $row['acttimestart'],
				'acttimeend' => $row['acttimeend'],
				'actsem' => $row['actsem'],
				'actyear' => $row['actyear'],
				'orgno' => $row['orgno'],
				'campusno' => $row['campusno'],
				'orgname' => $row['orgname'],
				'campusname' => $row['campusname']
				);
		echo json_encode($data);
	}
	
	//org col activity
	if(isset($_POST['orgcolact'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT a.*, c.campusno, c.campusname, co.colno, co.colname, p.progno, p.progname, o.orgno, o.orgname from activities a
				left join campuses c on a.campusno = c.campusno 
				left join colleges co on a.colno = co.colno
				left join programs p on a.progno = p.progno
				left join organizations o on a.orgno = o.orgno WHERE a.actno = $id";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'actno' => $row['actno'],
				'actname' => $row['actname'],
				'actheld' => $row['actheld'],
				'actdate' => $row['actdate'],
				'acttimestart' => $row['acttimestart'],
				'acttimeend' => $row['acttimeend'],
				'actsem' => $row['actsem'],
				'actyear' => $row['actyear'],
				'campusno' => $row['campusno'],
				'campusname' => $row['campusname'],
				'colname' => $row['colname'],
				'colno' => $row['colno'],
				'progname' => $row['progname'],
				'progno' => $row['progno'],
				'orgname' => $row['orgname'],
				'orgno' => $row['orgno']
				);
		echo json_encode($data);
	}
	
	if(isset($_POST['admincampus'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'userstat' => $row['userstat']
				);
		echo json_encode($data);
	}
	
	if(isset($_POST['admindept'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join departments d on ud.deptno = d.deptno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";
		
		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'deptname' => $row['deptname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'deptno' => $row['deptno'],
				'userstat' => $row['userstat']
				);
		echo json_encode($data);
		
	}
	
	if(isset($_POST['admincol'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join colleges co on ud.colno = co.colno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";

		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'colname' => $row['colname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'colno' => $row['colno'],
				'userstat' => $row['userstat']
				);
		echo json_encode($data);
		
	}
	
	if(isset($_POST['orgcampusadmin'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join organizations o on ud.orgno = o.orgno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";

		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'usertype' => $row['usertype'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'orgname' => $row['orgname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'orgno' => $row['orgno']
				);
		echo json_encode($data);
		
	}
	
	if(isset($_POST['campusgrad'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join organizations o on ud.orgno = o.orgno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";

		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'usertype' => $row['usertype'],
				'useremail' => $row['useremail'],
				'usercompname' => $row['usercompname'],
				'username' => $row['username'],
				'password' => $row['password'],
				'orgname' => $row['orgname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'orgno' => $row['orgno']
				);
		echo json_encode($data);
	}
	if(isset($_POST['colalum'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join organizations o on ud.orgno = o.orgno
				left join programs p on ud.progno = p.progno
				left join colleges co on ud.colno = co.colno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";

		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'usertype' => $row['usertype'],
				'useremail' => $row['useremail'],
				'userbdate' => $row['userbdate'],
				'username' => $row['username'],
				'password' => $row['password'],
				'orgname' => $row['orgname'],
				'progname' => $row['progname'],
				'colname' => $row['colname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'colno' => $row['colno'],
				'progno' => $row['progno'],
				'orgno' => $row['orgno']
				);
		echo json_encode($data);
	}
	if(isset($_POST['deptemp'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join departments d on ud.deptno = d.deptno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";
		
		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'deptname' => $row['deptname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'deptno' => $row['deptno']
				);
		echo json_encode($data);
		
	}
	if(isset($_POST['colfac'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join colleges co on ud.colno = co.colno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";

		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'colname' => $row['colname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'colno' => $row['colno']
				);
		echo json_encode($data);
		
	}
	if(isset($_POST['colstaff'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join colleges co on ud.colno = co.colno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";

		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'colname' => $row['colname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'colno' => $row['colno']
				);
		echo json_encode($data);
		
	}
	if(isset($_POST['colstud'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join programs p on ud.progno = p.progno
				left join colleges co on ud.colno = co.colno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";

		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'progname' => $row['progname'],
				'colname' => $row['colname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'progno' => $row['progno'],
				'colno' => $row['colno']
				);
		echo json_encode($data);
		
	}
	if(isset($_POST['orgdeptadmin'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join organizations o on ud.orgno = o.orgno
				left join departments d on ud.deptno = d.deptno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";
		
		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'orgname' => $row['orgname'],
				'deptname' => $row['deptname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'deptno' => $row['deptno'],
				'orgno' => $row['orgno']
				);
		echo json_encode($data);
		
	}
	if(isset($_POST['orgcoladmin'])){
		$id = $_POST['txtID'];
		$id = intval($id);
		
		$sql = "SELECT * FROM userheader uh
				left join userdetails ud on uh.idno = ud.idno 
				left join organizations o on ud.orgno = o.orgno
				left join programs p on ud. progno = p.progno
				left join colleges co on ud.colno = co.colno
				left join campuses c on ud.campusno = c.campusno WHERE uh.idno = $id and ud.idno = $id";
		
		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		$data = array(
				'idno' => $row['idno'],
				'userfname' => $row['userfname'],
				'usermidname' => $row['usermidname'],
				'userlname' => $row['userlname'],
				'usergender' => $row['usergender'],
				'useremail' => $row['useremail'],
				'username' => $row['username'],
				'password' => $row['password'],
				'orgname' => $row['orgname'],
				'progname' => $row['progname'],
				'colname' => $row['colname'],
				'campusname' => $row['campusname'],
				'campusno' => $row['campusno'],
				'colno' => $row['colno'],
				'progno' => $row['progno'],
				'orgno' => $row['orgno']
				);
		echo json_encode($data);
		
	}
?>