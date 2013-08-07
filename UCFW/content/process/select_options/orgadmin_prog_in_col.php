<?php
	require_once("../../../library/dbcon.php");
	
	$orgcollege = "";
	$sql_orgprog = "SELECT * FROM programs";
?>
	<option>-SELECT-</option>
<?php	
	if(isset($_GET['orgcollege'])){
		$orgcollege = $_GET['orgcollege'];
		$sql_orgprog = "SELECT * FROM programs 
						WHERE colno = $orgcollege
						AND progno not in(select progno from userdetails
										  WHERE orgno is not null and colno is not null and progno is not null)";
	}
	//AND colno not in(select usercolno from userdetails  WHERE usercolno is not null) pun.ana pa!!!!
	$result_orgprog = mysql_query($sql_orgprog);
	while($row_orgprog = mysql_fetch_array($result_orgprog)):
?>
	
	<option value = "<?php echo $row_orgprog['progno'];?>"><?php echo $row_orgprog['progacronyms'];?></option>
<?php endwhile;?>