<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	if(isset($_POST["admin_name"])) { 
	
		$admin_name = $_POST["admin_name"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$admin_type = $_POST["admin_type"];
		
		$path = "";
		
		if($_FILES["photo"]["name"] != "") {
			$path = "images/admin/" . time() . $_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
		}
		
		$result = mysqli_query($con, "INSERT INTO admin VALUES (NULL, '$admin_name', '$path', '$username', PASSWORD('$password'), $admin_type)");
		
		if($result) {
			header("location:admin_list.php?add=done");
		}
		else {
			header("location:admin_add.php?error=notadd");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Add New Admin</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not add new admin!
			</div>
		<?php } ?>
	
		<form method="post" enctype="multipart/form-data" class="myform">
		
			<div class="input-group">
				<span class="input-group-addon">
					Admin Name:
				</span>
				<input type="text" name="admin_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Photo
				</span>
				<input type="file" name="photo" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Username:
				</span>
				<input type="text" name="username" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Password:
				</span>
				<input type="password" name="password" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Admin Type:
				</span>
				<select name="admin_type" class="form-control">
					<option value="1">Super Admin</option>
					<option value="0">Normal Admin</option>
				</select>
			</div>
			
			<input type="submit" value="Add Admin" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>