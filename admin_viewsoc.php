<?php
    include("session.php");
    include("sidepan.php");
	$sql = mysql_query("SELECT
				  count(*),
				  soctypes.Types,
				  soctypes.ID
				FROM
				  societies
				  INNER JOIN soctypes ON soctypes.ID = societies.Type
				GROUP BY
				  soctypes.Types");
	$count = mysql_num_rows($sql);	

?>
	
			
			<div class="content">
				<div class="container-fluid">
					<div class="col-md-2">
                        <a href="admin_addsoc.php"> <button type="button" class="btn btn-success">Add New Society</button> </a>
                    </div>  
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
									<th>Total </th>									
								</tr>
								</thead>
						  
							<?php if($count>0){
								$slno=1;
								$total = 0;
								while($result = mysql_fetch_assoc($sql))
								{ 	
									echo "<tr><td>".$slno."</td>";										
									echo "<td>
											  <a href='admin_viewsocdet.php?types=".$result['ID']."'>".$result['Types']."</a>							  
										  </td>";									
									echo "<td>".$result['count(*)']."</td></tr>";					
																		
									$slno = $slno +1;
									$total = $total + $result['count(*)'];	
								}				
							}
							?>
								<tr>
									<td></td>
									<td>Total Societies</td>
									<td><?php echo $total;?></td>
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
