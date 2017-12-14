<?php

header("Content-Type: application/json");

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	//if(!isset($_POST["test"])){
		//exit;
	//}
		//$result = array();
		//$result["success"] = $_POST["test"];
		//$result["success"] = "You did it!";
		//echo json_encode($result);
		
//}
//else{
	//echo "you shouldn't be here";
//}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
	if(isset($_POST["password"])){
				$result["password"] = $_POST["password"];
				$result["username"] = $_POST["username"];
				$result["email"] = $_POST["email"];
		echo json_encode($result);
	}
	
	//foreach ($_POST as $key => $value)
	 //echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		
	$result["password"] = $_GET["password"];
	echo json_encode($result);
}