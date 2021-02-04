<?php require_once("jdf.php"); ?>
<?php require_once("lang/english.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Orphanage MIS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script src="js/jquery.js"></script>
<script src="js/amazingslider.js"></script>
<link rel="stylesheet" type="text/css" href="js/amazingslider-1.css">
<script src="js/initslider-1.js"></script>

</head>
<body>
<div class="main">
  <div class="header">  
	
	<?php if(!isset($_SESSION["admin_id"])) { ?>
		<a href="login.php" style="float:right;margin-top:8px;margin-right:5px;color:white;font-size:12px;font-weight:bold;text-decoration:none;">
			Login to MIS
		</a>
	<?php } else { ?>
		<a href="logout.php" style="float:right;margin-top:8px;margin-right:5px;color:white;font-size:12px;font-weight:bold;text-decoration:none;">
			Logout
		</a>
	<?php } ?>

	<div style="height:10px;"></div>
	
    <div class="logo col-lg-5 col-md-5 col-sm-5 col-xs-12">
		<img src="images/logo.gif">
	</div>
	
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
	  <div class="xs-hidden" style="height:15px;">
	  </div>
	  
	  <nav class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
            	<ul class="nav navbar-nav" id="nav-top">
				
					<?php if(!isset($_SESSION["admin_id"])) { ?>
						<li><a href="#"><?php echo $menu_home; ?></a></li>
						<li><a href="#"><?php echo $menu_about; ?></a></li>
						<li><a href="#"><?php echo $menu_contact; ?></a></li>
						<li><a href="#"><?php echo $menu_child; ?></a></li>
						<li><a href="#"><?php echo $menu_report; ?></a></li>
                	<?php } else { ?>
					
                	<li class="dropdown"><a href="#" data-toggle="dropdown">Staff <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                            <li><a href="total_staff_list.php">Staff List</a></li>
                        </ul>                    
                    </li>
                	<li class="dropdown"><a href="#" data-toggle="dropdown">Child <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="child_add.php">Add New Child</a></li>
                            <li><a href="child_list.php">Child List</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Parent <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="parent_add.php">Add New Parent</a></li>
                            <li><a href="parent_list.php">Parent List</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Guardianship <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="guardianship_add.php">New Guardianship</a></li>
                            <li><a href="guardianship_list.php">View Guardianships</a></li>
                            <li><a href="guardianship_return.php">Guardianship Return</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Management <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="orphanage_list.php">Orphanage</a></li>
                            <li><a href="#">Website Information</a></li>
                            <li><a href="admin_list.php">User Accounts</a></li>
                        </ul>                    
                    </li>
                	<?php } ?>
                </ul>
			</span>
            </div>  
        </nav>
	  
    </div>
    <div class="clr"></div>
	
		<div class="clearfix"></div>
	
	</div>
	
	<div class="content">
	
	