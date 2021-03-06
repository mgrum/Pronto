<!--Description: This page lets the user edit the current project-->
<!--Restrictions: Project-Manager-->

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
        <div class="panel panel-default panel-body">
            <?php
            include_once "../database.php";
            if (isset($pdo)) {
                // TODO Content
        		echo "In Arbeit";
        		
        		$role = $_SESSION["role"];
        		$project = $_SESSION ["chosenProject"];
        		
        		$sqlProject = "SELECT Bezeichnung, SollArbeitszeit, IstArbeitszeit, PlanArbeitszeit, Anfangsdatum, Enddatum, Status FROM Projekt WHERE ProjektID='" . $project . "'";
        		
        		?>
        		<div id="Workpackages" class="tab-panefade">
        			<table class="table table-striped">
        		            
        		    <?php
		            foreach ($pdo->query($sqlProject) as $row) {
        		                
        		    	echo "<tr> <td><b>Bezeichnung</b></td> <td>" . $row ["Bezeichnung"] . "</td></tr>";
        		    	echo "<tr> <td><b>SollArbeitszeit</b></td> <td>" . $row ["SollArbeitszeit"] . "</td></tr>";
        		    	echo "<tr> <td><b>IstArbeitszeit</b></td> <td>" . $row ["IstArbeitszeit"] . "</td></tr>";
        		    	echo "<tr> <td><b>PlanArbeitszeit</b></td> <td>" . $row ["PlanArbeitszeit"] . "</td></tr>";
        		    	echo "<tr> <td><b>Anfangsdatum</b></td> <td>" . $row ["Anfangsdatum"] . "</td></tr>";
        		    	echo "<tr> <td><b>Enddatum</b></td> <td>" . $row ["Enddatum"] . "</td></tr>";
        		    	echo "<tr> <td><b>Status</b></td> <td>" . $row ["Status"] . "</td></tr>";
					}
        		    ?>
        		    </table>
        		</div>
          </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>