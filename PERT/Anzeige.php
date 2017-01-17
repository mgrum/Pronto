	

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<div>
<?php
$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306;dbname=pronto','pronto','wwi14amc');


$statement = 'SELECT * FROM PERT';

echo"		
<table>
	<tr> <th>Nummer</th> <th>Aufgabe</th> <th>BC</th> <th>RC</th> <th>WC</th> <th>PERT</th></tr>

	";
 
foreach($pdo -> query($statement) as $row){
	echo "<tr> <td>".$row["Nummer"]."</td>";
	echo "<td>".$row["Aufgabe"]."</td>";
	echo "<td>".$row["BC"]."</td>";
	echo "<td>".$row["RC"]."</td>";
	echo "<td>".$row["WC"]."</td>";
	echo "<td>".$row["PERT"]."</td> </tr>"; 
	
}

echo "</table>";

$pdo = null;
?>
</div>
</body>
</html>