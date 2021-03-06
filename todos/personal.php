<!--Description: This page shows all open todos for the logged in user of the current project-->
<!--TODO Button for each todo -  'finish todo'-->

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
                //Solange cookie noch nicht vollstaendig: $email = $_SESSION ["email"] = "da.schneider100@gmx.de;
                $email = $_SESSION ["userid"];
        
                $sql = "SELECT Bezeichnung, Status FROM ToDos_pro_Benutzer WHERE Status != 'geschlossen' AND Email='" . $email . "'";
        
                echo "<table class=\"table table-striped\"> <tr> <th>Bezeichnung</th> <th>Status</th> </tr>";
        
                foreach ($pdo->query($sql) as $row) {
                    echo "<tr> <td>" . $row["Bezeichnung"] . "</td>";
                    echo "<td>" . $row["Status"] . "</td></tr>";
            
                }
                echo "</table>";
            }
            ?>
        </div>
    </div>
</div>

<!--Footer (Closing body and html)-->
<?php include_once "../footer.html" ?>