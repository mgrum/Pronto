<?php
// session_start ();
// if (! isset ( $_SESSION ['userid'] )) {
// 	// Link anpassen an die entsprechende Seite
// 	die ( 'Bitte zuerst einloggen<a href="afterLogin.php"> Login </a>' );
// }
// $userid = $_SESSION ['userid'];

// $pdo = new PDO ( 'mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc' );
// // Statement einfügen für Gesamt
// $statementG = $pdo->prepare ( "" );
// $resultG = $statement->execute ();
// $gesamt = $statement->fetch ();
// // Statement einfügen für Fortschritt
// $statementF = $pdo->prepare ( "" );
// $resultF = $statement->execute ();
// $fortschritt = $statement->fetch ();
?>

<!DOCTYPE html>
<html>
<body>

	<div id="progressBar" style="width: 500px; border: 1px solid #ccc;"></div>
	<div id="information" style="width"></div>
<?php
// zum Testen
$resultG = 200;
$resultF = 100;

// Looper für den Fortschrittsbalken
for($i = 1; $i <= $resultF; $i ++) {
	// Prozent berechnen
	$prozent = intval ( $i / $resultG * 100 ) . "%";
	
	// javascript für Update
	echo '<script language="javascript">
    document.getElementById("progressBar").innerHTML="<div style=\"width:' . $prozent . ';background-color:#3ADF00;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="' . $i . ' Tasks von ' . $resultG .' komplett.";
    </script>';
	
	//buffer für Minimalgröße
	echo str_repeat(' ',1024*64);
	flush();
	//sleep für delay "Animation"
	usleep(75000);
}
?>
</body>
</html>