<?php
header("Content-Type: application/json");
require_once("common.php");
require_once("send.php");
$result = array();
if(!isset($_POST["email"]) || $_POST["email"]=="")
	{
		echo "you shouldn't be here";
		$result["error"]="No email was sent.";
		echo json_encode($result);
		die();
	}
	global $db;
	$stmt1 = $db->prepare("SELECT * FROM email Where email = (:email)");
	$stmt1->bindValue(":email", $_POST["email"]);
	$stmt1->execute();
	if($stmt1->fetchColumn()){
		$result["emailExists"] = true;
		echo json_encode($result);
		return;
	};


	$stmt2 = $db->prepare("INSERT INTO email (email) VALUES (:email)");
	$stmt2->bindValue(":email", $_POST["email"]);
	$stmt2->execute();

	sendMail($_POST["email"]);
	$result["emailExists"] = false;
	echo json_encode($result);
	return 0;
	
?>
