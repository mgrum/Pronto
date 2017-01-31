<!--Description: This page shows all teams of the current project-->
<!--TODO Modal to create new teams where you can chose 'email' (must exist) of team leader-->

<!--HTML-Header-->
<?php include_once "../header.php"?>

<!--Check for Login-->
<?php include_once "../check.php"?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php"?>

<!--Container for content-->
<div class="row">
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<div class="well">
			<!--Sidebar of this tab-->
            <?php include_once "sidebar.html"?>
        </div>
	</div>
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<div class="well">
			<!--TODO Content-->
			<?php
			include_once "../database.php";
			if (isset ( $pdo )) {
				// TODO Content
				$role = $_SESSION ['role'] = "Projektleiter";
				$project = $_SESSION ["chosenProject"] = "1";
				
				if ($role == "Projektleiter" || $role == "Administrator") {
				?>
					<div>
						<button type="button" name="Team hinzufuegen">Team hinzufuegen</button>
					</div>
				<?php
				}
								
				$stringList = "<ul class=\"nav nav-tabs\">";
				$stringTable = "<div class=\"tab-content\">";
				
				$sqlProject = "SELECT ProjektID, Bezeichnung FROM `Benutzer_pro_Team_pro_Projekt` WHERE ProjektID ='" . $project . "' GROUP BY ProjektID, Bezeichnung;";
				
				// Erste Schleife erstellt die Tabs
				foreach ( $pdo->query ( $sqlProject ) as $projects ) {
					
					$stringList .= "<li><a data-toggle=\"tab\" href=\"#" . $projects ["Bezeichnung"] . "\">" . $projects ["Bezeichnung"] . "</a></li>";
					
					$sqlTeamMember = "SELECT Vorname, Nachname, EMail, Teamleiter FROM `Benutzer_pro_Team_pro_Projekt` WHERE ProjektID ='" . $project . "' AND Bezeichnung ='" . $projects ["Bezeichnung"] . "' ORDER BY Nachname";
					
					// Zweite Schleife erstellt die Tabelle
					$stringTable .= "<div id=\"" . $projects ["Bezeichnung"] . "\" class=\"tab-pane fade\"><table class=\"table table-striped\"><tr> <th>Rolle</th> <th>Nachname</th> <th>Vorname</th></tr>";
					
					foreach ( $pdo->query ( $sqlTeamMember ) as $row ) {
						
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
				echo ($stringList);
				echo ($stringTable);
				
			}	
			?>
		</div>
	</div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>