<?php
//https://bible-api-data.herokuapp.com/

$curl = curl_init();

$test1="hosea";
$test2=1;
// $test3=1;

curl_setopt_array($curl, [
	// CURLOPT_URL => "https://bible-api-data.herokuapp.com/api/v1/hosea?chapter_id=1",
	CURLOPT_URL => "https://bible-api-data.herokuapp.com/api/v1/$test1?chapter_id=$test2",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	// CURLOPT_HTTPHEADER => [
	// 	"x-rapidapi-host: ajith-holy-bible.p.rapidapi.com",
	// 	"x-rapidapi-key: 4bedbd7b94msh1384e18d8994e18p1c1a09jsna28f130dd596"
	// ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

$data = json_decode($response);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
	// echo $data;
}