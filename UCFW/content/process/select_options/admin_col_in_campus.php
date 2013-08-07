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
					WHERE campusno = $campus 
					AND colno not in(select colno from userdetails ud 
							         left join userheader uh on uh.idno = ud.idno WHERE colno is not null and uh.usertype like 'col-admin')";
	}
	
	$result_col = mysql_query($sql_col);
	while($row_col = mysql_fetch_array($result_col)):
?>
	
	<option value = "<?php echo $row_col['colno'];?>"><?php echo $row_col['colabbr'];?></option>
<?php endwhile;?>