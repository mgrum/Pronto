<?php
session_start ();
if (! isset ( $_SESSION ['userid'] )) {
	// Link anpassen an die entsprechende Seite
	die ( 'Bitte zuerst einloggen<a href="login.php"> Login </a>' );
}
$userid = $_SESSION ['userid'];

// $cookie_project ="";
// $cookie_role ="";
// $cookie_name ="";
$_SESSION ['project'] = "";

$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc' );
// Statement um die Nummer des Projekts zu holen aus der Übersichtstabelle
$sql = "SELECT Projekt.ProjektID, Projekt.Bezeichnung, Rolle.Bezeichnung AS Rolle FROM (Projekt INNER JOIN BenutzerProjektRolle ON Projekt.ProjektID=BenutzerProjektRolle.ProjektID) 
		INNER JOIN Rolle ON BenutzerProjektRolle.RolleID=Rolle.RolleID";
echo "<table border=\"1\">\n";
foreach ( $pdo->query ( $sql ) as $row ) {
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
?>

<script type="text/javascript">
function setProject(ID){
location.href="Fortschrittsbalken.php?ProjectID="+ID;
}
</script>

