<?php

	require_once("connection.php");

	if(!isset($_SESSION["admin_id"])) {
		header("location:login.php?authorize=failed");
	}
?>