<?php
// session_start ();
// if (! isset ( $_SESSION ['userid'] )) {
// 	// Link anpassen an die entsprechende Seite
// 	die ( 'Bitte zuerst einloggen<a href="afterLogin.php"> Login </a>' );
// }
// $userid = $_SESSION ['userid'];

// $pdo = new PDO ( 'mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc' );
// // Statement einf�gen f�r Gesamt
// $statementG = $pdo->prepare ( "" );
// $resultG = $statement->execute ();
// $gesamt = $statement->fetch ();
// // Statement einf�gen f�r Fortschritt
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

// Looper f�r den Fortschrittsbalken
for($i = 1; $i <= $resultF; $i ++) {
	// Prozent berechnen
	$prozent = intval ( $i / $resultG * 100 ) . "%";
	
	// javascript f�r Update
	echo '<script language="javascript">
    document.getElementById("progressBar").innerHTML="<div style=\"width:' . $prozent . ';background-color:#3ADF00;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="' . $i . ' Tasks von ' . $resultG .' komplett.";
    </script>';
	
	//buffer f�r Minimalgr��e
	echo str_repeat(' ',1024*64);
	flush();
	//sleep f�r delay "Animation"
	usleep(75000);
}
?>
</body>
</html>