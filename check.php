<?php
session_start ();
if (! isset ( $_SESSION ['userid'] )) {
    //TODO Auf bootstrap anpassen
    die('
    <style>
        html, body {
            height: 100%;
        }
    
        .space {
            height: 10%;
        }
    </style>
    <div class="space"></div>
    <div class="container">
        <div class="alert alert-warning" role="alert">
            <strong>Achtung!</strong> Sie sind nicht angemeldet. <a href="/account/login.php" class="alert-link">Bitte melden
            Sie sich an</a>.
        </div>
    </div>
	');
}
$userid = $_SESSION ['userid'];
?>