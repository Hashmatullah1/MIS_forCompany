<?php
	require_once("restrict.php");
	require_once("connection.php");
	
	$id = getValue($_GET["child_id"]);
	
	$child = mysqli_query($con, "SELECT photo FROM child WHERE child_id = $id");
	$row_child = mysqli_fetch_assoc($child);
	unlink($row_child["photo"]);
	
	$result = mysqli_query($con, "DELETE FROM child WHERE child_id = $id");
	
	if($result) {
		header("location:child_list.php?delete=done");
	}
	else {
		header("location:child_list.php?error=notdelete");
	}

?>