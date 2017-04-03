<?php
    include("session.php");
    include("sidepan.php");
			$sql = "Select
  emprofile.EmpID,
  emprofile.Fname,
  emprofile.Lname,
  emprofile.Sname,  
  subdivision.SubDiv,
  designations.Designation,
  empmonitoring.Status
From
  designations Inner Join
  empmonitoring
    On empmonitoring.DegID = designations.ID Inner Join
  emprofile
    On empmonitoring.EmpID = emprofile.EmpID Inner Join
  subdivision
    On empmonitoring.SubDivID = subdivision.ID
Where
  empmonitoring.Status = 1";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		
		$name = $_POST['name'];	
		
		$sql .= " AND (emprofile.Fname LIKE '%$name%' OR emprofile.Lname LIKE '%$name%' OR emprofile.Sname LIKE '%$name%')";		
			
	}	
	$sql = mysql_query($sql);
	$count = mysql_num_rows($sql);	


?>

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
						<div class="card-header" data-background-color="orange">
							<h4 class="title">Employees Details</h4>
							<p class="category"></p>
						</div>
						<div class="card-content table-responsive">
							<table class="table table-hover">
							<thead class="text-warning">				
							<tr>
								<th>Sl.No.</th>
								<th>Employee ID </th>
								<th>Name of th Employee</th>					
								<th>Designation</th>
								<th>Sub Division</th>								
								<th>Charts</th>								
							</tr>
							</thead>

							<?php if($count>0){
								$slno=1;
								while($result = mysql_fetch_assoc($sql))
								{ 	
									echo "<tr><td>".$slno."</td>";	
									echo "<td>".$result['EmpID']."</td>";					
									echo "<td>".$result['Fname']." ".$result['Lname']." ".$result['Sname']."</td>";					
									echo "<td>".$result['Designation']."</td>";
									echo "<td>".$result['SubDiv']."</td>";
								
									echo "<td>
											  <a href='admin_empchartview.php?empid=".$result['EmpID']."'><i class='fa fa-server'></i></a>							  
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
