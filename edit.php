<?php
	require_once("edit_functions.php");
	
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