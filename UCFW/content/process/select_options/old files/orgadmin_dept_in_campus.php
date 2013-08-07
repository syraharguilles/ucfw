<?php
	require_once("../../library/dbcon.php");
	
	$orgcampus = "";
	$sql_orgdept = "SELECT * FROM departments";
?>
	<option>-SELECT-</option>
<?php
	if(isset($_GET['orgcampus'])){
		$orgcampus = $_GET['orgcampus'];
		$sql_orgdept = "SELECT * FROM departments 
					 WHERE campusno = $orgcampus
					 AND deptno not in(select deptno from userdetails  WHERE orgno is not null and deptno is not null)";
	}
	// AND deptno not in(select userdeptno from userdetails  WHERE userorgno is not null and userdeptno is not null)) pun.ana pa!!!!
	$result_orgdept = mysql_query($sql_orgdept);
	while($row_orgdept = mysql_fetch_array($result_orgdept)):
?>
	<option value = "<?php echo $row_orgdept['deptno'];?>"><?php echo $row_orgdept['deptabbr'];?></option>
<?php endwhile;?>