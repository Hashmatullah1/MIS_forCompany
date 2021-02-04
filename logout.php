<?php

	require_once("connection.php");

	unset($_SESSION["admin_id"]);
	
	header("location:login.php?logout=done");


?>