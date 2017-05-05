<?php
    include("auditor_session.php");
    include("auditor_sidepan.php");
	if(isset($_SESSION['auditor'])){		
		$empid = $_SESSION['auditor'];		
		$sql = "SELECT
			  allotment.AuditComp,
			  allotment.SocID,
			  years.AuditYear,
			  societies.Name,
			  societies.`Reg No.`,
			  societies.Address,
			  soctypes.Types,
			  mandals.Mandal,
			  socstatus.SocStatus,
			  socmonitoring.FinStatus,
			  socmonitoring.NameCustodian,
			  socmonitoring.Cell	
			FROM
			  allotment	
			  INNER JOIN societies ON allotment.SocID = societies.SocID
			  INNER JOIN soctypes ON societies.Type = soctypes.ID
			  INNER JOIN mandals ON societies.MandalID = mandals.ID
			  INNER JOIN socmonitoring ON societies.SocID = socmonitoring.SocID
			  INNER JOIN socstatus ON socmonitoring.StatusID = socstatus.ID
			  INNER JOIN emprofile ON emprofile.EmpID = allotment.EmpID
			  INNER JOIN years ON years.ID = allotment.YearAudit
			Where
			  allotment.Status = 1 AND allotment.EmpID = '$empid' AND socmonitoring.Status = 1";
		$sql = mysql_query($sql) or die(mysql_error());		
		$count = mysql_num_rows($sql);
		$sql1="SELECT
			  emprofile.Fname,
			  emprofile.Lname,
			  emprofile.Sname,
			  subdivision.SubDiv,
			  designations.Designation
			FROM
			  emprofile
			  INNER JOIN empmonitoring ON emprofile.EmpID = empmonitoring.EmpID
			  INNER JOIN subdivision ON empmonitoring.SubDivID = subdivision.ID
			  INNER JOIN designations ON empmonitoring.DegID = designations.ID
			Where
			  empmonitoring.EmpID = '$empid' AND empmonitoring.Status = 1";
		$sql1=mysql_query($sql1);
		$result1=mysql_fetch_assoc($sql1);
	}
?>
	
			
			<div class="content">
				<div class="container-fluid">
                    <div class="card">
						<div class="card-header" data-background-color="orange">
							<h4 class="title">Chart of <?php echo $result1['Sname']." ".$result1['Fname']." ".$result1['Lname'].", ".$result1['Designation'].", ".$result1['SubDiv']; ?></h4>
							<p class="category"></p>
						</div>
						<div class="card-content table-responsive">
							<table class="table table-hover">
							<col width="5%">
							<col width="20%">	
							<col width="10%">
							<col width="20%"> 
							<col width="15%">
							<col width="15%">
							<col width="10%">
							<col width="5%">
							<thead class="text-warning">
							
							<tr>
								<th>Sl.No.</th>
								<th>Society Name </th>
								<th>Type </th>
								<th>Address</th>
								<th>Custodian of Records</th>	
								<th>Mobile Number</th>
								<th>Audit Allotted Upto</th>								
								<th>Edit Details</th>								
							</tr>
							</thead>

							<?php if($count>0){
								$slno=1;
								while($result = mysql_fetch_assoc($sql))
								{ 	
									echo "<tr><td>".$slno."</td>";	
									echo "<td>".$result['Name']."</td>";
									echo "<td>".$result['Types']."</td>";									
									echo "<td>".$result['Address']." ".$result['Mandal']."</td>";
									echo "<td>".$result['NameCustodian']."</td>";
									echo "<td>".$result['Cell']."</td>";	
									echo "<td>".$result['AuditYear']."</td>";
								
									echo "<td>
											  <a href='auditor_editsoc.php?socid=".$result['SocID']."'><i class='fa fa-pencil'></i></a>							  
										  </td>";									
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
