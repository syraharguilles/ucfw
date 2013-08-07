<?php
	require_once("../../library/dbcon.php");
	require_once("function.php");
	
	if(isset($_POST['txtPost'])){
		
		$txtID = intval($_POST["txtID"]);
		$tableName = "posts";
		$colValue = "poststat = 'inactive'";
		$id = "postno = $txtID";
	
		$result = updateTbl($tableName,$colValue,$id);
	
		if($result == 1){
			//header("location:../../guest");
		}
	}
	
	//delete for campus
	if(isset($_GET['campus'])){
	
		$tables = array('departments','colleges','programs','organizations','activities','posts','userdetails');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['campusno'];
		foreach ($tables as $t)
		{
				$sql = "select * from $t where campusno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM campuses where campusno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
	
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate departments, colleges, programs, organizations, activities, accounts, and posts are deleted. Campus :',$row['campusname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
		}
		else{
			$sql = "UPDATE campuses SET campusstat = 'inactive' WHERE campusno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Campus: ". $row['campusname'];
		}	
	}
	//delete for department
	if(isset($_GET['department'])){
		
		$tables = array('activities','posts','userdetails');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['deptno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where deptno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;

		}
		
		$sql = "SELECT * FROM departments where deptno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities, accounts, and posts are deleted. Department :',$row['deptname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
		}
		else{
			$sql = "UPDATE departments SET deptstat = 'inactive' WHERE deptno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Department: ". $row['deptname'];
		}
	}
	//delete for college
	if(isset($_GET['college'])){
		
		$tables = array('programs','organizations','activities','posts','userdetails');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['colno'];
		foreach ($tables as $t)
		{
				$sql = "select * from $t where colno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM colleges where colno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
	
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate programs, organizations, activities, accounts, and posts are deleted. College :',$row['colname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
		}
		else{
			$sql = "UPDATE colleges SET colstat = 'inactive' WHERE colno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n College: ". $row['colname'];
		}
	}
	//delete for program
	if(isset($_GET['program'])){
		
		$tables = array('organizations','activities','posts','userdetails');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['progno'];
		foreach ($tables as $t)
		{		
				$sql = "select * from $t where progno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM programs where progno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate organizations, activities, accounts, and posts are deleted. Program :',$row['progname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
		}
		else{
			$sql = "UPDATE programs SET progstat = 'inactive' WHERE progno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Program: ". $row['progname'];
		}
	}
	//delete for org campus
	if(isset($_GET['orgcampus'])){
		
		$tables = array('activities','posts','userdetails');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['orgno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where orgno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM organizations where orgno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities, accounts, and posts are deleted. Organization :',$row['orgname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE organizations SET orgstat = 'inactive' WHERE orgno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Organization: ". $row['orgname'];
		}
	}
	//delete for org col
	if(isset($_GET['orgcol'])){
		
		$tables = array('activities','posts','userdetails');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['orgno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where orgno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM organizations where orgno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities, accounts, and posts are deleted. Organization :',$row['orgname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE organizations SET orgstat = 'inactive' WHERE orgno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Organization: ". $row['orgname'];
		}
	}
	//super activity 
	if(isset($_GET['activity'])){
		
		$tables = array('posts');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['actno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where actno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
						$arr[] = $row[1];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;

		}
		
		$sql = "SELECT * FROM activities where actno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities are deleted. Activity :',$row['actname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
		}
		else{
			$sql = "UPDATE activities SET actstat = 'inactive' WHERE actno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Activity: ". $row['actname'];
		}
	}
	// campus activity 
	if(isset($_GET['campusact'])){
		
		$tables = array('posts');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['actno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where actno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
						$arr[] = $row[1];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;

		}
		
		$sql = "SELECT * FROM activities where actno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities are deleted. Department :',$row['actname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
		}
		else{
			$sql = "UPDATE activities SET actstat = 'inactive' WHERE actno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Activities: ". $row['actname'];
		}
	}
	
	// col activity 
	if(isset($_GET['colact'])){
		
		$tables = array('posts');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['actno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where actno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
						$arr[] = $row[1];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;

		}
		
		$sql = "SELECT * FROM activities where actno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities are deleted. Department :',$row['actname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
		}
		else{
			$sql = "UPDATE activities SET actstat = 'inactive' WHERE actno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Activities: ". $row['actname'];
		}
	}
	
	// dept activity 
	if(isset($_GET['deptact'])){
		
		$tables = array('posts');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['actno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where actno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
						$arr[] = $row[1];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;

		}
		
		$sql = "SELECT * FROM activities where actno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities are deleted. Department :',$row['actname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
		}
		else{
			$sql = "UPDATE activities SET actstat = 'inactive' WHERE actno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Activities: ". $row['actname'];
		}
	}
	//delete campus admin
	if(isset($_GET['admincampus'])){
		$tables = array('departments','colleges','programs','organizations','activities','posts','userdetails');
		$count = 0;
		$id = $_GET['idno'];
		$prefix = array('departments'=>'dept','colleges'=>'col','programs'=>'prog','organizations'=>'org','activities'=>'act','userdetails'=>'user');
		$counts = array();
		$names = array();
		$tbl =array();
		
		
		foreach ($tables as $t)
		{
			$f = $prefix[$t];
			if ($t!='posts' )
				$f = $f.'addedby';
			else 
				$f = 'idno';
			$sql = "select * from $t where $f = $id";
			
				$result = mysql_query($sql);
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
					
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM userdetails ud, userheader uh where uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities, accounts, and posts are deleted. Username :',$row['userfname'],' ',$row['userlname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE userdetails SET userstat = 'inactive' WHERE {$f}addedby = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Username :". $row['userfname']." ".$row['userlname'] ;
		}
	}
	//delete dept admin 
	if(isset($_GET['admindept'])){
		$tables = array('activities','posts','userdetails');
		$count = 0;
		$id = $_GET['idno'];
		$prefix = array('activities'=>'act','userdetails'=>'user');
		$counts = array();
		$names = array();
		$tbl =array();
		
		
		foreach ($tables as $t)
		{
			$f = $prefix[$t];
			if ($t!='posts' )
				$f = $f.'addedby';
			else 
				$f = 'idno';
			$sql = "select * from $t where $f = $id";
			
				$result = mysql_query($sql);
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
					
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM userdetails ud, userheader uh where uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities, accounts, and posts are deleted. Username :',$row['userfname'],' ',$row['userlname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE userdetails SET userstat = 'inactive' WHERE {$f}addedby = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Username :". $row['userfname']." ".$row['userlname'] ;
		}
	}
	//delete col admin 
	if(isset($_GET['admincol'])){
		$tables = array('programs','organizations','activities','posts','userdetails');
		$count = 0;
		$id = $_GET['idno'];
		$prefix = array('programs'=>'prog','organizations'=>'org','activities'=>'act','userdetails'=>'user');
		$counts = array();
		$names = array();
		$tbl =array();
		
		
		foreach ($tables as $t)
		{
			$f = $prefix[$t];
			if ($t!='posts' )
				$f = $f.'addedby';
			else 
				$f = 'idno';
			$sql = "select * from $t where $f = $id";
			
				$result = mysql_query($sql);
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
					
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM userdetails ud, userheader uh where uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities, accounts, and posts are deleted. Username :',$row['userfname'],' ',$row['userlname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE userdetails SET userstat = 'inactive' WHERE {$f}addedby = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Username :". $row['userfname']." ".$row['userlname'] ;
		}
	}
	
	//delete org campus admin
	if(isset($_GET['orgcampusadmin'])){
		$tables = array('activities','userheader','userdetails');
		$act = array('activities'=>'actaddedby');
		$userheader = array('userheader'=>'usertype');
		$userdetails = array('userdetails'=>'orgno');
		$count = 0;
		$id = $_GET['idno'];
		$counts = array();
		$names = array();
		$tbl =array();
		
		
		foreach ($tables as $t)
		{	
			$a = $act[$t];
			$uh = $userheader[$t];
			$ud = $userdetails[$t];
			$usertype='';
			$sql = "select * from $t";
			
			if ($t=='activitities')
				$usertype = 'user%';
			$sql = $sql." where $a='$id'";
			if ($t=='userheader')
				$usertype = 'user%';
			$sql = $sql." and $uh=$usertype";
			if($t=='userdetails')	
				$sql = $sql." and orgno is not null";
			echo $sql;
				$result = mysql_query($sql);
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					if($t == 'userdetails')
						$arr[] = $row[0];
					else
						$arr[] = $row[2];
					
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM userdetails ud, userheader uh where uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate activities, accounts, and posts are deleted. Username :',$row['userfname'],' ',$row['userlname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE userdetails SET userstat = 'inactive' WHERE {$f}addedby = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Username :". $row['userfname']." ".$row['userlname'] ;
		}
	}
	
	//delete org col admin
	if(isset($_POST['orgcoladmin'])){
		$id = $_POST['txtidno'];
		
		$tableName = "userdetails";
		$colValue = "userstat = 'inactive'";
		
		$id = "idno = $id";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	//delete user campus alum
	if(isset($_POST['campusalum'])){
		$id = $_POST['txtidno'];
		
		$tableName = "userdetails";
		$colValue = "userstat = 'inactive'";
		
		$id = "idno = $id";
		
		$result = updateTbl($tableName,$colValue,$id);
	}
	
	//delete user dept emp
	if(isset($_GET['deptemp'])){
		$tables = array('posts');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['idno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where idno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					$arr[] = $row[0];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM userdetails ud, userheader uh where uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate posts are deleted. Username :',$row['userfname'],' ',$row['userlname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE userdetails SET userstat = 'inactive' WHERE  idno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Username: ". $row['userfname']." ".$row['userlname'] ;
		}
	}
	
	//delete user col fac
	if(isset($_GET['colfac'])){
		$tables = array('posts');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['idno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where idno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					$arr[] = $row[0];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM userdetails ud, userheader uh where uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate posts are deleted. Username :',$row['userfname'],' ',$row['userlname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE userdetails SET userstat = 'inactive' WHERE  idno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Username: ". $row['userfname']." ".$row['userlname'] ;
		}
	}
	
	//delete user col staff
	if(isset($_GET['colstaff'])){
		$tables = array('posts');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['idno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where idno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					$arr[] = $row[0];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM userdetails ud, userheader uh where uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate posts are deleted. Username :',$row['userfname'],' ',$row['userlname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE userdetails SET userstat = 'inactive' WHERE  idno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Username: ". $row['userfname']." ".$row['userlname'] ;
		}
	}
	
	//delete user col stud
	if(isset($_GET['colstud'])){
		$tables = array('posts');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['idno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where idno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					$arr[] = $row[0];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM userdetails ud, userheader uh where uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate posts are deleted. Username :',$row['userfname'],' ',$row['userlname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE userdetails SET userstat = 'inactive' WHERE  idno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Username: ". $row['userfname']." ".$row['userlname'] ;
		}
	}
	
	//delete user col alum
	if(isset($_GET['colalum'])){
		$tables = array('posts');
		$count = 0;
		$counts = array();
		$names = array();
		$tbl =array();
		$id = $_GET['idno'];
		
		foreach ($tables as $t)
		{
			$sql = "select * from $t where idno = $id";
				$result = mysql_query($sql);
				
				$count += mysql_num_rows($result);
				$arr = array();
				
				while($row = mysql_fetch_array($result)):
					$arr[] = $row[0];
				endwhile;
				
				$counts [$t] = mysql_num_rows($result);
				$names[$t] = $arr;
		}
		
		$sql = "SELECT * FROM userdetails ud, userheader uh where uh.idno = $id and ud.idno = $id";
		$result = mysql_query($sql);			
		$row = mysql_fetch_array($result);
		
		if ($count > 0)
		{
			echo '<div>Cannot be deleted unless the associate posts are deleted. Username :',$row['userfname'],' ',$row['userlname'],'</div>';
			echo '<table border="1">';
			echo '<tr><td>',implode('</td><td>',$tables),'</td></tr>';
			echo '<tr>';
			foreach ($tables as $t)
			{
				echo '<td valign = "top">',implode('<br>',$names[$t]),'</td>';
			}
			echo '</tr>';
			echo '<tr><td>',implode('</td><td>',$counts),'</td></tr>';
			echo '</table>';
			
		}
		else{
			$sql = "UPDATE userdetails SET userstat = 'inactive' WHERE  idno = $id";
			$result = mysql_query($sql);
			
			echo "Successfully Deleted \n\n Username: ". $row['userfname']." ".$row['userlname'] ;
		}
	}
?>