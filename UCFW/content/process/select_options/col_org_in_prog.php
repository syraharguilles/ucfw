<?php
	require_once("../../../library/dbcon.php");
	session_start();
		$campus = "";
		$sql_org= "SELECT * FROM organizations";
?>
	<option>-SELECT-</option>
<?php		
		if(isset($_GET['campus'])){
			$campus = $_GET['campus'];
			$sql_org = "SELECT * FROM organizations 
						WHERE campusno = $campus
						AND orgtype = 'acad'
						AND orgno not in (select orgno from programs where orgno is not null)";
			 
		}
		$result_org = mysql_query($sql_org);
		while($row_org = mysql_fetch_array($result_org)):
?> 	
	<option value = "<?php echo $row_org['orgno'];?>"><?php echo $row_org['orgabbr'];?></option> 	
<?php endwhile;?>
