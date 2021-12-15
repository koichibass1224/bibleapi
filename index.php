<?php

$file = "data.json";
$json = file_get_contents($file); //指定したファイルの要素をすべて取得する
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json);
$arr2 = json_decode($json ,true);

// $title = $json[0]->jp;
// echo $json[0]->jp;

// $data= array();
// for($i=0;$i<=$i;$i++){
//   array_push($data, $json->book[$i]);
//   echo $json[$i];
// }
// echo $arr->gen->jp;

while ($view == false){

//jp
$jp = [
  'gen','exod','lev','num','deut','josh','judg','ruth'
  ,'1sam','2sam','1kgs','2kgs','1chr','2chr','ezra','neh'
  ,'esth','job','ps','prov','eccl','song','isa','jer'
  ,'lam','dan','ezek','hos','joel','amos','obad','jonah'
  ,'mic','nah','hab','zeph','hag','zech','mal'
  ,'matt','mark','luke','john','acts','rom','1cor','2cor'
  ,'gal','eph','phil','col','1thess','2thess','1tim','2tim'
  ,'titus','phlm','heb','jas','1pet','2pet','1john','2john','3john'
  ,'jude','rev'
];

$count = count($jp);
srand(strtotime(date("Y-m-d", time())));
// srand(strtotime(date("Y-m-d H:i:s", time())));
$number = rand(0, $count - 1);//random
$jp2 = $jp[$number];//jp
// echo $jp2;


// echo $arr->$jp2->jp;
$title = $arr->$jp2->jp;

//chapter
$test = $arr->$jp2->chapter;
$number2 = rand(0, $test - 1);
// echo $number2;


$db_name = 'db/create-table.db';
$view="";

try {
  $db = new SQLite3($db_name);
} catch (Exception $e) {
  print 'DB接続エラー。<br>';
  print $e->getTraceAsString();
}

//verse
$test = $arr->$jp2->chapter;
$number3 = rand(0, $test - 1);
// echo $number3;

//key
$jp3 = ucfirst($jp2);
$key = $jp3.'.'.$number2.'.'.$number3;
// echo $key;
// return
// $key = 'Rev.15.5';

$results = $db->query("SELECT * FROM collo_bible
WHERE key = '$key'
");

while ($res = $results->fetchArray(SQLITE3_ASSOC)) {
    // $view .=  $res["text"];
    // echo $view;
      $view =  $res["text"];
      echo $title.':'.$number2.'章'.$number3.': "'.$view.'"';
}
}

?>
