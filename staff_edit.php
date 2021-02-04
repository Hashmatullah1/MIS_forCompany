<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$staff_id = $_GET["staff_id"];
	$branch_id = $_GET["branch_id"];
	
	$staff = mysqli_query($con, "SELECT * FROM staff WHERE staff_id = $staff_id");
	$row_staff = mysqli_fetch_assoc($staff);
	
	if(isset($_POST["firstname"])) { 
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$fathername = $_POST["fathername"];
		$grandfathername = $_POST["grandfathername"];
		$position = $_POST["position"];
		$birth_year = $_POST["birth_year"];
		$shift = $_POST["shift"];
		$nic = $_POST["nic"];
		$gender = $_POST["gender"];
		$education = $_POST["education"];
		$province = $_POST["province"];
		$district = $_POST["district"];
		$village = $_POST["village"];
		$address = $_POST["current_address"];
		$remark = $_POST["remark"];

		$result = mysqli_query($con, "UPDATE staff SET firstname='$firstname', lastname='$lastname', fathername='$fathername', grandfathername='$grandfathername', position='$position', birth_year=$birth_year, shift='$shift', nic='$nic', gender=$gender, education='$education', permanent_province='$province', permanent_district='$district', permanent_village='$village', current_address='$address', remark='$remark' WHERE staff_id = $staff_id");
		
		if($result) {
			header("location:staff_list.php?edit=done&branch_id=$branch_id");
		}
		else {
			header("location:staff_edit.php?error=notadd&branch_id=$branch_id&staff_id=$staff_id");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Edit staff</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not add new staff!
			</div>
		<?php } ?>
	
		<form method="post" class="myform">
		
			<div class="input-group">
				<span class="input-group-addon">
					Firstname:
				</span>
				<input value="<?php echo $row_staff["firstname"]; ?>" type="text" name="firstname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Lastname:
				</span>
				<input value="<?php echo $row_staff["lastname"]; ?>" type="text" name="lastname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Fathername:
				</span>
				<input value="<?php echo $row_staff["fathername"]; ?>" type="text" name="fathername" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Grand Father Name:
				</span>
				<input value="<?php echo $row_staff["grandfathername"]; ?>" type="text" name="grandfathername" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Position:
				</span>
				<input value="<?php echo $row_staff["position"]; ?>" type="text" name="position" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Birth Year:
				</span>
				<input value="<?php echo $row_staff["birth_year"]; ?>" type="text" name="birth_year" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Shift:
				</span>
				<select name="shift" class="form-control">
					<option <?php if($row_staff["shift"] == "Full Time") echo "selected"; ?>>Full Time</option>
					<option <?php if($row_staff["shift"] == "Part Time AM") echo "selected"; ?>>Part Time AM</option>
					<option <?php if($row_staff["shift"] == "Part Time PM") echo "selected"; ?>>Part Time PM</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					NIC:
				</span>
				<input value="<?php echo $row_staff["nic"]; ?>" type="text" name="nic" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gender:
				</span> &nbsp; 
				<label><input <?php if($row_staff["gender"] == 0) echo "checked"; ?> type="radio" name="gender" value="0"> Male</label>  &nbsp; 
				<label><input <?php if($row_staff["gender"] == 1) echo "checked"; ?> type="radio" name="gender" value="1"> Female</label>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Education:
				</span>
				<select name="education" class="form-control">
					<option <?php if($row_staff["education"] == "Iliterate") echo "selected"; ?>>Iliterate</option>
					<option <?php if($row_staff["education"] == "Educated") echo "selected"; ?>>Educated</option>
					<option <?php if($row_staff["education"] == "Backloria") echo "selected"; ?>>Backloria</option>
					<option <?php if($row_staff["education"] == "Bachlore") echo "selected"; ?>>Bachlore</option>
					<option <?php if($row_staff["education"] == "Master") echo "selected"; ?>>Master</option>
					<option <?php if($row_staff["education"] == "PHD") echo "selected"; ?>>PHD</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Permanent Province:
				</span>
				<select name="province" class="form-control">
					<option <?php if($row_staff["permanent_province"] == "Kabul") echo "selected"; ?>>Kabul</option>
					<option <?php if($row_staff["permanent_province"] == "Herat") echo "selected"; ?>>Herat</option>
					<option <?php if($row_staff["permanent_province"] == "Balkh") echo "selected"; ?>>Balkh</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Permanent District:
				</span>
				<input value="<?php echo $row_staff["permanent_district"]; ?>" type="text" name="district" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Permanent Village:
				</span>
				<input value="<?php echo $row_staff["permanent_village"]; ?>" type="text" name="village" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Current Address:
				</span>
				<input value="<?php echo $row_staff["current_address"]; ?>" type="text" name="current_address" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Remark:
				</span>
				<input value="<?php echo $row_staff["remark"]; ?>" type="text" name="remark" class="form-control">
			</div>
			
			
			<input type="submit" value="Save Changes" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>