<?php 
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
				$("#searchguest-add").hide();
				$("#searchuser-add").hide();
				$("#search-add").hide();
				$("#searchguest").hide();
				$("#searchuser").hide();
				$("#search").hide();
				$("#viewguest").hide();
				$("#viewuser").hide();
				$("#view").hide();
				$("#right-sidebar-menu-submenu").hide();
				$("#admin-post").css("background-color","#000")
								  .css("color","#fff");
								  
				$("#postpending").live('click',function(){
					$("#searchguest-add").hide();
					$("#searchuser-add").hide();
					$("#search-add").hide();
					$("#searchguest").hide();
					$("#searchuser").hide();
					$("#search").hide();
					$("#viewguest").hide();
					$("#viewuser").hide();
					$("#view").hide();
					$("#right-sidebar-menu-submenu").show("slow");
					$("#postpending").css("background-color","#000")
							  .css("color","#fff");
					$("#postguest").css("background-color","#fff")
							  .css("color","#7C7C7C");
					$("#postuser").css("background-color","#fff")
							  .css("color","#7C7C7C");
					$("#postapproved").css("background-color","#fff")
							  .css("color","#7C7C7C");
				});
						  
				$("#postguest").live('click',function(){
					$("#searchguest-add").show("slow");
					$("#searchuser-add").hide();
					$("#search-add").hide();
					$("#searchguest").show("slow");
					$("#searchuser").hide();
					$("#search").hide();
					$("#viewguest").show("slow");
					$("#viewuser").hide();
					$("#view").hide();
					$("#right-sidebar-menu-submenu").show("slow");
					$("#postpending").css("background-color","#000")
							  .css("color","#fff");
					$("#postguest").css("background-color","#000")
							  .css("color","#fff");		  
					$("#postuser").css("background-color","#fff")
							  .css("color","#7C7C7C");
					
				});
				
				$("#postuser").live('click',function(){
					$("#searchguest-add").hide();
					$("#searchuser-add").show("slow");
					$("#search-add").hide();
					$("#searchguest").hide();
					$("#searchuser").show("slow");
					$("#search").hide();
					$("#viewguest").hide();
					$("#viewuser").show("slow");
					$("#view").hide();
					$("#right-sidebar-menu-submenu").show("slow");
					$("#postpending").css("background-color","#000")
							  .css("color","#fff");
					$("#postuser").css("background-color","#000")
							  .css("color","#fff");
					$("#postapproved").css("background-color","#fff")
							  .css("color","#7C7C7C");
					$("#postguest").css("background-color","#fff")
							  .css("color","#7C7C7C");
				});
				
				$("#postapproved").live('click',function(){
					$("#searchguest-add").hide();
					$("#searchuser-add").hide();
					$("#search-add").show("slow");
					$("#searchguest").hide();
					$("#searchuser").hide();
					$("#search").show("slow");
					$("#viewguest").hide();
					$("#viewuser").hide();
					$("#view").show("slow");
					$("#right-sidebar-menu-submenu").hide();
					$("#postapproved").css("background-color","#000")
							  .css("color","#fff");
					$("#postpending").css("background-color","#fff")
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
					<div id = "right-sidebar" style = "margin:0px !important;">
						<?php 
							include "content/parts/right-sidebar-menu-post.php";
							include "content/parts/right-sidebar-menu-submenu-post.php";
							include "content/parts/right-sidebar-content-post.php";
						?>
					</div>
				</div>
				<div id = "footer"></div>
			</div>
		</div>
	</body>
</html>
<?php mysql_close($con);?>