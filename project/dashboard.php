<!--Description: This page shows dashboard for the current project (cookie)-->

<!--HTML-Header-->
<?php include_once "../header.php" ?>

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<!--Container for content-->
<div class="row">
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-default">
            <!--Sidebar of this tab-->
            <?php include_once "sidebar.html" ?>
        </div>
    </div>
    <div class="col-md-9 col-lg-9">
        <div class="panel panel-body panel-default">
            <?php
            include_once "../database.php";
            if (isset($pdo)) {
                // TODO Content
                if(isset($_GET ["ProjectID"])){
                	$_SESSION ['project'] = $_GET ["ProjectID"];
                	$_SESSION ['projectName']= $_GET ["projectName"];
                	$_SESSION ['rolle']= $_GET ["rolle"];
                }
            	
            	
            	
            	$projectID = $_SESSION ['project'];
            	
            	$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc' );
            	// Statement einfügen für Gesamt
            	$gesamt = 0;
            	$statementG = $pdo->prepare ( "SELECT SUM(ToDos.Dauer) AS SummeGesamt FROM (Projekt INNER JOIN Arbeitspaket ON Projekt.ProjektID=Arbeitspaket.ProjektID)
		INNER JOIN ToDos ON Arbeitspaket.ArbeitspaketID=ToDos.ArbeitspaketID WHERE Projekt.ProjektID=:parameterID" );
            	$statementG->bindParam ( ':parameterID', $projectID, PDO::PARAM_INT );
            	$statementG->execute ();
            	while ( $row = $statementG->fetch (PDO::FETCH_ASSOC) ) {
            		$gesamt = $row['SummeGesamt'];
            	}
            	// $gesamt = $statementG->fetch();
            	// Statement einfügen für Fortschritt
            	$fortschritt = 0;
            	$statementF = $pdo->prepare ( "SELECT SUM(ToDos.Dauer) AS SummeErledigt FROM (Projekt INNER JOIN Arbeitspaket ON Projekt.ProjektID=Arbeitspaket.ProjektID)
			INNER JOIN ToDos ON Arbeitspaket.ArbeitspaketID=ToDos.ArbeitspaketID WHERE Projekt.ProjektID=:parameterID AND ToDos.Status='geschlossen' " );
            	$statementF->bindParam ( ':parameterID', $projectID, PDO::PARAM_INT );
            	$statementF->execute ();
            	while ( $row = $statementF->fetch (PDO::FETCH_ASSOC) ) {
            		$fortschritt = $row['SummeErledigt'];
            	}
            	// $fortschritt = $statementF->fetch();
            	$pdo = null;
            	?>
            	            	
            	            	<!DOCTYPE html>
            	            	<html>
            	            	<body>
            	            	
            	            		<div id="progressBar" style="width: 500px; border: 1px solid #ccc;"></div>
            	            		<div id="information" style=""></div>
            	            	<?php
            	            	// Looper für den Fortschrittsbalken
            	            	for($i = 0; $i <= $fortschritt; $i ++) {
            	            		// Prozent berechnen
            	            		$prozent = intval ( $i / $gesamt * 100 ) . "%";
            	            		
            	            		// javascript für Update
            	            		echo '<script language="javascript">
            	            	    document.getElementById("progressBar").innerHTML="<div style=\"width:' . $prozent . ';background-color:#3ADF00;\">&nbsp;</div>";
            	            	    document.getElementById("information").innerHTML="' . $prozent . ' komplett.";
            	            	    </script>';
            	            		
            	            		// buffer für Minimalgröße
            	            	// 	echo str_repeat ( ' ', 1024 * 64 );
            	            		
            	            		flush ();
            	            		// sleep für delay "Animation"
            	            		usleep ( 1500 );
            	            	}
            	            	?>
            	            	</body>
            	            	</html>
            	            <?php 
            	            }
            	            ?>
           
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>