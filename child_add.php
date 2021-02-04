<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$orphanage = mysqli_query($con, "SELECT * FROM orphanage");
	$row_orphanage = mysqli_fetch_assoc($orphanage);

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

		$path = "images/child/" . time() . $_FILES["photo"]["name"];
		move_uploaded_file($_FILES["photo"]["tmp_name"], $path);		

		$result = mysqli_query($con, "INSERT INTO child VALUES (NULL, '$child_name', '$fathername', '$grandfathername', '$department', '$reg_no', '$identity_no', $gender, '$education', '$path', '$nic', $birth_year, '$reg_reason', '$reg_date', '$letter_no', '$province', '$district', '$village', $branch_id)");
		
		if($result) {
			header("location:child_list.php?add=done&branch_id=$branch_id");
		}
		else {
			header("location:child_add.php?error=notadd");
		}
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Add New Child</h1>
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
				<input type="text" name="child_name" class="form-control">
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
					Department:
				</span>
				<input type="text" name="department" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Registration Number:
				</span>
				<input type="text" name="reg_no" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Identity Number:
				</span>
				<input type="text" name="identity_no" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Education:
				</span>
				<select name="education" class="form-control">
					<option>Uneducated</option>
					<option>Primary</option>
					<option>Secondary</option>
					<option>High School</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gender:
				</span> &nbsp; 
				<label><input checked type="radio" name="gender" value="0"> Boy</label>  &nbsp; 
				<label><input type="radio" name="gender" value="1"> Girl</label>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Photo:
				</span>
				<input required type="file" name="photo" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					NIC:
				</span>
				<input type="text" name="nic" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Birth Year:
				</span>
				<input type="text" name="birth_year" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Registration Reason:
				</span>
				<input type="text" name="reg_reason" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Registration Date:
				</span>
				<input value="<?php echo jdate("Y-m-d"); ?>" type="text" name="reg_date" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Letter No:
				</span>
				<input type="text" name="letter_no" class="form-control">
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
					Orphanage:
				</span>
				<select name="orphanage_id" id="orphanage_id" class="form-control">
						<option style="color:lightgray;" value="">Please choose an orphanage</option>
					<?php do { ?>
						<option value="<?php echo $row_orphanage["orphanage_id"]; ?>"><?php echo $row_orphanage["orphanage_name"]; ?></option>
					<?php } while($row_orphanage = mysqli_fetch_assoc($orphanage)); ?>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Branch:
				</span>
				<select name="branch_id" id="branch_id" class="form-control">
				</select>
			</div>
			
			<input type="submit" value="Add Child" class="btn btn-default">
						
		</form>
		
	</div>
</div>

	</div>

<?php require_once("footer.php"); ?>