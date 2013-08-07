<?php
	session_start();
	require_once("../../library/dbcon.php");
	$user = mysql_real_escape_string($_POST['username']);
	$pwd = mysql_real_escape_string($_POST['password']);
	unset($_SESSION['id']);
	if(isset($_POST['btnLogin'])){
		
		$sql = "SELECT * FROM userheader WHERE username = '$user' AND password = '$pwd'";
		$result = mysql_query($sql);
		
		if($result){
			if(mysql_num_rows($result) > 0){
				$row = mysql_fetch_array($result);
				if($row['username'] === $user && $row['password'] === $pwd){
					$_SESSION['id'] = $row['idno'];
					header("location:../../uc-home");
				}
				else {
					$_SESSION['error'] = "Username and Password is incorrect";
					header("location:../../uc-login");
				}
			}
			else{ 
				$_SESSION['error'] = "Username and Password is incorrect";
				header("location:../../uc-login");
			}
		}
		else{
			$_SESSION['error'] = "Query Failed";
			header("location:../../uc-login");
		}
	}
	
	mysql_close($con);
?>