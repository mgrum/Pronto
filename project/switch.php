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
                
                if (!isset ($_SESSION ['userid'])) {
                    // Link anpassen an die entsprechende Seite
                    die ('Bitte zuerst einloggen<a href="login.php"> Login </a>');
                }
                $userid = $_SESSION ['userid'];
                // $cookie_project ="";
                // $cookie_role ="";
                // $cookie_name ="";
                $_SESSION ['project'] = "";
                // Statement um die Nummer des Projekts zu holen aus der Übersichtstabelle
                $sql = "SELECT Projekt.ProjektID, Projekt.Bezeichnung, Rolle.Bezeichnung AS Rolle FROM (Projekt INNER JOIN BenutzerProjektRolle ON Projekt.ProjektID=BenutzerProjektRolle.ProjektID)
		INNER JOIN Rolle ON BenutzerProjektRolle.RolleID=Rolle.RolleID";
                echo "<table border=\"1\">\n";
                foreach ($pdo->query($sql) as $row) {
                    echo "<tr>";
                    echo "<td>";
                    echo '<button id="setProject" onclick="setProject(', $row ['ProjektID'], ')">';
                    echo $row ['ProjektID'];
                    echo "</button>";
                    echo "</td>";
                    echo "<td>";
                    echo $row ['Bezeichnung'];
                    echo "</td>";
                    echo "<td>";
                    echo $row ['Rolle'];
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </div>
    </div>


    <script type="text/javascript">
        function setProject(ID) {
            location.href = "Fortschrittsbalken.php?ProjectID=" + ID;
        }
    </script>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>