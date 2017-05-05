<?php 
    include("session.php");
    include("sidepan.php");
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$socid = $_POST['soc'];
		$empid = $_POST['employee'];
		$sql = mysql_query("UPDATE allotment SET EmpID ='$empid', Status=1 WHERE SocID='$socid' AND Status = 0");
		header("location:admin_allotment.php");
	}
	else {
		header("location:logout.php");
	}
?>