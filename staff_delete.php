<?php
	require_once("restrict.php");
	require_once("connection.php");
	
	$staff_id = getValue($_GET["staff_id"]);
	$branch_id = getValue($_GET["branch_id"]);
	
	$result = mysqli_query($con, "DELETE FROM staff WHERE staff_id = $staff_id");
	
	if($result) {
		header("location:staff_list.php?delete=done&branch_id=$branch_id");
	}
	else {
		header("location:staff_list.php?error=notdelete&branch_id=$branch_id");
	}

?>