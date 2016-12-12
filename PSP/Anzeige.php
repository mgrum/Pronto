<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php
$pdo = new PDO('mysql:host=http://mgrum.me/phpmyadmin/;dbname=pronto', 'pronto', 'wwi14amc');

$sql = "SELECT * FROM Projektstrukturplan";
foreach ($pdo->query($sql) as $row) {
   echo $row['arbeitspaketnr']." ".$row['titel']."<br />";
   echo "Beschreibung: ".$row['beschreibung']."<br /><br />";
}
?>
</body>
</html>