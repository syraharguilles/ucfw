<?php
	require_once('Connection/include.php');
	include('Connection/userlog.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="libraries/src-image/favicon.ico" type="image/x-icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doodle Gallery | University of Cebu Online Notebook</title>
<link rel="stylesheet" href="libraries/layouts.css" type="text/css"/>
<script type="text/javascript" src="libraries/src-js/menu.js"></script>
<script type="text/javascript" src="libraries/src-js/jquery.js"></script>
</head>
<body background="theme/<?php echo $themename; ?>" width="500px" height="500px" class="oneColFixCtrHdr">
	<div id="container">
		<div id="header">
		  <!-- end #header -->
			  <table border="0">
			  <tr>
				</br></br>
				<td width="0px"></td>
				<td><img src="libraries/layout/sitelogo.png"></td>
			  </tr>
			  </table>
			  </br></br>
			  <table border="0">
				<tr>
					<td width="10px"></td>
					<td valign="bottom" align="left"><div id="profile_side_bar" onmouseover="mopen('profile_ext')" onmouseout="mclosetime()"><label style="cursor: pointer;">Welcome&nbsp;&nbsp;&nbsp;&nbsp;<a href="viewprofile.php" title="Profile" style="color:#ddd;"><?php echo ucwords($userfname);  ?></a> !</label></div></td>
					<td valign="bottom" align="center"><a href="home.php" title="Home" style="text-decoration: none;"><div id="home_side_bar"><label style="cursor: pointer;">Home</label></div></a></td>
					<td valign="bottom" align="center"><div id="nbook_side_bar" onmouseover="mopen('nbook_ext')" onmouseout="mclosetime()"><label style="cursor: pointer;">Notebook</label></div></td>
					<td valign="bottom" align="center"><div id="notes_side_bar" onmouseover="mopen('notes_ext')" onmouseout="mclosetime()"><label style="cursor: pointer;">Notes</label></div></td>
					<td valign="bottom" align="center"><div id="doodle_side_bar" onmouseover="mopen('ddl_ext')" onmouseout="mclosetime()"><label style="cursor: pointer;">Doodle</label></div></td>
					<td valign="bottom" align="center"><div id="useraccnt_side_bar" onmouseover="mopen('useraccnt_ext')" onmouseout="mclosetime()"><label style="cursor: pointer;">User Account</label></div></td>
					<td valign="bottom" align="center"><div id="themes_side_bar" onmouseover="mopen('themes_ext')" onmouseout="mclosetime()"><label style="cursor: pointer;">Themes</label></div></td>
					<td valign="bottom" align="center"><div id="extension_side_bar" onmouseover="mopen('extensions_ext')" onmouseout="mclosetime()"><label style="cursor: pointer;">Site Info</label></div></td>
				</tr>
			</table>
			 <?php include ('menuextensions.php'); ?>
		</div>
     <div id="mainContent">
     	<table border="0">
		<tr>
			<td><h3 style="font-family: Arial;color:#465E7E;">My Doodles</h3></td>
		</tr>
		</table>
		<hr width="1000px" align="left">
		<div>
			<table>
				<?php
					$sql = mysql_query("SELECT * FROM doodle WHERE idno='$log' ORDER BY doodleid DESC");
					if(mysql_num_rows($sql)<=0){
						echo "<label style='font-size:13px;color:#4e698c;'>You don't have doodle yet. Click <a href='doodle.php'>here</a> if you want to create.</label>";
					}else{	
						while($row = mysql_fetch_array($sql))
						{
							echo "<tr>";
							$doodleaddress=$row['doodleaddress'];
							$ddlid=$row['doodleid'];							
							$handle = fopen($doodleaddress, 'r');
							while(!feof($handle)){								
								echo "<td><img id='".$ddlid."' src='".fgets($handle)."' width='110px' border='1px' style='border:1px solid #465E7E;'/></td>";							
								echo "<td style='color:#465E7E;font-size:12px;'><label style='color:#465E7E;font-size:12px;'>Doodle Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>".$row['doodlename']."</td>";
							}
							fclose($handle);
							$delete="<a href=\"deletedoodle.php?doodleid=".$ddlid."\" style='color:#4e698c; font-size:12px' onclick=\"return confirm('Delete doodle?')\">Delete</a>";
							echo "<td align='right' width='150px'><a href='' style='font-size:12px;'>".$delete."</a></td>";
							echo "</tr>";
							echo "	<script type='text/javascript'>
										$(document).ready(function(){
											$('#'".$ddlid.").onmouseover(function(){
												$('#'".$ddlid.").css('width','550px');
											});
										});
									</script>";
						}
					}
				?>				
			</table>
		</div>
     </div>
</body>
</html>