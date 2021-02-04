<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	if(isset($_POST["orphanage_name"])) { 
		$name = $_POST["orphanage_name"];
		$type = $_POST["orphanage_type"];
		$province = $_POST["province"];
		
		$result = mysqli_query($con, "INSERT INTO orphanage VALUES (NULL, '$name', $type, '$province')");
		
		if($result) {
			header("location:orphanage_list.php?add=done");
		}
		else {
			header("location:orphanage_add.php?error=notadd");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Add New Orphanage</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not add new orphanage!
			</div>
		<?php } ?>
	
		<form method="post" class="myform">
			<div class="input-group">
				<span class="input-group-addon">
					Orphanage Name:
				</span>
				<input type="text" name="orphanage_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Orphanage Type:
				</span>
				<select name="orphanage_type" class="form-control">
					<option value="0">Governmental</option>
					<option value="1">None Governmental</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Province:
				</span>
				<select name="province" class="form-control">
					<option>Kabul</option>
					<option>Herat</option>
					<option>Balkh</option>
					<option>Nangarhar</option>
				</select>
			</div>
			
			<input type="submit" value="Add Orphanage" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>