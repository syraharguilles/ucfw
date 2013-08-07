<?php
	session_start();
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
//for campus	
if(isset($_POST['campus'])){
	//$data = $_POST['filecsv'];
	$useridno = $_POST['useridno'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) {
				$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				//echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else{
				$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				//echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($campusname,$campusabbr,$address,$zipcode,$telephone) = $char;
				
				
				 $tableName = "campuses";
				 $field = "campusno,campusname,campusabbr,address,zipcode,telephone,campusaddedby,campusstat";
				 $data = "NULL,'$campusname','$campusabbr','$address',$zipcode,'$telephone',$useridno,'active'";
				
				 //echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-campus");
	exit;
}

//for department
if(isset($_POST['department'])){
	//$data = $_POST['filecsv'];
	$campusno = $_POST['select'];
	$useridno = $_POST['useridno'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) {
				$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				//echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else{
				$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				//echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($deptname,$deptabbr,$deptbldgname,$deptflrno,$deptlocalno,$depthead) = $char;
				
				
				 $tableName = "departments";
				 $field = "deptno,deptname,deptabbr,deptbldgname,deptflrno,deptlocalno,depthead,campusno,deptaddedby,deptstat";
				 $data = "NULL,'$deptname','$deptabbr','$deptbldgname',$deptflrno,$deptlocalno,'$depthead',$campusno,$useridno,'active'";
				
				 //echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-department");
	exit;
}

//for colleges
if(isset($_POST['colleges'])){
	//$data = $_POST['filecsv'];
	$campusno = $_POST['select'];
	$useridno = $_POST['useridno'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else
	{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) 
		{
				$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				//echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else
		{
				$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				//echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($colname,$colabbr,$colbldgname,$colflrno,$collocalno,$coldean) = $char;
				
				
				 $tableName = "colleges";
				 $field = "colno,colname,colabbr,colbldgname,colflrno,collocalno,coldean,campusno,coladdedby,colstat";
				 $data = "NULL,'$colname','$colabbr','$colbldgname',$colflrno,$collocalno,'$coldean',$campusno,$useridno,'active'";
				
				//echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-college");
	exit;
}
//for programs
if(isset($_POST['programs'])){
	//$data = $_POST['filecsv'];
	$campusno = $_POST['selectcampus'];
	$colno = $_POST['selectcol'];
	$useridno = $_POST['useridno'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else
	{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) 
		{
				$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				//echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else
		{
				$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				//echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($progname,$progacronyms) = $char;
				
				
				 $tableName = "programs";
				 $field = "progno,progname,progacronyms,colno,campusno,progaddedby,progstat";
				 $data = "NULL,'$progname','$progacronyms',$colno,'$campusno',$useridno,'active'";
				
				 //echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-program");
	exit;
}
//for campus organizations
if(isset($_POST['camporg'])){
	//$data = $_POST['filecsv'];
	$campusno = $_POST['selectorgcampus'];
	$useridno = $_POST['useridno'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else
	{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) 
		{
				$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				//echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else
		{
				$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				//echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($orgname,$orgabbr,$orgbldgname,$orgflrno,$orglocalno) = $char;
				
				
				 $tableName = "organizations";
				 $field = "orgno,orgname,orgabbr,orgbldgname,orgflrno,orglocalno,campusno,orgaddedby,orgstat";
				 $data = "NULL,'$orgname','$orgabbr','$orgbldgname',$orgflrno,$orglocalno,$campusno,$useridno,'active'";
				
				 //echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-organization");
	exit;
}
// for college organization
if(isset($_POST['colorg'])){
	//$data = $_POST['filecsv'];
	$campusno = $_POST['selectorgcampuscol'];
	$colno = $_POST['selectorgcolcol'];
	$progno	= $_POST['selectorgprogcol'];
	$useridno = $_POST['useridno'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else
	{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) 
		{
				//$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else
		{
				//$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($orgname,$orgabbr,$orgbldgname,$orgflrno,$orglocalno) = $char;
				
				
				 $tableName = "organizations";
				 $field = "orgno,orgname,orgabbr,orgbldgname,orgflrno,orglocalno,campusno,colno,progno,orgaddedby,orgstat";
				 $data = "NULL,'$orgname','$orgabbr','$orgbldgname',$orgflrno,$orglocalno,$campusno,$colno,$progno,$useridno,'active'";
				
				 echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-organization");
	exit;
}

// for activities
if(isset($_POST['activity'])){
	//$data = $_POST['filecsv'];
	$useridno = $_POST['useridno'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else
	{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) 
		{
				$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				//echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else
		{
				$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				//echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($actname,$actheld,$actdate,$acttimestart,$mnostart,$acttimeend,$mnoend,$actsem,$actyear) = $char;
				
				
				//var_dump($char);
				
				 $tableName = "activities";
				 $field = "actno,actname,actheld,actdate,acttimestart,mnostart,acttimeend,mnoend,actsem,actyear,campusno,actaddedby,actstat";
				$data = "NULL, '$actname', '$actheld', '$actdate', '$acttimestart', '$mnostart', '$acttimeend', '$mnoend', '$actsem', '$actyear', 0, '$useridno', 'active'";
				
				// echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-organization");
	exit;
}
// for orgdept activities
if(isset($_POST['orgdeptact'])){
	//$data = $_POST['filecsv'];
	$useridno = $_POST['useridno'];
	$campusno = $_POST['select'];
	$deptno = $_POST['select'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else
	{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) 
		{
				//$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else
		{
				//$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($actname,$actheld,$actdate,$acttimestart,$mmnostart,$acttimeend,$mnoend,$actsem,$actyear) = $char;
				
				
				 $tableName = "activities";
				 $field = "actno,actname,actheld,actdate,acttimestart,mnostart,acttimeend,mnoend,actsem,actyear,campusno,deptno,actaddedby,actstat";
				 $data = "NULL,'$actname','$actheld','$actdateformatted','$acttimestart','$mnostart','$acttimeend','$mnoend','$actsem','$actyear','$campusno','$deptno','$useridno','active'";
				
				 echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-organization");
	exit;
}

// for orgcamp activities
if(isset($_POST['campusact'])){
	//$data = $_POST['filecsv'];
	$useridno = $_POST['useridno'];
	$campusno = $_POST['select'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else
	{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) 
		{
				//$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else
		{
				//$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($actname,$actheld,$actdate,$acttimestart,$mmnostart,$acttimeend,$mnoend,$actsem,$actyear) = $char;
				
				
				 $tableName = "activities";
				 $field = "actno,actname,actheld,actdate,acttimestart,mnostart,acttimeend,mnoend,actsem,actyear,campusno,actaddedby,actstat";
				 $data = "NULL,'$actname','$actheld','$actdateformatted','$acttimestart','$mnostart','$acttimeend','$mnoend','$actsem','$actyear','$campusno','$useridno','active'";
				
				 echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-organization");
	exit;
}
// for orgcamp activities
if(isset($_POST['colact'])){
	//$data = $_POST['filecsv'];
	$useridno = $_POST['useridno'];
	$campusno = $_POST['select'];
	$colno = $_POST['select'];
	$progno = $_POST['select'];
	//$target_path = "upload/";
	$target_path = "../upload/";
	
	
	$target_path = $target_path . basename( $_FILES['filecsv']['name']); 
	$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
	
	if($extension != 'csv'){
			die("NOT A CSV FILE");
	}
	else
	{
		
		if(move_uploaded_file($_FILES['filecsv']['tmp_name'], $target_path)) 
		{
				//$_SESSION['msg_uploading'] = "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
				echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
		} 
		else
		{
				//$_SESSION['msg_uploading'] =  "There was an error uploading the file, please try again!";
				echo "There was an error uploading the file, please try again!";
		}
		
		$fp = fopen($target_path, "r");

		$count = 0;
		while ($line = fgets($fp))
		{ 
			if( $count > 0 ) 
			{
				$char = explode(",",$line,10);
				
				
				list($actname,$actheld,$actdate,$acttimestart,$mmnostart,$acttimeend,$mnoend,$actsem,$actyear) = $char;
				
				
				 $tableName = "activities";
				 $field = "actno,actname,actheld,actdate,acttimestart,mnostart,acttimeend,mnoend,actsem,actyear,campusno,colno,progno,actaddedby,actstat";
				 $data = "NULL,'$actname','$actheld','$actdateformatted','$acttimestart','$mnostart','$acttimeend','$mnoend','$actsem','$actyear','$campusno','$colno','$progno','$useridno','active'";
				
				 echo "<pre>",$data,"</pre>";
				 
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	header("location:../../uc-activity");
	exit;
}
mysql_close($con);
?>