<!--If user is logged in forward to:-->
    <!--If current project is set: "project/dashboard.php"-->
    <!--If current project is not set: "project/switch.php"-->
<!--Else forward to "account/login.php"-->

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['userid'])) {
    if (isset($_SESSION['chosenProject'])) {
        header("Location: project/dashboard.php");
    } else {
        header("Location: project/switch.php");
    }
} else {
    header("Location: account/login.php");
}


