<?php
	function insertTbl($tableName,$field,$data){
		/*
			require_once("function.php");
		
			$tableName = "user";
			$field = "id,username,password";
			$data = "NULL,'$txtUser','$txtPwd'";
			
			insertTbl($tableName,$field,$data);
		*/
		
		$sql = "INSERT INTO $tableName ($field) VALUES ($data)";
		$result = mysql_query($sql);	
		return $result;
	}
	function updateTbl($tableName,$colValue,$id){
		/*
			$tableName = "user";
			$colValue = "username = '$txtUser', password = '$txtPwd'";
			$id = "'id = $txtID'";
		*/
		$sql = "UPDATE $tableName SET $colValue WHERE $id";
		$result = mysql_query($sql);
		return $result;
	}
	function deleteTbl($tableName,$id){
		/*
			$tableName = "user";
			$id = "id = $id";
		*/
		$sql = "DELETE FROM $tableName WHERE $id";
		$result = mysql_query($sql);
		return $result;
	}
?>