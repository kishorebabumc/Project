<?php
    include("session.php");
    include("sidepan.php");
		$result = $_SESSION['result'];
	$sql = mysql_query("Select
						  societies.Name,
						  societies.`Reg No.`,
						  soctypes.Types,
						  societies.Address,
						  mandals.Mandal,
						  societies.District,
						  societies.ChiefPromoter,
						  societies.Cell,
						  societies.DOR,
						  funcregistrars.Registrar,
						  subdivision.SubDiv
						From
						  societies Inner Join
						  soctypes
							On societies.Type = soctypes.ID Inner Join
						  mandals
							On societies.MandalID = mandals.ID Inner Join
						  funcregistrars
							On societies.RegistrarID = funcregistrars.ID Inner Join
						  subdivision
							On societies.SubDivID = subdivision.ID	
						Where
						  societies.SocID = '$result'") or die(mysql_error());
	$result = mysql_fetch_assoc($sql);	

?>
	
			
			<div class="content">
				<div class="container-fluid">
					
					<div class="card">
						<div class="card-header" data-background-color="orange">
							<h4 class="title">Society Added Succesfully </h4>
							<p class="category"></p>
						</div>	
						<div class="card-content table-responsive">	
							<div class="row">
								<div class="form-group">
									<label class="col-md-1">Society Name</label>
									<div class="col-md-2">					
											<?php echo $result['Name']." ".$result['Reg No.']; ?>					
									</div>
									<label class="col-md-1">Type</label>
									<div class="col-md-2">					
											<?php echo $result['Types']; ?>					
									</div>
									<label class="col-md-1">Address</label>
									<div class="col-md-2">					
											<?php echo $result['Address']." ".$result['Mandal']." ,Krishna"; ?>							
									</div>
									<label class="col-md-1">Chief Promoter</label>
									<div class="col-md-2">					
											<?php echo $result['ChiefPromoter']; ?>					
									</div>				
								</div>
							</div>
							<div class = "row">
								<div class="form-group">
									<label class="col-md-1">Cell</label>
									<div class="col-md-2">					
											<?php echo $result['Cell']; ?>	
									</div>
									<label class="col-md-1">Date of Registration</label>
									<div class="col-md-2">					
											<?php echo $result['DOR']; ?>					
									</div>
									<label class="col-md-1">Sub Division</label>
									<div class="col-md-2">					
											<?php echo $result['SubDiv']; ?>	
									</div>
									<label class="col-md-1">Functional Registrar</label>
									<div class="col-md-2">					
											<?php echo $result['Registrar']; ?>	
									</div>				
								</div>
							</div>		
							<div class = "row">
								<div class="form-group">
									<label class="col-md-1 control-label"></label>
									<div class="col-md-7">					
											<label style="color:green"> Society Added Succesfully</label>																
											<a href="admin.php"><button class ="btn btn-primary" > Home </button></a>
									</div>
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
