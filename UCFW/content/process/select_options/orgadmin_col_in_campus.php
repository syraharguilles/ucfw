<?php
	require_once("../../../library/dbcon.php");
	
	$orgcampus = "";
	$sql_orgcol = "SELECT * FROM colleges";
?>
	<option>-SELECT-</option>
<?php	
	if(isset($_GET['orgcampus'])){
		$orgcampus = $_GET['orgcampus'];
		$sql_orgcol = "SELECT * FROM colleges 
					WHERE campusno = $orgcampus";
	}
	//AND colno not in(select usercolno from userdetails  WHERE userorgno is not null and usercolno is not null) pun.ana pa!!!!
	$result_orgcol = mysql_query($sql_orgcol);
	while($row_orgcol = mysql_fetch_array($result_orgcol)):
?>
	
	<option value = "<?php echo $row_orgcol['colno'];?>"><?php echo $row_orgcol['colabbr'];?></option>
<?php endwhile;?>