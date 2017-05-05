<?php
    include("session.php");
    include("sidepan.php");
	if(isset($_GET['types'])){
		$_SESSION['temp'] = $_GET['types'];
	}
	if(isset($_SESSION['temp'])){		
		$types = $_SESSION['temp'];	
		$sql1 = mysql_query("SELECT * FROM soctypes WHERE ID='$types'");
		$society = mysql_fetch_assoc($sql1);	
		$sql2 = mysql_query("SELECT
						  societies.Name,
						  societies.`Reg No.`,
						  subdivision.SubDiv,
						  socmonitoring.SocID
						FROM
						  socmonitoring
						  INNER JOIN societies ON socmonitoring.SocID = societies.SocID
						  INNER JOIN subdivision ON societies.SubDivID = subdivision.ID 
						  INNER JOIN allotment ON socmonitoring.SocID = allotment.SocID
						WHERE 
						  socmonitoring.Status = 1 and socmonitoring.TypeID='$types' AND allotment.Status = 0
						ORDER by subdivision.ID");
		$sql3 = mysql_query("SELECT
						  emprofile.Fname,
						  emprofile.Lname,
						  emprofile.Sname,
						  empmonitoring.EmpID,
						  subdivision.SubDiv,
						  designations.Designation
						FROM
						  emprofile
						  INNER JOIN empmonitoring ON empmonitoring.EmpID = emprofile.EmpID
						  INNER JOIN subdivision ON empmonitoring.SubDivID = subdivision.ID
						  INNER JOIN designations ON empmonitoring.DegID = designations.ID
						WHERE
							empmonitoring.Status = 1
						ORDER by subdivision.ID	");				
		$sql = "SELECT
				  societies.SocID, 
				  societies.Name,
				  subdivision.SubDiv,
				  division.Division,
				  years.AuditYear,
				  soctypes.Types,
				  emprofile.Fname,
				  emprofile.Lname,
				  emprofile.Sname,
				  designations.Designation,
				  subdivision.SubDiv as employeesub,
				  division.Division as employeediv
				FROM
				  allotment
				  INNER JOIN societies ON allotment.SocID = societies.SocID
				  INNER JOIN subdivision ON societies.SubDivID = subdivision.ID  
				  INNER JOIN division ON subdivision.DivID = division.ID
				  INNER JOIN years ON allotment.YearAudit = years.ID
				  INNER JOIN soctypes ON allotment.TypeID = soctypes.ID
				  INNER JOIN emprofile ON allotment.EmpID = emprofile.EmpID
				  INNER JOIN empmonitoring ON allotment.EmpID = empmonitoring.EmpID
				  INNER JOIN designations ON empmonitoring.DegID = designations.ID
				Where
				  allotment.TypeID='$types' AND empmonitoring.Status = 1 AND allotment.Status = 1";	  
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
					<div class="card">
						<div class="card-header" data-background-color="red">
							<h4 class="title">(<?php echo $society['Types'];?>) Allotment</h4>
							<p class="category"></p>
						</div>
						<form action="admin_allotcomplete.php" method="post">	
							<table class="table table-hover">				
								<thead class="text-warning">				
								<tr>
									<th>Name of the Society</th>
									<th>Employee </th>
									<th> </th>
								</tr>	
								</thead>
								<tr>
									<td>
									
										<select name="soc" class="form-control">			
													<option>Select Society </option>
											<?php while ($row2 = mysql_fetch_assoc($sql2)) 
												echo "<option value ='".$row2['SocID']."'>".$row2['Name']." - ".$row2['SubDiv']."</option>";								
											 ?>
										</select>	
									</td>							
									<td>
										<select name="employee" class="form-control">
												<option>Select Employee </option>
											<?php while ($row3 = mysql_fetch_assoc($sql3)) 
												echo "<option value ='".$row3['EmpID']."'>".$row3['Sname']." ".$row3['Fname']." ".$row3['Lname']." - ".$row3['Designation']." - ".$row3['SubDiv']."</option>";								
											 ?>
										</select>
									</td>
									<td><button type="submit" id="sub" class="btn btn-success">Submit </button></td>
								</tr>	
							</table>
						</form>
					</div>	
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
							<h4 class="title">Societies (<?php echo $society['Types'];?>) Allotted</h4>
							<p class="category"></p>
						</div>
						<div class="card-content table-responsive">
								
							<table class="table table-hover">				
								<thead class="text-warning">				
								<tr>
									<th>Sl.No.</th>
									<th>Name of the Society with Head quarters </th>
									<th>Name of the Sub Division of the society</th>					
									<th>Name of the   Division of the society</th>
									<th>Year upto which Audit was Completed</th>
									<th>Year of Audit Programmed</th>
									<th>Name of the Auditor to whom the Society is entrusted </th>
									<th>Designation</th>																
									<th>Delete</th>									
								</tr>
								</thead>
						  
							<?php if($count>0){
								$slno=1;
								while($result = mysql_fetch_assoc($sql))
								{ 	
									echo "<tr><td>".$slno."</td>";	
									echo "<td>".$result['Name']." ".$result['Types']."</td>";					
									echo "<td>".$result['SubDiv']."</td>";					
									echo "<td>".$result['Division']."</td>";
									echo "<td> 2015-2016 </td>";
									echo "<td>".$result['AuditYear']."</td>";
									echo "<td>".$result['Sname']." ".$result['Fname']." ".$result['Lname']."</td>";
									echo "<td>".$result['Designation']."</td>";									
									echo "<td>
											  <a href='admin_allotdelete.php?socid=".$result['SocID']."'><i class='fa fa-times'></i></a>							  
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
