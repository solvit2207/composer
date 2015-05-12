<?php
/////////////////////Appartment/////////////////////////////////////////////////////
class Appartment{
var $numberApp;
var $room;
var $flor;
var $square;
var $balcony;
var $person;
var $priceOtoplenie=15;
var $priceAppartment=1.3;
var $priceBalcony=5.2;
var $priceWater=24.2;
var $priceWaterHot=48.5;
var $priceGaz=10.4;
var $allRentApp=0;

function __construct($numberApp, $room, $flor, $squareApp, $balcony, $person){
$this->numberApp=$numberApp;
$this->room=$room;
$this->flor=$flor;
$this->squareApp=$squareApp;
$this->balcony=$balcony;
$this->person=$person;
}
function about(){
echo 'Номер квартиры: '.$this->numberApp.'<br>';
echo 'Количество комнат: '.$this->room.'<br>';
echo 'Этаж: '.$this->flor.'<br>';
echo 'Общая площадь: '.$this->squareApp.'<br>';
echo 'Количество балконов: '.$this->balcony.'<br>';
echo 'Количество жильцов: '.$this->person.'<br>';
}
function appartmentPrice(){
	$sum=($this->squareApp*$this->priceAppartment)+($this->balcony*$this->priceBalcony);
		return $sum;
}
function otoplenie(){
	$sum=$this->squareApp*$this->priceOtoplenie;
		return $sum;
}
function water(){
	$sum=$this->person*$this->priceWater;
		return $sum;
}
function waterHot(){
	$sum=$this->person*$this->priceWaterHot;
		return $sum;
}
function gaz(){
	$sum=$this->person*$this->priceGaz;
		return $sum;
}
function allRent(){
	$all=$this->appartmentPrice()+$this->otoplenie()+$this->water()+$this->waterHot()+$this->gaz();
		$this->allRentApp=$all;
			return $all;
}

}
//				расчет 1 квартиры
/*$app=new Appartment($_POST['numberApp'],$_POST['room'],$_POST['flor'], $_POST['squareApp'],$_POST['balcony'],$_POST['person']);
$app->numberApp=$_POST['numberApp'];
$app->room=$_POST['room'];
$app->flor=$_POST['flor'];
$app->square=$_POST['squareApp'];
$app->balcony=$_POST['balcony'];
$app->person=$_POST['person'];
echo $app->about().'<br>';
echo 'Оплата ЖКС: '.$app->appartmentPrice().' грн<br>';
echo 'Оплата за отопление: '.$app->otoplenie().' грн<br>';
echo 'Оплата за холодную воду: '.$app->water().' грн<br>';
echo 'Оплата за горячую воду: '.$app->waterHot().' грн<br>';
echo 'Оплата за газ: '.$app->gaz().' грн<br>';
echo 'Общая сумма оплаты коммунальных услуг составит: '.$app->allRent().' грн<br>';


echo '<form action="#" method="post"><div>
<input type="hidden" name="numberAppartment" value='.$app->room.'>
<input type="hidden" name="flor" value='.$app->flor.'>
<input type="hidden" name="square" value='.$app->square.'>
<input type="hidden" name="balcony" value='.$app->balcony.'>
<input type="text" name="person"/>
<input type="submit" value="Изменить количество жильцов"/>
</div></form>';
*/
$app1=new Appartment(1,1,1,35,2,3);
$app1->allRent();
$app2=new Appartment(2,2,2,45,2,3);
$app2->allRent();
$app3=new Appartment(3,3,3,65,1,3);
$app3->allRent();
$app4=new Appartment(4,4,1,35,1,1);
$app4->allRent();
$app5=new Appartment(5,5,1,35,1,2);
$app5->allRent();
$app6=new Appartment(6,6,2,35,2,3);
$app6->allRent();
$app7=new Appartment(7,7,3,65,2,2);
$app7->allRent();
$app8=new Appartment(8,8,1,35,1,2);
$app8->allRent();
$app9=new Appartment(9,9,2,45,1,1);
$app9->allRent();
$app10=new Appartment(10,10,1,35,1,2);
$app10->allRent();
////////////////////////////Entrance//////////////////////////////////////////////////////////////////////
class Entrance{
public $numberEntrance=1;
public $quantityApp=20;
public $codeEntrance='123123';
public $allApp=array();

function __construct($n=1){
	$this->numberEntrance=$n;
}
function addApp($a){//добавляет квартиру в конец массива квартир
	$this->allApp[]=$a;
}
function entranceRent(){
$sum=0;
	for($i=0;$i<count($this->allApp); $i++){
		$sum+=($this->allApp[$i]->allRent());
	}
return $sum;
}
public function population(){
	$pop=0;
	for($i=0;$i<count($this->allApp);$i++){
		$pop+=$this->allApp[$i]->person;
	}
	return $pop; 
}
}
$ent=new Entrance;
//$ent->addApp($app);//вызов функции
$ent->addApp($app1);
$ent->addApp($app2);
$ent->addApp($app3);
$ent->addApp($app4);
$ent->addApp($app5);
//echo '<pre>';
//print_r($ent->allApp);
//echo '</pre>';
echo 'Номер подъезда: '.$ent->numberEntrance.'<br>';
echo 'Сумма коммунальных платежей со всех квартир в этом подьезде составляет: '.$ent->entranceRent().' грн.<br>';
$ent1=new Entrance(2);
$ent1->addApp($app6);
$ent1->addApp($app7);
$ent1->addApp($app8);
$ent1->addApp($app9);
$ent1->addApp($app10);
//echo '<pre>';
//print_r($ent1->allApp);
//echo '</pre>';
echo 'Номер подъезда: '.$ent1->numberEntrance.'<br>';
echo 'Сумма коммунальных платежей со всех квартир в этом подьезде составляет: '.$ent1->entranceRent().' грн.<br>';
echo '<br></br>';



//////////////////////////Building///////////////////////////////////////////////////////////////////////
class Building{
public $street;
public $buildingNumber;
public $quantityEntrance=1;
public $florBuilding;
public $quantityBuildingApp;
public $squareBuilding;		//площадь прилегаемой территории
public $rentM;			//оплата за 1 м.к.
public $allEntrance=array();


public function __construct($street, $buildingNumber, $quantityEntrance, $florBuilding, $quantityBuildingApp, $squareBuilding, $rentM){
$this->street=$street;
$this->buildingNumber=$buildingNumber;
$this->quantityEntrance=$quantityEntrance;
$this->florBuilding=$florBuilding;
$this->quantityBuildingApp=$quantityBuildingApp;
$this->squareBuilding=$squareBuilding;
$this->rentM=$rentM;
}

public function electricity(){
	$allSumElect=($this->quantityEntrance+1)*$this->florBuilding*100/1000;//60 Watt
		return $allSumElect;
}
public function rent(){									//плата за землю
	$rent=($this->square*$this->rentM)/$this->$square;
}
public function aboutBuilding(){
echo 'Данный дом расположен на улице: '.$this->street.'<br>';
echo 'Номер дома: '.$this->buildingNumber.'<br>';
echo 'Колличество подъездов: ' .$this->quantityEntrance.'<br>';
echo 'Колличество этажей: ' .$this->florBuilding.'<br>';
echo 'Колличество квартир: ' .$this->quantityBuildingApp.'<br>';
echo 'Общая площадь прилегаемой територии: ' .$this->squareBuilding.' кв.м<br>';
echo 'Налог на землю сосатвляет: '.$this->rentM.' грн/кв.м.<br>';
}
public function rentLand(){
	$land=$this->squareBuilding*$this->rentM;
		return $land;
}
public function addEntrance($ent){
	$this->allEntrance[]=$ent;//добавляем подьезд в массив
}
public function rentBuilding(){
	$sum=0;
		for($i=0;$i<count($this->allEntrance);$i++){
			$sum+=$this->allEntrance[$i]->entranceRent();	
		}
	return $sum;
}
public function population(){
	$pop=0;
	for($i=0;$i<count($this->allEntrance);$i++){
		$pop+=$this->allEntrance[$i]->population();
	}
	return $pop; 
}
}

$b1=new Building("Сумская", 1, 2, 7, 14, 1200, 5);
$b2=new Building("Сумская", 3, 2, 3, 9, 1500, 4);
$b3=new Building("Сумская", 5, 2, 5, 7, 1000, 4.5);
$b11=new Building("Шевченко", 2, 2, 7, 14, 1700, 7);
$b21=new Building("Шевченко", 4, 3, 3, 12, 2500, 6);
$b31=new Building("Шевченко", 6, 2, 5, 8, 1300, 5.5);
$b41=new Building("Шевченко", 6, 2, 5, 8, 1700, 5.5);
$b51=new Building("Шевченко", 6, 2, 5, 8, 1300, 5.5);
$b12=new Building("Киевсая", 1, 2, 7, 11, 1400, 7);
$b22=new Building("Киевсая", 3, 4, 3, 9, 1800, 5);
$b32=new Building("Киевсая", 5, 3, 5, 7, 2100, 6.5);
$b42=new Building("Киевсая", 5, 3, 5, 7, 1300, 6.5);
echo $b1->aboutBuilding();
echo 'Размер налога на землю составит: '.$b1->rentLand().' грн.<br>';
echo 'Объем потребляемого электричества (места общественного пользования) сотавляет: '.$b1->electricity().' КВт/час<br>';
$b1->addEntrance($ent);
$b1->addEntrance($ent1);
echo 'Общая сумма коммунальных платежей по данному дому составляет: '.$b1->rentBuilding().' грн.<br>';
echo '<br></br>';




///////////////////////Street////////////////////////////////////////////////////////////////////////
class Street extends Building{
public $nameStreet;
public $lengthStreet;
public $quantityJanitor=1;// 1 men for 1000 sq.m
public $startStreet;
public $finishStreet;
public $allBuilding=array();

public function __construct($nameStreet, $lengthStree, $startStreet, $finishStreet){
$this->nameStreet=$nameStreet;
$this->lengthStree=$lengthStree;
$this->startStreet=$startStreet;
$this->finishStreet=$finishStreet;
}
public function about(){
echo 'Название данной улицы: '.$this->nameStreet.'<br>';
echo 'Протяженность улицы '.$this->nameStreet.' составляет '.$this->lengthStree.' км.<br>';
echo 'Колличество домов на данной улице - '.count($this->allBuilding).'<br>';
echo 'Координаты начала улицы: '.$this->startStreet.'<br>';
echo 'Координаты конца улицы: '.$this->finishStreet.'<br>';
}
public function addBuilding($b){
	$this->allBuilding[]=$b;
}
public function rentAll(){
	$sum=0;
		for($i=0;$i<count($this->allBuilding);$i++){
			$sum+=$this->allBuilding[$i]->rentBuilding();	
		}
	return $sum;
}
public function janitor(){
	$square=0;
		for($i=0;$i<count($this->allBuilding);$i++){
			$square+=$this->allBuilding[$i]->squareBuilding;	
		}
	$janitor=ceil($square/1000);
	return $janitor;
}
public function population(){
	$pop=0;
	for($i=0;$i<count($this->allBuilding);$i++){
		$pop+=$this->allBuilding[$i]->population();
	}
	return $pop; 
}
}

$str=new Street("Сумская", 17, 154.23, 148.24);
$str->addBuilding($b1);
echo $str->about();
echo 'Общая сумма коммунальных платежей составляет: '.$str->rentAll().' грн.<br>';
echo 'Для уборки придомовой територии необходимо '.$str->janitor().' человека.<br><br>';


$str1=new Street("Шевченко", 22, 151.33, 185.24);
$str1->addBuilding($b11);
			$app11=new Appartment(1,1,1,35,2,3);
			$app11->allRent();
			$app12=new Appartment(2,2,2,45,2,4);
			$app12->allRent();
			$app13=new Appartment(3,3,3,65,1,2);
			$app13->allRent();
			$app14=new Appartment(4,4,1,35,1,3);
			$app14->allRent();
			$app15=new Appartment(5,5,1,35,1,2);
			$app15->allRent();
			$app16=new Appartment(6,6,2,35,2,4);
			$app16->allRent();
			$app17=new Appartment(7,7,3,65,2,3);
			$app17->allRent();
			$app18=new Appartment(8,8,1,35,1,1);
			$app18->allRent();
			$app19=new Appartment(9,9,2,45,1,1);
			$app19->allRent();
			$app110=new Appartment(10,10,1,35,1,2);
			$app110->allRent();
					$ent11=new Entrance;
					$ent->addApp($app11);
					$ent->addApp($app12);
					$ent->addApp($app13);
					$ent->addApp($app14);
					$ent->addApp($app15);
					$ent111=new Entrance(2);
					$ent1->addApp($app16);
					$ent1->addApp($app17);
					$ent1->addApp($app18);
					$ent1->addApp($app19);
					$ent1->addApp($app110);
						$b11->addEntrance($ent);
						$b11->addEntrance($ent1);
$str1->addBuilding($b21);
			$app21=new Appartment(1,1,1,35,2,3);
			$app21->allRent();
			$app22=new Appartment(2,2,2,45,2,3);
			$app22->allRent();
			$app23=new Appartment(3,3,3,65,1,2);
			$app23->allRent();
			$app24=new Appartment(4,4,1,35,1,2);
			$app24->allRent();
			$app25=new Appartment(5,5,1,35,1,2);
			$app25->allRent();
			$app26=new Appartment(6,6,2,35,2,4);
			$app26->allRent();
			$app27=new Appartment(7,7,3,65,2,3);
			$app27->allRent();
			$app28=new Appartment(8,8,1,35,1,3);
			$app28->allRent();
			$app29=new Appartment(9,9,2,45,1,2);
			$app29->allRent();
			$app210=new Appartment(10,10,1,35,1,2);
			$app210->allRent();
					$ent21=new Entrance;
					$ent21->addApp($app21);
					$ent21->addApp($app22);
					$ent21->addApp($app23);
					$ent21->addApp($app24);
					$ent21->addApp($app25);
					$ent211=new Entrance(2);
					$ent211->addApp($app26);
					$ent211->addApp($app27);
					$ent211->addApp($app28);
					$ent211->addApp($app29);
					$ent211->addApp($app210);
						$b21->addEntrance($ent21);
						$b21->addEntrance($ent211);
echo $str1->about();
echo 'Общая сумма коммунальных платежей составляет: '.$str1->rentAll().' грн.<br>';
echo 'Для уборки придомовой територии необходимо '.$str1->janitor().' человека.<br><br>';

$str3=new Street("Киевская", 12, 111.34, 115.23);
$str3->addBuilding($b31);
			$app31=new Appartment(1,1,1,35,2,3);
			$app31->allRent();
			$app32=new Appartment(2,2,2,45,2,3);
			$app32->allRent();
			$app33=new Appartment(3,3,3,65,1,2);
			$app33->allRent();
			$app34=new Appartment(4,4,1,35,1,2);
			$app34->allRent();
			$app35=new Appartment(5,5,1,35,1,2);
			$app35->allRent();
			$app36=new Appartment(6,6,2,35,2,4);
			$app36->allRent();
			$app37=new Appartment(7,7,3,65,2,3);
			$app37->allRent();
			$app38=new Appartment(8,8,1,35,1,3);
			$app38->allRent();
			$app39=new Appartment(9,9,2,45,1,2);
			$app39->allRent();
			$app310=new Appartment(10,10,1,35,1,2);
			$app310->allRent();
					$ent31=new Entrance;
					$ent31->addApp($app31);
					$ent31->addApp($app32);
					$ent31->addApp($app33);
					$ent31->addApp($app34);
					$ent31->addApp($app35);
					$ent311=new Entrance(2);
					$ent311->addApp($app36);
					$ent311->addApp($app37);
					$ent311->addApp($app38);
					$ent311->addApp($app39);
					$ent311->addApp($app310);
						$b31->addEntrance($ent31);
						$b31->addEntrance($ent311);
echo $str3->about();
echo 'Общая сумма коммунальных платежей составляет: '.$str3->rentAll().' грн.<br>';
echo 'Для уборки придомовой територии необходимо '.$str3->janitor().' человека.<br><br><br><br>';


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
}
$city= new City('Харьков', 1964, 125.2354, "Харьковской");
$city->addStreet($str);
$city->addStreet($str1);
$city->addStreet($str3);
echo $city->about();
echo $city->population();

























?>