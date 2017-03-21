<?php
    include("session.php");
    include("sidepan.php");    

?>

			
			<div class="content">
				<div class="container-fluid">                    
                    <h3 class="blank1">Register Employee Profile</h3>
					<form role="form" action="admin_empregsuc.php" method="post">			
						<div class="row">
							<div class="col-md-3">					
								<label class="control-label">Employee ID</label>
								<input type="text" class="form-control" id ="empid" name="empid"  required>					
							</div>							
							<div class="col-md-3">
								<label class="control-label">First Name</label>	
								<input type="text" class="form-control" name="fname"  required>					
							</div>							
							<div class="col-md-3">					
								<label class="control-label">Last Name</label>	
								<input type="text" class="form-control" name="lname">					
							</div>							
							<div class="col-md-3">					
								<label class="control-label">Surname</label>	
								<input type="text" class="form-control" name="sname"  required>					
							</div>				
						</div>
						<div class="row">							
							<div class="col-md-3">
								<label class="control-label">Gender</label>
								<select class="form-control" name="gender">					
									<option>Male</option>
									<option>Female</option>							
								</select>	
							</div>
							
							<div class="col-md-3">
								<label class="control-label">Date of Birth</label>
								<input type="date" class="form-control" name="dob" placeholder="DD / MM / YYYY" required>					
							</div>							

							<div class="col-md-3">
								<label class="control-label">Date of Birth</label>
								<select class="form-control" name="maritalstatus">					
									<option>Married</option>
									<option>Unmarried</option>							
								</select>	
							</div>							
							<div class="col-md-3">
								<label class="control-label">Address 1</label>	
								<input type="text" class="form-control" name="add1"  required>					
							</div>				
						</div>						
						<div class="row">							
							<div class="col-md-3">
								<label class="control-label">Address 2</label>	
								<input type="text" class="form-control" name="add2"  >					
							</div>
							
							<div class="col-md-3">					
								<label class="control-label">City</label>	
								<input type="text" class="form-control" name="city"  required>					
							</div>
							
							<div class="col-md-3">					
								<label class="control-label">District</label>
								<input type="text" class="form-control" name="district"  required>					
							</div>
							
							<div class="col-md-3">					
								<label class="control-label">Mobile Number</label>
								<input type="text" class="form-control" name="cell"  required>					
							</div>				
						</div>	
									
						
						
						<div class="row">							
							<div class="col-md-3">								
								<span id="mit"></span>
								<button type="submit" id="sub" class="btn btn-success">Submit</button>
							</div>				
							<div class="col-md-8">
								<div class="input-group in-grp1">				
									<span id="status" style = "color:red">Employee Already Register, Please go to Edit Employee</span>						
								</div>					
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
