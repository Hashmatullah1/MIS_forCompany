<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php
	$orphanage = mysqli_query($con, "SELECT * FROM orphanage");
	$row_orphanage = mysqli_fetch_assoc($orphanage);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<a href="orphanage_add.php" class="btn btn-default pull-right">
			<span class="glyphicon glyphicon-plus"></span> 
			Add New Orphanage
		</a>
		<h1>Orphanage List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["add"])) { ?>
			<div class="alert alert-success">
				New orphanage has been successfully added!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				Selected orphanage has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				Selected orphanage has been successfully removed!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not delete selected orphanage!
			</div>
		<?php } ?>
		
		
		<table class="table table-striped">
		
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Type</th>
				<th>Province</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td>
					<a href="orphanage_branch.php?orphanage_id=<?php echo $row_orphanage["orphanage_id"]; ?>">
						<?php echo $row_orphanage["orphanage_name"]; ?>
					</a>
				</td>
				<td><?php echo $row_orphanage["orphanage_type"] == 0 ? "Governmental" : "None Governmental"; ?></td>
				<td><?php echo $row_orphanage["province"]; ?></td>
				<td>
					<a href="orphanage_edit.php?orphanage_id=<?php echo $row_orphanage["orphanage_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a class="delete" href="orphanage_delete.php?orphanage_id=<?php echo $row_orphanage["orphanage_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_orphanage = mysqli_fetch_assoc($orphanage)); ?>
			
		</table>
		
	</div>
</div>

<?php require_once("footer.php"); ?>