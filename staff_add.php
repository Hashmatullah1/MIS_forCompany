<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

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
		
		$branch_id = $_GET["branch_id"];

		$result = mysqli_query($con, "INSERT INTO staff VALUES (NULL, $branch_id, '$firstname', '$lastname', '$fathername', '$grandfathername', '$position', $birth_year, '$shift', '$nic', $gender, '$education', '$province', '$district', '$village', '$address', '$remark')");
		
		if($result) {
			header("location:staff_list.php?add=done&branch_id=$branch_id");
		}
		else {
			header("location:staff_add.php?error=notadd&branch_id=$branch_id");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Add New staff</h1>
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
				<input type="text" name="firstname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Lastname:
				</span>
				<input type="text" name="lastname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Fathername:
				</span>
				<input type="text" name="fathername" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Grand Father Name:
				</span>
				<input type="text" name="grandfathername" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Position:
				</span>
				<input type="text" name="position" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Birth Year:
				</span>
				<input type="text" name="birth_year" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Shift:
				</span>
				<select name="shift" class="form-control">
					<option>Full Time</option>
					<option>Part Time AM</option>
					<option>Part Time PM</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					NIC:
				</span>
				<input type="text" name="nic" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gender:
				</span> &nbsp; 
				<label><input checked type="radio" name="gender" value="0"> Male</label>  &nbsp; 
				<label><input type="radio" name="gender" value="1"> Female</label>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Education:
				</span>
				<select name="education" class="form-control">
					<option>Iliterate</option>
					<option>Educated</option>
					<option>Backloria</option>
					<option>Bachlore</option>
					<option>Master</option>
					<option>PHD</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Permanent Province:
				</span>
				<select name="province" class="form-control">
					<option>Kabul</option>
					<option>Herat</option>
					<option>Balkh</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Permanent District:
				</span>
				<input type="text" name="district" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Permanent Village:
				</span>
				<input type="text" name="village" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Current Address:
				</span>
				<input type="text" name="current_address" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Remark:
				</span>
				<input type="text" name="remark" class="form-control">
			</div>
			
			
			<input type="submit" value="Add Staff" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>