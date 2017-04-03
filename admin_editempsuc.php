<?php
    include("session.php");
    include("sidepan.php");
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$empid = $_POST['empid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$sname = $_POST['sname'];
		$subdivid = $_POST['SubDivID'];
		$degid = $_POST['DegID'];
		$doj = $_POST['doj'];
		$rem = $_POST['rem'];
		$test = mysql_query("SELECT * FROM empmonitoring WHERE EmpID='$empid' AND Status = 1");
		$count = mysql_num_rows($test);
		$result = mysql_fetch_assoc($test);
		
		$sql1 = mysql_query("SELECT * FROM designations WHERE ID = '$degid' ");
		$row1 = mysql_fetch_assoc($sql1);
		$sql2 = mysql_query("SELECT * FROM subdivision WHERE ID = '$subdivid' ");		
		$row2 = mysql_fetch_assoc($sql2);
		if($count == 1){
			$sql = mysql_query("UPDATE empmonitoring SET DOL ='$doj', Rem ='$rem', Status=0 WHERE EmpID='$empid' AND Status = 1");
			$sql = mysql_query("INSERT INTO `empmonitoring` (`ID`, `EmpID`, `SubDivID`, `DegID`, `DOJ`, `DOL`, `Rem`, `Status`) VALUES (NULL, '$empid', '$subdivid', '$degid', '$doj', '', 'Joined', 1)") or die(mysql_error());
						
		}
		else {
			$sql = mysql_query("INSERT INTO `empmonitoring` (`ID`, `EmpID`, `SubDivID`, `DegID`, `DOJ`, `DOL`, `Rem`, `Status`) VALUES (NULL, '$empid', '$subdivid', '$degid', '$doj', '', 'Joined', 1)") or die(mysql_error());
			$sql3 = mysql_query("INSERT INTO `users` (`id`, `userid`, `password`, `role`,`status`) VALUES (NULL, '$empid', '123456','2','1')");
		}		
	}
	else {
		header("location:admin.php");
	}	

?>
	
			
			<div class="content">
				<div class="container-fluid">
                    <div class="card">
						<div class="card-header" data-background-color="orange">
							<h4 class="title">Employee Successfully Modified</h4>
							<p class="category"></p>
						</div>							
						<div class="card-content table-responsive">
							<div class="row">		
								<div class="form-group">	
									<label class="col-md-1">Employee ID</label>
									<div class="col-md-2"><?php echo $empid; ?> </div>						
									<label class="col-md-1">Employee Name</label>
									<div class="col-md-2"><?php echo $fname." ".$lname." ".$sname; ?> </div>						
									<label class="col-md-1">Designation</label>
									<div class="col-md-2"><?php echo $row1['Designation']; ?> </div>
									<label class="col-md-1">Sub Division</label>
									<div class="col-md-2"><?php echo $row2['SubDiv']; ?> </div>						
								</div>	
							</div>
							<div class="row">
								<div class="form-group">
									<label class="col-md-1">Date of Joining</label>
									<div class="col-md-2"><?php echo $doj; ?> </div>						
									<div class="col-md-4"><a href="admin.php"><button class ="btn btn-primary" > Home </button></a> </div>
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
