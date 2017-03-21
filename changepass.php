<?php
    include("session.php");
    include("sidepan.php");
    include("toppan.php");
	$error = "";
	$error1 = ""; 
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = $_SESSION['user'];
		$pass = $_POST['cpass'];
		$npass = $_POST['npass'];
		$rpass = $_POST['rpass'];
		$sql = "SELECT * FROM users WHERE userid='$user' AND password = '$pass'";
		$result = mysql_query($sql);
		$count = mysql_num_rows ($result);
		if($count == 1){
			if($npass == $rpass){
				$sql = "UPDATE users SET password='$npass' WHERE userid='$user'";
				$result = mysql_query($sql) or die(mysql_error());
				$error1 = "Passwords Succesfully updated";
			}
			else{
				$error = "Passwords not matched";
			}
		}
		else {
			$error = "Invalid Current Password";
		}		
	}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Change Password</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    
	    <div class="main-panel">
			
			<div class="content">
				<div class="container-fluid">
                    <h3 class="blank1">Change Password</h3>
					<form action="" method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <label class="control-label">Current Password </label>
                                    <input type="password" class="form-control" name="cpass" required >
                                </div>
                            </div>                            
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <label class="control-label">New Password</label>
                                    <input type="password" class="form-control" name="npass" required>
                                </div>
                            </div>                            
                        </div>
                        <div class="row">   
                            <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <label class="control-label">Reapete Password</label>
                                    <input type="password" class="form-control" name="rpass" required>
                                </div>
                            </div>                            
                        </div>
                        <div class="row">   
                            <div class="col-md-5">
                                <div class="form-group label-floating">
                                    <button type="submit" class="btn btn-primary pull-right">Change Password</button>   
                                    <label style = "color:red"><?php echo $error;  ?></label>
						            <label style = "color:green"><?php echo $error1;  ?></label>
                                </div>
                            </div>                            
                        </div>
                    </form>  

				</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#">
									Home
								</a>
							</li>
							<li>
								<a href="#">
									Company
								</a>
							</li>
							<li>
								<a href="#">
									Portfolio
								</a>
							</li>
							<li>
								<a href="#">
								   Blog
								</a>
							</li>
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> Designed & Developed by V Kishore Babu 
					</p>
				</div>
			</footer>
		</div>
	</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>

</html>
