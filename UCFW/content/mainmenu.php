	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/base/jquery.ui.all.css">
	<script type="text/javascript" src="../js/jquery.1.7.2.js"></script>
	<script src="../js/jquery-1.8.0.js"></script>
	<script src="../js/jquery-ui-1.8.21.custom.min.js"></script>
	<link rel="stylesheet" href="../css/demos.css">
	<script type="text/javascript" src=""></script>
	
	<script>
			$(function() {
				
				$( ".menu, .sub, .sub test" ).accordion({
				});
			});
	</script>
	<style>.menu:{list-style:inline;}</style>
<?php
	/*$con = mysql_connect("localhost","root","") or die("Could not connect");
	$db = mysql_select_db("uc_community");
	require_once("function.php");*/
	require_once("../library/dbcon.php"); 
	
	$sql="Select * from campus";
	$result=mysql_query($sql,$con);
?>


<div class = 'menu'>
	<?php
	while($row=mysql_fetch_array($result)):
	?>	
		<!--campuses-->
		<h3><a href="#"><?php echo $row[3];?></a></h3>
		<div class="menu">
		<!--for departments-->
		<h3><a href="#">DEPARTMENTS</a></h3>
			<div class = "sub">
				<?php
				$sql="Select * from departments where campusno=".$row[0];
				$dept=mysql_query($sql,$con);
				while($r=mysql_fetch_array($dept)):
				?>
					<h3><a href="#"><?php echo $r[1];?></a></h3>
					<!--for dept activities-->
					<div class = "sub test">
						<?php
						$sql="Select * from activities where deptno=".$r[0];
						$actdept=mysql_query($sql,$con);
						while($rad=mysql_fetch_array($actdept)):
						?>
							<h3><a href="#"><?php echo $rad[1]?></a></h3>
				   <?php endwhile; ?>
					</div><!--end of dept activities-->
				<?php endwhile;?>
			</div><!--end of departments-->
		</div>
		<!--end of campuses-->
<?php endwhile; ?>
</div>
