<?php
	require_once("../../../library/dbcon.php");
	
	$college = "";
	$sql_orgprog = "SELECT * FROM programs";
?>
	<option>-SELECT-</option>
<?php	
	if(isset($_GET['college'])){
		$college = $_GET['college'];
		$sql_orgprog = "SELECT * FROM programs 
						WHERE colno = $college";
	}
	//AND colno not in(select usercolno from userdetails  WHERE usercolno is not null) pun.ana pa!!!!
	$result_orgprog = mysql_query($sql_orgprog);
	while($row_orgprog = mysql_fetch_array($result_orgprog)):
?>
	
	<option value = "<?php echo $row_orgprog['progno'];?>"><?php echo $row_orgprog['progacronyms'];?></option>
<?php endwhile;?>