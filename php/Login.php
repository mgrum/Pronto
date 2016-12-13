<?php
// Start the session
session_start ();
$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc' );

if (isset ( $_GET ['login'] )) {
	// lokale Variablen aus dem HTML Formular holen
	$email = $_POST ['email'];
	$passwort = $_POST ['passwort'];
	// Abfrage auf die login Datenbank
	$statement = $pdo->prepare ( "SELECT EMail, Passwort FROM Benutzer WHERE EMail = :email" );
	$result = $statement->execute ( array (
			'email' => $email 
	) );
	
	$user = $statement->fetch ();
	// Überprüfung der Login Daten
	if ($user !== false && password_verify ( $passwort, $user ['Passwort'] )) {
		//$_SESSION ['userid'] = $user ['id'];
		die ( "Login war erfolgreich! " );
	} else {
		$errorMsg = "Verbindung konnte nicht hergestellt werden ODER Passwort bzw. NUtzername ist falsch.<br>";
		echo ($errorMsg);
	}
}

?>
<!DOCTYPE html>
<html>
<body>
	<form action="?login=1" method="post">
		E-Mail:<br> <input type="email" size="40" maxlength="250" name="email"><br>
		<br> Dein Passwort:<br> <input type="password" size="40"
			maxlength="250" name="passwort"><br> <input type="submit"
			value="Abschicken">


	</form>
<?php
// Set session variables

//$_SESSION ["username"] = $_POST ['email'];
$_SESSION ["role"] = "";
$_SESSION ["chosenProject"] = "";
echo $_SESSION ["username"];
echo "Session variables are set.";
?>

<p>
		<br /> Sie verf&uuml;gen &uuml;ber kein Benutzerkonto? Dann
		registrieren Sie sich <a href="registrieren.php">hier</a>
	</p>

</body>
</html>
