<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php
	$condition = "";

	if(isset($_GET["branch_id"])) { 
		$id = $_GET["branch_id"];
		$condition = " WHERE branch_id = $id ";
	}

	$child = mysqli_query($con, "SELECT * FROM child $condition ORDER BY reg_date DESC");
	$row_child = mysqli_fetch_assoc($child);
	$totalRows_child = mysqli_num_rows($child);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<a href="child_add.php" class="btn btn-default pull-right">
			<span class="glyphicon glyphicon-plus"></span> 
			Add New Child
		</a>
		<h1>Child List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["add"])) { ?>
			<div class="alert alert-success">
				New child has been successfully added!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				Selected child has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				Selected child has been successfully removed!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not delete selected child!
			</div>
		<?php } ?>
		
		<?php if($totalRows_child > 0) { ?>
		
		<table class="table table-striped">
		
			<tr>
				<th>No</th>
				<th>Child Name</th>
				<th>Fathername</th>
				<th>Photo</th>
				<th>Age</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_child["child_name"]; ?></td>
				<td><?php echo $row_child["fathername"]; ?></td>
				<td><img src="<?php echo $row_child["photo"]; ?>" class="img-circle" width="30"></td>
				<td><?php echo date("Y") - $row_child["birth_year"]; ?></td>
				<td>
					<a href="child_edit.php?branch_id=<?php echo $row_child["branch_id"]; ?>&child_id=<?php echo $row_child["child_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a class="delete" href="child_delete.php?branch_id=<?php echo $row_child["branch_id"]; ?>&child_id=<?php echo $row_child["child_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_child = mysqli_fetch_assoc($child)); ?>
			
		</table>
		
		<?php } else { ?>
		
			<div class="alert alert-warning text-center">
				<h1 style="font-size:22px;">There is no child!</h1>
			</div>
		
		<?php } ?>
		
	</div>
</div>

<?php require_once("footer.php"); ?>