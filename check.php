<?php
session_start ();
if (! isset ( $_SESSION ['userid'] )) {
    //TODO Auf bootstrap anpassen
    die('  
    <div class="alert alert-warning" role="alert" style="margin-top: 20px">
        <strong>Achtung!</strong> Sie sind nicht angemeldet.
        <a href="../account/login.php" class="alert-link"> Bitte melden Sie sich an</a>.
    </div>    
	');
}
$userid = $_SESSION ['userid'];
?>