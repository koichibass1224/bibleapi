<?php
// https://bible-api-data.herokuapp.com

$curl = curl_init();

$test1="genesis";
// $test1="exodus";
// $test1="leviticus";
// $test1="numbers";
// $test1="deuteronomy";
// $test1="joshua";
// $test1="judges";
// $test1="ruth";
$test2=mt_rand(1, 3);;
$test3=mt_rand(1, 3);;

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
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: ajith-holy-bible.p.rapidapi.com",
		"x-rapidapi-key: 4bedbd7b94msh1384e18d8994e18p1c1a09jsna28f130dd596"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

// //Uniodeエスケープを元に戻す(ログ出力用)
// $unicode_decode_json = json_encode(json_decode($response), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
// //Uniodeエスケープを元に戻し、配列に変換する（返り値用）
// $unicode_decode_array = json_decode(json_encode(json_decode($response), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));

// $mojibake_kaishou = json_encode(json_decode($response), JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

$ad = json_decode($response);
// $ad2 = $ad->response[0]->content;
$ad2 = $ad->response[$test3]->content;

$mojibake_kaishou = json_encode($ad2, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    echo $mojibake_kaishou;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- <link href="style.css" rel="stylesheet"> -->
	<link href="style2.css" rel="stylesheet">

</head>
<body >

    <div class="loader-wrap">
      <div class="loader">Loading...</div>
    </div>
	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
      $(function(){
        var loader = $('.loader-wrap');

        //ページの読み込みが完了したらアニメーションを非表示
        $(window).on('load',function(){
          loader.fadeOut();
        });

        //ページの読み込みが完了してなくても3秒後にアニメーションを非表示にする
        setTimeout(function(){
          loader.fadeOut();
        },3000);
      });
</script>

</body>
</html>