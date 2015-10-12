<?php
	require_once ("functions.php");
	
	
	//Kuulan kasutajat, kas ta tahab kustutada
	//?delete= on aadressi real
	if(isset($_GET["delete"])) {
		//saadan kustutatava auto id
		deleteCarData($_GET["delete"]);
		
		
	}
	if(isset($_GET["update"])) {
		//autoid, auto nr, auto värv
		updateCarData($_GET["car_id"], $_GET["number_plate"], $_GET["color"]);
	}
	//kõik autod objektide kujul massiivis
	$car_array = getAllData();

?>

<h1>Tabel</h1>

<table border=1>
<tr>
	<th>ID</th>
	<th>KASUTAJA ID</th>
	<th>NUMBRIMÄRK</th>
	<th>VÄRV</th>
	<th></th>
	<th></th>


<?php

	//autod ükshaaval läbi käia
	for($i = 0; $i < count($car_array); $i++) {
		
		//Kasutaja tahab rida muuta
		if(isset($_GET["edit"]) && $_GET["edit"] == $car_array[$i]->id) {
			echo "<tr>";
			echo "<form action='table.php' method='get'>";
			//input mida valja ei naidata
			echo "<input type='hidden' name='car_id' value='".$car_array[$i]->id."'>";
			echo "<td>".$car_array[$i]->id."</td>";
			echo "<td>".$car_array[$i]->user_id."</td>";
			echo "<td><input name='number_plate' value='".$car_array[$i]->number_plate."'></td>";
			echo "<td><input name='color' value='".$car_array[$i]->color."'></td>";
			echo "<td><a href='table.php'>Cancel</a></td>";
			echo "<td><input name='update' type='submit'</input></td>";
			echo "</form>";
			echo "</tr>";
		}else{
		
		echo "<tr>";
		echo "<td>".$car_array[$i]->id."</td>";
		echo "<td>".$car_array[$i]->user_id."</td>";
		echo "<td>".$car_array[$i]->number_plate."</td>";
		echo "<td>".$car_array[$i]->color."</td>";
		echo "<td><a href='?edit=".$car_array[$i]->id."'>muuda</a></td>";
		echo "<td><a href='?delete=".$car_array[$i]->id."'>x</a></td>";


		echo "</tr>";
		}
	}
?>

</table>