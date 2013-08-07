<?php
	require_once("../../library/dbcon.php");

		$orgdept = "";
		$sql_org = "SELECT * FROM organizations";
?>
	<option>-SELECT-</option>
<?php		
		if(isset($_GET['orgdept'])){
			$orgdept = $_GET['orgdept'];
			$sql_org = "SELECT * FROM organizations 
						WHERE deptno = $orgdept
						AND orgno not in(select orgno from userdetails  WHERE orgno is not null)
						AND colno is null
						AND progno is null";
			
		
		}
		$result_org = mysql_query($sql_org);
		while($row_org = mysql_fetch_array($result_org)):
?> 	
	<option value = "<?php echo $row_org['orgno'];?>"><?php echo $row_org['orgabbr'];?></option> 	
<?php endwhile;?>
