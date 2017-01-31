<!--Description: This page shows a list of all projects to switch the current project to (cookie)-->
<!--TODO Modal to add new projects where the creator is project lead-->

<!--HTML-Header-->
<?php include_once "../header.php" ?>

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<!--Container for content-->
<div class="row">
    <?php
    include_once "../database.php";
    if (isset($pdo)) {
        // TODO Content
        
    }
    ?>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>