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
					$_SESSION['userid'] = $row['idno'];
					header("location:../../home");
				}
				else {
					$_SESSION['error_user'] = "Username and Password is incorrect";
					header("location:../../");
				}
			}
			else{ 
				$_SESSION['error_user'] = "Username and Password is incorrect";
				header("location:../../");
			}
		}
		else{
			$_SESSION['error_user'] = "Query Failed";
			header("location:../../");
		}
	}
	
	mysql_close($con);
?>