<?php
session_start ();
if (! isset ( $_SESSION ['userid'] )) {
    //TODO Auf bootstrap anpassen
    die('  
   header("Location:../account/login.php");
	');
}
$userid = $_SESSION ['userid'];
?>