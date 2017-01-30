<?php //Set variable "page_title" to right value depending on current page
$page_title = $_SERVER["PHP_SELF"];
if (strpos($page_title, 'account/login.php') !== false) {
    $page_title = "Login";
} else if (strpos($page_title, 'account/register.php') !== false) {
    $page_title = "Registration";
} else if (strpos($page_title, 'project/dashboard.php') !== false) {
    $page_title = "Dashboard";
} else if (strpos($page_title, 'project/documents.php') !== false) {
    $page_title = "Dokumentbibliothek";
} else if (strpos($page_title, 'project/edit.php') !== false) {
    $page_title = "Projekt bearbeiten...";
} else if (strpos($page_title, 'project/overview.php') !== false) {
    $page_title = "Projektübersicht";
} else if (strpos($page_title, 'project/switch.php') !== false) {
    $page_title = "Projektauswahl";
} else if (strpos($page_title, 'project/teams.php') !== false) {
    $page_title = "Teams";
} else if (strpos($page_title, 'workpackages/ganttchart.php') !== false) {
    $page_title = "Gantt-Chart";
} else if (strpos($page_title, 'workpackages/list.php') !== false) {
    $page_title = "Arbeitspakete";
} else if (strpos($page_title, 'workpackages/networkdiagram.php') !== false) {
    $page_title = "Netzplan";
} else if (strpos($page_title, 'workpackages/overview.php') !== false) {
    $page_title = "Arbeitspaketübersicht";
} else if (strpos($page_title, 'todos/finished.php') !== false) {
    $page_title = "Abgeschlossene ToDo's";
} else if (strpos($page_title, 'todos/personal.php') !== false) {
    $page_title = "Persönliche ToDo's";
} else if (strpos($page_title, 'todos/team.php') !== false) {
    $page_title = "Team ToDo's";
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
    <!-- Bootstrap CSS and JS + jQuery -->
    <link rel="stylesheet" media="screen" href="../resources/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../resources/js/bootstrap.js"></script>
</head>
<body class="container">
