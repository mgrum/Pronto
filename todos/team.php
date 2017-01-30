<!--Description: This page shows all open todos of the team the user is assigned to of the current project-->

<!--HTML-Header-->
<?php include_once "../header.php" ?>

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<div tabelle>
<?php
	
	$pdo = new PDO('mysql:host=mgrum.me;port=3306;dbname=pronto','pronto','wwi14amc');
	
	//Solange Cookie noch nicht vollstaendig: $email = $_SESSION ["email"] = "da.schneider100@gmx.de;
	$email = $_SESSION ["email"] = "da.schneider100@gmx.de";
	$project = $_SESSION ["chosenProject"] = "2";
	
	$stringList = "<ul class=\"nav nav-tabs\">";
	$stringTable = "<div class=\"tab-content\">";
	
	$sqlTeamName = "SELECT Team.Bezeichnung AS Bezeichnung FROM BenutzerTeam, Team, Arbeitspaket 
			WHERE BenutzerTeam.TeamID = Team.TeamID AND Arbeitspaket.TeamID = Team.TeamID AND BenutzerTeam.EMail ='" . $email . "' 
			GROUP BY Bezeichnung";
	//
	
	
	//Erste Schleife erstellt die tabs
	foreach($pdo -> query($sqlTeamName) as $teamName){
		$stringList .= "<li><a data-toggle=\"tab\" href=\"#".$teamName["Bezeichnung"]."\">".$teamName["Bezeichnung"]."</a></li>";
				
		$sqlToDosProTeam = "SELECT Team.Bezeichnung AS TeamBezeichnung, ToDos.Bezeichnung AS ToDosBezeichnung, ToDos.Status AS ToDosStatus 
						FROM Team, Arbeitspaket, ToDos 
						WHERE Team.TeamID = Arbeitspaket.TeamID AND Arbeitspaket.ArbeitspaketID = ToDos.ArbeitspaketID  AND Team.Bezeichnung='" . $teamName["Bezeichnung"] . "' AND Arbeitspaket.ProjektID='" . $project . "' ";
		
		//Zweite Schleife erstellt die Tabelle
		$stringTable .= "<div id=\"".$teamName["Bezeichnung"]."\" class=\"tab-pane fade\"><table><tr> <th>TeamBezeichnung</th> <th>ToDosBezeichnung</th> <th>ToDosStatus</th></tr>";
 
		foreach($pdo -> query($sqlToDosProTeam) as $row){
			
			$stringTable .= "<tr> <td>".$row["TeamBezeichnung"]."</td>";
			$stringTable .= "<td>".$row["ToDosBezeichnung"]."</td>";
			$stringTable .= "<td>".$row["ToDosStatus"]."</td></tr>";
						
		}
		$stringTable .= "</table></div>";

	}
	$stringList .= "</ul>";
	$stringTable .= "</div>";
	

	echo($stringList);
	echo($stringTable);
	
?>
</div>

<!--Container for content-->
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="panel panel-default">
            <!--Sidebar of this tab-->
            <?php include_once "sidebar.html" ?>
        </div>
    </div>
    <div class="col-md-9 col-lg-9">
        <div class="panel panel-default panel-body">
            <!--TODO Content-->
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>