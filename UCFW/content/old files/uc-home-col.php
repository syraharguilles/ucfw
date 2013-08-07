<?php 
	session_start();
	require_once("content/process/redirect.php");
	require_once("library/dbcon.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Col Admin | Home</title>

		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script type="text/javascript" src=""></script>
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<div id = "wrapper">
			<div id = "sub-wrapper">
				<div id = "header">
					<?php include "content/parts/header.php";?>
				</div>
				<div id = "content-admin">
					<div id = "information">
						<label>College Admin</label>
					</div>
					<div id = "left-sidebar">
						<?php include "content/parts/left-sidebar-menu-col.php";?>
						
					</div>
					<div id = "right-sidebar">
						
					</div>
				</div>
				<div id = "footer"></div>
			</div>
		</div>
	</body>
</html>
