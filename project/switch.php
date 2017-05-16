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
    
                $userid = $_SESSION['userid'];
                $_SESSION['chosenProject'] = "";
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

    <script type="text/javascript">
        function setProject(ID,bez,role) {
            
        	location.href = "dashboard.php?ProjectID="+ID+"&projectName="+bez+"&rolle="+role;
                  }
    </script>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Projekt erstellen
            </button>


            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">Projekt erstellen</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Bezeichnung:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Soll-Arbeitszeit:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Ist-Arbeitszeit:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Plan-Arbeitszeit:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Anfangsdatum:</label>
                                    <input type="date" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Enddatum:</label>
                                    <input type="date" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Status:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                            <button type="button" class="btn btn-primary">Projekt erstellen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>