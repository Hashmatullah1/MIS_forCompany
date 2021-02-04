<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	if(isset($_POST["branch_name"])) { 
		$name = $_POST["branch_name"];
		$address = $_POST["address"];

		$orphanage_id = $_GET["orphanage_id"];
		
		$result = mysqli_query($con, "INSERT INTO branch VALUES (NULL, '$name', $orphanage_id, '$address')");
		
		if($result) {
			header("location:orphanage_branch.php?add=done&orphanage_id=$orphanage_id");
		}
		else {
			header("location:branch_add.php?error=notadd&orphanage_id=$orphanage_id");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Add New Branch</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not add new branch!
			</div>
		<?php } ?>
	
		<form method="post" class="myform">
			<div class="input-group">
				<span class="input-group-addon">
					Branch Name:
				</span>
				<input type="text" name="branch_name" class="form-control">
			</div>
		
			
			<div class="input-group">
				<span class="input-group-addon">
					Address:
				</span>
				<input type="text" name="address" class="form-control">
			</div>
			
			<input type="submit" value="Add Branch" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>