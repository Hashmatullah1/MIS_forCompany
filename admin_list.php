<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php
	$admin = mysqli_query($con, "SELECT * FROM admins");
	$row_admin = mysqli_fetch_assoc($admin);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<a href="admin_add.php" class="btn btn-default pull-right">
			<span class="glyphicon glyphicon-plus"></span> 
			Add New Admin
		</a>
		<h1>Admin List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["add"])) { ?>
			<div class="alert alert-success">
				New admin has been successfully added!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["edit"])) { ?>
			<div class="alert alert-success">
				Selected admin has been successfully updated!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["delete"])) { ?>
			<div class="alert alert-success">
				Selected admin has been successfully removed!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not delete selected admin!
			</div>
		<?php } ?>
		
		
		<table class="table table-striped">
		
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Photo</th>
				<th>Username</th>
				<th>Admin Type</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php do { ?>
			<tr>
				<td><?php echo $row_admin["admin_id"]; ?></td>
				<td><?php echo $row_admin["admin_name"]; ?></td>
				<td><img src="<?php echo $row_admin["photo"]; ?>" width="50" class="img-rounded"></td>
				<td><?php echo $row_admin["username"]; ?></td>
				<td><?php echo $row_admin["admin_type"] == 1 ? "Super Admin" : "Normal Admin"; ?></td>
				
				<td>
					<a href="admin_edit.php?admin_id=<?php echo $row_admin["admin_id"]; ?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a class="delete" href="admin_delete.php?admin_id=<?php echo $row_admin["admin_id"]; ?>">
						<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			<?php } while($row_admin = mysqli_fetch_assoc($admin)); ?>
			
		</table>
		
	</div>
</div>

<?php require_once("footer.php"); ?>