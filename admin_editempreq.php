<?php
    include("session.php");
    include("sidepan.php");
	$error = " ";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['empid'];		
		$sql = "SELECT * FROM emprofile WHERE EmpID='$username' ";
		$result = mysql_query($sql) or die (mysql_error());
		$count = mysql_num_rows($result) or die (mysql_error());
		
		if($count == 1){			
			$row = mysql_fetch_assoc($result);
			$_SESSION['temp']= $row['EmpID'];
			header("location:admin_editemp.php");			
		}
		else {
			$error = "Invalid Employee ID";
		}
	}

?>
	
			
			<div class="content">
				<div class="container-fluid">
                    <form role="form" class="form-horizontal" method="post">			
						<div class="card">
							<div class="card-header" data-background-color="orange">
								<h4 class="title">Employee Registration</h4>
								<p class="category"></p>
							</div>							
							<div class="card-content table-responsive">
								<div>
									<div class="col-md-2">
										Employee ID
									</div>
									<div class="col-md-3">					
											<input type="text" class="form-control" id ="empid" name="empid" placeholder="Employee ID" required>					
									</div>	
									<div class = "col-md-2">
										<button type="submit" class="btn btn-success">Submit </button>
									</div>
									<div class = "col-md-2">
										<?php echo $error; ?>
									</div>									
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">
					
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
