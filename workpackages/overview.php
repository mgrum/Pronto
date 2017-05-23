<!--Description: This page shows basic information for a single workpackage of the current project (# in URL)-->
<!--TODO Button to add new todo for this work package - Can only be seen by project & team leader-->

<!--HTML-Header-->
<?php include_once "../header.php" ?>

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<!--Container for content-->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="panel panel-default panel-body panel-header">
            <!--TODO name of the current workpackage-->
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
            if (isset($pdo)) {
                //TODO
                $wp = $_GET['workpackage'];
                $sqlWorkpackages = "SELECT ArbeitspaketID, Bezeichnung, FAZ, SAZ, FEZ, SEZ, GP, FP, RealCase, BestCase, WorstCase, PERT, Meilenstein, Vorg�ngerID, ProjektID, TeamID FROM Arbeitspaket";
                ?>
                
                <div id=" Workpackag" class="tab-pane">
                	<table class="table table-striped">
               			<?php
            
                        foreach ($pdo->query($sqlProject) as $row) {
                
                        	echo "<tr> <td><b>ArbeitspaketID</b></td> <td>" . $row ["ArbeitspaketID"] . "</td></tr>";
                        	echo "<tr> <td><b>Bezeichnung</b></td> <td>" . $row ["Bezeichnung"] . "</td></tr>";
                            echo "<tr> <td><b>FAZ</b></td> <td>" . $row ["FAZ"] . "</td></tr>";
                            echo "<tr> <td><b>SAZ</b></td> <td>" . $row ["SAZ"] . "</td></tr>";
                            echo "<tr> <td><b>FEZ</b></td> <td>" . $row ["FEZ"] . "</td></tr>";
                            echo "<tr> <td><b>SEZ</b></td> <td>" . $row ["SEZ"] . "</td></tr>";
                            echo "<tr> <td><b>GP</b></td> <td>" . $row ["GP"] . "</td></tr>";
                            echo "<tr> <td><b>FP</b></td> <td>" . $row ["FP"] . "</td></tr>";
                            echo "<tr> <td><b>RealCase</b></td> <td>" . $row ["RealCase"] . "</td></tr>";
                            echo "<tr> <td><b>BestCase</b></td> <td>" . $row ["BestCase"] . "</td></tr>";
                            echo "<tr> <td><b>WorstCase</b></td> <td>" . $row ["WorstCase"] . "</td></tr>";
                            echo "<tr> <td><b>PERT</b></td> <td>" . $row ["PERT"] . "</td></tr>";
                            echo "<tr> <td><b>Meilenstein</b></td> <td>" . $row ["Meilenstein"] . "</td></tr>";
                            echo "<tr> <td><b>Vorg�ngerID</b></td> <td>" . $row ["Vorg�ngerID"] . "</td></tr>";
                            echo "<tr> <td><b>ProjektID</b></td> <td>" . $row ["ProjektID"] . "</td></tr>";
                            echo "<tr> <td><b>TeamID</b></td> <td>" . $row ["TeamID"] . "</td></tr>";
                
                
                        }
                        ?>
					</table>
                </div>
            <?php 
            	if($_SESSION["role"] = 'Projektleiter'){
            ?>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Arbeitspaket
                ändern
            </button>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">Arbeitspaket ändern</h2>
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
                                    <label for="recipient-name" class="form-control-label">Frühester
                                        Anfangszeitpunkt:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Spätester
                                        Anfangszeitpunkt:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Frühester
                                        Endzeitpunkt:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Spätester
                                        Endzeitpunkt:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Gesamtpuffer:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Freier Puffer:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Realistische Dauer:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Optimistische Dauer:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Pessimistische Dauer:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">PERT:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Meilenstein:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Vorgänger-ID:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Projekt-ID:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Team-ID:</label>
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
            </div>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">ToDo erstellen
            </button>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">ToDo erstellen</h2>
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
                                    <label for="recipient-name" class="form-control-label">Anfangszeit:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Endzeit:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Dauer:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">E-Mail des
                                        Verantwortlichen:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">Arbeitpaket-ID:</label>
                                    <input type="text" class="form-control" id="recipient-name" disabled>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                            <button type="button" class="btn btn-primary">ToDo erstellen</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html"?>                   