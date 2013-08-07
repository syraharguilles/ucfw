<?php 
	session_start();
	require_once("content/process/redirect.php");
	require_once("library/dbcon.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Super Admin | Home</title>
		<link rel = "stylesheet" type = "text/css" href = "css/ui-lightness/jquery-ui-1.8.21.custom.css" media = "screen"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script type="text/javascript" src="js/jquery.1.7.2.js"></script>
		<script type = "text/javascript" src = "js/jquery-1.7.2.min.js"></script>
		<script type = "text/javascript" src = "js/jquery-ui-1.8.21.custom.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#search-add").show("slow");
				$("#view").show("slow");
				$("#admin-campus").css("background-color","#000")
								  .css("color","#fff");
			});
		</script>
	</head>
	<body>
		<div id = "wrapper">
			<div id = "header">
				<?php include "content/parts/header.php";?>
			</div>
			<div id = "content-admin">
				<div id = "information">
					<label>Super Admin</label>
				</div>
				<div id = "left-sidebar">
					<?php include "content/parts/left-sidebar-menu.php";?>
				</div>
				<div id = "right-sidebar">
					<?php include "content/parts/right-sidebar-content-campus.php";?>
				</div>
			</div>
			<div id = "footer"></div>
		</div>
	</body>
</html>
<?php mysql_close($con);?>