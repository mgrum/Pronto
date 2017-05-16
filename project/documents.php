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
                Datei: <input type="file" name="uploaddatei" size="60" maxlength="255">
                <input type="Submit" name="submit" value="Datei hochladen">
            </form>


            *************************************
    
    
            <?php
            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";
            /* hier kommt nun das Formular ? am Ende !! */
            ?>
            <form ?

                  Array
                  (
                  [uploaddatei]=> Array
                (
                [name] => kaffeepause.png
                [type] => image/png
                [tmp_name] => /tmp/phplP3DM3
                [error] => 0
                [size] => 90109
                )
                )
        
                <?php
                echo "<pre>";
                print_r($_FILES);
                echo "</pre>";
                if ($_FILES['uploaddatei']['name'] <> "") {
                    // Datei wurde durch HTML-Formular hochgeladen
                    // und kann nun weiterverarbeitet werden
                }
                /* hier kommt nun das Formular ? am Ende !! */
                ?>
                <form ?

                      move_uploaded_file(
                      $_FILES[
                'uploaddatei']['tmp_name'] ,
                'hochgeladenes/'. $_FILES['uploaddatei']['name']);
        
        
                <?php
                echo "<pre>";
                echo "FILES:<br />";
                print_r($_FILES);
                echo "</pre>";
                if ($_FILES['uploaddatei']['name'] <> "") {
                    // Datei wurde durch HTML-Formular hochgeladen
                    // und kann nun weiterverarbeitet werden
                    move_uploaded_file(
                        $_FILES['uploaddatei']['tmp_name'],
                        'hochgeladenes/' . $_FILES['uploaddatei']['name']);
            
                    echo "<p>Hochladen war erfolgreich: ";
                    echo '<a href="hochgeladenes/' . $_FILES['uploaddatei']['name'] . '">';
                    echo 'hochgeladenes/' . $_FILES['uploaddatei']['name'];
                    echo '</a>';
                }
                ?>

                <form name="uploadformular" enctype="multipart/form-data" action="dateiupload.php" method="post">
                    Datei: <input type="file" name="uploaddatei" size="60" maxlength="255">
                    <input type="Submit" name="submit" value="Datei hochladen">
                </form>
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>