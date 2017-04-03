<?php
    include("session.php");
    include("sidepan.php");
		$sql1 = mysql_query("SELECT * FROM soctypes") or die(mysql_error());
	$sql2 = mysql_query("SELECT * FROM mandals") or die(mysql_error());	
	$sql3 = mysql_query("SELECT * FROM funcregistrars") or die(mysql_error());	
	$sql4 = mysql_query("SELECT * FROM subdivision") or die(mysql_error());	
	$sql5 = mysql_query("SELECT * FROM socstatus") or die(mysql_error());	
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$socname = $_POST['socname'];
		$regno = $_POST['regno'];
		$types = $_POST['types'];
		$sql = mysql_query("SELECT * FROM societies WHERE Type = '$types'");
		$count = mysql_num_rows($sql);
		$sql1 = mysql_query("SELECT * FROM `soctypes` WHERE `ID`='$types'");
		$result = mysql_fetch_assoc($sql1);
		$count = $count+1;
		$socid = $result['Types'].$count;
		$address = $_POST['address'];
		$mandal = $_POST['mandal'];
		$chief = $_POST['chief'];
		$cell = $_POST['cell'];
		$dor = $_POST['dor'];
		$registrar = $_POST['registrar'];
		$finstatus = $_POST['finstatus'];
		$workstatus = $_POST['workstatus'];
		$subdiv = $_POST['subdiv'];	
		$sql = "INSERT INTO `societies` (`SocID`, `Name`, `Reg No.`, `Type`, `Address`, `MandalID`,`SubDivID`, `District`, `ChiefPromoter`, `Cell`, `DOR`, `RegistrarID`, `AuditComp`, `DOL`,`status`) 
		         VALUES ('$socid', '$socname', '$regno', '$types', '$address', '$mandal','$subdiv', 'Krishna', '$chief', '$cell', '$dor', '$registrar', '', '',1)";
		$result = mysql_query($sql) or die(mysql_error());		
		$_SESSION['result'] = $socid;
		$sql = "INSERT INTO `socmonitoring` (`ID`, `SocID`,`TypeID`, `NameCustodian`, `Cell`, `StatusID`, `FinStatus`, `PresentDate`, `ClosingDate`, `Rem`, `Status`) 
		         VALUES (NULL, '$socid','$types', '$chief', '$cell', '$workstatus', '$finstatus', '$dor', '', 'Registered', 1)";
		$result = mysql_query($sql) or die(mysql_error());		
		header("location:admin_socsuc.php");		
	}	

?>
	
			
			<div class="content">
				<div class="container-fluid">
                   
					<form role="form" class="form-horizontal" action="" method="post">
						<div class="card">
							<div class="card-header" data-background-color="green">
								<h4 class="title">Add New Society</h4>
								<p class="category"></p>
							</div>
							<div class="card-content table-responsive">	
								<div class="form-group">
									<label class="col-md-1">Society Name</label>
									<div class="col-md-2">					
											<input type="text" class="form-control1" name="socname" placeholder="Society Name" required>					
									</div>
									<label class="col-md-1">Registration No.</label>
									<div class="col-md-2">					
											<input type="text" class="form-control1" name="regno" placeholder="Reg No." required>					
									</div>
									<label class="col-md-1">Type</label>
									<div class="col-md-2">					
											<select name="types" class="form-control1">								
													<?php while ($row1 = mysql_fetch_assoc($sql1)) 
														echo "<option value ='".$row1['ID']."'>".$row1["Types"]."</option>";								
													 ?>
											</select>	
									</div>
									<label class="col-md-1">Address</label>
									<div class="col-md-2">					
											<input type="text" class="form-control1" name="address" placeholder="Address" required>					
									</div>				
								</div>
								<div class="form-group">
									<label class="col-md-1">Mandal</label>
									<div class="col-md-2">					
											<select name="mandal" class="form-control1">								
													<?php while ($row1 = mysql_fetch_assoc($sql2)) 
														echo "<option value ='".$row1['ID']."'>".$row1["Mandal"]."</option>";								
													 ?>
											</select>	
									</div>
									<label class="col-md-1">Name of the Cheif Promoter</label>
									<div class="col-md-2">					
											<input type="text" class="form-control1" name="chief" placeholder="Cheif Promoter">					
									</div>
									<label class="col-md-1">Cell</label>
									<div class="col-md-2">					
											<input type="text" class="form-control1" name="cell" placeholder="Cell No">					
									</div>
									<label class="col-md-1">Date  of Registration</label>
									<div class="col-md-2">					
											<input type="date" class="form-control1" name="dor" >					
									</div>				
								</div>						
								<div class="form-group">
									<label class="col-md-1">Functional Registrar</label>
									<div class="col-md-2">					
											<select name="registrar" class="form-control1">								
													<?php while ($row1 = mysql_fetch_assoc($sql3)) 
														echo "<option value ='".$row1['ID']."'>".$row1["Registrar"]."</option>";								
													 ?>
											</select>
									</div>
									<label class="col-md-1">Aided / Un-Aided</label>
									<div class="col-md-2">					
											<select class="form-control1" name="finstatus">					
												<option>Aided</option>
												<option>Un-Aided</option>							
											</select>
									</div>
									<label class="col-md-1">Working Status</label>
									<div class="col-md-2">					
											<select name="workstatus" class="form-control1">								
													<?php while ($row1 = mysql_fetch_assoc($sql5)) 
														echo "<option value ='".$row1['ID']."'>".$row1["SocStatus"]."</option>";								
													 ?>
											</select>	
									</div>
									<label class="col-md-1">Sub Division</label>
									<div class="col-md-2">					
											<select name="subdiv" class="form-control1">								
													<?php while ($row1 = mysql_fetch_assoc($sql4)) 
														echo "<option value ='".$row1['ID']."'>".$row1["SubDiv"]."</option>";								
													 ?>
											</select>	
									</div>				
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label"></label>
									<div class="col-md-2">
										<div class="input-group in-grp1">
											<span id="mit"></span>
											<button type="submit" id="sub" class="btn btn-success">Submit </button>						
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
