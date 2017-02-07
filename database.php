<?php
try {
    $pdo = new PDO('mysql:host=mgrum.me;port=3306;dbname=pronto', 'pronto', 'wwi14amc');
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '
    <div class="alert alert-danger">
    	<strong>Fehler!</strong> Datenbankverbindung ist fehlgeschlagen.
    </div>
    ';
}
?>