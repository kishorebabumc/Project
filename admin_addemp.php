<?php
    include("session.php");
    include("sidepan.php");
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$empid = $_POST['empid'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$sname = $_POST['sname'];
	}
	else {
		header("location:admin.php");
	}	
	$sql1 = mysql_query("SELECT * FROM designations") or die(mysql_error());
	$sql2 = mysql_query("SELECT * FROM subdivision") or die(mysql_error());

?>
	
			
			<div class="content">
				<div class="container-fluid">
					<h3 class="blank1">Add Employee</h3>
					<form role="form" class="form-horizontal" action="admin_empaddsuc.php" method="post">			
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Employee ID</label>
								<?php echo $empid; ?> 
							</div>
							<div class="col-md-3">
								<label class="control-label">Employee Name</label>
								<?php echo $fname." ".$lname." ".$sname; ?>  
								<input type = "hidden" value = "<?php echo $empid; ?>" name ="empid">
								<input type = "hidden" value = "<?php echo $fname; ?>" name ="fname">
								<input type = "hidden" value = "<?php echo $lname; ?>" name ="lname">
								<input type = "hidden" value = "<?php echo $sname; ?>" name ="sname">
							</div>
							<div class="col-md-3">
								<label class="control-label">Designation</label>
								<select name="DegID" class="form-control">								
									<?php while ($row1 = mysql_fetch_assoc($sql1)) 
										echo "<option value ='".$row1['ID']."'>".$row1["Designation"]."</option>";								
									 ?>
								</select>	
							</div>
							<div class="col-md-3">
								<label class="control-label">Sub Division</label>
								<select name="SubDivID" class="form-control">								
									<?php while ($row2 = mysql_fetch_assoc($sql2)) 
										echo "<option value ='".$row2['ID']."'>".$row2["SubDiv"]."</option>";								
									 ?>
								</select>	
							</div>		
						</div>
						
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Date of Joining</label>
								<input type="date" class="form-control" name="doj" placeholder="DD / MM / YYYY" required>					
							</div>	
						</div>	
						
						<div class="row">
							<div class="col-md-3">
								<button type="submit"  class="btn btn-success">Submit</button>	
							</div>
							<div class="clearfix"> </div>
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
