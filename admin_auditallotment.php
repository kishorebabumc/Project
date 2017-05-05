<?php
    include("session.php");
    include("sidepan.php");
	$sql = mysql_query("SELECT
						  count(*),
						  soctypes.Types,
						  soctypes.ID,
						  sum(case when allotment.Status = 1 then 1 else 0 end) ComCount,
						  sum(case when allotment.Status = 0 then 1 else 0 end) BalCount
						FROM
						  allotment
						  INNER JOIN soctypes ON soctypes.ID = allotment.TypeID
						GROUP BY
							soctypes.Types");
	$count = mysql_num_rows($sql);	

?>
	
			
			<div class="content">
				<div class="container-fluid">					
                     <div class="card">
						<div class="card-header" data-background-color="green">
							<h4 class="title">Working Societies List</h4>
							<p class="category"></p>
						</div>
						<div class="card-content table-responsive">
								
							<table class="table table-hover">				
								<thead class="text-warning">				
								<tr>
									<th>Sl.No.</th>
									<th>Type of Society </th>									
									<th>Total Societies</th>									
									<th>Total Allotted</th>
									<th>Balance</th>										
								</tr>
								</thead>
						  
							<?php if($count>0){
								$slno=1;
								$total = 0;
								$comtotal = 0;
								$baltotal = 0;
								while($result = mysql_fetch_assoc($sql))
								{ 	
									echo "<tr><td>".$slno."</td>";										
									echo "<td>
											  <a href='admin_allotment.php?types=".$result['ID']."'>".$result['Types']."</a>							  
										  </td>";									
									echo "<td>".$result['count(*)']."</td>";									
									echo "<td>".$result['ComCount']."</td>";
									echo "<td>".$result['BalCount']."</td></tr>";									
										
																		
									$slno = $slno +1;
									$total = $total + $result['count(*)'];
									$comtotal = $comtotal + $result['ComCount'];
									$baltotal = $baltotal + $result['BalCount']; 		
								}				
							}
							?>
								<tr>
									<td></td>
									<td>Total Societies</td>
									<td><?php echo $total;?></td>
									<td><?php echo $comtotal;?></td>
									<td><?php echo $baltotal;?></td>
								</tr>
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
