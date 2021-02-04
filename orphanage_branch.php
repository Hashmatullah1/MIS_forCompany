<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$id = $_GET["orphanage_id"];

	$branch = mysqli_query($con, "SELECT * FROM branch WHERE orphanage_id = $id");
	$row_branch = mysqli_fetch_assoc($branch);
	$totalRows_branch = mysqli_num_rows($branch);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<a href="branch_add.php?orphanage_id=<?php echo $_GET["orphanage_id"]; ?>" class="btn btn-default pull-right">
			<span class="glyphicon glyphicon-plus"></span> 
			Add New Branch
		</a>
		<h1>Orphanage Branch</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["add"])) { ?>
			<div class="alert alert-success">
				New branch has been successfully added!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				Selected branch has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				Selected branch has been successfully removed!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not delete selected branch!
			</div>
		<?php } ?>
		
		<?php if($totalRows_branch > 0) { ?>
		
		<table class="table table-striped">
		
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Address</th>
				<th>Staff</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_branch["branch_name"]; ?></td>
				<td><?php echo $row_branch["address"]; ?></td>
				<td>
					<a href="staff_list.php?branch_id=<?php echo $row_branch["branch_id"]; ?>">
						<span class="glyphicon glyphicon-user"></span>
					</a>
				</td>
				<td>
					<a href="branch_edit.php?orphanage_id=<?php echo $row_branch["orphanage_id"]; ?>&branch_id=<?php echo $row_branch["branch_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a class="delete" href="branch_delete.php?orphanage_id=<?php echo $row_branch["orphanage_id"]; ?>&branch_id=<?php echo $row_branch["branch_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_branch = mysqli_fetch_assoc($branch)); ?>
			
		</table>
		
		<?php } else { ?>
		
			<div class="alert alert-warning text-center">
				<h1 style="font-size:22px;">There is no branch!</h1>
			</div>
		
		<?php } ?>
		
	</div>
</div>

<?php require_once("footer.php"); ?>