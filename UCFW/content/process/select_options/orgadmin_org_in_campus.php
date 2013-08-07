<?php
	require_once("../../../library/dbcon.php");

		$campus = "";
		$sql_org = "SELECT * FROM organizations";
?>
	<option>-SELECT-</option>
<?php		
		if(isset($_GET['campus'])){
			$campus = $_GET['campus'];
			$sql_org = "SELECT * FROM organizations 
						WHERE campusno = $campus
						AND orgno not in(select orgno from userdetails ud 
							             left join userheader uh on uh.idno = ud.idno WHERE orgno is not null and uh.usertype like 'org-campus-admin')
						AND deptno is null 
						AND colno is null";
			
		
		}
		$result_org = mysql_query($sql_org);
		while($row_org = mysql_fetch_array($result_org)):
?> 	
	<option value = "<?php echo $row_org['orgno'];?>"><?php echo $row_org['orgabbr'];?></option> 	
<?php endwhile;?>
