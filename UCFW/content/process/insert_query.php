<?php
	session_start();
	require_once("../../library/dbcon.php");
	require_once("function.php");
	date_default_timezone_set('UTC');
	if(isset($_POST['register'])){
		
		$idno = intval($_POST['idno']); 	
		$user = mysql_real_escape_string($_POST['user']); 	
		$pwd = mysql_real_escape_string($_POST['pwd']);

		$sql = "SELECT * FROM userheader WHERE idno = $idno";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		if($row['idno'] == $idno){
			$tableName = "userheader";
			$colValue = "username = '$user', 
						 password = '$pwd'";
						 
			$id = "idno = $idno";
			
			$result = updateTbl($tableName,$colValue,$id);
		}else{
			$tableName = "userheader";
			$field = "idno, username, password";
			$data = "NULL,'$user','$pwd'";
			
			echo insertTbl($tableName,$field,$data);	
		}
		
		
		
	}
	
	//guest
	if(isset($_POST['guest'])){
		$gfname = mysql_real_escape_string($_POST['gfname']);
		$gmname = mysql_real_escape_string($_POST['gmname']);
		$glname = mysql_real_escape_string($_POST['glname']);
		$gemail = mysql_real_escape_string($_POST['gemail']);
		
	
		$tableName = "userguests";
		$field = "userguestidno, userguestfname, userguestmname, userguestlname, userguestemail,usergueststatus";
		$data = "NULL,'$gfname','$gmname','$glname','$gemail','active'";
		
		echo insertTbl($tableName,$field,$data);
	
	}
	//add activity
	if(isset($_POST['activity'])){
		$actname = mysql_real_escape_string($_POST['txtactname']);
		$actheld = mysql_real_escape_string($_POST['txtactheld']);
		$actdatefrom = mysql_real_escape_string($_POST['txtactdatefrom']);
		$actdateto = mysql_real_escape_string($_POST['txtactdateto']);
		$actsem = mysql_real_escape_string($_POST['txtactsem']);
		$actyear = mysql_real_escape_string($_POST['txtyear']);
		$useridno = intval($_POST['txtuseridno']);
		
		$actdateStrtTime = strtotime("$actdatefrom");
		$actdatefromformatted = date('Y-m-d',$actdateStrtTime);
		
		$actdateEndTime =strtotime("$actdateto");
		$actdatetoformatted = date('Y-m-d',$actdateEndTime);
		
		$tableName = "activities";
	
		$field = "actno,actname,actheld,actdatefrom,actdateto,actsem,actyear,campusno,actaddedby,actstat";
		$data = "NULL,'$actname','$actheld','$actdatefromformatted','$actdatetoformatted','$actsem','$actyear',0,'$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-activity");
		}
	}
	//add campus
	if(isset($_POST['campus'])){
		
		$campusname = mysql_real_escape_string($_POST['txtcampusname']);
		$campusabbr = mysql_real_escape_string($_POST['txtcampusabbr']);
		$address = mysql_real_escape_string($_POST['txtcampusaddr']);
		$zipcode = mysql_real_escape_string($_POST['txtcampuszipcode']);
		$telephone = mysql_real_escape_string($_POST['txtcampustel']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "campuses";
		$field = "campusno,campusname,campusabbr,address,zipcode,telephone,campusaddedby,campusstat";
		$data = "NULL,'$campusname','$campusabbr','$address','$zipcode','$telephone','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
	
		if($result == 1){
			header("location:../../uc-campus");
		}
	}
	//add department
	if(isset($_POST['department'])){
		$deptname = mysql_real_escape_string($_POST['txtdeptname']);
		$deptabbr = mysql_real_escape_string($_POST['txtdeptabbr']);
		$deptbldgname = mysql_real_escape_string($_POST['txtdeptbldgname']);
		$deptflrno = mysql_real_escape_string($_POST['txtdeptflrno']);
		$deptlocalno = mysql_real_escape_string($_POST['txtdeptlocalno']);
		$depthead = mysql_real_escape_string($_POST['txtdepthead']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "departments";
		$field = "deptno,deptname,deptabbr,deptbldgname,deptflrno,deptlocalno,depthead,campusno,deptaddedby,deptstat";
		$data = "NULL,'$deptname','$deptabbr','$deptbldgname','$deptflrno','$deptlocalno','$depthead','$campusno',$useridno,'active'";
		
		$result = insertTbl($tableName,$field,$data);
	
		if($result == 1){
			header("location:../../uc-department");
		}
	}
	//add college
	if(isset($_POST['college'])){
		$colname = mysql_real_escape_string($_POST['txtcolname']);
		$colabbr = mysql_real_escape_string($_POST['txtcolabbr']);
		$colbldgname = mysql_real_escape_string($_POST['txtcolbldgname']);
		$colflrno = mysql_real_escape_string($_POST['txtcolflrno']);
		$collocalno = mysql_real_escape_string($_POST['txtcollocalno']);
		$coldean = mysql_real_escape_string($_POST['txtcoldean']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);

		$tableName = "colleges";
		$field = "colno,colname,colabbr,colbldgname,colflrno,collocalno,coldean,campusno,coladdedby,colstat";
		$data = "NULL,'$colname','$colabbr','$colbldgname','$colflrno','$collocalno','$coldean','$campusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
	
		if($result == 1){
			header("location:../../uc-college");
		}
	}
	//add program
	if(isset($_POST['program'])){
		$progname = mysql_real_escape_string($_POST['txtprogname']);
		$progacro = mysql_real_escape_string($_POST['txtprogacronyms']);
		$colno = mysql_real_escape_string($_POST['txtcolno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);

		$tableName = "programs";
		$field = "progno,progname,progacronyms,colno,campusno,progaddedby,progstat";
		$data = "NULL,'$progname','$progacro','$colno','$campusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
	
		if($result == 1){
			header("location:../../uc-program");
		}
	}
	//add gs programs
	if(isset($_POST['gsprograms'])){
		$gsprogname = mysql_real_escape_string($_POST['txtgsprogname']);
		$gsprogabbr = mysql_real_escape_string($_POST['txtgsprogabbr']);
		$gsprogbldgname = mysql_real_escape_string($_POST['txtgsprogbldgname']);
		$gsprogflrno = mysql_real_escape_string($_POST['txtgsprogflrno']);
		$gsproglocalno = mysql_real_escape_string($_POST['txtgsproglocalno']);
		$gsprogdean = mysql_real_escape_string($_POST['txtgsprogdean']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);

		$tableName = "gsprograms";
		$field = "gsprogno,gsprogname,gsprogabbr,gsprogbldgname,gsprogflrno,gsproglocalno,gsprogdean,campusno,gsprogaddedby,gsprogstat";
		$data = "NULL,'$gsprogname','$gsprogabbr','$gsprogbldgname','$gsprogflrno','$gsproglocalno','$gsprogdean','$campusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
	
		if($result == 1){
			header("location:../../uc-gsprog");
		}
	}
	//add GS major
	if(isset($_POST['gsmajor'])){
		$gsmajorname = mysql_real_escape_string($_POST['txtgsmajorname']);
		$gsmajoracro = mysql_real_escape_string($_POST['txtgsmajoracronyms']);
		$gsprogno = mysql_real_escape_string($_POST['txtgsprogno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);

		$tableName = "gsmajors";
		$field = "gsmajorno,gsmajorname,gsmajoracronyms,gsprogno,campusno,gsmajoraddedby,gsmajorstat";
		$data = "NULL,'$gsmajorname','$gsmajoracro','$gsprogno','$campusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
	
		if($result == 1){
			header("location:../../uc-gsmajor");
		}
	}
	//add campus organization
	if(isset($_POST['orgcampus'])){
		$orgname = mysql_real_escape_string($_POST['txtorgname']);
		$orgabbr = mysql_real_escape_string($_POST['txtorgabbr']);
		//$orgtype = mysql_real_escape_string($_POST['txttype']);
		$orgbldgname = mysql_real_escape_string($_POST['txtorgbldgname']);
		$orgflrno = mysql_real_escape_string($_POST['txtorgflrno']);
		$orglocalno = mysql_real_escape_string($_POST['txtorglocalno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "organizations";
		$field = "orgno,orgname,orgabbr,orgbldgname,orgflrno,orglocalno,campusno,orgaddedby,orgstat";
		$data = "NULL,'$orgname','$orgabbr','$orgbldgname','$orgflrno','$orglocalno','$campusno','$useridno','active'";
	
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-organization");
		}		
	}
	//add dept organization
	if(isset($_POST['orgdept'])){
		$orgname = mysql_real_escape_string($_POST['txtorgname']);
		$orgabbr = mysql_real_escape_string($_POST['txtorgabbr']);
		$orgbldgname = mysql_real_escape_string($_POST['txtorgbldgname']);
		$orgflrno = mysql_real_escape_string($_POST['txtorgflrno']);
		$orglocalno = mysql_real_escape_string($_POST['txtorglocalno']);
		$deptno = mysql_real_escape_string($_POST['txtdeptno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "organizations";
		$field = "orgno,orgname,orgabbr,orgtype,orgbldgname,orgflrno,orglocalno,deptno,campusno,orgaddedby,orgstat";
		$data = "NULL,'$orgname','$orgabbr','non-acad','$orgbldgname','$orgflrno','$orglocalno','$deptno','$campusno','$useridno','active'";
	
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-organization");
		}		
	}
	//add col organization
	if(isset($_POST['orgcol'])){
		$orgname = mysql_real_escape_string($_POST['txtorgname']);
		$orgabbr = mysql_real_escape_string($_POST['txtorgabbr']);
		$orgbldgname = mysql_real_escape_string($_POST['txtorgbldgname']);
		$orgflrno = mysql_real_escape_string($_POST['txtorgflrno']);
		$orglocalno = mysql_real_escape_string($_POST['txtorglocalno']);
		$progno = mysql_real_escape_string($_POST['txtprogno']);
		$colno = mysql_real_escape_string($_POST['txtcolno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "organizations";
		$field = "orgno,orgname,orgabbr,orgtype,orgbldgname,orgflrno,orglocalno,progno,colno,campusno,orgaddedby,orgstat";
		$data = "NULL,'$orgname','$orgabbr','acad','$orgbldgname','$orgflrno','$orglocalno','$progno','$colno','$campusno','$useridno','active'";
	
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-organization");
		}		
	}
	//add activity
	if(isset($_POST['activity'])){
		$actname = mysql_real_escape_string($_POST['txtactname']);
		$actheld = mysql_real_escape_string($_POST['txtactheld']);
		$actdatefrom = mysql_real_escape_string($_POST['txtactdatefrom']);
		$actdateto = mysql_real_escape_string($_POST['txtactdateto']);
		$actsem = mysql_real_escape_string($_POST['txtactsem']);
		$actyear1 = mysql_real_escape_string($_POST['txtyear1']);
		$actyear2 = mysql_real_escape_string($_POST['txtyear2']);
		$actyear = $actyear1.'-'.$actyear2;
		$useridno = intval($_POST['txtuseridno']);
		echo $actyear; 
		$actdateStrtoTime = strtotime("$actdateto");
		$actdatetoformatted = date('Y-m-d',$actdateStrtoTime);
		
		$actdateEndtoTime = endtotime("$actdatefrom");
		$actdatefromformatted = date('Y-m-d',$actdateEndtoTime);
		
		$tableName = "activities";
	
		$field = "actno,actname,actheld,actdatefrom,actdateto,actsem,actyear,campusno,actaddedby,actstat";
		$data = "NULL,'$actname','$actheld','$actdatefromformatted','$actdatetoformatted','$actsem','$actyear',0,'$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-activity");
		}
	}
	//add campus activity
	if(isset($_POST['campusact'])){
		$actname = mysql_real_escape_string($_POST['txtactname']);
		$actheld = mysql_real_escape_string($_POST['txtactheld']);
		$actdate = mysql_real_escape_string($_POST['txtactdate']);
		$acttimestart = mysql_real_escape_string($_POST['txtacttimestart']);
		$mnostart = mysql_real_escape_string($_POST['txtmnostart']);
		$acttimeend = mysql_real_escape_string($_POST['txtacttimeend']);
		$mnoend = mysql_real_escape_string($_POST['txtmnoend']);
		$actsem = mysql_real_escape_string($_POST['txtactsem']);
		$actyear1 = mysql_real_escape_string($_POST['txtyear1']);
		$actyear2 = mysql_real_escape_string($_POST['txtyear2']);
		$actyear = $actyear1.'-'.$actyear2;
		$actcampusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
	
		$field = "actno,actname,actheld,actdate,acttimestart,mnostart,acttimeend,mnoend,actsem,actyear,campusno,actaddedby,actstat";
		$data = "NULL,'$actname','$actheld','$actdateformatted','$acttimestart','$mnostart','$acttimeend','$mnoend','$actsem','$actyear','$actcampusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-activity");
		}
	}
	//add dept activity
	if(isset($_POST['deptact'])){
		$actname = mysql_real_escape_string($_POST['txtactname']);
		$actheld = mysql_real_escape_string($_POST['txtactheld']);
		$actdate = mysql_real_escape_string($_POST['txtactdate']);
		$acttimestart = mysql_real_escape_string($_POST['txtacttimestart']);
		$mnostart = mysql_real_escape_string($_POST['txtmnostart']);
		$acttimeend = mysql_real_escape_string($_POST['txtacttimeend']);
		$mnoend = mysql_real_escape_string($_POST['txtmnoend']);
		$actsem = mysql_real_escape_string($_POST['txtactsem']);
		$actyear1 = mysql_real_escape_string($_POST['txtyear1']);
		$actyear2 = mysql_real_escape_string($_POST['txtyear2']);
		$actyear = $actyear1.'-'.$actyear2;
		$actdeptno = mysql_real_escape_string($_POST['txtdeptno']);
		$actcampusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
	
		$field = "actno,actname,actheld,actdate,acttimestart,mnostart,acttimeend,mnoend,actsem,actyear,deptno,campusno,actaddedby,actstat";
		$data = "NULL,'$actname','$actheld','$actdateformatted','$acttimestart','$mnostart','$acttimeend','$mnoend','$actsem','$actyear','$actdeptno','$actcampusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-activity");
		}
	}
	//add col activity
	if(isset($_POST['colact'])){
		$actname = mysql_real_escape_string($_POST['txtactname']);
		$actheld = mysql_real_escape_string($_POST['txtactheld']);
		$actdate = mysql_real_escape_string($_POST['txtactdate']);
		$acttimestart = mysql_real_escape_string($_POST['txtacttimestart']);
		$mnostart = mysql_real_escape_string($_POST['txtmnostart']);
		$acttimeend = mysql_real_escape_string($_POST['txtacttimeend']);
		$mnoend = mysql_real_escape_string($_POST['txtmnoend']);
		$actsem = mysql_real_escape_string($_POST['txtactsem']);
		$actyear1 = mysql_real_escape_string($_POST['txtyear1']);
		$actyear2 = mysql_real_escape_string($_POST['txtyear2']);
		$actyear = $actyear1.'-'.$actyear2;
		$actprogno = mysql_real_escape_string($_POST['txtprogno']);
		$actcolno = mysql_real_escape_string($_POST['txtcolno']);
		$actcampusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
	
		$field = "actno,actname,actheld,actdate,acttimestart,mnostart,acttimeend,mnoend,actsem,actyear,progno,colno,campusno,actaddedby,actstat";
		$data = "NULL,'$actname','$actheld','$actdateformatted','$acttimestart','$mnostart','$acttimeend','$mnoend','$actsem','$actyear','$actprogno','$actcolno','$actcampusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-activity");
		}
	}

	//add org campus activity
	if(isset($_POST['orgcampusact'])){
		$actname = mysql_real_escape_string($_POST['txtactname']);
		$actheld = mysql_real_escape_string($_POST['txtactheld']);
		$actdate = mysql_real_escape_string($_POST['txtactdate']);
		$acttimestart = mysql_real_escape_string($_POST['txtacttimestart']);
		$mnostart = mysql_real_escape_string($_POST['txtmnostart']);
		$acttimeend = mysql_real_escape_string($_POST['txtacttimeend']);
		$mnoend = mysql_real_escape_string($_POST['txtmnoend']);
		$actsem = mysql_real_escape_string($_POST['txtactsem']);
		$actyear1 = mysql_real_escape_string($_POST['txtyear1']);
		$actyear2 = mysql_real_escape_string($_POST['txtyear2']);
		$actyear = $actyear1.'-'.$actyear2;
		$actorgno = mysql_real_escape_string($_POST['txtorgno']);
		$actcampusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
	
		$field = "actno,actname,actheld,actdate,acttimestart,mnostart,acttimeend,mnoend,actsem,actyear,orgno,campusno,actaddedby,actstat";
		$data = "NULL,'$actname','$actheld','$actdateformatted','$acttimestart','$mnostart','$acttimeend','$mnoend','$actsem','$actyear','$actorgno','$actcampusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-activity");
		}
	}
	//add org dept activity
	if(isset($_POST['orgdeptact'])){
		$actname = mysql_real_escape_string($_POST['txtactname']);
		$actheld = mysql_real_escape_string($_POST['txtactheld']);
		$actdate = mysql_real_escape_string($_POST['txtactdate']);
		$acttimestart = mysql_real_escape_string($_POST['txtacttimestart']);
		$acttimeend = mysql_real_escape_string($_POST['txtacttimeend']);
		$actsem = mysql_real_escape_string($_POST['txtactsem']);
		$actyear = mysql_real_escape_string($_POST['txtyear']);
		$actdeptno = mysql_real_escape_string($_POST['txtdeptno']);
		$actcampusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
	
		$field = "actno,actname,actheld,actdate,acttimestart,acttimeend,actsem,actyear,deptno,campusno,actaddedby,actstat";
		$data = "NULL,'$actname','$actheld','$actdateformatted','$acttimestart','$acttimeend','$actsem','$actyear','$actdeptno','$actcampusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-activity");
		}
	}
	//add org col activity
	if(isset($_POST['orgcolact'])){
		$actname = mysql_real_escape_string($_POST['txtactname']);
		$actheld = mysql_real_escape_string($_POST['txtactheld']);
		$actdate = mysql_real_escape_string($_POST['txtactdate']);
		$acttimestart = mysql_real_escape_string($_POST['txtacttimestart']);
		$mnostart = mysql_real_escape_string($_POST['txtmnostart']);
		$acttimeend = mysql_real_escape_string($_POST['txtacttimeend']);
		$mnoend = mysql_real_escape_string($_POST['txtmnoend']);
		$actsem = mysql_real_escape_string($_POST['txtactsem']);
		$actyear1 = mysql_real_escape_string($_POST['txtyear1']);
		$actyear2 = mysql_real_escape_string($_POST['txtyear2']);
		$actyear = $actyear1.'-'.$actyear2;
		$actorgno = mysql_real_escape_string($_POST['txtorgno']);
		$actprogno = mysql_real_escape_string($_POST['txtprogno']);
		$actcolno = mysql_real_escape_string($_POST['txtcolno']);
		$actcampusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
	
		$field = "actno,actname,actheld,actdate,acttimestart,mnostart,acttimeend,mnoend,actsem,actyear,orgno,progno,colno,campusno,actaddedby,actstat";
		$data = "NULL,'$actname','$actheld','$actdateformatted','$acttimestart','$mnostart','$acttimeend','$mnoend','$actsem','$actyear','$actorgno','$actprogno','$actcolno','$actcampusno','$useridno','active'";
		
		$result = insertTbl($tableName,$field,$data);
		
		if($result == 1){
			header("location:../../uc-activity");
		}
	}
	//add campus admin
	if(isset($_POST['admincampus'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$username = mysql_real_escape_string($_POST['txtusername']);
		$password = mysql_real_escape_string($_POST['txtpassword']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,username,password,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$username','$password','campus-admin'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['admincampus'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,campusno,useraddedby,userstat";
		$data = "'$idno','$campusno','$useridno','active'";
	
		$result = insertTbl($tableName,$field,$data);
	}
	//add campus graduates
	if(isset($_POST['campusgrad'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$usercompname = mysql_real_escape_string($_POST['txtcompname']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,usercompname,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$usercompname','user-graduates'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['campusgrad'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,campusno,useraddedby,userstat";
		$data = "'$idno','$campusno','$useridno','active'";
	
		$result = insertTbl($tableName,$field,$data);
	}
	//add campus alumni
	if(isset($_POST['campusalum'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$useryrgrad = mysql_real_escape_string($_POST['txtyrgrad']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,useryrgrad,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$useryrgrad','user-alumni'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['campusalum'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,campusno,useraddedby,userstat";
		$data = "'$idno','$campusno','$useridno','active'";
	
		$result = insertTbl($tableName,$field,$data);
	}
	//add dept admin
	if(isset($_POST['admindept'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		
		$username = mysql_real_escape_string($_POST['txtusername']);
		$password = mysql_real_escape_string($_POST['txtpassword']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,username,password,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$username','$password','dept-admin'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['admindept'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$deptno = mysql_real_escape_string($_POST['txtdeptno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,deptno,campusno,useraddedby,userstat";
		$data = "'$idno','$deptno','$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);	
		
	}
	//add dept employee
	if(isset($_POST['deptemp'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','user-dept-emp'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['deptemp'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$deptno = mysql_real_escape_string($_POST['txtdeptno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,deptno,campusno,useraddedby,userstat";
		$data = "'$idno','$deptno','$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);	
		
	}
	//add col admin
	if(isset($_POST['admincol'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$username = mysql_real_escape_string($_POST['txtusername']);
		$password = mysql_real_escape_string($_POST['txtpassword']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,username,password,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$username','$password','col-admin'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['admincol'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$colno = mysql_real_escape_string($_POST['txtcolno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,colno,campusno,useraddedby,userstat";
		$data = "'$idno','$colno','$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);
	}
	
	//add col faculty
	if(isset($_POST['colfac'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','user-col-fac'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['colfac'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$colno = mysql_real_escape_string($_POST['txtcolno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,colno,campusno,useraddedby,userstat";
		$data = "'$idno','$colno','$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);
	}
	//add col staff
	if(isset($_POST['colstaff'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','user-col-staff'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['colstaff'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$colno = mysql_real_escape_string($_POST['txtcolno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,colno,campusno,useraddedby,userstat";
		$data = "'$idno','$colno','$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);
	}
	//add col stud
	if(isset($_POST['colstud'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','user-col-stud'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['colstud'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$colno = mysql_real_escape_string($_POST['txtcolno']);
		$progno = mysql_real_escape_string($_POST['txtprogno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,progno,colno,campusno,useraddedby,userstat";
		$data = "'$idno','$progno','$colno','$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);
	}
	//add col alumni
	if(isset($_POST['colalum'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$userbdate = mysql_real_escape_string($_POST['txtbdate']);
		
		$actdateStrtoTime = strtotime("$userbdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,userbdate,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$actdateformatted','user-alumni'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['colalum'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$colno = mysql_real_escape_string($_POST['txtcolno']);
		$progno = mysql_real_escape_string($_POST['txtprogno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,progno,colno,campusno,useraddedby,userstat";
		$data = "'$idno','$progno','$colno','$campusno','$useridno','active'";
	
		$result = insertTbl($tableName,$field,$data);
	}
	//add gs admin
	if(isset($_POST['admingsprog'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$username = mysql_real_escape_string($_POST['txtusername']);
		$password = mysql_real_escape_string($_POST['txtpassword']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,username,password,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$username','$password','gs-admin'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['admingsprog'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,gsprogno,gsmajorno,campusno,useraddedby,userstat";
		$data = "'$idno',0,0,'$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);
	}
	//org campus admin
	if(isset($_POST['orgcampusadmin'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		//$usertype = mysql_real_escape_string($_POST['txttype']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$username = mysql_real_escape_string($_POST['txtusername']);
		$password = mysql_real_escape_string($_POST['txtpassword']);
		
		$tableName = "userheader";
		
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,username,password,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$username','$password','org-campus-admin'";
		
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['orgcampusadmin'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$orgno = mysql_real_escape_string($_POST['txtorgno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,orgno,campusno,useraddedby,userstat";
		$data = "'$idno','$orgno','$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);
	}
	//org dept admin
	if(isset($_POST['orgdeptadmin'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$username = mysql_real_escape_string($_POST['txtusername']);
		$password = mysql_real_escape_string($_POST['txtpassword']);
		
		$tableName = "userheader";
	
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,username,password,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$username','$password','org-dept-admin'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['orgdeptadmin'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$orgno = mysql_real_escape_string($_POST['txtorgno']);
		$deptno = mysql_real_escape_string($_POST['txtdeptno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,orgno, deptno,campusno,useraddedby,userstat";
		$data = "'$idno','$orgno','$deptno','$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);
	}
	//org col admin
	if(isset($_POST['orgcoladmin'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$username = mysql_real_escape_string($_POST['txtusername']);
		$password = mysql_real_escape_string($_POST['txtpassword']);
		
		$tableName = "userheader";
	
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,username,password,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$username','$password','org-col-prog-admin'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	if(isset($_POST['orgcoladmin'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$orgno = mysql_real_escape_string($_POST['txtorgno']);
		$progno = mysql_real_escape_string($_POST['txtprogno']);
		$colno = mysql_real_escape_string($_POST['txtcolno']);
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		$useridno = intval($_POST['txtuseridno']);
		
		$tableName = "userdetails";
		$field = "idno,orgno,progno,colno,campusno,useraddedby,userstat";
		$data = "'$idno','$orgno','$progno','$colno','$campusno','$useridno','active'";
				
		$result = insertTbl($tableName,$field,$data);
	}
	//for guest
	if(isset($_POST['txtPost'])){
		
		$txtGuest = mysql_real_escape_string($_POST['txtGuest']);
		$txtContent = mysql_real_escape_string($_POST['txtContent']);
		$txtColor = mysql_real_escape_string($_POST['txtColor']);
		$txtCampusno = intval($_POST['txtCampusno']);
		$idno = 100000;
		
		//INSERT INTO `uc_community`.`posts` (`postno`, `postdatetime`, `posttitle`, `postcontent`, `idno`, `postactno`, `postorgno`, `postdeptno`, `postcolno`, `postcolor`, `poststat`) VALUES (NULL, CURRENT_TIMESTAMP, '', '', '', '', '', '', '', '', '');
		
		$tableName = "posts";
		$field = "postno,postcontent,idno,postcolor,campusno,postApproval,postDelete,poststat";
		$data = "NULL,'$txtContent',$idno,'$txtColor',$txtCampusno,'pending',1,'inactive'";
		
		$result = insertTbl($tableName,$field,$data);
	
	}
	if(isset($_POST['DoodleData'])){
		$doodle_data = $_POST['doodleAlldata'];
		$campusno = $_POST['txtCampusno'];
		$color = $_POST['color'];
		$idno = 100000;
		
		$tableName = "posts";
		$field = "postno,postcontent,idno,postcolor,campusno,postApproval,postDelete,poststat";
		$data = "NULL,'$doodle_data',$idno,'$color',$campusno,'pending',1,'inactive'";
		
		$result = insertTbl($tableName,$field,$data);
		
	}
	//for user
	if(isset($_POST['txtPostAll'])){
		
		
		$Content = mysql_real_escape_string($_POST['txtContent']);
		$color = mysql_real_escape_string($_POST['txtColor']);
		$campusno = intval($_POST['txtCampusno']);
		$deptno = intval($_POST['txtDeptno']);
		$deptactno = intval($_POST['txtDeptactno']);
		$colno = intval($_POST['txtColno']);
		$colactno = intval($_POST['txtColactno']);
		$progno = intval($_POST['txtProgno']);
		$progactno = intval($_POST['txtProgactno']);
		$progorgno = intval($_POST['txtProgorgno']);
		$orgno = intval($_POST['txtOrgno']);
		$orgactno = intval($_POST['txtOrgactno']);
		$actno = intval($_POST['txtActno']);
		$useridno = $_SESSION['userid'];
		
		//INSERT INTO `uc_community`.`posts` (`postno`, `postdatetime`, `posttitle`, `postcontent`, `idno`, `postactno`, `postorgno`, `postdeptno`, `postcolno`, `postcolor`, `poststat`) VALUES (NULL, CURRENT_TIMESTAMP, '', '', '', '', '', '', '', '', '');
		
		//campus
		$checkCampusno = ($campusno == "")? $checkCampusno  = 1 : $checkCampusno = $campusno;
		//dept
		$checkDeptno = ($deptno == "")? $checkDeptno  = 0 : $checkDeptno = $deptno;
		$checkDeptactno = ($deptactno == "")? $checkDeptactno  = 0 : $checkDeptactno = $deptactno;
		//col
		$checkColno = ($colno == "")? $checkColno  = 0 : $checkColno = $colno;
		$checkColactno = ($colactno == "")? $checkColactno  = 0 : $checkColactno = $colactno;
		$checkProgno = ($progno == "")? $checkProgno  = 0 : $checkProgno = $progno;
		$checkProgactno = ($progactno == "")? $checkProgactno  = 0 : $checkProgactno = $progactno;
		$checkProgorgno = ($progorgno == "")? $checkProgorgno  = 0 : $checkProgorgno = $progorgno;
		//org
		$checkOrgno = ($orgno == "")? $checkOrgno  = 0 : $checkOrgno = $orgno;
		$checkOrgactno = ($orgactno == "")? $checkOrgactno  = 0 : $checkOrgactno = $orgactno;
		
		//act
		$checkActno = ($actno == "")? $checkActno  = 0 : $checkActno = $actno;
		
		
		if($checkColactno != 0){
			$checkActno = $checkColactno;
		}elseif($checkProgactno != 0){
			$checkActno = $checkProgactno;
		}elseif($checkDeptactno != 0){
			$checkActno = $checkDeptactno;
		}
		elseif($checkOrgactno != 0){
			$checkActno = $checkOrgactno;
		}
		elseif($checkActno != 0){
			$checkActno = $checkActno;
		}
		else{
			$checkActno = 0;
		}
		
		/*if($checkOrgno != 0){
			$checkOrgno = $checkOrgno
		}elseif($checkProgorgno != 0){	
			$checkOrgno = $checkProgorgno;
		}
		else{	
			$checkOrgno = 0;
		}*/
		
		$tableName = "posts";
		$field = "postno,postcontent,idno,postcolor,actno,deptno,colno,progno,orgno,campusno,postApproval,postDelete,poststat";
		$data = "NULL,'$Content',$useridno,'$color',$checkActno,$checkDeptno,$checkColno,$checkProgno,$checkOrgno,$checkCampusno,'pending',1,'inactive'";
		
		$result = insertTbl($tableName,$field,$data);
		echo $result;
	}
	if(isset($_POST['DoodleDataUser'])){
		$doodle_data = $_POST['doodleAlldata'];
		$campusno = intval($_POST['txtCampusno']);
		$deptno = intval($_POST['txtDeptno']);
		$deptactno = intval($_POST['txtDeptactno']);
		$colno = intval($_POST['txtColno']);
		$colactno = intval($_POST['txtColactno']);
		$progno = intval($_POST['txtProgno']);
		$progactno = intval($_POST['txtProgactno']);
		$orgno = intval($_POST['txtOrgno']);
		$orgactno = intval($_POST['txtOrgactno']);
		$actno = intval($_POST['txtActno']);
		$color = $_POST['color'];
		$useridno = $_POST['txtUser'];
		
		
		//campus
		$checkCampusno = ($campusno == "")? $checkCampusno  = 1 : $checkCampusno = $campusno;
		//dept
		$checkDeptno = ($deptno == "")? $checkDeptno  = 0 : $checkDeptno = $deptno;
		$checkDeptactno = ($deptactno == "")? $checkDeptactno  = 0 : $checkDeptactno = $deptactno;
		//col
		$checkColno = ($colno == "")? $checkColno  = 0 : $checkColno = $colno;
		$checkColactno = ($colactno == "")? $checkColactno  = 0 : $checkColactno = $colactno;
		$checkProgno = ($progno == "")? $checkProgno  = 0 : $checkProgno = $progno;
		$checkProgactno = ($progactno == "")? $checkProgactno  = 0 : $checkProgactno = $progactno;
		
		//org
		$checkOrgno = ($orgno == "")? $checkOrgno  = 0 : $checkOrgno = $orgno;
		$checkOrgactno = ($orgactno == "")? $checkOrgactno  = 0 : $checkOrgactno = $orgactno;
		
		//actno
		$checkActno = ($actno == "")? $checkActno  = 0 : $checkActno = $actno;
		
		if($checkColactno != 0){
		$checkActno = $checkColactno;
		}
		elseif($checkProgactno != 0){
			$checkActno = $checkProgactno;
		}elseif($checkDeptactno != 0){
			$checkActno = $checkDeptactno;
		}
		elseif($checkOrgactno != 0){
			$checkActno = $checkOrgactno;
		}elseif($checkActno != 0){
			$checkActno = $checkActno;
		}
		else{
			$checkActno = 0;
		}
		
		
		$tableName = "posts";
		$field = "postno,postcontent,idno,postcolor,actno,deptno,colno,progno,orgno,campusno,postApproval,postDelete,poststat";
		
		$data = "NULL,'$doodle_data',$useridno,'$color',$checkActno,$checkDeptno,$checkColno,$checkProgno,$checkOrgno,$checkCampusno,'pending',1,'inactive'";
		
		$result = insertTbl($tableName,$field,$data);
	
	}
	
	if(isset($_POST['txtPostUser'])){
		
		$txtGuest = mysql_real_escape_string($_POST['txtGuest']);
		$txtContent = mysql_real_escape_string($_POST['txtContent']);
		$txtColor = mysql_real_escape_string($_POST['txtColor']);
		$txtCampusno = intval($_POST['txtCampusno']);
		$userid = $_POST['txtUser']; 
		
		//INSERT INTO `uc_community`.`posts` (`postno`, `postdatetime`, `posttitle`, `postcontent`, `idno`, `postactno`, `postorgno`, `postdeptno`, `postcolno`, `postcolor`, `poststat`) VALUES (NULL, CURRENT_TIMESTAMP, '', '', '', '', '', '', '', '', '');
		
		$tableName = "posts";
		$field = "postno,postcontent,idno,postcolor,campusno,postApproval,poststat";
		$data = "NULL,'$txtContent',$userid,'$txtColor',$txtCampusno,'pending','inactive'";
		
		$result = insertTbl($tableName,$field,$data);
	
	}
	
	if(isset($_POST['Postfavor']))
	{
		$txtPostno = $_POST['txtPostfavor'];
		$userid = $_POST['txtUser'];
		$date = date('Y-m-d');
		$type = 1;
		
		if($userid != 100000)
		{
			$sqlfavor = "SELECT * FROM postvote WHERE postno =".$txtPostno." AND idno=".$userid;
			$resultvotefavor = mysql_query($sqlfavor);
			$rowf = mysql_fetch_array($resultvotefavor);
			
			$rf = mysql_num_rows($resultvotefavor);
			echo $r;
			if( $rf == 0)
			{
				
					$tableName = "postvote";
					$field = "postno,idno,votedate,type";
					$data = "$txtPostno,$userid,'$date',$type";
					$result = insertTbl($tableName,$field,$data);
			}
			elseif($rf == 1)
			{
				if($rowf['type'] == 1)
					echo "1";
				else
				{
					echo "insert2";
					$tableName = "postvote";
					$field = "postno,idno,votedate,type";
					$data = "$txtPostno,$userid,'$date',$type";
					$result = insertTbl($tableName,$field,$data);
				}
				
			}	
			if($rf == 2)
			{	
				echo "1";
			}
		}
		else
		echo "2";
	}
	
	
	if(isset($_POST['Postunfavor']))
	{
		$txtPostno = $_POST['txtPostunfavor'];
		$userid =  $_POST['txtUser'];
		$date = date('Y-m-d');
		$type = -1;
		if($userid != 100000)
		{
			$sqlunfavor = "SELECT * FROM postvote WHERE postno =".$txtPostno." AND idno=".$userid;
			$resultvoteunfavor = mysql_query($sqlunfavor);
			$rowu = mysql_fetch_array($resultvoteunfavor);
			
			$ru = mysql_num_rows($resultvoteunfavor);
			if( $ru == 0)
			{
			
				$tableName = "postvote";
				$field = "postno,idno,votedate,type";
				$data = "$txtPostno,$userid,'$date',$type";
				$result = insertTbl($tableName,$field,$data);
			}
			elseif($ru == 1)
			{
				if($rowu['type'] == -1)
					echo "1";
				else
				{
					$tableName = "postvote";
					$field = "postno,idno,votedate,type";
					$data = "$txtPostno,$userid,'$date',$type";
					$result = insertTbl($tableName,$field,$data);
				}
				
			}	
			
			if($ru == 2)
			{	
				echo $resultvoteunfavor;
				echo "1";
			}
		}
		else
		echo "2";
		
	}
	
	mysql_close($con);
?>
