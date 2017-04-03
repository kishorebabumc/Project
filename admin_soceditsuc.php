<?php
    include("session.php");
    include("sidepan.php");
		if($_SERVER['REQUEST_METHOD'] == "POST") {
		$socid = $_POST['socid'];
		$socname = $_POST['socname'];
		$regno = $_POST['regno'];
		$address = $_POST['address'];
		$mandal = $_POST['mandal'];		
		$custodian = $_POST['custodian'];
		$cell = $_POST['cell'];
		$status = $_POST['status'];
		$sql1 = mysql_query("SELECT * FROM socstatus WHERE ID='$status'");
		$result1 = mysql_fetch_assoc($sql1);
		$finstatus = $_POST['finstatus'];
		$closingdate = $_POST['closingdate'];
		$presentdate = date("Y-m-d");
		
		$test = mysql_query("SELECT * FROM socmonitoring WHERE SocID='$socid' AND Status = 1");
		$count = mysql_num_rows($test);
		$result = mysql_fetch_assoc($test);
		
		
		if($count == 1){
			$sql = mysql_query("UPDATE socmonitoring SET ClosingDate ='$closingdate', Status=0 WHERE SocID='$socid' AND Status = 1");
			$sql = mysql_query("INSERT INTO `socmonitoring` (`ID`, `SocID`, `NameCustodian`, `Cell`, `StatusID`, `FinStatus`,`PresentDate`, `ClosingDate`, `Rem`, `Status`) VALUES (NULL, '$socid', '$custodian', '$cell', '$status', '$finstatus', '$presentdate', '','Modified', 1)") or die(mysql_error());						
		}		
	}
	else {
		header("location:admin.php");
	}	

?>
	
			
			<div class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-header" data-background-color="green">
							<h4 class="title">Add New Society</h4>
							<p class="category"></p>
						</div>
						<div class="card-content table-responsive">
							<div class="row">		
								<div class="form-group">	
									<label class="col-md-1">Society Name</label>
									<div class="col-md-2"><?php echo $socname." ".$regno; ?> </div>						
									<label class="col-md-1">Address</label>
									<div class="col-md-2"><?php echo $address.", ".$mandal; ?> </div>						
									<label class="col-md-1">Name of the Custodian</label>
									<div class="col-md-2"><?php echo $custodian; ?> </div>
									<label class="col-md-1">Cell No.</label>
									<div class="col-md-2"><?php echo $cell; ?> </div>						
								</div>	
							</div>
							<div class="row">
								<div class="form-group">
									<label class="col-md-1">Status</label>
									<div class="col-md-2"><?php echo $result1['SocStatus']; ?> </div>
									<label class="col-md-1">Financial Status</label>
									<div class="col-md-2"><?php echo $finstatus; ?> </div>						
									<div class="col-md-4"><a href="admin.php"><button class ="btn btn-primary"> Home </button> </a> </div>
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
