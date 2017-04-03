<?php
    include("session.php");
    include("sidepan.php");
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$empid = $_POST['empid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$sname = $_POST['sname'];		
		$dol = $_POST['dol'];
		$rem = $_POST['rem'];
		$sql = mysql_query("UPDATE empmonitoring SET DOL ='$dol', Rem ='$rem', Status=0 WHERE EmpID='$empid' AND Status = 1");		
	}
	else {
		header("location:admin.php");
	}	

?>
	
			
			<div class="content">
				<div class="container-fluid">
                    <div class="card">
						<div class="card-header" data-background-color="orange">
							<h4 class="title">Employee Relieved Succesfully</h4>
							<p class="category"></p>
						</div>							
						<div class="card-content table-responsive">	
							<div class="row">		
								<div class="form-group">	
									<label class="col-md-1">Employee ID</label>
									<div class="col-md-2"><?php echo $empid; ?> </div>						
									<label class="col-md-1">Employee Name</label>
									<div class="col-md-2"><?php echo $fname." ".$lname." ".$sname; ?> </div>						
									<label class="col-md-1">Date of Relieve</label>
									<div class="col-md-2"><?php echo $dol; ?> </div>						
									<div class="col-md-4"><a href="admin.php"><button class ="btn btn-primary"> Home </button></a></div>						
								</div>	
							</div>
						</div>
					</div>	
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
