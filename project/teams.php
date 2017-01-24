<!--Description: This page shows all teams of the current project-->
<!--TODO Modal to create new teams where you can chose 'email' (must exist) of team leader-->

<!--HTML-Header-->
<?php include_once "../header.php"?>

<!--Check for Login-->
<?php /*include_once "../check.php"*/?>

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
		</div>
	</div>
</div>

<?php 
$_SESSION['role'] = "Projektleiter";

if ($_SESSION['role'] == "Projektleiter" || $_SESSION['role'] == "Administrator"){?>
<div>
	<button type="button" name="Team hinzufuegen">Team hinzufuegen</button>

</div>

<?php

}

$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306;dbname=pronto', 'pronto', 'wwi14amc' );

$statement = "SELECT Teambezeichnung as Team, Arbeitspaketbezeichnung as Arbeitspaket FROM 'Arbeitspakete_pro_Team' Where Teambezeichnung = " . $_SESSION ['ProjectID'];

echo "
<table>
	<tr> <th>Team</th> <th>Arbeitspaket</th> </tr>
	";

foreach ( $pdo->query ( $statement ) as $row ) {
	echo "<tr> <td>" . $row ["Team"] . "</td>";
	echo "<td>" . $row ["Arbeitspaket"] . "</td> </tr>";
}
echo "</table>";

?>


<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>