<?php
	require_once("../../../library/dbcon.php");
	
	$college = "";
	$sql_prog = "SELECT * FROM programs";
?>
	<option>-SELECT-</option>
<?php	
	if(isset($_GET['college'])){
		$college = $_GET['college'];
		$sql_prog = "SELECT * FROM programs 
					WHERE colno = $college";
	}
	//AND colno not in(select usercolno from userdetails  WHERE usercolno is not null) pun.ana pa!!!!
	$result_prog = mysql_query($sql_prog);
	while($row_prog = mysql_fetch_array($result_prog)):
?>
	
	<option value = "<?php echo $row_prog['progno'];?>"><?php echo $row_prog['progacronyms'];?></option>
<?php endwhile;?>