<!--Description: This page shows a simple list of all workpackages of the current project-->
<!--TODO each workpackage is a link to its overview (overview.php#workpackage=nameOfWorkpackage-->
<!--TODO Modal to add new workpackages (can only be seen by project & team leader-->

<!--HTML-Header-->
<?php include_once "../header.php"?>

<!--Check for Login-->
<?php include_once "../check.php"?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php"?>

<!--Container for content-->
<div class="row">
    <div class="col-md-3 col-lg-3">
		<div class="well">
			<!--Sidebar of this tab-->
            <?php include_once "sidebar.html"?>
        </div>
	</div>
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<div class="well">
			<!--TODO Content-->
			<?php
            <
            div class="col-md-3 col-lg-3" >
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
				<div id=" Workpackages" class="tab-panefade">
					<table class="tabletable-striped">
						<tr>
							<th>ArbeitspaketID</th>
							<th>Bezeichnung</th>
							<th>Teamname</th>
							<th>Link</th>
							
						</tr>
					
				<?php
				foreach ( $pdo->query ( $sqlWorkpackages ) as $row ) {
					
					echo "<tr> <td>" . $row ["ArbeitspaketID"] . "</td>";
					echo "<td>" .$row["Arbeitspaketezeichnung"]. "</td>";
					echo "<td>" . $row ["Teamname"]."</td>";
					echo '<td><a href="overview.php\#workpackage="'.$row["Arbeitspaketezeichnung"].'"> Zum Overview hier klicken</a></td></tr>';
				}
				?>
				
					</table>
				</div>
				
				<?php 
				
				if ($role == "Projektleiter" || $role == "Administrator") {
					?>
							<div>
								<button type="button" name="Arbeitspaket hinzufuegen">Arbeitspaket hinzufuegen</button>
							</div>
					<?php
				}
			}
			?>
						
		</div>
	</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>