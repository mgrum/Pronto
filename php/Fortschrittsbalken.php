<?php
session_start ();
if (! isset ( $_SESSION ['userid'] )) {
	// Link anpassen an die entsprechende Seite
	die ( 'Bitte zuerst einloggen<a href="login.php"> Login </a>' );
} else {
	$userid = $_SESSION ['userid'];
}
$_SESSION ['project'] = $_GET ["ProjectID"];
$projectID = $_SESSION ['project'];
echo $_SESSION ['project'];

$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc' );
// Statement einfügen für Gesamt
$gesamt = 0;
$statementG = $pdo->prepare ( "SELECT ToDos.ToDosID FROM (Projekt INNER JOIN Arbeitspaket ON Projekt.ProjektID=Arbeitspaket.ProjektID)
		INNER JOIN ToDos ON Arbeitspaket.ArbeitspaketID=ToDos.ArbeitspaketID WHERE Projekt.ProjektID=:parameterID" );
$statementG->bindParam ( ':parameterID', $projectID, PDO::PARAM_INT );
$statementG->execute ();
while ( $row = $statementG->fetch () ) {
	$allResults [] = $row;
	$gesamt = $gesamt + 1;
}
// $gesamt = $statementG->fetch();
// Statement einfügen für Fortschritt
$fortschritt = 0;
$statementF = $pdo->prepare ( "SELECT ToDos.ToDosID FROM (Projekt INNER JOIN Arbeitspaket ON Projekt.ProjektID=Arbeitspaket.ProjektID)
		INNER JOIN ToDos ON Arbeitspaket.ArbeitspaketID=ToDos.ArbeitspaketID WHERE Projekt.ProjektID=:parameterID AND ToDos.Status='geschlossen' " );
$statementF->bindParam ( ':parameterID', $projectID, PDO::PARAM_INT );
$statementF->execute ();
while ( $row = $statementF->fetch () ) {
	$allResults [] = $row;
	$fortschritt = $fortschritt + 1;
}
// $fortschritt = $statementF->fetch();
$pdo = null;
?>

<!DOCTYPE html>
<html>
<body>

	<div id="progressBar" style="width: 500px; border: 1px solid #ccc;"></div>
	<div id="information" style=""></div>
<?php
// Looper für den Fortschrittsbalken
for($i = 0; $i <= $fortschritt; $i ++) {
	// Prozent berechnen
	$prozent = intval ( $i / $gesamt * 100 ) . "%";
	
	// javascript für Update
	echo '<script language="javascript">
    document.getElementById("progressBar").innerHTML="<div style=\"width:' . $prozent . ';background-color:#3ADF00;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="' . $i . ' Tasks von ' . $gesamt . ' komplett.";
    </script>';
	
	// buffer für Minimalgröße
	echo str_repeat ( ' ', 1024 * 64 );
	
	flush ();
	// sleep für delay "Animation"
	usleep ( 75000 );
}
?>
</body>
</html>
