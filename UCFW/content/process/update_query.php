<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	//update campus
	if(isset($_POST['campus'])){	
		$campusno = $_POST['txtcampusno'];
		$campusname = $_POST['txtcampusname'];
		$campusabbr = $_POST['txtcampusabbr'];
		$address = $_POST['txtcampusaddr'];
		$zipcode = $_POST['txtcampuszipcode'];
		$telephone = $_POST['txtcampustel'];
			
		$tableName = "campuses";
		$colValue = "campusname = '$campusname', 
					 campusabbr = '$campusabbr',
					 address = '$address',
					 zipcode = '$zipcode',
					 telephone = '$telephone'";
					 
		$id = "campusno = $campusno";
		
		$result = updateTbl($tableName,$colValue,$id);
		echo $result;
		if($result == 1){
			header("location:../../uc-campus");
		}
	}
	
	//update department
	if(isset($_POST['department'])){
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
		$colValue = "deptname = '$deptname',
					 deptabbr = '$deptabbr',
					 deptbldgname = '$bldgname',
					 deptflrno = '$flrno',
					 deptlocalno = '$localno',
					 depthead = '$depthead',
					 actno = '$actno',
					 orgno = '$orgno',
					 campusno = '$campusno'";
					 
		$id = "deptno = $deptno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	//update college
	if(isset($_POST['college'])){
		$colno = $_POST['txtcolno'];
		$colname = $_POST['txtcolname'];
		$colabbr = $_POST['txtcolabbr'];
		$bldgname = $_POST['txtbldgname'];
		$flrno = $_POST['txtflrno'];
		$localno = $_POST['txtlocalno'];
		$coldean = $_POST['txtcoldean'];
		$actno = $_POST['txtactno'];
		$campusno = $_POST['txtcampusno'];
			
		$tableName = "colleges";
		$colValue = "colname = '$colname',  
					 colabbr = '$colabbr',
					 colbldgname = '$bldgname',
					 colflrno = '$flrno',
					 collocalno = '$localno',
					 coldean = '$coldean',
					 actno = '$actno',
					 campusno = '$campusno'";
					 
		$id = "colno = $colno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	//update program
	if(isset($_POST['program'])){
		$progno = $_POST['txtprogno'];
		$progname = $_POST['txtprogname'];
		$progacro = $_POST['txtprogacronyms'];
		$colno = $_POST['txtcolno'];
		$orgno = $_POST['txtorgno'];
		$campusno = $_POST['txtcampusno'];
			
		$tableName = "programs";
		$colValue = "progname = '$progname',
					 progacronyms = '$progacro', 
					 colno = '$colno',
					 orgno = '$orgno',
					 campusno = '$campusno'";

		$id = "progno = $progno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	//update campus organization
	if(isset($_POST['orgcampus'])){
		$orgno = $_POST['txtorgno'];
		$orgname = $_POST['txtorgname'];
		$orgabbr = $_POST['txtorgabbr'];
		//$orgtype = $_POST['txttype'];
		$bldgname = $_POST['txtbldgname'];
		$flrno = $_POST['txtflrno'];
		$localno = $_POST['txtlocalno'];
		$actno = $_POST['txtactno'];
		$campusno = $_POST['txtcampusno'];
			
		$tableName = "organizations";
		$colValue = "orgname = '$orgname', 
					 orgabbr = '$orgabbr',
					 orgbldgname = '$bldgname',
					 orgflrno = '$flrno',
					 orglocalno = '$localno',
					 actno = '$actno',
					 campusno = '$campusno'";
					 
		$id = "orgno = $orgno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}	
	//update dept organization
	if(isset($_POST['orgdept'])){
		$orgno = $_POST['txtorgno'];
		$orgname = $_POST['txtorgname'];
		$orgabbr = $_POST['txtorgabbr'];
		$bldgname = $_POST['txtbldgname'];
		$flrno = $_POST['txtflrno'];
		$localno = $_POST['txtlocalno'];
		$actno = $_POST['txtactno'];
		$deptno = $_POST['txtdeptno'];
		$campusno = $_POST['txtcampusno'];
			
		$tableName = "organizations";
		$colValue = "orgname = '$orgname', 
					 orgabbr = '$orgabbr',
					 orgbldgname = '$bldgname',
					 orgflrno = '$flrno',
					 orglocalno = '$localno',
					 actno = '$actno',
					 deptno = '$deptno',
					 campusno = '$campusno'";
					 
		$id = "orgno = $orgno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}
	
	//update dept organization
	if(isset($_POST['orgcol'])){
		$orgno = $_POST['txtorgno'];
		$orgname = $_POST['txtorgname'];
		$orgabbr = $_POST['txtorgabbr'];
		$bldgname = $_POST['txtbldgname'];
		$flrno = $_POST['txtflrno'];
		$localno = $_POST['txtlocalno'];
		$actno = $_POST['txtactno'];
		$progno = $_POST['txtprogno'];
		$colno = $_POST['txtcolno'];
		$campusno = $_POST['txtcampusno'];
			
		$tableName = "organizations";
		$colValue = "orgname = '$orgname', 
					 orgabbr = '$orgabbr',
					 orgbldgname = '$bldgname',
					 orgflrno = '$flrno',
					 orglocalno = '$localno',
					 actno = '$actno',
					 progno = '$progno',
					 colno = '$colno',
					 campusno = '$campusno'";
					 
		$id = "orgno = $orgno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}
	//update super activity
	if(isset($_POST['activity'])){
		$actno = $_POST['txtactno'];
		$actname = $_POST['txtactname'];
		$actheld = $_POST['txtactheld'];
		$actdate = $_POST['txtactdate'];
		$acttimestart = $_POST['txtacttimestart'];
		$acttimeend = $_POST['txtacttimeend'];
		$actsem = $_POST['txtactsem'];
		$actyear = $_POST['txtyear'];
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
		
		$colValue = "actname = '$actname',
					 actheld = '$actheld',
					 actdate = '$actdateformatted',
					 acttimestart = '$acttimestart',
					 acttimeend = '$acttimeend',
					 actsem = '$actsem',
					 actyear = '$actyear'";
					 
		$id = "actno = $actno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}
	//update campus activity
	if(isset($_POST['campusact'])){
		$actno = $_POST['txtactno'];
		$actname = $_POST['txtactname'];
		$actheld = $_POST['txtactheld'];
		$actdate = $_POST['txtactdate'];
		$acttimestart = $_POST['txtacttimestart'];
		$acttimeend = $_POST['txtacttimeend'];
		$actsem = $_POST['txtactsem'];
		$actyear = $_POST['txtyear'];
		$actcampusno = $_POST['txtcampusno'];
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
		
		$colValue = "actname = '$actname',
					 actheld = '$actheld',
					 actdate = '$actdateformatted',
					 acttimestart = '$acttimestart',
					 acttimeend = '$acttimeend',
					 actsem = '$actsem',
					 actyear = '$actyear',
					 campusno = '$actcampusno'";
					 
		$id = "actno = $actno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}
	//update dept activity
	if(isset($_POST['deptact'])){
		$actno = $_POST['txtactno'];
		$actname = $_POST['txtactname'];
		$actheld = $_POST['txtactheld'];
		$actdate = $_POST['txtactdate'];
		$acttimestart = $_POST['txtacttimestart'];
		$acttimeend = $_POST['txtacttimeend'];
		$actsem = $_POST['txtactsem'];
		$actyear = $_POST['txtyear'];
		$actdeptno = $_POST['txtdeptno'];
		$actcampusno = $_POST['txtcampusno'];
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
		
		$colValue = "actname = '$actname',
					 actheld = '$actheld',
					 actdate = '$actdateformatted',
					 acttimestart = '$acttimestart',
					 acttimeend = '$acttimeend',
					 actsem = '$actsem',
					 actyear = '$actyear',
					 deptno = '$actdeptno',
					 campusno = '$actcampusno'";
					 
		$id = "actno = $actno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}
	//update col activity
	if(isset($_POST['colact'])){
		$actno = $_POST['txtactno'];
		$actname = $_POST['txtactname'];
		$actheld = $_POST['txtactheld'];
		$actdate = $_POST['txtactdate'];
		$acttimestart = $_POST['txtacttimestart'];
		$acttimeend = $_POST['txtacttimeend'];
		$actsem = $_POST['txtactsem'];
		$actyear = $_POST['txtyear'];
		$actprogno = $_POST['txtprogno'];
		$actcolno = $_POST['txtcolno'];
		$actcampusno = $_POST['txtcampusno'];
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
		
		$colValue = "actname = '$actname',
					 actheld = '$actheld',
					 actdate = '$actdateformatted',
					 acttimestart = '$acttimestart',
					 acttimeend = '$acttimeend',
					 actsem = '$actsem',
					 actyear = '$actyear',
					 progno = '$actprogno',
					 colno = '$actcolno',
					 campusno = '$actcampusno'";
					 
		$id = "actno = $actno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}
	
	//update org campus activity
	if(isset($_POST['orgcampusact'])){
		$actno = $_POST['txtactno'];
		$actname = $_POST['txtactname'];
		$actheld = $_POST['txtactheld'];
		$actdate = $_POST['txtactdate'];
		$acttimestart = $_POST['txtacttimestart'];
		$acttimeend = $_POST['txtacttimeend'];
		$actsem = $_POST['txtactsem'];
		$actyear = $_POST['txtyear'];
		$actorgno = $_POST['txtorgno'];
		$actcampusno = $_POST['txtcampusno'];
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
		
		$colValue = "actname = '$actname',
					 actheld = '$actheld',
					 actdate = '$actdateformatted',
					 acttimestart = '$acttimestart',
					 acttimeend = '$acttimeend',
					 actsem = '$actsem',
					 actyear = '$actyear',
					 orgno = '$actorgno',
					 campusno = '$actcampusno'";
					 
		$id = "actno = $actno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}
	
	//update org dept activity
	if(isset($_POST['orgdeptact'])){
		$actno = $_POST['txtactno'];
		$actname = $_POST['txtactname'];
		$actheld = $_POST['txtactheld'];
		$actdate = $_POST['txtactdate'];
		$acttimestart = $_POST['txtacttimestart'];
		$acttimeend = $_POST['txtacttimeend'];
		$actsem = $_POST['txtactsem'];
		$actyear = $_POST['txtyear'];
		$actdeptno = $_POST['txtdeptno'];
		$actcampusno = $_POST['txtcampusno'];
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
		
		$colValue = "actname = '$actname',
					 actheld = '$actheld',
					 actdate = '$actdateformatted',
					 acttimestart = '$acttimestart',
					 acttimeend = '$acttimeend',
					 actsem = '$actsem',
					 actyear = '$actyear',
					 deptno = '$actdeptno',
					 campusno = '$actcampusno'";
					 
		$id = "actno = $actno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}
	//update org col activity
	if(isset($_POST['orgcolact'])){
		$actno = $_POST['txtactno'];
		$actname = $_POST['txtactname'];
		$actheld = $_POST['txtactheld'];
		$actdate = $_POST['txtactdate'];
		$acttimestart = $_POST['txtacttimestart'];
		$acttimeend = $_POST['txtacttimeend'];
		$actsem = $_POST['txtactsem'];
		$actyear = $_POST['txtyear'];
		$actorgno = $_POST['txtorgno'];
		$actprogno = $_POST['txtprogno'];
		$actcolno = $_POST['txtcolno'];
		$actcampusno = $_POST['txtcampusno'];
		
		$actdateStrtoTime = strtotime("$actdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "activities";
		
		$colValue = "actname = '$actname',
					 actheld = '$actheld',
					 actdate = '$actdateformatted',
					 acttimestart = '$acttimestart',
					 acttimeend = '$acttimeend',
					 actsem = '$actsem',
					 actyear = '$actyear',
					 orgno = '$actorgno',
					 progno = '$actprogno',
					 colno = '$actcolno',
					 campusno = '$actcampusno'";
					 
		$id = "actno = $actno";
		
		$result = updateTbl($tableName,$colValue,$id); 
	}
	
	//update campus admin
	if(isset($_POST['admincampus'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 username = '$username',
					 password = '$password'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
		
	}
	if(isset($_POST['admincampus'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
		
	}
	
	//Campus Graduates 
	if(isset($_POST['campusgrad'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$usercompname = $_POST['txtcompname'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 usercompname = '$usercompname'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['campusgrad'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//Campus Alumni
	if(isset($_POST['campusalum'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$useryrgrad = $_POST['txtyrgrad'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 useryrgrad = '$useryrgrad'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['campusalum'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}

	if(isset($_POST['OrgCampAdmin'])){
		$id = $_POST['txtid'];
		$orgno = $_POST['txtorgno'];
		
		$tableName = "userdetails";
		$colValue = "orgno = $orgno";
	
		$id = "idno = $id";
		
		$result = updateTbl($tableName,$colValue,$id);
		
	}
	
	if(isset($_POST['OrgCampAdminMem'])){
		$id = $_POST['txtid'];
		$orgno = $_POST['txtorgno'];
		
		$tableName = "userdetails";
		$colValue = "orgno = null";
	
		$id = "idno = $id";
		
		$result = updateTbl($tableName,$colValue,$id);
		
	}
	//update dept admin
	if(isset($_POST['admindept'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 username = '$username',
					 password = '$password'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['admindept'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$deptno = $_POST['txtdeptno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
				     deptno = '$deptno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";

		$result = updateTbl($tableName,$colValue,$id);
	}
	//Update dept employee
	if(isset($_POST['deptemp'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['deptemp'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$deptno = $_POST['txtdeptno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
				     deptno = '$deptno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//update col admin
	if(isset($_POST['admincol'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 username = '$username',
					 password = '$password'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['admincol'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$colno = $_POST['txtcolno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
				     colno = '$colno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//update col faculty
	if(isset($_POST['colfac'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 password = '$password'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['colfac'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$colno = $_POST['txtcolno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
				     colno = '$colno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//update col staff
	if(isset($_POST['colstaff'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 password = '$password'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['colstaff'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$colno = $_POST['txtcolno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
				     colno = '$colno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//update col stud
	if(isset($_POST['colstud'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 password = '$password'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['colstud'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$progno = $_POST['txtprogno'];
		$colno = $_POST['txtcolno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
				     colno = '$colno',
				     progno = '$progno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//Col Alumni
	if(isset($_POST['colalum'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$userbdate = $_POST['txtbdate'];
		
		$actdateStrtoTime = strtotime("$userbdate");
		$actdateformatted = date('Y-m-d',$actdateStrtoTime);
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 userbdate = '$actdateformatted'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['colalum'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$progno = $_POST['txtprogno'];
		$colno = $_POST['txtcolno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
				     colno = '$colno',
				     progno = '$progno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//update gs admin
	if(isset($_POST['admingsprog'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 username = '$username',
					 password = '$password'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['admingsprog'])){
		$idno = $_POST['txtidno'];
		$campusno = $_POST['txtcampusno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	//update org campus admin
	if(isset($_POST['orgcampusadmin'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		//$usertype = $_POST['txttype'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 username = '$username',
					 password = '$password'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['orgcampusadmin'])){
		$idno = $_POST['txtidno'];
		$orgno = $_POST['txtorgno'];
		$campusno = $_POST['txtcampusno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "campusno = '$campusno',
					 orgno = '$orgno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//update org dept admin
	if(isset($_POST['orgdeptadmin'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$usertype = $_POST['txttype'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 username = '$username',
					 password = '$password'";

		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['orgdeptadmin'])){
		$idno = $_POST['txtidno'];
		$orgno = $_POST['txtorgno'];
		$deptno = $_POST['txtdeptno'];
		$campusno = $_POST['txtcampusno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "orgno = '$orgno',
					 deptno = '$deptno',
					 campusno = '$campusno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//update org col admin
	if(isset($_POST['orgcoladmin'])){
		$idno = $_POST['txtidno'];
		$userfname = $_POST['txtuserfname'];
		$usermidname = $_POST['txtusermidname'];
		$userlname = $_POST['txtuserlname'];
		$usergender = $_POST['txtgender'];
		$usertype = $_POST['txttype'];
		$useremail = $_POST['txtemailadd'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$tableName = "userheader";
		
		$colValue = "userfname = '$userfname',
					 userlname = '$userlname',
					 usermidname = '$usermidname',
					 usergender = '$usergender',
					 useremail = '$useremail',
					 username = '$username',
					 password = '$password'";
		
		$id = "idno = $idno";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['orgcoladmin'])){
		$idno = $_POST['txtidno'];
		$orgno = $_POST['txtorgno'];
		$progno = $_POST['txtprogno'];
		$colno = $_POST['txtcolno'];
		$campusno = $_POST['txtcampusno'];
		$userupdatedby =  $_POST['txtuseridno'];
		
		$tableName = "userdetails";
		
		$colValue = "orgno = '$orgno',
					 progno = '$progno',
					 colno = '$colno',
					 campusno = '$campusno',
					 userupdatedby = '$userupdatedby'";
		
		$id = "idno = $idno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	//===========USER BLOCK AND UNBLOCK====================
	if(isset($_POST['Postunfavor'])){
		$txtPostno = $_POST['txtPostunfavor'];
		$txtPosttotal = $_POST['txttotal'];
		$useridno = "";
		
		if($txtPosttotal == -5)
		{
			$sqlPostUser = mysql_query("SELECT * 
							FROM userheader uh left join  
								 posts p on uh.idno = p.idno where postno = ".$txtPostno);
			
			$row=mysql_fetch_array($sqlPostUser);
			$useridno = $row['idno'];
			
			$tableName = "posts";
		
			$colValue = "poststat = 'inactive'";				
			
			$id = "postno = $txtPostno";
	
			$result = updateTbl($tableName,$colValue,$id);
		}
	}
	
	/*if(isset($_POST['Postunfavor'])){
		$txtPostno = $_POST['txtPostunfavor'];
		$txtPosttotal = $_POST['txttotal'];
		$useridno = "";
		
		if($txtPosttotal == -5)
		{
			$sqlPostUser = mysql_query("SELECT * 
							FROM userheader uh left join  
								 posts p on uh.idno = p.idno where postno = ".$txtPostno);
			
			$row=mysql_fetch_array($sqlPostUser);
			$useridno = $row['idno'];
			
			$tableName = "userheader";
		
			$colValue = "userstat = 'inactive'";				
			
			$id = "idno = $useridno";
	
			$result = updateTbl($tableName,$colValue,$id);
		}
	}*/
	
	//===========POST APPROVAL AND DISAPPROVAL====================
	if(isset($_POST['txtApprovedUser'])){
		$txtPostno = $_POST['txtPostno'];
		
		$tableName = "posts";
		
		$colValue = "postApproval = 'approved',
					 poststat = 'active'";				
		
		$id = "postno = $txtPostno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['txtDisApprovedUser'])){
		$txtPostno = $_POST['txtPostno'];
		
		$tableName = "posts";
		
		$colValue = "postApproval = 'disapproved',
					 poststat = 'inactive',
					 postDelete = '0'";				
		
		$id = "postno = $txtPostno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['txtDisApprovedGuest'])){
		$txtPostno = $_POST['txtPostno'];
		
		$tableName = "posts";
		
		$colValue = "postApproval = 'disapproved',
					 poststat = 'inactive',
					 postDelete = 0";				
		
		$id = "postno = $txtPostno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	if(isset($_POST['txtApprovedGuest'])){
		$txtPostno = $_POST['txtPostno'];
		
		$tableName = "posts";
		
		$colValue = "postApproval = 'approved',
					 poststat = 'active'";				
		
		$id = "postno = $txtPostno";
	
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	mysql_close($con);
?>