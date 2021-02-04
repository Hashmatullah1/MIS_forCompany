<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$id = $_POST["orphanage_id"];

	$branch = mysqli_query($con, "SELECT * FROM branch WHERE orphanage_id = $id");
	$row_branch = mysqli_fetch_assoc($branch);
	
	$output = "";
	
	do { 
		$output .= "<option value='" . $row_branch["branch_id"] . "'>" . $row_branch["branch_name"] . "</option>";
	}while($row_branch = mysqli_fetch_assoc($branch)); 
	
	echo $output;
	
?>