<?php
	require_once("restrict.php");
	require_once("connection.php");
	
	$id = getValue($_GET["admin_id"]);
	
	$admin = mysqli_query($con, "SELECT photo FROM admins WHERE admin_id = $id");
	$row_admin = mysqli_fetch_assoc($admin);
	unlink($row_admin["photo"]);
	
	$result = mysqli_query($con, "DELETE FROM admins WHERE admin_id = $id");
	
	if($result) {
		header("location:admin_list.php?delete=done");
	}
	else {
		header("location:admin_list.php?error=notdelete");
	}

?>