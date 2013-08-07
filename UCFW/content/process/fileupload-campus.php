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
				$char = explode(",",$line,6);
				
				
				list($campusname,$campusabbr,$address,$zipcode,$telephone) = $char;
				
				
				 $tableName = "campuses";
				 $field = "campusno,campusname,campusabbr,address,zipcode,telephone,campusaddedby,campusstat";
				 $data = "NULL,'$campusname','$campusabbr','$address',$zipcode,'$telephone',$useridno,'active'";
				
				
				insertTbl($tableName,$field,$data);
			}
			 $count++;
		}
		
		fclose($fp);
	}
	//header("location:../../uc-campus");
	exit;

}
?>