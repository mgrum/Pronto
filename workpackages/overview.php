<!--Description: This page shows basic information for a single workpackage of the current project (# in URL)-->

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--HTML-Header-->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Arbeitspaketübersicht</title>
</head>
<body>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<!--Container for content-->
<div class="row">
    <div class="well">
        <!--TODO name of the current workpackage-->
    </div>    
</div>
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="well">
            <!--Sidebar of this tab-->
            <?php include_once "sidebar.html" ?>
        </div>
    </div>
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="well">
            <!--TODO Content-->
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.php" ?>