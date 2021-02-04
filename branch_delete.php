<?php
	require_once("restrict.php");
	require_once("connection.php");
	
	$branch_id = getValue($_GET["branch_id"]);
	$orphanage_id = getValue($_GET["orphanage_id"]);
	
	$result = mysqli_query($con, "DELETE FROM branch WHERE branch_id = $branch_id");
	
	if($result) {
		header("location:orphanage_branch.php?delete=done&orphanage_id=$orphanage_id");
	}
	else {
		header("location:orphanage_branch.php?error=notdelete&orphanage_id=$orphanage_id");
	}

?>