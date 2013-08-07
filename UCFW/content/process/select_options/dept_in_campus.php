<?php
	require_once("../../../library/dbcon.php");
	
	$campus = "";
	$sql_dept = "SELECT * FROM departments";
?>
	<option>-SELECT-</option>
<?php
	if(isset($_GET['campus'])){
		$campus = $_GET['campus'];
		$sql_dept = "SELECT * FROM departments 
					 WHERE campusno = $campus";
	}
	
	$result_dept = mysql_query($sql_dept);
	while($row_dept = mysql_fetch_array($result_dept)):
?>
	<option value = "<?php echo $row_dept['deptno'];?>"><?php echo $row_dept['deptabbr'];?></option>
<?php endwhile;?>