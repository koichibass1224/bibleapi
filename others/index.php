<?php

$curl = curl_init();

$test1="Luke";
$test2=1;
$test3=1;

curl_setopt_array($curl, [
	CURLOPT_URL => "https://ajith-holy-bible.p.rapidapi.com/GetVerseOfaChapter?Book=$test1&chapter=$test2&Verse=$test3",
	// CURLOPT_URL => "https://ajith-holy-bible.p.rapidapi.com/GetVerseOfaChapter?Book=Luke&chapter=1&Verse=2",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: ajith-holy-bible.p.rapidapi.com",
		"x-rapidapi-key: 4bedbd7b94msh1384e18d8994e18p1c1a09jsna28f130dd596"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

// $data = json_decode($response);

// $mojibake_kaishou = json_encode(json_decode($response), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
  // echo '{"Book":'.$data->Book.',"Output":'.$data->Output.',';
    // echo $mojibake_kaishou ;
}