<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$id = getValue($_GET["branch_id"]);
	$branch = mysqli_query($con, "SELECT * FROM branch WHERE branch_id = $id");
	$row_branch = mysqli_fetch_assoc($branch);

	if(isset($_POST["branch_name"])) { 
		$name = $_POST["branch_name"];
		$address = $_POST["address"];
		
		$orphanage_id = $_GET["orphanage_id"];
		
		$result = mysqli_query($con, "UPDATE branch SET branch_name='$name', address='$address' WHERE branch_id = $id");
		
		if($result) {
			header("location:orphanage_branch.php?edit=done&orphanage_id=$orphanage_id");
		}
		else {
			header("location:branch_edit.php?error=notedit&branch_id=$id&orphanage_id=$orphanage_id");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Edit Branch</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not save changes!
			</div>
		<?php } ?>
	
		<form method="post" class="myform">
			<div class="input-group">
				<span class="input-group-addon">
					Branch Name:
				</span>
				<input value="<?php echo $row_branch["branch_name"]; ?>" type="text" name="branch_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Address:
				</span>
				<input type="text" value="<?php echo $row_branch["address"]; ?>" name="address" class="form-control">
			</div>
			
			<input type="submit" value="Save Changes" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>