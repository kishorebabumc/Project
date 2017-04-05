<?php
	if(isset($_SESSION['auditor'])){
		$empid = $_SESSION['auditor'];	
		$sql = mysql_query("SELECT * FROM `emprofile` WHERE EmpID = '$empid'");
		$result = mysql_fetch_assoc($sql);
	}	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Audit Programme Management Portal</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>	
    
    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">
		<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="" class="simple-text">
					Auditors Panel 
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li class="active">
	                    <a href="auditor_charts.php">
	                        <i class="fa fa-server"></i>
	                        <p>Charts</p>
	                    </a>
	                </li>	                
	                <li>
	                    <a href="logout.php">
	                        <i class="fa fa-sign-out"></i>
	                        <p>Logout</p>
	                    </a>
	                </li>
					
	            </ul>
	    	</div>
	    </div>
		<div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">							
							<li >
								<a><?php echo $result['Fname']." ".$result['Lname']." ".$result['Sname']; ?></a>				
							</li>
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
		 						</a>
                                <ul class="dropdown-menu">
									<li><a href="auditor_changepass.php">Change Password</a></li>
									<li><a href="logout.php">Logout</a></li>									
								</ul>
							</li>
						</ul>
						
					</div>
				</div>
			</nav>