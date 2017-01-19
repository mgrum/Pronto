<?php //Set variable "page_title" to right value depending on current page
$page_title = $_SERVER["PHP_SELF"];
if (strpos($page_title, 'account/login.php') !== false) {
    $page_title = "Login";
} else if (strpos($page_title, 'account/register.php') !== false) {
    $page_title = "Registration";
} else if (strpos($page_title, 'project/dashboard.php') !== false) {
    $page_title = "Dashboard";
} else {
    //Default value
    $page_title = "Pronto";
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <?php // Set the actual page title from variable
    echo("<title>$page_title</title>");
    ?>
</head>
<body>
