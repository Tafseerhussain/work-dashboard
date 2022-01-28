<?php 

	// $data = json_decode(file_get_contents("php://input"));
	// $trackID = $data->trackID;

	// error_reporting(E_ERROR | E_PARSE);
	$url = 'http://127.0.0.1:8000/api/profile?api_token=606e5a82592fb6195460ad78e15737ae30b079e02063a362afc4df04b5359afd';
	if($response = file_get_contents($url)) {
		echo $response;
	} else {
		echo "0";
	}
	// if ($response) {
	// 	echo $response;
	// } else {
	// 	echo "0";
	// 	exit;
	// }

	// 05398-01-010000001
 ?>