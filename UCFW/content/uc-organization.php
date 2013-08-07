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
				$("#search-add-org-campus").hide();
				$("#search-add-org-dept").hide();
				$("#search-add-org-col").hide();
				$("#view-campus").hide();
				$("#view-dept").hide();
				$("#view-col").hide();
				$("#right-sidebar-menu-submenu").show("slow");
				$("#admin-org").css("background-color","#000")
								  .css("color","#fff");
				
				$("#org-camp").click(function(){
					$("#search-add-org-campus").show("slow");
					$("#search-add-org-dept").hide();
					$("#search-add-org-col").hide();
					$("#view-campus").show("slow");
					$("#view-dept").hide();
					$("#view-col").hide();
					$("#org-camp").css("background-color","#000")
							  .css("color","#fff");
					$("#org-dept").css("background-color","#fff")
						      .css("color","#7C7C7C");
					$("#org-col").css("background-color","#fff")
						      .css("color","#7C7C7C");
				});
				
				$("#org-dept").click(function(){
					$("#search-add-org-dept").show("slow");
					$("#search-add-org-campus").hide();
					$("#search-add-org-col").hide();
					$("#view-dept").show("slow");
					$("#view-campus").hide();
					$("#view-col").hide();
					$("#org-dept").css("background-color","#000")
							  .css("color","#fff");
					$("#org-camp").css("background-color","#fff")
							  .css("color","#7C7C7C");
					$("#org-col").css("background-color","#fff")
							  .css("color","#7C7C7C");		  
				});
				$("#org-col").click(function(){
					$("#search-add-org-dept").hide();
					$("#search-add-org-campus").hide();
					$("#search-add-org-col").show("slow");
					$("#view-dept").hide();
					$("#view-campus").hide();
					$("#view-col").show("slow");
					$("#org-col").css("background-color","#000")
							  .css("color","#fff");
					$("#org-camp").css("background-color","#fff")
							  .css("color","#7C7C7C");
					$("#org-dept").css("background-color","#fff")
							  .css("color","#7C7C7C");
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
						<?php
							$sql = mysql_query("SELECT * FROM userheader uh
												left join userdetails ud on uh.idno = ud.idno 
												WHERE ud.userstat = 'active' AND ud.idno = ".$_SESSION['id']." 
												AND uh.idno = ".$_SESSION['id']."");
						if ($row['usertype'] == 'super-admin'){
						?>
							<label>Super Admin</label>
						<?php
							}
							elseif ($row['usertype'] == 'campus-admin'){
						?>
							<label>Campus Admin</label>
						<?php
							}
							elseif ($row['usertype'] == 'dept-admin'){
						?>
							<label>Department Admin</label>
						<?php
							}
							elseif ($row['usertype'] == 'col-admin'){
						?>
							<label>College Admin</label>
						<?php
							}
							elseif ($row['usertype'] == 'gs-admin'){
						?>
							<label>Graduate School Admin</label>
						<?php
							}
							elseif ($row['usertype'] == 'org-campus-acad-admin' or $row['usertype'] == 'org-campus-non-acad-admin' ){
						?>
							<label>Org Campus Admin</label>
						<?php
							}
							elseif ($row['usertype'] == 'org-dept-admin'){
						?>
							<label>Org Dept Admin</label>
						<?php
							}
							elseif ($row['usertype'] == 'org-col-prog-admin'){
						?>
							<label>Org Col Admin</label>
						<?php
							}
						?>
					</div>
					<div id = "left-sidebar">
						<?php include "content/parts/left-sidebar-menu.php";?>
						
					</div>
					<div id = "right-sidebar">
						<?php include "content/parts/right-sidebar-menu-submenu.php";?>
						<?php include "content/parts/right-sidebar-content-org.php";?>
					</div>
				</div>
				<div id = "footer"></div>
			</div>
		</div>
	</body>
</html>
<?php mysql_close($con);?>