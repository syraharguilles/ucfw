<?php
	require_once("../../../library/dbcon.php");
	
	$campus = "";
	$sql_col = "SELECT * FROM colleges";
?>
	<option>-SELECT-</option>
<?php	
	if(isset($_GET['campus'])){
		$campus = $_GET['campus'];
		$sql_col = "SELECT * FROM colleges 
					WHERE campusno = $campus";
	}
	//AND colno not in(select usercolno from userdetails  WHERE usercolno is not null) pun.ana pa!!!!
	$result_col = mysql_query($sql_col);
	while($row_col = mysql_fetch_array($result_col)):
?>
	
	<option value = "<?php echo $row_col['colno'];?>"><?php echo $row_col['colabbr'];?></option>
<?php endwhile;?>