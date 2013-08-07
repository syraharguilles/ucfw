<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
		$idno = mysql_real_escape_string($_POST['txtidno']);
		$userfname = mysql_real_escape_string($_POST['txtuserfname']);
		$usermidname = mysql_real_escape_string($_POST['txtusermidname']);
		$userlname = mysql_real_escape_string($_POST['txtuserlname']);
		$usergender = mysql_real_escape_string($_POST['txtgender']);
		$useremail = mysql_real_escape_string($_POST['txtemailadd']);
		$username = mysql_real_escape_string($_POST['txtusername']);
		$password = mysql_real_escape_string($_POST['txtpassword']);
	
		$campusno = mysql_real_escape_string($_POST['txtcampusno']);
		
		$tableName = "userheader";
		$field = "idno,userfname,userlname,usermidname,usergender,useremail,username,password,usertype";
		$data = "'$idno','$userfname','$userlname','$usermidname','$usergender','$useremail','$username','$password','campus-admin'";

		$tableName2 = "userdetails";
		$field2 = "idno,usercampusno,userstat";
		$data2 = "$idno,$campusno,'active'";
		//echo "<br/>";
		
		$result2 = insertTbl($tableName2,$field2,$data2);	
		
		$result = insertTbl($tableName,$field,$data);
		
		
		
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
		/*$sql2 = mysql_query("INSERT INTO userdetails (idno, orgno, deptno, colno, progno, actno, userfname, userlname, usermidname, usergender, useremail, userstat)
											VALUES ('$idno', '$orgno', '0', '$colno', '0', '0', '$userfname', '$userlname', '$usermidname', '$usergender', '$useremail', 'active')");
		//echo $sql2;	
		$sql = mysql_query("INSERT INTO userheader (idno,username,password,isorg,iscol,campusno,usertype)
											VALUES ($idno,'$username','$password',$isorg,$iscol,$campusno,'col-admin')");
					
		
		$sql2 = "INSERT INTO `uc_community`.`userdetails` (`idno`, `orgno`, `colno`, `userfname`, `userlname`, `usermidname`, `usergender`, `useremail`, `userstat`) 
		VALUES ('$idno', '$orgno', '$colno', '$userfname', '$userlname', '$usermidname', '$usergender', '$useremail', 'active')";
		mysql_query($sql2);
			*/
		
			header("location:../../uc-admin");
		
	
	//INSERT INTO userdetails (idno, orgno, deptno, colno, progno, actno, userfname, userlname, usermidname, usergender, useremail, userstat)			
	//VALUES (00001, 1, 1, 1, 1, 1, 'jessie', 'userlname', 'usermidname', 'f', 'useremail@yahoo.com', 'active'
	
	
	
?>