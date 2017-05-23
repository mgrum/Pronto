<!--Description: This page shows all teams of the current project-->
<!--TODO Modal to create new teams where you can chose 'email' (must exist) of team leader-->

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
                $role = $_SESSION ['role'];
                $project = $_SESSION ["chosenProject"];
    
                $stringList = "<ul class=\"nav nav-tabs\">";
                $stringTable = "<div class=\"tab-content\">";
    
                $sqlProject = "SELECT ProjektID, Bezeichnung FROM `Benutzer_pro_Team_pro_Projekt` WHERE ProjektID ='" . $project . "' GROUP BY ProjektID, Bezeichnung;";
    
                // Erste Schleife erstellt die Tabs
                
                foreach ($pdo->query($sqlProject) as $projects) {
					$stringList .= "<li><a data-toggle=\"tab\" href=\"#" . $projects ["Bezeichnung"] . "\">" . $projects ["Bezeichnung"] . "</a></li>";
                    
                	
                    $sqlTeamMember = "SELECT Vorname, Nachname, EMail, Teamleiter FROM `Benutzer_pro_Team_pro_Projekt` WHERE ProjektID ='" . $project . "' AND Bezeichnung ='" . $projects ["Bezeichnung"] . "' ORDER BY Nachname";
        
                    // Zweite Schleife erstellt die Tabelle
                    $stringTable .= "<div id=\"" . $projects ["Bezeichnung"] . "\" class=\"tab-pane fade\"><table class=\"table table-striped\"><tr> <th>Rolle</th> <th>Nachname</th> <th>Vorname</th></tr>";
        
                    foreach ($pdo->query($sqlTeamMember) as $row) {
            
                        if ($row ["EMail"] == $row ["Teamleiter"]) {
                            $stringTable .= "<tr> <td> Teamleiter</td>";
                        } else {
                            $stringTable .= "<tr> <td> Teammitglied</td>";
                        }
            
                        $stringTable .= "<td>" . $row ["Nachname"] . "</td>";
                        $stringTable .= "<td>" . $row ["Vorname"] . "</td></tr>";
                    }
                    $stringTable .= "</table></div>";
                
                }
    
                $stringList .= "</ul>";
                $stringTable .= "</div>";
                echo($stringList);
                echo($stringTable);
    
                if ($role == "Projektleiter" || $role == "Administrator") {
                    ?>
          
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Benutzer zu
                        Team hinzufügen
                    </button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Benutzer zu Team hinzufügen</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <!--TODO-->
                                            <label for="sel1">Team:</label>
                                            <select class="form-control" id="sel1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                            <label for="recipient-name" class="form-control-label">E-Mail:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen
                                    </button>
                                    <button type="button" class="btn btn-primary">Benutzer hinzufügen</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2">Team
                        erstellen
                    </button>
                    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Team erstellen</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Teamname:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Teamleiter
                                                (E-Mail):</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen
                                    </button>
                                    <button type="button" class="btn btn-primary">Team erstellen</button>
                                </div>
                            </div>
                        </div>
                    </div>

        
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>