<?php
session_start ();
if (! isset ( $_SESSION ['userid'] )) {
	// Link anpassen an die entsprechende Seite
	die ( 'Bitte zuerst einloggen<a href="login.php"> Login </a>' );
} else {
	$userid = $_SESSION ['userid'];
}
$_SESSION ['project'] = $_GET["ProjectID"];
echo $_SESSION ['project'];

$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc' );
// Statement einfügen für Gesamt
$statementG = $pdo->prepare ( "SELECT COUNT(ToDos.ToDosID) FROM (Projekt INNER JOIN Arbeitspaket ON Projekt.ProjektID=Arbeitspaket.ProjektID)
		INNER JOIN ToDos ON Arbeitspaket.ArbeitspaketID=ToDos.ArbeitspaketID WHERE Projekt.ProjektID=:parameterID" );
$statementG->bindParam ( 'parameterID', $_SESSION ['ProjectID'] );
$resultG = $statementG->execute ();
// $gesamt = $resultG->fetch ();
// Statement einfügen für Fortschritt
$statementF = $pdo->prepare ( "SELECT COUNT(ToDos.ToDosID) FROM (Projekt INNER JOIN Arbeitspaket ON Projekt.ProjektID=Arbeitspaket.ProjektID)
		INNER JOIN ToDos ON Arbeitspaket.ArbeitspaketID=ToDos.ArbeitspaketID WHERE Projekt.ProjektID=:parameterID AND ToDos.Status='erledigt' " );
$statementF->bindParam('parameterID', $_SESSION ['ProjectID']);
$resultF = $statementF->execute ();
// $fortschritt = $resultF->fetch ();
$pdo = null;
?>

<!DOCTYPE html>
<html>
<body>

	<div id="progressBar" style="width: 500px; border: 1px solid #ccc;"></div>
	<div id="information" style=""></div>
<?php
// Looper für den Fortschrittsbalken
for($i = -1; $i <= $resultF; $i ++) {
	// Prozent berechnen
	$prozent = intval ( $i / $resultG * 100 ) . "%";
	
	// javascript für Update
	echo '<script language="javascript">
    document.getElementById("progressBar").innerHTML="<div style=\"width:' . $prozent . ';background-color:#3ADF00;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="' . $i . ' Tasks von ' . $resultG . ' komplett.";
    </script>';
	
	// buffer für Minimalgröße
	echo str_repeat ( ' ', 1024 * 64 );
	flush ();
	// sleep für delay "Animation"
	usleep ( 25000 );
}
?>
</body>
</html>
</html>