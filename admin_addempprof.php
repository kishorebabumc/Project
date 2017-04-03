<?php
    include("session.php");
    include("sidepan.php");   
	$sql1 = mysql_query("SELECT * FROM designations") or die(mysql_error());
	$sql2 = mysql_query("SELECT * FROM subdivision") or die(mysql_error());	

?>

			
			<div class="content">
				<div class="container-fluid">                                        
					<form role="form" class="form-horizontal" action="admin_empregsuc.php" method="post">			
						<div class="card">
							<div class="card-header" data-background-color="orange">
								<h4 class="title">Employee Registration</h4>
								<p class="category"></p>
							</div>							
							<div class="card-content table-responsive">
								<div>
									<label class="col-md-1">Employee ID</label>
									<div class="col-md-2">					
											<input type="text" class="form-control" id ="empid" name="empid" placeholder="Employee ID" required>					
									</div>
									<label class="col-md-1">First Name</label>
									<div class="col-md-2">					
											<input type="text" class="form-control" name="fname" placeholder="First Name" required>					
									</div>
									<label class="col-md-1">Last Name</label>
									<div class="col-md-2">					
											<input type="text" class="form-control" name="lname" placeholder="Last Name" >					
									</div>
									<label class="col-md-1">Surname</label>
									<div class="col-md-2">					
											<input type="text" class="form-control" name="sname" placeholder="Surname" required>					
									</div>				
								</div>
								<div>
									<label class="col-md-1">Gender</label>
									<div class="col-md-2">					
											<select class="form-control" name="gender">					
												<option>Male</option>
												<option>Female</option>							
											</select>	
									</div>
									<label class="col-md-1">Date of Birth</label>
									<div class="col-md-2">					
											<input type="date" class="form-control" name="dob" placeholder="DD / MM / YYYY" required>					
									</div>
									<label class="col-md-1">Marital Status</label>
									<div class="col-md-2">					
											<select class="form-control" name="maritalstatus">					
												<option>Married</option>
												<option>Unmarried</option>							
											</select>	
									</div>
									<label class="col-md-1">Address 1</label>
									<div class="col-md-2">					
											<input type="text" class="form-control" name="add1" placeholder="Address 1" required>					
									</div>				
								</div>						
								<div>
									<label class="col-md-1">Address 2</label>
									<div class="col-md-2">					
											<input type="text" class="form-control" name="add2" placeholder="Address 2" >					
									</div>
									<label class="col-md-1">City</label>
									<div class="col-md-2">					
											<input type="text" class="form-control" name="city" placeholder="City" required>					
									</div>
									<label class="col-md-1">District</label>
									<div class="col-md-2">					
											<input type="text" class="form-control" name="district" placeholder="District" required>					
									</div>
									<label class="col-md-1">Mobile Number</label>
									<div class="col-md-2">					
											<input type="text" class="form-control" name="cell" placeholder="Mobile Number" required>					
									</div>				
								</div>
								<div>
									<label class="col-md-1">Designation</label>
									<div class="col-md-2">
										<select name="DegID" class="form-control">								
											<?php while ($row1 = mysql_fetch_assoc($sql1)) 
												echo "<option value ='".$row1['ID']."'>".$row1["Designation"]."</option>";								
											 ?>
										</select>	
									</div>
									<label class="col-md-1">Sub Division</label>
									<div class="col-md-2">
										<select name="SubDivID" class="form-control">								
											<?php while ($row2 = mysql_fetch_assoc($sql2)) 
												echo "<option value ='".$row2['ID']."'>".$row2["SubDiv"]."</option>";								
											 ?>
										</select>	
									</div>
									<label class="col-md-1">Date of Joining</label>
									<div class = "col-md-2">
										<input type ="date" class="form-control" name ="doj" required>
									</div>
								</div>						
								<div >
									<label class="col-md-2 control-label"></label>
									<div class="col-md-2">
										<div class="input-group in-grp1">
											<span id="mit"></span>
											<button type="submit" id="sub" class="btn btn-primary">Submit</button>						
										</div>					
									</div>				
									<div class="col-md-8">
										<div class="input-group in-grp1">				
											<span id="status" style = "color:red">Employee Already Register, Click here to Edit Employee <a href="admin_editempreq.php"><button type="button" class="btn btn-primary">Edit</button></a></span>						
										</div>					
									</div>
									<div class="clearfix"> </div>
								</div>						
							</div>
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
	<script type="text/javascript">
	$(document).ready(function()
		{ 	$("#status").hide();
			$("#empid").keyup(function() 
			{  
				var empid = $("#empid").val();										
				if(empid.length == 7 )
				{
					$.ajax({  
						type: "POST",  
						url: "usercheck.php",  
						data: "empid="+ empid,  						
						success: function(msg){ 																				
							if( msg == 1)
 							{	
								var div = $("#empid").closest("div");
								div.removeClass("has-error");								
								div.addClass("has-warning");
								$("#glypcn").remove();								
								div.append('<span id="glypcn" class="glyphicon glyphicon-warning-sign form-control-feedback"></span>');
								var div1 = $("#mit").closest("div");
								$("#sub").remove();
								div1.append('<button type="submit" id="sub" class="btn btn-info disabled">Submit</button>');
								$("#status").show();
							}  
							else 
							{  								
								$("#status").hide();
								var div = $("#empid").closest("div");
								div.removeClass("has-error");
								div.removeClass("has-warning");								
								div.addClass("has-success");									
								$("#glypcn").remove();
								div.append('<span id="glypcn" class="glyphicon glyphicon-ok form-control-feedback"></span>');	
								var div1 = $("#mit").closest("div");
								$("#sub").remove();
								div1.append('<button type="submit" id="sub" class="btn btn-success">Submit</button>');
							} 
						} 
					}); 
				}
				else
				{	$("#status").hide();			
					var div = $("#empid").closest("div");				
					div.addClass("has-error");
					$("#glypcn").remove();
					div.append('<span id="glypcn" class="glyphicon glyphicon-remove form-control-feedback"></span>');				
					var div1 = $("#mit").closest("div");
					$("#sub").remove();
					div1.append('<button type="submit" id="sub" class="btn btn-info disabled">Submit</button>');
				}
			return false;
			});			
		});
</script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	

	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>

</html>
