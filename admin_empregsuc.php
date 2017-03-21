<?php
    include("session.php");
    include("sidepan.php");
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$empid = $_POST['empid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$sname = $_POST['sname'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$maritalstatus = $_POST['maritalstatus'];
		$add1 = $_POST['add1'];
		$add2 = $_POST['add2'];
		$city = $_POST['city'];
		$district = $_POST['district'];
		$cell = $_POST['cell'];
		$sql = "INSERT INTO `emprofile` (`EmpID`, `Fname`, `Lname`, `Sname`, `Gender`, `DOB`, `MaritalStatus`, `Add1`, `Add2`, `City`, `District`, `Cell`, `rem`, `Status`) VALUES ('$empid', '$fname', '$lname', '$sname', '$gender', '$dob', '$maritalstatus', '$add1', '$add2', '$city', '$district', '$cell', '', '1')";
		$result = mysql_query($sql) or die(mysql_error());		
	}
	else {
		header("location:admin.php");	
	}		

?>
	
			
			<div class="content">
				<div class="container-fluid">
				
				<h3 class="blank1">Employee Registered Succesfully </h3> 
					<div class="row">
						<div class="col-md-3">
							<label class="control-label">Employee ID</label>
							<?php echo $empid; ?>
						</div>
						<div class="col-md-3">
							<label class="control-label">First Name</label>
							<?php echo $fname; ?>
						</div>
						<div class="col-md-3">
							<label class="control-label">Last Name</label>
							<?php echo $lname; ?>
						</div>
						<div class="col-md-3">
							<label class="control-label">Surname</label>
							<?php echo $sname; ?>
						</div>
					</div>
					<div class = "row">
						<div class="col-md-3">
							<label class="control-label">Gender</label>
							<?php echo $gender; ?>
						</div>
						<div class="col-md-3">
							<label class="control-label">Date of Birth</label>
							<?php echo $dob; ?>
						</div>
						<div class="col-md-3">
							<label class="control-label">Marital Status</label>
							<?php echo $maritalstatus; ?>
						</div>
						<div class="col-md-3">
							<label class="control-label">Address 1</label>
							<?php echo $add1; ?>
						</div>
					</div>
					<div class = "row">	
						<div class="col-md-3">
							<label class="control-label">Address 2</label>
							<?php echo $add2; ?>
						</div>
						<div class="col-md-3">
							<label class="control-label">City</label>
							<?php echo $city; ?>
						</div>
						<div class="col-md-3">
							<label class="control-label">District</label>
							<?php echo $district; ?>
						</div>
						<div class="col-md-3">
							<label class="control-label">Mobile Number</label>
							<?php echo $cell; ?>
						</div>
					</div>
					<div class = "row">
						<div class="col-md-3">
							<label style="color:green"> Employee Register Succesfully, Add Designation and Working Place of the Employee</label>					
							<form method="POST" action = "admin_addemp.php">
								<input type="hidden" value = "<?php echo $empid; ?>" name = "empid">							
								<input type="hidden" value = "<?php echo $fname; ?>" name = "fname">							
								<input type="hidden" value = "<?php echo $lname; ?>" name = "lname">							
								<input type="hidden" value = "<?php echo $sname; ?>" name = "sname">							
								<button type="submit" class="btn-success">Click here</button>
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
