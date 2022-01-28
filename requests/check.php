
<?php 
	
	http_response_code(404);
	include('404.php');
	die();

	// include '../db/db.php';

	// $query = $conn->query("SELECT * FROM `projects` WHERE 1");
	// $response = array();
	// while ($row = mysqli_fetch_assoc($query)) {
	// 	$uid = $row['user_id'];
	// 	$getUser = $conn->query("SELECT * FROM `users` WHERE `id`='$uid'");
	// 	$user = mysqli_fetch_assoc($getUser);
	// 	$name = $user['fName'] ." ". $user['lName'];
	// 	$newDate = date("M-d-Y h:ia", strtotime($row['created_at']));
	// 	array_push($row,$name,$newDate);
	// 	$response[] = $row;

	// }
	// echo json_encode($response);
	
	
?>