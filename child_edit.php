<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$child_id = $_GET["child_id"];
	$child = mysqli_query($con, "SELECT * FROM child WHERE child_id = $child_id");
	$row_child = mysqli_fetch_assoc($child);
	
	$orphanage = mysqli_query($con, "SELECT orphanage_id FROM branch WHERE branch_id = " . $row_child["branch_id"]);
	$row_orphanage = mysqli_fetch_assoc($orphanage);
	
	$branch = mysqli_query($con, "SELECT * FROM branch WHERE orphanage_id = " . $row_orphanage["orphanage_id"]);
	$row_branch = mysqli_fetch_assoc($branch);

	$orphanagelist = mysqli_query($con, "SELECT * FROM orphanage");
	$row_orphanagelist = mysqli_fetch_assoc($orphanagelist);

	if(isset($_POST["child_name"])) { 
		$child_name = $_POST["child_name"];
		$fathername = $_POST["fathername"];
		$grandfathername = $_POST["grandfathername"];
		$department = $_POST["department"];
		$reg_no = $_POST["reg_no"];
		$identity_no = $_POST["identity_no"];
		$gender = $_POST["gender"];
		$education = $_POST["education"];
		$nic = $_POST["nic"];
		$birth_year = $_POST["birth_year"];
		$reg_reason = $_POST["reg_reason"];
		$reg_date = $_POST["reg_date"];
		$letter_no = $_POST["letter_no"];
		$province = $_POST["province"];
		$district = $_POST["district"];
		$village = $_POST["village"];
		$branch_id = $_POST["branch_id"];

		if($_FILES["photo"]["name"] != "") { 
			$path = "images/child/" . time() . $_FILES["photo"]["name"];
			move_uploaded_file($_FILES["photo"]["tmp_name"], $path);		
			unlink($row_child["photo"]);
		}
		else {
			$path = $row_child["photo"];
		}
		
		$result = mysqli_query($con, "UPDATE child SET child_name='$child_name', fathername='$fathername', grandfathername='$grandfathername', department='$department', reg_no='$reg_no', identity_no='$identity_no', gender=$gender, education='$education', photo='$path', nic='$nic', birth_year=$birth_year, reg_reason='$reg_reason', reg_date='$reg_date', letter_no='$letter_no', permanent_province='$province', permanent_district='$district', permanent_village='$village', branch_id=$branch_id WHERE child_id = $child_id");
		
		if($result) {
			header("location:child_list.php?edit=done&branch_id=$branch_id");
		}
		else {
			header("location:child_edit.php?error=notedit&child_id=$child_id");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Edit Child</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not add new child!
			</div>
		<?php } ?>
	
		<form method="post" class="myform" enctype="multipart/form-data">
		
			<div class="input-group">
				<span class="input-group-addon">
					Child Name:
				</span>
				<input value="<?php echo $row_child["child_name"]; ?>" type="text" name="child_name" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Fathername:
				</span>
				<input value="<?php echo $row_child["fathername"]; ?>" type="text" name="fathername" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Grand Father Name:
				</span>
				<input value="<?php echo $row_child["grandfathername"]; ?>" type="text" name="grandfathername" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Department:
				</span>
				<input value="<?php echo $row_child["department"]; ?>" type="text" name="department" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Registration Number:
				</span>
				<input value="<?php echo $row_child["reg_no"]; ?>" type="text" name="reg_no" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Identity Number:
				</span>
				<input value="<?php echo $row_child["identity_no"]; ?>" type="text" name="identity_no" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Education:
				</span>
				<select name="education" class="form-control">
					<option <?php if($row_child["education"] == "Uneducated") echo "selected"; ?>>Uneducated</option>
					<option <?php if($row_child["education"] == "Primary") echo "selected"; ?>>Primary</option>
					<option <?php if($row_child["education"] == "Secondary") echo "selected"; ?>>Secondary</option>
					<option <?php if($row_child["education"] == "High School") echo "selected"; ?>>High School</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gender:
				</span> &nbsp; 
				<label><input <?php if($row_child["gender"] == 0) echo "checked"; ?> type="radio" name="gender" value="0"> Boy</label>  &nbsp; 
				<label><input <?php if($row_child["gender"] == 1) echo "checked"; ?> type="radio" name="gender" value="1"> Girl</label>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Photo:
				</span>
				<input type="file" name="photo" class="form-control">
				<span class="input-group-addon" style="width:30px;padding:1px;">
					<img src="<?php echo $row_child["photo"]; ?>" width="30">
				</span>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					NIC:
				</span>
				<input value="<?php echo $row_child["nic"]; ?>" type="text" name="nic" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Birth Year:
				</span>
				<input value="<?php echo $row_child["birth_year"]; ?>" type="text" name="birth_year" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Registration Reason:
				</span>
				<input value="<?php echo $row_child["reg_reason"]; ?>" type="text" name="reg_reason" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Registration Date:
				</span>
				<input value="<?php echo $row_child["reg_date"]; ?>" value="<?php echo jdate("Y-m-d"); ?>" type="text" name="reg_date" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Letter No:
				</span>
				<input value="<?php echo $row_child["letter_no"]; ?>" type="text" name="letter_no" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Permanent Province:
				</span>
				<select name="province" class="form-control">
					<option <?php if($row_child["permanent_province"] == "Kabul") echo "selected"; ?>>Kabul</option>
					<option <?php if($row_child["permanent_province"] == "Herat") echo "selected"; ?>>Herat</option>
					<option <?php if($row_child["permanent_province"] == "Balkh") echo "selected"; ?>>Balkh</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Permanent District:
				</span>
				<input value="<?php echo $row_child["permanent_district"]; ?>" type="text" name="district" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Permanent Village:
				</span>
				<input value="<?php echo $row_child["permanent_village"]; ?>" type="text" name="village" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Orphanage:
				</span>
				<select name="orphanage_id" id="orphanage_id" class="form-control">
						<option style="color:lightgray;" value="">Please choose an orphanage</option>
					<?php do { ?>
						<option <?php if($row_orphanage["orphanage_id"] == $row_orphanagelist["orphanage_id"]) echo "selected"; ?> value="<?php echo $row_orphanagelist["orphanage_id"]; ?>"><?php echo $row_orphanagelist["orphanage_name"]; ?></option>
					<?php } while($row_orphanagelist = mysqli_fetch_assoc($orphanagelist)); ?>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Branch:
				</span>
				<select name="branch_id" id="branch_id" class="form-control">
					<?php do { ?>
						<option value="<?php echo $row_branch["branch_id"]; ?>"><?php echo $row_branch["branch_name"]; ?></option>
					<?php } while($row_branch = mysqli_fetch_assoc($branch)); ?>
				</select>	
			</div>
			
			<input type="submit" value="Save Changes" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>