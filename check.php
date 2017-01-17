<?php
session_start ();
if (! isset ( $_SESSION ['userid'] )) {
	// Link anpassen an die entsprechende Seite
	die ( 'Bitte zuerst einloggen<a href="account/login.html"> Login </a>' );
}
$userid = $_SESSION ['userid'];
?>