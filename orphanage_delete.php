<?php
	require_once("restrict.php");
	require_once("connection.php");
	
	$id = getValue($_GET["orphanage_id"]);
	
	$result = mysqli_query($con, "DELETE FROM orphanage WHERE orphanage_id = $id");
	
	if($result) {
		header("location:orphanage_list.php?delete=done");
	}
	else {
		header("location:orphanage_list.php?error=notdelete");
	}

?>