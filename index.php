<!--If user is logged in forward to:-->
    <!--If current project is set: "project/dashboard.php"-->
    <!--If current project is not set: "project/switch.php"-->
<!--Else forward to "account/login.php"-->

<!--Check for Login-->
<?php include_once "check.php" ?>
 

<!-- Test ob Projekt gesetzt ist -->
<?php 
	if(isset($_SESSION ['project'])){
		header("Location: project/dashboard.php");
	}
	else{
		header("Location: project/switch.php");
	}



?> 

