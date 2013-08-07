<?php 
	session_start();
	require_once("content/process/redirect.php");
	require_once("library/dbcon.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin | Home</title>
		<link rel = "stylesheet" type = "text/css" href = "css/ui-lightness/jquery-ui-1.8.21.custom.css" media = "screen"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script type="text/javascript" src="js/jquery.1.7.2.js"></script>
		<script type = "text/javascript" src = "js/jquery-1.7.2.min.js"></script>
		<script type = "text/javascript" src = "js/jquery-ui-1.8.21.custom.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#add-prog").hide();
				$("#search-field").hide();
				$("#admin-prog").css("background-color","#000")
								  .css("color","#fff");
				$("#view").hide();
				$("#add").click(function(){
					$("#add-prog").show("slow");
					$("#search-field").hide("slow");
					$("#view").hide("slow");
					$("#add").css("background-color","#000")
							 .css("color","#fff");
					$("#search").css("background-color","#fff")
							 .css("color","#000");
				});
				$("#search").click(function(){
					$("#view").show("slow");
					$("#search-field").show("slow");
					$("#add-prog").hide("slow");
					$("#search").css("background-color","#000")
								.css("color","#fff");
					$("#add").css("background-color","#fff")
							 .css("color","#000");
				});
				
			});
		</script>
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
						<?php include "content/parts/right-sidebar-menu.php";?>
						<?php include "content/parts/right-sidebar-content-prog.php";?>
					</div>
				</div>
				<div id = "footer"></div>
			</div>
		</div>
	</body>
</html>
<?php mysql_close($con);?>