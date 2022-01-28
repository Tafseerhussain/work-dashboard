<?php 
	
	include '../db/db.php';

	$data = json_decode(file_get_contents("php://input"));
	$request = $data->request;

	if ($request == 1) {
		$email = $data->email;
		$pass = $data->password;
		$query = $conn->query("SELECT * FROM `users` WHERE `email`='$email'");
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_assoc($query);
			$hash = $row['chabi'];
			if (password_verify($pass, $hash)) {
				 session_start();
				 $_SESSION['loggedIn'] = $row;
			    echo '1';
			} else {
			    echo 'Invalid password.';
			}
		} else {
			echo "Email Does Not Exist.";
		}
	}
	if ($request == 2) {
		$query = $conn->query("SELECT * FROM `users` WHERE 1");
		$response = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$response[] = $row;
		}
		echo json_encode($response);
	}

	if ($request == 11) {
		$query = $conn->query("SELECT * FROM `projects` WHERE MONTH(created_at) = MONTH(CURRENT_DATE())");
		$response = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$uid = $row['user_id'];
			$getUser = $conn->query("SELECT * FROM `users` WHERE `id`='$uid'");
			$user = mysqli_fetch_assoc($getUser);
			$name = $user['fName'] ." ". $user['lName'];
			$newDate = date("M-d-Y h:ia", strtotime($row['created_at']));
			array_push($row,$name,$newDate);
			$response[] = $row;
		}
		echo json_encode($response);
	}

	if ($request == 15) {
		$query = $conn->query("SELECT * FROM `projects` WHERE 1");
		$response = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$uid = $row['user_id'];
			$getUser = $conn->query("SELECT * FROM `users` WHERE `id`='$uid'");
			$user = mysqli_fetch_assoc($getUser);
			$name = $user['fName'] ." ". $user['lName'];
			$newDate = date("M-d-Y h:ia", strtotime($row['created_at']));
			array_push($row,$name,$newDate);
			$response[] = $row;
		}
		echo json_encode($response);
	}

	if ($request == 13) {
		$id = $data->id;
		$query = $conn->query("SELECT * FROM `projects` WHERE `id`='$id'");
		$response = mysqli_fetch_assoc($query);
		echo json_encode($response);
	}
	

?>