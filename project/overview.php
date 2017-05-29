<!--Description: This page shows basic information for a single project (current, from cookie)-->

<!--HTML-Header-->
<?php include_once "../header.php" ?>

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<!--Container for content-->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default panel-body panel-header">
            <h2>Projektübersicht:
                <b><?php if (isset($_SESSION["chosenProjectName"])) echo $_SESSION["chosenProjectName"] ?></b></h2>
        </div>
    </div>
</div>
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
            if (isset ($pdo)) {
                // TODO Content
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
    
                <?php
                if ($role == "Projektleiter" || $role == "Administrator") {
                    echo '
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Projekt bearbeiten</button>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="exampleModalLabel">Projekt ändern</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="recipient-name" class="form-control-label">Projekt-ID des zu ändernden Projektes:</label>
                                                <input type="text" class="form-control" id="recipient-name">
                                            </div>
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
                                        <button type="button" class="btn btn-primary">Änderungen sichern</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }
            ?>

        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>