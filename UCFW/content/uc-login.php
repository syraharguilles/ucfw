<?php
	session_start();
	if(isset($_SESSION['id']) && $_SESSION['id'] != ""){
		header("location:uc-home");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin | Login</title>

		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script type="text/javascript" src=""></script>
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<div id = "content-admin">
			<div id = "form-login">
				<h1>UC Community</h1>
				<label style = "margin-left:24px;color:#ff0000;"><?php echo $_SESSION['error']."</label>"; unset($_SESSION['error']);?>
				<form action = "content/process/admin-login-process.php" method = "POST">
					<label>USERNAME</label>
					<input type = "text" placeholder = "username" name = "username" id = "username"/>
					<label>PASSWORD</label>
					<input type = "password" placeholder = "password" name = "password" id = "password"/>
					<input type = "submit" name = "btnLogin" id = "btnLogin" value = "Login"/>
				</form>
			</div>
		</div>
	</body>
</html>