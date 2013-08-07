<?php
	require_once("../../library/dbcon.php");
	session_start();
		$campus = "";
		$sql_gsprog = "SELECT * FROM gsprograms";
?>
	<option>-SELECT-</option>
<?php		
		if(isset($_GET['campus'])){
			$campus = $_GET['campus'];
			$sql_gsprog = "SELECT * FROM gsprograms 
						WHERE campusno = $campus";
			
		}
		$result_gsprog = mysql_query($sql_gsprog);
		while($row_gsprog = mysql_fetch_array($result_gsprog)):
?> 	
	<option value = "<?php echo $row_gsprog['gsprogno'];?>"><?php echo $row_gsprog['gsprogabbr'];?></option> 	
<?php endwhile;?>