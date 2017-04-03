<?php
    include("session.php");
    include("sidepan.php");
	$error = "* Once you Windup the Society from the List you unable to get it";
	if(isset($_GET['socid'])){
		$_SESSION['temp'] = $_GET['socid'];
	}
	if(isset($_SESSION['temp'])){		
		$socid = $_SESSION['temp'];					
		$status = mysql_query("SELECT * FROM socstatus") or die(mysql_error());				
		$sql = mysql_query("Select
						  societies.Name,
						  societies.`Reg No.`,
						  soctypes.Types,
						  societies.Address,
						  mandals.Mandal,
						  subdivision.SubDiv,
						  socmonitoring.NameCustodian,
						  socmonitoring.Cell,
						  socmonitoring.SocID,
						  socmonitoring.PresentDate,
						  socstatus.SocStatus,
						  socmonitoring.StatusID,
						  socmonitoring.FinStatus
						From
						  societies Inner Join
						  soctypes
							On societies.Type = soctypes.ID Inner Join
						  mandals
							On societies.MandalID = mandals.ID Inner Join
						  subdivision
							On societies.SubDivID = subdivision.ID Inner Join
						  socmonitoring
							On societies.SocID = socmonitoring.SocID Inner Join
						  socstatus
							On socmonitoring.StatusID = socstatus.ID								
						WHERE 
						    socmonitoring.SocID = '$socid' AND socmonitoring.Status = 1");
		$workdata = mysql_fetch_assoc($sql);		
		unset($_SESSION['temp']);
	}
	else{
		header("location:admin.php");
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$dateofwind = date("Y-m-d");
		$error = "Society Windup and Deleted from the List Successfully";
		$sql = mysql_query("UPDATE socmonitoring SET ClosingDate ='$dateofwind', Status=0 WHERE SocID='$socid' AND Status = 1");
		$sql = mysql_query("UPDATE societies SET DOL ='$dateofwind', Status=0 WHERE SocID='$socid' AND Status = 1");
	}

?>
	
			
			<div class="content">
				<div class="container-fluid">				
					<form role="form" class="form-horizontal" action="" method="post">
						<div class="card">
							<div class="card-header" data-background-color="green">
								<h4 class="title">Wind Up the Society</h4>
								<p class="category"></p>
							</div>
							<div class="card-content table-responsive">	
								<div class="form-group">
									<label class="col-md-1">Society Name</label>
									<div class="col-md-2">
										<?php echo $workdata['Name']." No.".$workdata['Reg No.']; ?> 							
									</div>
									<label class="col-md-1">Type of the Society</label>
									<div class="col-md-2">
										<?php echo $workdata['Types']; ?>							
									</div>
									
									<label class="col-md-1">Address</label>
									<div class="col-md-2">
										<?php echo $workdata['Address'].", ".$workdata['Mandal'].", Krishna "; ?>														
									</div>
									
									<label class="col-md-1">Sub Division</label>
									<div class="col-md-2">
										<?php echo $workdata['SubDiv']; ?>							
									</div>												
								</div>
								<div class="form-group">
									<label class="col-md-1">Custodian of Books</label>
									<div class="col-md-2">
										<?php echo $workdata['NameCustodian']; ?>
									</div>
									<label class="col-md-1">Mobile No of Custodian</label>
									<div class = "col-md-2">
										<?php echo $workdata['Cell']; ?>
									</div>
									<label class="col-md-1">Status of the Society</label>
									<div class = "col-md-2">							
										<?php echo $workdata['SocStatus']; ?>															
									</div>
									<label class="col-md-1">Financial Status</label>
									<div class = "col-md-2">							
										<?php echo $workdata['FinStatus']; ?>
									</div>
								</div>
								<div class="form-group">					
									
									<div class="col-md-2">
										<div class="input-group in-grp1">						
											<button type="submit" class="btn btn-danger">Submit </button> 								
										</div>					
									</div>						
									<div class="col-md-10">
										<div class="input-group in-grp1 " style="color:red">						
											<?php echo $error; ?>
										</div>					
									</div>						
									<div class="clearfix"> </div>
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
