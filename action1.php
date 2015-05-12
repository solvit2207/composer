<?php
$link=mysql_connect('localhost','solvit','solvit');
$db=mysql_select_db('solvit',$link);
mysql_set_charset('utf8');
if (!$db) {
    die ('Не удалось выбрать базу solvit: ' . mysql_error());
} else echo "удалось выбрать базу solvit";
if(isset($_POST['city'])){
	$city=mysql_query("INSERT INTO city(nameCity,region,coordinat) VALUES ('".$_POST['city']."','".$_POST['region']."','".$_POST['coordinat']."')");
}
if(isset($_POST['streetName'])){
	$street=mysql_query("INSERT INTO street(streetName,length,startCoordinat,finishCoordinat) VALUES ('".$_POST['streetName']."','".$_POST['length']."','".$_POST['startCoordinat']."','".$_POST['finishCoordinat']."')");
	
}

if(isset($_POST['rentM'])){
	$building=mysql_query("INSERT INTO building(streetName,buildingNumber,squareBuilding,quantityEntrance,quantityBuildingApp,florBuilding,rentM) VALUES('".$_POST['selectStr']."','".$_POST['buildingNumber']."','".$_POST['squareBuilding']."','".$_POST['quantityEntrance']."','".$_POST['quantityApp']."','".$_POST['florBuilding']."','".$_POST['rentM']."')") or die (mysql_error());
	echo "ok";
}// else echo "<br>Запись не добавлена<br>";

//$a=mysql_query('show tables');
//while($r=mysql_fetch_row($a)){
 //echo $r[0]."<br>";}

//echo $_GET['streetName'];

if(isset($_POST['numberEntrance'])){
	$building=mysql_query("INSERT INTO entrance(idBuilding,numberEntrance,quantityApp,codeEntrance) VALUES('".$_POST['buildingNumber']."','".$_POST['numberEntrance']."','".$_POST['quantityApp']."','".$_POST['codeEntrance']."')")
 or die(mysql_error());
	}

if(isset($_POST['numberApp'])){
	$building=mysql_query("INSERT INTO apartment(idBuilding,idEntrance,numberApp,room,flor,squareApp,balcony,person) VALUES('".$_POST['idBuilding']."','".$_POST['idEntrance']."','".$_POST['numberApp']."','".$_POST['room']."','".$_POST['flor']."','".$_POST['squareApp']."','".$_POST['balcony']."','".$_POST['person']."')") or die(mysql_error());
}

//print_r("<br>".$_POST);







?>