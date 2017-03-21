<?php
    include("session.php");
    include("sidepan.php");
    include("toppan.php");
		$sql = "Select
  emprofile.EmpID,
  emprofile.Fname,
  emprofile.Lname,
  emprofile.Sname,
  emprofile.Gender,
  emprofile.DOB,
  emprofile.Cell,
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
	$sql1 = mysql_query("SELECT * FROM designations");


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Audit Programme Management Portal</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="wrapper">

	    
	    <div class="main-panel">
			
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
                            <div class="col-md-2">
                                <a href="admin_addempprof.php"> <button type="button" class="btn btn-primary">Register New Employee</button> </a>
                            </div>
                            <div class="col-md-2">
                                 
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary">Add Old Employee</button>
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
                            <th>Mobile Number</th>
                            <th>Edit</th>
                            <th>Relieve</th>
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
                                echo "<td>".$result['Cell']."</td>";
                                echo "<td>
                                          <a href='editemp1.php?empid=".$result['EmpID']."'><i class='fa fa-pencil'></i></a>							  
                                      </td>";
                                echo "<td>
                                          <a href='editemp1.php?empid=".$result['EmpID']."'><i class='fa fa-close'></i></a>							  
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
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#">
									Home
								</a>
							</li>
							<li>
								<a href="#">
									Company
								</a>
							</li>
							<li>
								<a href="#">
									Portfolio
								</a>
							</li>
							<li>
								<a href="#">
								   Blog
								</a>
							</li>
						</ul>
					</nav>
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
