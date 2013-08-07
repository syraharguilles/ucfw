<?php
	session_start();
	if(!isset($_SESSION['id']) && $_SESSION['id'] == ""){
		if(isset($_SESSION['userid']) && $_SESSION['userid'] != ""){
			header("location:home");		
		}
		else {
			header("location:redirecting");
		}
	}
	
	
	
?>