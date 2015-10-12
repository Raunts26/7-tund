<?php
	require_once("edit_functions.php");
	
	if(isset($_GET["update"])) {
	//autoid, auto nr, auto värv
	updateCarData($_GET["car_id"], $_GET["number_plate"], $_GET["color"]);
	}
	
	//Kas muutuja on aadressireal
	if (isset($_GET["edit_id"])) {
		echo $_GET["edit_id"];
		
		//kysin andmed
		$car = getSingleCarData($_GET["edit_id"]);
		var_dump($car);
	}else{
		
		//Kui muutujat pole
		//Ei ole mõtet siia lehele tulla
		//Suunan tagasi table.php
		header("Location: table.php");
	}
?>

<!-- Salvestamiseks kasutan table.php rida 15, updateCar -->
<form action="edit.php" method="get">
	<input name="car_id" type="hidden" value="<?=$_GET["edit_id"];?>">
	<input name="number_plate" type="text" value="<?=$car->number_plate;?>"><br>
	<input name="color" type="text" value="<?=$car->color;?>"><br>
	<input name="update" type="submit">

</form>



