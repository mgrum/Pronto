<?php
session_start ();
$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306; dbname=pronto', 'pronto', 'wwi14amc' );
?>
<!DOCTYPE html>
<html>
<head>
<title>Registrierung</title>
</head>
<body>
 
<?php
$showFormular = true; // Variable ob das Registrierungsformular anezeigt werden soll

if (isset ( $_GET ['register'] )) {
	$error = false;
	$email = $_POST ['email'];
	$passwort = $_POST ['passwort'];
	$passwort2 = $_POST ['passwort2'];
	$vorname = $_POST ['vorname'];
	$nachname = $_POST ['nachname'];
	$sollAZ = $_POST ['sollAZ'];
	
	if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
		echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
		$error = true;
	}
	if (strlen ( $passwort ) < 1) {
		echo 'Bitte ein Passwort angeben<br>';
		$error = true;
	}
	if ($passwort != $passwort2) {
		echo 'Die Passwörter müssen übereinstimmen<br>';
		$error = true;
	}
	
	// Keine Fehler ==> Nutzer registrieren
	if (! $error) {
		$passwort_hash = password_hash ( $passwort, PASSWORD_DEFAULT );
		
		$statement = $pdo->prepare ( "INSERT INTO `Benutzer` (`EMail`, `Vorname`, `Nachname`, `Passwort`, `SOLLArbeitszeit`, `ISTArbeitszeit`) VALUES (:email, :vorname, :nachname, :passwort, :sollAZ, NULL)" );
		
		$result = $statement->execute ( array (
				'email' => $email,
				'vorname' => $vorname,
				'nachname' => $nachname,
				'passwort' => $passwort_hash, 
				'sollAZ' => $sollAZ
		) );
		
		if ($result) {
			echo 'Die Registrierung war erfolgreich!';
			$showFormular = false;
		} else {
			echo 'Beim Registrieren ist leider ein Fehler aufgetreten<br>';
		}
	}
}

if ($showFormular) {
	?>

<div id="formularheader">
		<h2>Geben Sie hier bitte Benutzerdaten an.</h2>

	</div>
	<div id="formular">
		<form action="?register=1" method="post">
			E-Mail:<br> <input type="email" size="40" maxlength="250"
				name="email"><br> <br> Dein Passwort:<br> <input type="password"
				size="40" maxlength="250" name="passwort"><br> Passwort wiederholen:<br>
			<input type="password" size="40" maxlength="250" name="passwort2"><br>
			<br> Nachname: <br> <input type="text" size="40" maxlength="250"
				name="nachname"><br> Vorname: <br> <input type="text" size="40"
				maxlength="250" name="vorname"><br> <br> Soll-Arbeitszeit in h <br>
			<input type="number" size="40" maxlength="250" name="sollAZ"><br> <br>
			<input type="submit" value="Abschicken">
		</form>
	</div>
	<div id="formularheader">
		<p>Achten Sie bitte darauf keine Umlaute zu verwenden.</p>
	</div>
<?php
} // Ende von if($showFormular)
?>
 
</body>
</html>
