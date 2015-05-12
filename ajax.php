<?php
$link=mysql_connect('localhost','solvit','solvit');
$db=mysql_select_db('solvit',$link);
mysql_set_charset('utf8');

$get=$_GET['streetName'];
$result = mysql_query("SELECT id,buildingNumber FROM building WHERE streetName='$get'",$link);
echo '<option></option>';
while ($myrow = mysql_fetch_array($result)){
echo "<br>";
echo '<option value='.$myrow['id'].'>'.$myrow['buildingNumber'].'</option>';
} 
/////////////////////////////////////////////////
$get=$_GET['id'];
$result = mysql_query("SELECT id,numberEntrance FROM entrance WHERE idBuilding='$get'",$link);
while ($myrow = mysql_fetch_array($result)){
echo "<br>";
echo '<option value='.$myrow['id'].'>'.$myrow['numberEntrance'].'</option>';
} 
?>