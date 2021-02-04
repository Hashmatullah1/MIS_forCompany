<?php

	require_once("connection.php");

	if(isset($_SESSION["admin_id"])) { 
		header("location:admin.php");
	}

	
	if(isset($_POST["username"])) { 
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$result = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password=PASSWORD('$password') ");
		
		if(mysqli_num_rows($result) == 1) {
			$row_result = mysqli_fetch_assoc($result);
			$_SESSION["admin_id"] = $row_result["admin_id"];
			header("location:admin.php");
		}
		else {
			header("location:login.php?login=failed");
		}
		
	}


?>
<?php require_once("top.php"); ?>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-0" style="margin-top:80px;">

	<div class="panel panel-default">
		
		<div class="panel-heading">
			<h1 class="text-center">Login to MIS</h1>
		</div>
		
		<div class="panel-body">
		
			<?php if(isset($_GET["login"])) { ?>
				<div class="alert alert-danger">
					Incorrect Username or Password!
				</div>
			<?php } ?>
			
			<?php if(isset($_GET["authorize"])) { ?>
				<div class="alert alert-warning">
					Please Login First!
				</div>
			<?php } ?>
			
			<?php if(isset($_GET["logout"])) { ?>
				<div class="alert alert-success">
					You are successfully logged out!
				</div>
			<?php } ?>
		
			<form method="post">
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
						Username:
					</span>
					<input type="text" name="username" class="form-control">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-lock"></span>
						Password:
					</span>
					<input type="password" name="password" class="form-control">
				</div>
								
				<input type="submit" value="Login" class="btn btn-default">
				
				<a href="#" class="pull-right" style="margin-top:10px;">
					Forgot Password?
				</a>
				
				
			</form>
		
		</div>
	
	</div>

	</div>

<?php require_once("footer.php"); ?>