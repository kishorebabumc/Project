<?php
    include("session.php");
    include("sidepan.php");
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

?>
	
			
			<div class="content">
				<div class="container-fluid">                  	
					<form role="form" class="form-horizontal" action="admin_soceditsuc.php" method="post">
						<div class="card">
							<div class="card-header" data-background-color="green">
								<h4 class="title">Add New Society</h4>
								<p class="category"></p>
							</div>
							<div class="card-content table-responsive">	
								<div class="form-group">
									<label class="col-md-1">Society Name</label>
									<div class="col-md-2">
										<?php echo $workdata['Name']." No.".$workdata['Reg No.']; ?> 
										<input type="hidden" name="socid" value ="<?php echo $workdata['SocID']; ?>">
										<input type="hidden" name="socname" value ="<?php echo $workdata['Name']; ?>">
										<input type="hidden" name="regno" value ="<?php echo $workdata['Reg No.']; ?>">
										<input type="hidden" name="closingdate" value ="<?php echo $workdata['PresentDate']; ?>">
									</div>
									<label class="col-md-1">Type of the Society</label>
									<div class="col-md-2">
										<?php echo $workdata['Types']; ?>							
									</div>
									
									<label class="col-md-1">Address</label>
									<div class="col-md-2">
										<?php echo $workdata['Address'].", ".$workdata['Mandal'].", Krishna "; ?>
										<input type="hidden" name="address" value ="<?php echo $workdata['Address']; ?>">
										<input type="hidden" name="mandal" value ="<?php echo $workdata['Mandal']; ?>">								
									</div>
									
									<label class="col-md-1">Sub Division</label>
									<div class="col-md-2">
										<?php echo $workdata['SubDiv']; ?>							
									</div>												
								</div>
								<div class="form-group">
									<label class="col-md-1">Custodian of Books</label>
									<div class="col-md-2">
										<input type ="text" value = "<?php echo $workdata['NameCustodian']; ?>" name ="custodian" >	
									</div>
									<label class="col-md-1">Mobile No of Custodian</label>
									<div class = "col-md-2">
										<input type ="text" value = "<?php echo $workdata['Cell']; ?>" name ="cell" >	
									</div>
									<label class="col-md-1">Status of the Society</label>
									<div class = "col-md-2">
										<select name="status" class="form-control1">		
											<option value = "<?php echo $workdata['StatusID']; ?> "> <?php echo $workdata['SocStatus']; ?></option>
											<?php while ($row1 = mysql_fetch_assoc($status)) 
												echo "<option value ='".$row1['ID']."'>".$row1["SocStatus"]."</option>";								
											 ?>
										</select>
									</div>
									<label class="col-md-1">Financial Status</label>
									<div class = "col-md-2">
										<select name="finstatus" class="form-control1">		
											<option value = "<?php echo $workdata['FinStatus']; ?> "> <?php echo $workdata['FinStatus']; ?></option>
											<option value = "Aided"> Aided </option>
											<option value = "Un-Aided"> Un-Aided</option>
											
										</select>
									</div>
								</div>
								<div class="form-group">
									
									<label class="col-md-2 control-label"></label>
									<div class="col-md-8">
										<div class="input-group in-grp1">						
											<button type="submit" class="btn btn-success">Submit </button>						
										</div>					
									</div>
									<div class="clearfix"> </div>
								</div>						
							</div>
						<div>	
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
