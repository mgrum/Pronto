<!--Description: This page shows the document library of the current project?!-->

<!--HTML-Header-->
<?php include_once "../header.php" ?>

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<!--Container for content-->
<div class="row">
    <div class="col-md-3 col-lg-3">
        <div class="panel panel-default">
            <!--Sidebar of this tab-->
            <?php include_once "sidebar.html" ?>
        </div>
    </div>
    <div class="col-md-9 col-lg-9">
        <div class="panel panel-default panel-body">
            <?php
            include_once "../database.php";
            if (isset($pdo)) {
                // TODO Content
        
            }
            ?>
            <form name="uploadformular" enctype="multipart/form-data" action="dateiupload.php" method="post">
                <input type="file" class="form-control" name="uploaddatei" size="60" maxlength="255">
                <input type="Submit" class="btn btn-primary" name="submit" value="Datei hochladen"
                       style="margin-top: 10px">
            </form>
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>