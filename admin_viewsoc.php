<?php
    include("session.php");
    include("sidepan.php");
	$sql1 = mysql_query("SELECT * FROM soctypes") or die(mysql_error());
	$sql2 = mysql_query("SELECT * FROM socstatus") or die(mysql_error());
	$sql3 = mysql_query("SELECT * FROM funcregistrars") or die(mysql_error());
	$sql4 = mysql_query("SELECT * FROM subdivision") or die(mysql_error());
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
			  socmonitoring.Status = 1";
			  
	if($_SERVER["REQUEST_METHOD"] == "POST") {	
		
		$name = $_POST['name'];
		$type = $_POST['type'];	
		$finstatus = $_POST['finstatus'];	
		$status = $_POST['status'];	
		$funcregistrar = $_POST['funcregistrar'];
		$subdiv = $_POST['subdiv'];
		
		$sql .= " AND societies.Name LIKE '%$name%' AND soctypes.Types = '$type' AND socmonitoring.FinStatus = '$finstatus' 
				socstatus.SocStatus = '$status' AND funcregistrars.Registrar = '$funcregistrar' AND subdivision.SubDiv = '$subdiv'";		
			
	}		  
	

	$sql = mysql_query($sql) or die(mysql_error());
	$count = mysql_num_rows($sql);	

?>
	
			
			<div class="content">
				<div class="container-fluid">
					<div class="col-md-2">
                        <a href="admin_addsoc.php"> <button type="button" class="btn btn-success">Add New Society</button> </a>
                    </div>  
					<form action="" method="post">>	
						<table class="table table-hover">
							<tr>
								<td></td>
								<td><input type="text" class="form-control1" name="name" placeholder="Name"></td>
								<td><select name="type" class="form-control1">	
											<option>select</option>
									<?php while ($row1 = mysql_fetch_assoc($sql1)) 
										echo "<option value ='".$row1['ID']."'>".$row1["Types"]."</option>";								
									 ?>
									</select>
								</td>												
								<td><select class="form-control1" name="finstatus">					
										<option value="">select</option>
										<option>Aided</option>
										<option>Un-Aided</option>							
									</select>
								</td>
								<td><select name="status" class="form-control1">								
											<option value="">select</option>
									<?php while ($row2 = mysql_fetch_assoc($sql2)) 
										echo "<option value ='".$row2['ID']."'>".$row2["SocStatus"]."</option>";								
									 ?>
									</select>
								</td>
								<td><select name="funcregistrar" class="form-control1">								
												<option value="">select</option>
									<?php while ($row3 = mysql_fetch_assoc($sql3)) 
										echo "<option value ='".$row3['ID']."'>".$row3["Registrar"]."</option>";								
									 ?>
									</select>
								</td>
								<td><select name="subdiv" class="form-control1">
												<option value="">select</option>
									<?php while ($row4 = mysql_fetch_assoc($sql4)) 
										echo "<option value ='".$row4['ID']."'>".$row4["SubDiv"]."</option>";								
									 ?>
									</select>
								</td>
								<td><button class="btn btn-success">Search</button></td>
								<td></td>
							</tr>
						</table>						
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
