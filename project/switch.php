<!--Description: This page shows a list of all projects to switch the current project to (cookie)-->
<!--TODO Modal to add new projects where the creator is project lead-->

<!--HTML-Header-->
<?php include_once "../header.php" ?>

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<!--Container for content-->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default panel-body">
            <?php
            include_once "../database.php";
            if (isset($pdo)) {
            	
               $userid = $_SESSION ['userid'];
               $_SESSION ['project'] = "";
               // Statement um die Nummer des Projekts zu holen aus der Übersichtstabelle
               $sql = "SELECT Projekt.ProjektID, Projekt.Bezeichnung, Rolle.Bezeichnung AS Rolle FROM (Projekt INNER JOIN BenutzerProjektRolle ON Projekt.ProjektID=BenutzerProjektRolle.ProjektID)
		INNER JOIN Rolle ON BenutzerProjektRolle.RolleID=Rolle.RolleID WHERE EMail ='$userid'";
                echo "<table border=\"1\">\n";
                foreach ($pdo->query($sql) as $row) {
                	$pid = $row['ProjektID'];
                	$bez = $row ['Bezeichnung'];
                	$role = $row ['Rolle'];
                	
                	echo "<tr>";
                    echo "<td>";
                    echo '<button id="setProject" onClick="setProject('.$pid.',\''.$bez.'\',\''.$role.'\')">';
                    echo $pid;
                    echo "</button>";
                    echo "</td>";
                    echo "<td>";
                    echo $bez;
                    echo "</td>";
                    echo "<td>";
                    echo $role;
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            
            ?>

        </div>
    </div>
<!--   -->

    <script type="text/javascript">
        function setProject(ID,bez,role) {
            
        	location.href = "dashboard.php?ProjectID="+ID+"&projectName="+bez+"&rolle="+role;
        }
    </script>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>