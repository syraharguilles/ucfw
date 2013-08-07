<?php
	session_start();
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	
	if(isset($_POST['submit'])){
		$data = $_FILES['file'];
		$campusno = $_POST['campusno_tmp_img'];
		$check;
		if($campusno === ""){
			$check = 1;
		}
		else{
			$check = $campusno;
		}
		//$target_path = "upload/";
		$target_path = "../upload/images/";
	
	
		$target_path = $target_path . basename( $_FILES['file']['name']); 
		//$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
		
			if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
					$_SESSION['error_image'] = "The file ".  basename( $_FILES['file']['name']). " has been uploaded";
					//echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
					
					$new_path = "content/upload/images/".basename( $_FILES['file']['name']);
					
					$idno = 100000;
					
					//$tableName = "imgs";
					//$field = "imgno, imgpath,imgpostno,imgstat";
					//$data = "NULL,'$new_path ','','active'";
					
					$tableName = "posts";
					$field = "postno,postcontent,idno,campusno,postApproval,postDelete,poststat";
					$data = "NULL,'$new_path',$idno,$check,'pending',1,'inactive'";
					
					insertTbl($tableName,$field,$data);
			} 
			else{
					$_SESSION['error_image'] = "There was an error uploading the file, please try again!";
					//echo "There was an error uploading the file, please try again!";
			}
			
	}
		header("location:../../");
		exit;


?>


