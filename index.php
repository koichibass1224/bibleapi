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
// srand(strtotime(date("Y-m-d", time())));
srand(strtotime(date("Y-m-d H:i:s", time())));
$number = rand(0, $count - 1);//random
$jp2 = $jp[$number];//jp
// echo $jp2;

// echo $arr->$jp2->jp;
$title = $arr->$jp2->jp;

//chapter
$test0 = $arr->$jp2->book;
$test = $arr->$jp2->chapter;
$number2 = rand(1, $test);
// echo $number2.'</br>';
// echo $test0.'</br>';

$db_name = 'db/create-table.db';
$view="";
$db2 = new SQLite3($db_name);

$dsn = 'sqlite:db/create-table.db';
$db = new PDO($dsn);

//verse
$test = $arr->$jp2->chapter;
// $number3 = rand(0, $test);
// echo $number3;

//key
// $jp3 = ucfirst($jp2);
// $jp3 = ucwords($jp2);
// $key = $jp3.'.'.$number2.'.'.$number3;
$key = $test0.'.'.$number2;
echo $key;
// return
// $key = 'Rev.15.5';

$results1 = $db->query("SELECT COUNT(*) FROM collo_bible
WHERE key like '$key%'
");
$status = $results1->execute();
$count1 = $results1->fetchColumn(); 
$number3 = rand(1, $count1 - 1);//random
$key3 = $test0.'.'.$number2.'.'.$number3;
echo '..'.$key3;
// return
// }

$results2 = $db2->query("SELECT * FROM collo_bible
WHERE key = '$key3'
");

while ($res = $results2->fetchArray(SQLITE3_ASSOC)) {
      $view =  $res["text"];
      // echo $title.':'.$number2.'章'.$number3.': "'.$view.'"';
    echo $title.':'.$number2.'章'.$number3.': "'.$view.'"';

}
// }

?>
