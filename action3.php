<?php
$dsn = "mysql:host=localhost;dbname=solvit";
$opt = array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
$DBH = new PDO($dsn, 'solvit', 'solvit', $opt);

$stmt = $DBH->query("SELECT * FROM city");
echo "<h4>Вы находитесь в городе: </h4>";
$row = $stmt->fetch(PDO::FETCH_LAZY);
echo "<form action='action4.php'>";
echo "<div>".$row['nameCity']."</div><input type='submit' name='".$row['nameCity']."' value='Вывести информацию о данном городе'><br>";
echo "</form>";

$stmt = $DBH->query("SELECT streetName FROM street");
echo "<h4>В городе находяться следующие улицы: </h4>";
while($row = $stmt->fetch(PDO::FETCH_LAZY)){
echo "<div>".$row['streetName']."</div><input type='submit' name='".$row['streetName']."' value='Вывести информацию о данной улице'><br>";

}
/*
$stmt = $DBH->query("SELECT * FROM building");
$row = $stmt->fetch(PDO::FETCH_LAZY);
print_r($row);
echo "<br>";

$stmt = $DBH->query("SELECT * FROM apartment");
$row = $stmt->fetch(PDO::FETCH_LAZY);
print_r($row);
*/
?>