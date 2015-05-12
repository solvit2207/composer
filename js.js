
$(document).ready(function(){
$('#choice').click(function(){
if($('#sel').val()=='city') {
	$('#formCity').toggle();
	$('body').css('background','url(images/city1.jpeg)').css('background-repeat','no-repeat').css('background-size','cover');
	};
if($('#sel').val()=='street'){
	$('#formStreet').toggle();
	$('body').css('background','url(images/str.jpg)').css('background-repeat','no-repeat').css('background-size','cover');
	};
if($('#sel').val()=='building'){
	$('#formBuilding').toggle();
	$('body').css('background','url(images/build.jpg)').css('background-repeat','no-repeat').css('background-size','cover');
	};
if($('#sel').val()=='entrance'){
	$('#formEntrance').toggle();
	$('body').css('background','url(images/entrance.jpg)').css('background-repeat','no-repeat').css('background-size','cover');
	};
if($('#sel').val()=='appartment'){
	$('#formAppartment').toggle();
	$('body').css('background','url(images/app.jpg)').css('background-repeat','no-repeat').css('background-size','cover');
	};
})

//////////////////////////////
$('#selectStr').change(function(){
	var strName=$('#selectStr').val();
	$.get("ajax.php", {streetName:strName},query);
})
function query(streetName){
	($('#buildingNumber').html(streetName));
}
/////////////////////////////////////////////////////
$('#selectStreet').change(function(){
	var strName=$('#selectStreet').val();
	$.get("ajax.php", {streetName:strName},query);
})
function query(streetName){
	($('#buildNumber').html(streetName));
}

////////////////////////////////////////////////////////
$('#buildNumber').change(function(){
	var b=$('#buildNumber').val();
	$.get("ajax.php", {id:b},query1);
})
function query1(id){
	($('#idEntrance').html(id));
}

});