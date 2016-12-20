

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<?php
$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306;dbname=pronto','pronto','wwi14amc');


$statement = 'SELECT * FROM Arbeitspaket';

$rs = $pdo -> query($statement);


echo"
		
<table>
	<tr> <th>Nummer</th> <th>Aufgabe</th> <th>BC</th> <th>RC</th> <th>WC</th> </tr>

	";
 
while($row = $rs -> fetch()){
	echo "<tr> <td>".$row["Nummer"]."</td>";
	echo "<td>".$row["Aufgabe"]."</td>";
	echo "<td>".$row["BC"]."</td>";
	echo "<td>".$row["RC"]."</td>";
	echo "<td>".$row["WC"]."</td> </tr>";
	
}

echo "</table>";
$pdo = null;
?>
</body>
</html>