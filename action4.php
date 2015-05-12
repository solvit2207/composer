<?php
require "action.php";
$dsn = "mysql:host=localhost;dbname=solvit";
$opt = array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
$DBH = new PDO($dsn, 'solvit', 'solvit', $opt);

$stmt = $DBH->query("SELECT * FROM city");
//echo "<h4>Вы находитесь в городе: </h4>";
$row = $stmt->fetch(PDO::FETCH_LAZY);
//echo "<form action='action4.php'>";
echo "<div>Название города: ".$row['nameCity']."</div><br>";
echo "<div>Регион/область: ".$row['region']."</div><br>";
echo "<div>Географические координаты центра города: ".$row['coordinat']."</div><br>";
//echo "</form>";
/*
class city{
public $name;
public $year;
public $coordinates;
public $region;
public $allStreet=array();
 
public function __construct($name, $year, $coordinates, $region){
$this->name=$name;
$this->year=$year;
$this->coordinates=$coordinates;
$this->region=$region;
}
public function about(){
echo 'Название города: '.$this->name.'<br>';
echo 'Год основания : '.$this->year.' год<br>';
echo 'Географические координаты: '.$this->coordinates.'<br>';
echo 'Данный город находится в '.$this->region.' области<br>';
}
public function addStreet($str){
	$this->allStreet[]=$str;
}
public function population(){
	$pop=0;
	for($i=0;$i<count($this->allStreet);$i++){
		$pop+=$this->allStreet[$i]->population();
	}
	return $pop; 
}
}*/
$city= new City($row['nameCity'],1964, $row['coordinat'], $row['region']);
$city->addStreet($str);
$city->addStreet($str1);
$city->addStreet($str3);
echo $city->about();
//////////////////////////////////////////////////////////////////////////////////

?>