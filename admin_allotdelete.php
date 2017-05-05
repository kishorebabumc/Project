<?php 
    include("session.php");
    include("sidepan.php");
	if(isset($_GET['socid'])){
		$socid = $_GET['socid'];		
		$sql = mysql_query("UPDATE allotment SET EmpID ='', Status=0 WHERE SocID='$socid' AND Status = 1");
		header("location:admin_allotment.php");
	}
	else {
		header("location:logout.php");
	}
?>