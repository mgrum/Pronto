<!--Description: This page shows a simple list of all workpackages of the current project-->
<!--TODO each workpackage is a link to its overview (overview.php#workpackage=nameOfWorkpackage-->
<!--TODO Modal to add new workpackages (can only be seen by project & team leader-->

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
                $role = $_SESSION ['role'] = "Projektleiter";
                $project = $_SESSION ["chosenProject"] = "2";
                $sqlWorkpackages = "SELECT a.ArbeitspaketID AS ArbeitspaketID, a.Bezeichnung as Arbeitspaketezeichnung, t.Bezeichnung as Teamname FROM Arbeitspaket a, Team t WHERE a.TeamID = t.TeamID AND a.ProjektID='" . $project . "'";
                ?>
                <div id=" Workpackages" class="tab-pane">
                    <table class="table table-striped">
                        <tr>
                            <th>ArbeitspaketID</th>
                            <th>Bezeichnung</th>
                            <th>Teamname</th>
                            <th>Link</th>

                        </tr>
            
                        <?php
				foreach ( $pdo->query ( $sqlWorkpackages ) as $row ) {
					$APName = $row["Arbeitspaketezeichnung"];
					$APID = $row ["ArbeitspaketID"];
					$TN = $row["Teamname"];
					
					echo "<tr> <td>" .$APID. "</td>";
					echo "<td>" .$APName. "</td>";
					echo "<td>" .$TN."</td>";
					
					echo '<td>';
					echo  '<a href="overview.php?workpackage='.$APID.'"> Zum Overview hier klicken</a>';
					echo '</td></tr>';
				}
				?>
                    </table>
                </div>
    
                <?php
    
                if ($role == "Projektleiter" || $role == "Administrator") {
                    ?>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Arbeitspaket
                        erstellen
                    </button>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Arbeitspaket erstellen</h2>
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
                                            <label for="recipient-name" class="form-control-label">Freier
                                                Puffer:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Realistische
                                                Dauer:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Optimistische
                                                Dauer:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Pessimistische
                                                Dauer:</label>
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
                                            <label for="recipient-name" class="form-control-label">Team-ID:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen
                                    </button>
                                    <button type="button" class="btn btn-primary">Arbeitspaket erstellen</button>
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