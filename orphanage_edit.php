<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$id = getValue($_GET["orphanage_id"]);
	$orphanage = mysqli_query($con, "SELECT * FROM orphanage WHERE orphanage_id = $id");
	$row_orphanage = mysqli_fetch_assoc($orphanage);

	if(isset($_POST["orphanage_name"])) { 
		$name = $_POST["orphanage_name"];
		$type = $_POST["orphanage_type"];
		$province = $_POST["province"];
		
		$result = mysqli_query($con, "UPDATE orphanage SET orphanage_name='$name', orphanage_type=$type, province='$province' WHERE orphanage_id = $id");
		
		if($result) {
			header("location:orphanage_list.php?edit=done");
		}
		else {
			header("location:orphanage_edit.php?error=notedit&orphanage_id=$id");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Edit Orphanage</h1>
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
					Orphanage Name:
				</span>
				<input value="<?php echo $row_orphanage["orphanage_name"]; ?>" type="text" name="orphanage_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Orphanage Type:
				</span>
				<select name="orphanage_type" class="form-control">
					<option <?php if($row_orphanage["orphanage_type"] == 0) echo "selected"; ?> value="0">Governmental</option>
					<option <?php if($row_orphanage["orphanage_type"] == 1) echo "selected"; ?> value="1">None Governmental</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Province:
				</span>
				<select name="province" class="form-control">
					<option <?php if($row_orphanage["province"] == "Kabul") echo "selected"; ?>>Kabul</option>
					<option <?php if($row_orphanage["province"] == "Herat") echo "selected"; ?>>Herat</option>
					<option <?php if($row_orphanage["province"] == "Balkh") echo "selected"; ?>>Balkh</option>
				</select>
			</div>
			
			<input type="submit" value="Save Changes" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>