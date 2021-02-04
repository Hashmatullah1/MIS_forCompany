<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$id = $_GET["branch_id"];

	$staff = mysqli_query($con, "SELECT * FROM staff WHERE branch_id = $id");
	$row_staff = mysqli_fetch_assoc($staff);
	$totalRows_staff = mysqli_num_rows($staff);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<a href="staff_add.php?branch_id=<?php echo $_GET["branch_id"]; ?>" class="btn btn-default pull-right">
			<span class="glyphicon glyphicon-plus"></span> 
			Add New Staff
		</a>
		<h1>Staff List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["add"])) { ?>
			<div class="alert alert-success">
				New staff has been successfully added!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				Selected staff has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				Selected staff has been successfully removed!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not delete selected staff!
			</div>
		<?php } ?>
		
		<?php if($totalRows_staff > 0) { ?>
		
		<table class="table table-striped">
		
			<tr>
				<th>No</th>
				<th>Firstame</th>
				<th>Lastname</th>
				<th>Position</th>
				<th>Shift</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_staff["firstname"]; ?></td>
				<td><?php echo $row_staff["lastname"]; ?></td>
				<td><?php echo $row_staff["position"]; ?></td>
				<td><?php echo $row_staff["shift"]; ?></td>
				<td>
					<a href="staff_edit.php?branch_id=<?php echo $row_staff["branch_id"]; ?>&staff_id=<?php echo $row_staff["staff_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a class="delete" href="staff_delete.php?branch_id=<?php echo $row_staff["branch_id"]; ?>&staff_id=<?php echo $row_staff["staff_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_staff = mysqli_fetch_assoc($staff)); ?>
			
		</table>
		
		<?php } else { ?>
		
			<div class="alert alert-warning text-center">
				<h1 style="font-size:22px;">There is no staff!</h1>
			</div>
		
		<?php } ?>
		
	</div>
</div>

<?php require_once("footer.php"); ?>