<!--Description: This page shows all finished todos of the logged in user for the current project-->

<!--HTML-Header-->
<?php include_once "../header.php" ?>

<!--Check for Login-->
<?php include_once "../check.php" ?>

<!--Include navigation-bar-->
<?php include_once "../navigation.php" ?>

<div tabelle>
<?php
$pdo = new PDO('mysql:host=mgrum.me;port=3306;dbname=pronto','pronto','wwi14amc');
$project = $_SESSION ["chosenProject"];

$sql = "SELECT * FROM ToDos_pro_Projekt WHERE Projekt.Bezeichnung =" . $project . " AND ToDos.Status = 'geschlossen'"; 


echo"		
<table>
	<tr> <th>Bezeichnung</th> <th>Anfangszeitpunkt</th> <th>Endzeitpunkt</th> <th>Dauer</th></tr>
	";
 
foreach($pdo -> query($sql) as $row){
	echo "<tr> <td>".$row["Bezeichnung"]."</td>";
	echo "<td>".$row["Anfangszeitpunkt"]."</td>";
	echo "<td>".$row["Endzeitpunkt"]."</td>";
	echo "<td>".$row["Dauer"]."</td>";

	
}
echo "</table>";
?>
</div>

<!--Container for content-->
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
<?php include_once "../footer.html" ?>