<?php
    include("session.php");
    include("sidepan.php");
	if(isset($_GET['types'])){
		$_SESSION['temp'] = $_GET['types'];
	}
	if(isset($_SESSION['temp'])){		
		$types = $_SESSION['temp'];							
		$sql = "SELECT
				  societies.Name,
				  socmonitoring.FinStatus,
				  societies.`Reg No.`,
				  socmonitoring.NameCustodian,
				  socmonitoring.Cell,
				  soctypes.Types,
				  societies.Address,
				  subdivision.SubDiv,
				  societies.District,
				  societies.AuditComp,
				  societies.DOR,
				  socstatus.SocStatus,
				  funcregistrars.Registrar,
				  socmonitoring.SocID,
				  mandals.Mandal
				FROM
				  societies
				  INNER JOIN socmonitoring ON societies.SocID = socmonitoring.SocID
				  INNER JOIN soctypes ON socmonitoring.TypeID = soctypes.ID
				  INNER JOIN subdivision ON societies.SubDivID = subdivision.ID
				  INNER JOIN socstatus ON socmonitoring.StatusID = socstatus.ID
				  INNER JOIN funcregistrars ON societies.RegistrarID = funcregistrars.ID	
				  INNER JOIN mandals ON societies.MandalID = mandals.ID  
				Where
				  socmonitoring.Status = 1 AND socmonitoring.TypeID='$types'";	
		if($_SERVER["REQUEST_METHOD"] == "POST") {
				
				
				$name = $_POST['name'];	
				
				$sql .= " AND societies.Name LIKE '%$name%'";		
					
			}				  
		$sql = mysql_query($sql) or die(mysql_error());
		$count = mysql_num_rows($sql);	
	}
	else{
		header("location:admin.php");
	}		
	

?>
	
			
			<div class="content">
				<div class="container-fluid">
					<form action="" method="post">	
                            <div class="form-group  is-empty col-md-2">
								<input type="text" class="form-control" placeholder="Search" required name="name" autocomplete="off">
								<span class="material-input"></span>
							</div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i><div class="ripple-container"></div>
                                </button>
                            </div> 
                    </form>
                    <div class="card">
						<div class="card-header" data-background-color="green">
							<h4 class="title">Society Details</h4>
							<p class="category"></p>
						</div>
						<div class="card-content table-responsive">
								
							<table class="table table-hover">				
								<thead class="text-warning">				
								<tr>
									<th>Sl.No.</th>
									<th>Name of the Society </th>
									<th>Type of the Society</th>					
									<th>Address</th>
									<th>Custodian of Records with Cell No.</th>
									<th>Date of Registration</th>
									<th>Aided / Un-Aided </th>
									<th>Status</th>
									<th>Functional Registrar</th>
									<th>Sub Division</th>									
									<th>Edit Society Status</th>
									<th>Final Close Society</th>
								</tr>
								</thead>
						  
							<?php if($count>0){
								$slno=1;
								while($result = mysql_fetch_assoc($sql))
								{ 	
									echo "<tr><td>".$slno."</td>";	
									echo "<td>".$result['Name']." ".$result['Reg No.']." ".$result['Types']."</td>";					
									echo "<td>".$result['Types']."</td>";					
									echo "<td>".$result['Address'].", ".$result['Mandal'].", Krishna"."</td>";
									echo "<td>".$result['NameCustodian'].", ".$result['Cell']."</td>";
									echo "<td>".$result['DOR']."</td>";
									echo "<td>".$result['FinStatus']."</td>";
									echo "<td>".$result['SocStatus']."</td>";
									echo "<td>".$result['Registrar']."</td>";
									echo "<td>".$result['SubDiv']."</td>";
									echo "<td>
											  <a href='admin_editsoc.php?socid=".$result['SocID']."'><i class='fa fa-pencil'></i></a>							  
										  </td>";
									echo "<td>
											  <a href='admin_closesoc.php?socid=".$result['SocID']."'><i class='fa fa-times'></i></a>							  
										  </td></tr>";	  
									$slno = $slno +1;					
								}				
							}
							?>
							</table>
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
