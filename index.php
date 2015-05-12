<!DOCTYPE>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>title</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<script type='text/javascript' src='jquery.js'></script>
	<script type='text/javascript' src='js.js'></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<?$link=mysql_connect('localhost','solvit','solvit');
		$db=mysql_select_db('solvit',$link);
		mysql_set_charset('utf8');?>
</head>


<body>
	<div><a href ='action3.php'><h2><b>Просмотреть информацию о городе</b></h2></a></div>
	<div><h1>Создание обьекта</h1></div>
	<div><h2>Выберите обьект из списка</h2>
		<select id='sel'>
			<option></option>
			<option value='city'>Город</option>
			<option value='street'>Улица</option>
			<option value='building'>Дом</option>
			<option value='entrance'>Подьезд</option>
			<option value='appartment'>Квартира</option>
		</select>
		<input id='choice' type='button' name='choice' value='Создать'>
	</div>
	<div class='choice'>
		<form id='formCity' class='form' hidden action='action1.php' method='post'>
			<div><h1>Введите данные о городе</h1></div>
			<div class='left'>Название города</div><div><input type='text' name='city' value=''/></div><br>
			<div class='left'>Регион страны</div><div><input type='text' name='region'></div><br />
			<div class='left'>Географические координаты города</div><div><input type='text' name='coordinat'></div><br>
			<input class='create' type='submit' name='create' value='Создать'>
		</form>
	</div>
	<div>
		<form id='formStreet' class='form' hidden action='action1.php' method='post'>
			<div><h1>Введите данные об улице</h1></div>
			<div class='left'>Название улицы</div><div><input type='text' name='streetName' value=''></div><br>
			<div class='left'>Протяженность улицы</div><div><input type='text' name='length'></div><br>
			<div class='left'>Географические координаты начала улицы</div><div><input type='text' name='startCoordinat'></div><br>
			<div class='left'>Географические координаты конца улицы</div><div><input type='text' name='finishCoordinat'></div><br>
			<input class='create' type='submit' name='create' value='Создать'>
		</form>
	</div>
	<div>
		<form id='formBuilding' class='form' hidden action='action1.php' method='post'>
			<div><h1>Введите данные о доме</h1></div>
			<div class='left'>Название улицы</div>
				<select name='selectStr'>
					<?
						$result = mysql_query("SELECT streetName FROM street",$link);
						echo '<option></option>';
						while ($myrow = mysql_fetch_array($result)){
						echo "<br>";
						echo '<option value='.$myrow['streetName'].'>'.$myrow['streetName'].'</option>';
						} 
					?>
				</select><br><br>
			<div class='left'>Номер дома</div>
				<div>
					<input name='buildingNumber'>
				</div><br>
			<div class='left'>Площадь прилегающей территории</div><div><input type='text' name='squareBuilding'></div><br>
			<div class='left'>Колличество подьездов</div><div><input type='text' name='quantityEntrance'></div><br>
			<div class='left'>Колличество квартир</div><div><input type='text' name='quantityApp'></div><br>
			<div class='left'>Колличество этажей</div><div><input type='text' name='florBuilding'></div><br>
			<div class='left'>Налог за 1 кв.м. прилегающей территории</div><div><input type='text' name='rentM'></div><br>
			<input class='create'  type='submit' name='create' value='Создать'>
		</form>
	</div>
	<div>
		<form id='formEntrance' class='form' hidden action='action1.php' method='post'>
			<div><h1>Введите данные о подьезде</h1></div>
			<div class='left'>Название улицы</div>
				<select id='selectStr' name='selectStr'>
					<?
						$result = mysql_query("SELECT streetName FROM street",$link);
						echo '<option></option>';
						while ($myrow = mysql_fetch_array($result)){
						echo "<br>";
						echo '<option value='.$myrow['streetName'].'>'.$myrow['streetName'].'</option>';
						} 
					?>
				</select><br><br>
			<div class='left'>Номер дома</div>
				<div>
					<select id='buildingNumber' name='buildingNumber'>
					</select>
				</div><br>
			<div class='left'>Номер подьезда</div><div><input type='text' name='numberEntrance' value=''></div><br>
			<div class='left'>Колличество квартир</div><div><input type='text' name='quantityApp'></div><br>
			<div class='left'>Код на входной двери</div><div><input type='text' name='codeEntrance'></div><br>
			<input class='create' type='submit' name='create' value='Создать'>
		</form>
	</div>
	<div>
		<form action='action1.php' id='formAppartment' class='form' method='post' hidden>
			<div><h1>Введите данные о квартире</h1></div>
			<div class='left'>Название улицы</div>
				<select id='selectStreet' name='selectStr'>
					<?
						$result = mysql_query("SELECT streetName FROM street",$link);
						echo '<option></option>';
						while ($myrow = mysql_fetch_array($result)){
						echo "<br>";
						echo '<option value='.$myrow['streetName'].'>'.$myrow['streetName'].'</option>';
						} 
					?>
				</select><br><br>
			<div class='left'>Номер дома</div>
				<div>
					<select id='buildNumber' name='idBuilding'>
					</select>
				</div><br>
			<div class='left'>Номер подьезда</div>
				<div>
					<select id='idEntrance' name='idEntrance'>
					</select>
				</div><br>
			<div class='left'>Номер квартиры</div><div><input type='text' name='numberApp' value=''/></div><br />
			<div class='left'>Количество комнат</div><div><input type='text' name='room' /></div><br />
			<div class='left'>Этаж</div><div><input type='text' name='flor' /></div><br />
			<div class='left'>Общая площадь квартиры</div><div><input type='text' name='squareApp' /></div><br />
			<div class='left'>Количество балконов</div><div><input type='text' name='balcony' /></div><br />
			<div class='left'>Количество жильцов</div><div><input type='text' name='person' /></div><br />
			<input class='create' type='submit' name='create' value='Создать'>
		</form>
	</div>
</body>
</html>
