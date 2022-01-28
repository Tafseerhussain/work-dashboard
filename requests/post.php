<?php 
	
	include '../db/db.php';
	include '../session.php';

	$data = json_decode(file_get_contents("php://input"));
	$request = $data->request;

	if ($request == 12) {
		$id = $_SESSION['loggedIn']['id'];
		$nm = $data->name;
		$pr = $data->price;
		$pl = $data->platform;
		$query = $conn->query("INSERT INTO `projects`(`name`,`user_id`,`price`,`platform`) VALUES('$nm','$id','$pr','$pl')");
		echo "New Project Added";
	}

	if ($request == 14) {
		$id = $data->id;
		$nm = $data->name;
		$pr = $data->price;
		$pl = $data->platform;
		$query = $conn->query("UPDATE `projects` SET `name`='$nm',`price`='$pr',`platform`='$pl' WHERE `id`='$id'");
		echo "Project Updated";
	}

	if ($request == 17) {
		$id = $data->id;
		$query = $conn->query("DELETE FROM `projects` WHERE `id`='$id'");
		echo "Removed";
	}

?>