<?php

	$con = mysqli_connect("localhost", "root", "hakimi");
	mysqli_select_db($con, "oms");

	if(!isset($_SESSION)) { 
		session_start();
	}
	
	function getValue($data) {
		global $con;
		return mysqli_real_escape_string($con, $data);
	}
	
	require_once("jdf.php");
	
?>