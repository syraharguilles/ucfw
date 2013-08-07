<tr>
	<td><label>CAMPUS NAME</label></td>
	<td>
		<?php
			$sql_check = "SELECT * FROM userheader WHERE idno =".$_SESSION['id'];
			$result_check = mysql_query($sql_check);
			$row_check = mysql_fetch_array($result_check);
			//For Super Admin
			if($row_check['usertype'] == "super-admin"){
		?>
				<select id = "a_campusabbr" name ="campus_select" onchange = "$('#a_colabbr').load('content/process/orgcol_col_in_campus.php?campus='+this.value);">
					<option>-SELECT-</option>
					<?php
						$sql_campus = "SELECT * FROM campuses";
						$result_campus = mysql_query($sql_campus);
						$campus = 0;
						while($row_campus = mysql_fetch_array($result_campus)):
						if ($campus = 0)
							$campus= $row_campus['campusno'];
					?>
						<option value = "<?php echo $row_campus['campusno'];?>"><?php echo $row_campus['campusabbr'];?></option>
					<?php endwhile;?>
				</select>
			<?php	
		}
		//For Campus Admin
		elseif($row_check['usertype'] == "campus-admin")
		{
	
			$sql = "SELECT * FROM campuses c, userdetails u WHERE c.campusno = u.campusno AND u.idno =".$_SESSION['id'];
			$result = mysql_query($sql);
			$campus = 0;
			$row = mysql_fetch_array($result);
	?>
			<script type = "text/javascript">
				$(document).ready(function(){
					var tmp = $("#a_campusabbr").val();
					$('#a_colabbr').load('content/process/orgcol_col_in_campus.php?campus='+tmp);
				});
			</script>
			<input type = "hidden" readonly = "" value = "<?php echo $row['campusno']; ?>" id = "a_campusabbr"/>
			<input type = "text" readonly = "" value = "<?php echo $row['campusabbr']; ?>" class="text ui-widget-content ui-corner-all"/>
		<?php  
		}
		//For College Admin
		else{
			$sql = "SELECT * FROM campuses c, userdetails u WHERE c.campusno = u.campusno AND u.idno =".$_SESSION['id'];
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);															
	?>							
			<input type = "hidden" readonly = "" value = "<?php echo $row['campusno']; ?>" id = "a_campusabbr"/>
			<input type = "text" readonly = "" value = "<?php echo $row['campusabbr']; ?>" class="text ui-widget-content ui-corner-all"/>
	<?php
		}							
	?>
	</td>
</tr>
<tr>
	<td><label>COL NAME</label></td>
	<td>
		<?php
		$sql_check = "SELECT * FROM userheader WHERE idno =".$_SESSION['id'];
		$result_check = mysql_query($sql_check);
		$row_check = mysql_fetch_array($result_check);
		//For Super Admin and Campus Admin
		if($row_check['usertype'] == "super-admin" or $row_check['usertype'] == "campus-admin"){
		?>
			<select id = "a_colabbr" name ="select" onchange = "$('#a_progacro').load('content/process/orgcol_prog_in_col.php?college='+this.value);">
				<option>-SELECT-</option>
				<?php
					$sql_col = "SELECT * FROM colleges WHERE campusno = $campus";
					$college = 0;
					$result_col = mysql_query($sql_col);
					while($row_col = mysql_fetch_array($result_col)):
					if ($college = 0)
						$college = $row_col['colno'];
				?>
					<option value = "<?php echo $row_col['colno'];?>"><?php echo $row_col['colabbr'];?></option>
				<?php endwhile;?>
			</select>
		<?php	
	}
	
	//For College Admin
	elseif($row_check['usertype'] == "col-admin"){
?>	
		<?php
			$sql = "SELECT * FROM colleges c, userdetails u WHERE c.colno = u.colno AND u.idno =".$_SESSION['id'];
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			
		?>			
		<script type = "text/javascript">
			$(document).ready(function(){
				var tmp = $("#a_colabbr").val();
				$('#a_progacro').load('content/process/orgcol_prog_in_col.php?college='+tmp);
			});
		</script>
		<input type = "hidden" readonly = "" value = "<?php echo $row['colno']; ?>" id = "a_colabbr"/>
		<input type = "text" readonly = "" value = "<?php echo $row['colabbr']; ?>" class="text ui-widget-content ui-corner-all"/>
<?php
	}
?>
	</td>
</tr>
<tr>
	<td><label>PROG NAME</label></td>
	<td>
		<select id = "a_progacro" name ="select">
			<option>-SELECT-</option>
			<?php
				$sql_prog = "SELECT * FROM programs where colno = $college";
				$result_prog = mysql_query($sql_prog);
				while($row_prog = mysql_fetch_array($result_prog)):
			?>
				<option value = "<?php echo $row_prog['progno'];?>"><?php echo $row_prog['progacronyms'];?></option>
			<?php endwhile;?>
		</select>
	</td>
</tr>