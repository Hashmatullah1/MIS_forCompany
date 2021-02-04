<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$id = getValue($_GET["admin_id"]);
	$admin = mysqli_query($con, "SELECT * FROM admins WHERE admin_id = $id");
	$row_admin = mysqli_fetch_assoc($admin);

	if(isset($_POST["admin_name"])) { 
		$name = $_POST["admin_name"];
		$username = $_POST["username"];
		$type = $_POST["admin_type"];
		
		if($_FILES["photo"]["name"] != "") {
			$path = "images/admin/" . time() . $_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
			unlink($row_admin["photo"]);
		}
		else {
			$path = $row_admin["photo"];
		}
		
		
		$result = mysqli_query($con, "UPDATE admins SET admin_name='$name', admin_type=$type, photo='$path', username='$username'  WHERE admin_id = $id");
		
		if($result) {
			header("location:admin_list.php?edit=done");
		}
		else {
			header("location:admin_edit.php?error=notedit&admin_id=$id");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Edit Admin</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not save changes!
			</div>
		<?php } ?>
	
		<form method="post" enctype="multipart/form-data" class="myform">
			
			<div class="input-group">
				<span class="input-group-addon">
					Admin Name:
				</span>
				<input value="<?php echo $row_admin["admin_name"]; ?>" type="text" name="admin_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Photo:
				</span>
				<input type="file" name="photo" class="form-control">
				<span class="input-group-addon" style="padding:2px;">
					<img src="<?php echo $row_admin["photo"]; ?>" width="28"> 
				</span>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Username:
				</span>
				<input value="<?php echo $row_admin["username"]; ?>" type="text" name="username" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Admin Type:
				</span>
				<select name="admin_type" class="form-control">
					<option <?php if($row_admin["admin_type"] == 0) echo "selected"; ?> value="0">Normal Admin</option>
					<option <?php if($row_admin["admin_type"] == 1) echo "selected"; ?> value="1">Super Admin</option>
				</select>
			</div>
			
			<input type="submit" value="Save Changes" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>