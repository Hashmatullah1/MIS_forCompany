<?php require_once("restrict.php"); ?>
<?php require_once("connection.php"); ?>
<?php

	$staff = mysqli_query($con, "SELECT * FROM staff INNER JOIN branch ON branch.branch_id = staff.branch_id INNER JOIN orphanage ON orphanage.orphanage_id = branch.orphanage_id ORDER BY firstname ASC, lastname ASC");
	$row_staff = mysqli_fetch_assoc($staff);
	$totalRows_staff = mysqli_num_rows($staff);
	
?>
<?php require_once("top.php"); ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h1>All Staff List</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if($totalRows_staff > 0) { ?>
		
		<table class="table table-striped">
		
			<tr>
				<th>No</th>
				<th>Firstame</th>
				<th>Lastname</th>
				<th>Position</th>
				<th>Shift</th>
				<th>Orphanage</th>
				<th>Branch</th>
			</tr>
			
			<?php $x=1; do { ?>
			<tr>
				<td><?php echo $x++; ?></td>
				<td><?php echo $row_staff["firstname"]; ?></td>
				<td><?php echo $row_staff["lastname"]; ?></td>
				<td><?php echo $row_staff["position"]; ?></td>
				<td><?php echo $row_staff["shift"]; ?></td>
				<td><?php echo $row_staff["orphanage_name"]; ?></td>
				<td><?php echo $row_staff["branch_name"]; ?></td>
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