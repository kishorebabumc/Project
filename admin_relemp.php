<?php
    include("session.php");
    include("sidepan.php");
	if(isset($_GET['empid'])){
		$_SESSION['temp'] = $_GET['empid'];
	}
	if(isset($_SESSION['temp'])){		
		$empid = $_SESSION['temp'];					
		$desig = mysql_query("SELECT * FROM designations") or die(mysql_error());
		$subdiv = mysql_query("SELECT * FROM subdivision") or die(mysql_error());
		$sql = mysql_query("SELECT * FROM emprofile WHERE EmpID = '$empid'");	
		$empdata = mysql_fetch_assoc($sql);
		$sql = mysql_query("SELECT * FROM empmonitoring WHERE EmpID='$empid' AND Status = 1");
		$workdata = mysql_fetch_assoc($sql);
		$degid = $workdata['DegID'];
		$subid = $workdata['SubDivID'];
		$sql = mysql_query("SELECT * FROM designations WHERE ID='$degid'");
		$currentdesig = mysql_fetch_assoc($sql);	
		$sql = mysql_query("SELECT * FROM subdivision WHERE ID='$subid'");
		$currentsubdiv = mysql_fetch_assoc($sql);
		unset($_SESSION['temp']);
	}
	else{
		header("location:admin.php");
	}

?>
	
			
			<div class="content">
				<div class="container-fluid">
                    <div class="card">
						<div class="card-header" data-background-color="orange">
							<h4 class="title">Relieve Employee</h4>
							<p class="category"></p>
						</div>							
						<div class="card-content table-responsive">
							<form role="form" class="form-horizontal" action="admin_relempsuc.php" method="post">			
								<div class="form-group">
									<label class="col-md-1">Employee ID</label>
									<div class="col-md-2"><?php echo $empid; ?> </div>
									<label class="col-md-1">Employee Name</label>
									<div class="col-md-2">
										<?php echo $empdata['Fname']." ".$empdata['Lname']." ".$empdata['Sname']; ?>
										<input type = "hidden" value = "<?php echo $empid; ?>" name ="empid">
										<input type = "hidden" value = "<?php echo $empdata['Fname']; ?>" name ="fname">
										<input type = "hidden" value = "<?php echo $empdata['Lname']; ?>" name ="lname">
										<input type = "hidden" value = "<?php echo $empdata['Sname']; ?>" name ="sname">
									</div>
									
									<label class="col-md-1">Designation</label>
									<div class="col-md-2">
										<?php echo $currentdesig['Designation']; ?>							
									</div>
									<label class="col-md-1">Sub Division</label>
									<div class="col-md-2">
										<?php echo $currentsubdiv['SubDiv']; ?>							
									</div>						
								</div>
								<div class="form-group">
									<label class="col-md-1">Date of Relieve</label>
									<div class = "col-md-2">
										<input type ="date" value = "" name ="dol" required>
									</div>
									<label class="col-md-1">Reasons for Relieve Employee</label>
									<div class = "col-md-2">
										<input type ="text" name ="rem" placeholder="Remarks" required>
									</div>
									<label class="col-md-2 control-label"></label>
									<div class = "col-md-2">
										<button type="submit" class="btn btn-success">Submit </button>						
									</div>
								</div>							
							</form>
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
