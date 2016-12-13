
<?php
session_start();
$pdo = new PDO ( 'mysql:host=mgrum.me;port=3306;dbname=pronto','pronto','wwi14amc');


$statement = 'SELECT * FROM Arbeitspaket';

$rs = $pdo -> query($statement);



while($row = $rs -> fetch()){
	echo 'ArbeitspaketID: '.$row['ArbeitspaketID'];
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
</body>
</html>