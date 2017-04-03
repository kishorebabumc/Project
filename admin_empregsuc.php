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
		$subdivid = $_POST['SubDivID'];
		$degid = $_POST['DegID'];
		$doj = $_POST['doj'];
		$sql = "INSERT INTO `emprofile` (`EmpID`, `Fname`, `Lname`, `Sname`, `Gender`, `DOB`, `MaritalStatus`, `Add1`, `Add2`, `City`, `District`, `Cell`, `rem`, `Status`) VALUES ('$empid', '$fname', '$lname', '$sname', '$gender', '$dob', '$maritalstatus', '$add1', '$add2', '$city', '$district', '$cell', '', '1')";
		$result = mysql_query($sql) or die(mysql_error());	
		$sql4 = mysql_query("INSERT INTO `empmonitoring` (`ID`, `EmpID`, `SubDivID`, `DegID`, `DOJ`, `DOL`, `Rem`, `Status`) VALUES (NULL, '$empid', '$subdivid', '$degid', '$doj', '', 'Joined', '1')");		
		$sql3 = mysql_query("INSERT INTO `users` (`id`, `userid`, `password`, `role`,`status`) VALUES (NULL, '$empid', '123456','2','1')");
		$sql1 = mysql_query("SELECT * FROM designations WHERE ID = '$degid' ");
		$row1 = mysql_fetch_assoc($sql1);
		$sql2 = mysql_query("SELECT * FROM subdivision WHERE ID = '$subdivid' ");		
		$row2 = mysql_fetch_assoc($sql2);
	}
	else {
		header("location:admin.php");	
	}		

?>
	
			
			<div class="content">
				<div class="container-fluid">
				
					<div class="card">
						<div class="card-header" data-background-color="orange">
							<h4 class="title">Employee Registered Successfully</h4>
							<p class="category"></p>
						</div>							
						<div class="card-content table-responsive"> 
							<div class="row">
								
								<label class="col-md-1">Employee ID</label>
								<div class="col-md-2"><?php echo $empid; ?></div>
								
							
								<label class="col-md-1">First Name</label>
								<div class="col-md-2"><?php echo $fname; ?></div>
							
							
								<label class="col-md-1">Last Name</label>
								<div class="col-md-2"><?php echo $lname; ?></div>
							
							
								<label class="col-md-1">Surname</label>
								<div class="col-md-2"><?php echo $sname; ?></div>
								
							</div>
							<div class = "row">
								
									<label class="col-md-1">Gender</label>
									<div class="col-md-2"><?php echo $gender; ?></div>
								
								
									<label class="col-md-1">Date of Birth</label>
									<div class="col-md-2"><?php echo $dob; ?></div>
								
								
									<label class="col-md-1">Marital Status</label>
									<div class="col-md-2"><?php echo $maritalstatus; ?></div>
								
								
									<label class="col-md-1">Address 1</label>
									<div class="col-md-2"><?php echo $add1; ?></div>
								
							</div>
							<div class = "row">	
								
									<label class="col-md-1">Address 2</label>
									<div class="col-md-2"><?php echo $add2; ?></div>
								
								
									<label class="col-md-1">City</label>
									<div class="col-md-2"><?php echo $city; ?></div>
								
								
									<label class="col-md-1">District</label>
									<div class="col-md-2"><?php echo $district; ?></div>
								
								
									<label class="col-md-1">Mobile Number</label>
									<div class="col-md-2"><?php echo $cell; ?></div>
								
							</div>
							<div class = "row">
								<label class="col-md-1">Designation</label>
								<div class="col-md-2"><?php echo $row1['Designation']; ?> </div>
								<label class="col-md-1">Sub Division</label>
								<div class="col-md-2"><?php echo $row2['SubDiv']; ?> </div>
								<label class="col-md-1">Date of Joining</label>
								<div class="col-md-2"><?php echo $doj; ?> </div>
								<div class="col-md-3">
									<label style="color:green"> Employee Register Succesfully <a href = "admin.php"><button class="btn btn-success">Home</button></a></label>
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
