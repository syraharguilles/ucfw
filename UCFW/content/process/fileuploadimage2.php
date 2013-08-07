<?php
	session_start();
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	
	if(isset($_POST['submit'])){
		$data = $_FILES['file'];
		$campusno = $_POST['campusno_tmp_img'];
		$deptno = $_POST['deptno_tmp_img'];
		$deptactno = $_POST['deptactno_tmp_img'];
		$colno = $_POST['colno_tmp_img'];
		$colactno = $_POST['colactno_tmp_img'];
		$progno = $_POST['progno_tmp_img'];
		$progactno = $_POST['progactno_tmp_img'];
		$orgno = $_POST['orgno_tmp_img'];
		$orgactno = $_POST['orgactno_tmp_img'];
		$actno = $_POST['actno_tmp_img'];
		
		//echo $orgno;
				
		$userid = $_POST['userid_user'];
		//campus
		$checkCampusno = ($campusno == "")? $checkCampusno  = 1 : $checkCampusno = $campusno;
		//dept
		$checkDeptno = ($deptno == "")? $checkDeptno = 0: $checkDeptno = $deptno;
		$checkDeptactno = ($deptactno == "")? $checkDeptactno = 0: $checkDeptactno = $deptactno;
		//col
		$checkColno = ($colno == "")? $checkColno = 0: $checkColno = $colno;
		$checkColactno = ($colactno == "")? $checkColactno  = 0 : $checkColactno = $colactno;
		$checkProgno = ($progno == "")? $checkProgno  = 0 : $checkProgno = $progno;
		$checkProgactno = ($progactno == "")? $checkProgactno  = 0 : $checkProgactno = $progactno;
		//org
		$checkOrgno = ($orgno == "")? $checkOrgno  = 0 : $checkOrgno = $orgno;
		$checkOrgactno = ($orgactno == "")? $checkOrgactno  = 0 : $checkOrgactno = $orgactno;
	
		//act
		$checkActno = ($actno == "")? $checkActno  = 0 : $checkActno = $actno;
		
		if($checkColactno != 0){
		$checkActno = $checkColactno;
		}
		elseif($checkProgactno != 0){
			$checkActno = $checkProgactno;
		}elseif($checkDeptactno != 0){
			$checkActno = $checkDeptactno;
		}elseif($checkOrgactno != 0){
			$checkActno = $checkOrgactno;
		}
		elseif($checkActno != 0){
			$checkActno = $checkActno;
		}
		else{
			$checkActno = 0;
		}
		
		//$target_path = "upload/";
		$target_path = "../upload/images/";
	
	
		$target_path = $target_path . basename( $_FILES['file']['name']); 
		//$extension = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
		
			if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
					$_SESSION['error_image'] = "The file ".  basename( $_FILES['file']['name']). " has been uploaded";
					//echo "The file ".  basename( $_FILES['filecsv']['name']). " has been uploaded";
					
					$new_path = "content/upload/images/".basename( $_FILES['file']['name']);
					
					//$tableName = "imgs";
					//$field = "imgno, imgpath,imgpostno,imgstat";
					//$data = "NULL,'$new_path ','','active'";
					
					$tableName = "posts";
					$field = "postno,postcontent,idno,actno,deptno,colno,progno,orgno,campusno,postApproval,postDelete,poststat";
					$data = "NULL,'$new_path',$userid,$checkActno,$checkDeptno,$checkColno,$checkProgno,$checkOrgno,$checkCampusno,'pending',1,'inactive'";
					//echo $data;
					insertTbl($tableName,$field,$data);
			} 
			else{
					$_SESSION['error_image'] = "There was an error uploading the file, please try again!";
					//echo "There was an error uploading the file, please try again!";
			}
			
	}
		header("location:../../home");
		exit;


?>


