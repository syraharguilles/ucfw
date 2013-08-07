<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	if(isset($_POST['add'])){
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$username = mysql_real_escape_string($_POST['txtusername']);
		$password = mysql_real_escape_string($_POST['txtpass']);
		
		$colno = mysql_real_escape_string($_POST['col_select']);
			if ($colno != 0)
				$iscol = 1;
			else 
				$iscol = 0;
		$orgno = mysql_real_escape_string($_POST['org_select']);
			if ($orgno != 0)
				$isorg = 1;
			else 
				$isorg = 0;
		$campusno = mysql_real_escape_string($_POST['campus_select']);
		
		$userfname = mysql_real_escape_string($_POST['txtfname']);
		$usermidname = mysql_real_escape_string($_POST['txtmidname']);
		$userlname = mysql_real_escape_string($_POST['txtlname']);
		$usergender = mysql_real_escape_string($_POST['gender']);
		$useremail = mysql_real_escape_string($_POST['emailadd']);
		
		
		
		$tableName = "userheader";
		$field = "idno,username,password,isorg,iscol,campusno,usertype";
		$data = "$idno,'$username','$password','$isorg','$iscol','$campusno','col-admin'";

		$tableName2 = "userdetails";
		$field2 = "idno,orgno,deptno,colno,progno,userfname,userlname,usermidname,usergender,useremail,userstat";
		$data2 = "$idno,$orgno,0,$colno,0,'$userfname,'$userlname','$usermidname','$usergender','$useremail','active'";
		//echo "<br/>";
		
		//$result2 = insertTbl($tableName2,$field2,$data2);	
		
		//$result = insertTbl($tableName,$field,$data);
		
		
		
		/*echo "IDNO: $idno<br/>
			  USERNAME: $username <br/>
			  PASSWORD: $password <br/>
			  COLNO: $colno <br/>
			  ORGNO: $orgno <br/>
			  CAMPUSNO: $campusno <br/>
			  FIRSTNAME: $userfname <br/>
			  MIDNAME: $usermidname <br/>
			  LASTNAME: $userlname <br/>
			  GENDER: $usergender <br/>
			  EMAIL: $useremail <br/><br/>
			  ";*/
		$sql2 = mysql_query("INSERT INTO userdetails (idno, orgno, deptno, colno, progno, actno, userfname, userlname, usermidname, usergender, useremail, userstat)
											VALUES ('$idno', '$orgno', '0', '$colno', '0', '0', '$userfname', '$userlname', '$usermidname', '$usergender', '$useremail', 'active')");
		//echo $sql2;	
		$sql = mysql_query("INSERT INTO userheader (idno,username,password,isorg,iscol,campusno,usertype)
											VALUES ($idno,'$username','$password',$isorg,$iscol,$campusno,'col-admin')");
					
		
		$sql2 = "INSERT INTO `uc_community`.`userdetails` (`idno`, `orgno`, `colno`, `userfname`, `userlname`, `usermidname`, `usergender`, `useremail`, `userstat`) 
		VALUES ('$idno', '$orgno', '$colno', '$userfname', '$userlname', '$usermidname', '$usergender', '$useremail', 'active')";
		mysql_query($sql2);
			
		
			header("location:../../uc-admin");
		
	}
	//INSERT INTO userdetails (idno, orgno, deptno, colno, progno, actno, userfname, userlname, usermidname, usergender, useremail, userstat)			
	//VALUES (00001, 1, 1, 1, 1, 1, 'jessie', 'userlname', 'usermidname', 'f', 'useremail@yahoo.com', 'active'
	
	
	
?>