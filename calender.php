<?php
$file = "data.json";
$json = file_get_contents($file); //指定したファイルの要素をすべて取得する
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json);
$arr2 = json_decode($json ,true);

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
// srand(strtotime(date("Y-m-d H:00:00", time())));
// srand(strtotime(date("Y-m-d h:m:s", time())));
$number = rand(0, $count - 1);//random
$jp2 = $jp[$number];//jp

$title = $arr->$jp2->jp;

//chapter
$test = $arr->$jp2->chapter;
$number2 = rand(0, $test - 1);

//verse
$test = $arr->$jp2->chapter;
$number3 = rand(0, $test - 1);

echo $title.':'.$number2.'章'.$number3;


date_default_timezone_set('Asia/Tokyo');

if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // 今月の年月を表示
    $ym = date('Y-m');
    // $ym = '2021-12';
}

$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// 今日の日付 フォーマット　例）2021-06-3
$today = date('Y-m-j');

// カレンダーのタイトルを作成　例）2021年6月
$html_title = date('Y年n月', $timestamp);

// 前月・次月の年月を取得：mktimeを使う mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

// 該当月の日数を取得
$day_count = date('t', $timestamp);

// １日が何曜日か　0:日 1:月 2:火 ... 6:土　mktimeを使う
$youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));


// $thismonth = date('Y年,m月,');
$thismonth = date($ym.'月');
$thisdate = date('j');


// カレンダー作成の準備
$weeks = [];
$week = '';

// 第１週目：空のセルを追加
// 例）１日が火曜日だった場合、日・月曜日の２つ分の空セルを追加する
$week .= str_repeat('<td></td>', $youbi);

$d = 0;
$dd = 1;

// foreach ( $day = 1; $day <= $thisdate; $day++) {
  $fruit = array(); //配列の初期化
  $i = 0; //カウントの初期化
  foreach( $field as $value ){
    $apple = 'りんご';
    $fruit[$i] = array(
      'name'=>$apple, //連想配列（キーを指定してセットする）
    );
    $i++; // カウントを1増やす
  }
  foreach($fruit as $value){
    echo $value['name'];}

  $count = count($jp);
  srand(strtotime(date("Y-m-d", time())));
  $number = rand(0, $count - 1);//random
  $jp2 = $jp[$number];//jp

  $title = $arr->$jp2->jp;

  //chapter
  $test = $arr->$jp2->chapter;
  $number2 = rand(0, $test - 1);

  //verse
  $test = $arr->$jp2->chapter;
  $number3 = rand(0, $test - 1);
  $cal = $title.':'.$number2.'章'.$number3;

  array_push($data, $cal);
  // echo $data[1];
//   }


for ( $day = 1; $day <= $day_count; $day++, $youbi++) {


    // 2021-06-3
    $date = $ym . '-' . $day;

    if ($today == $date) {

    } else {
      
        if ($day <= $thisdate) {
        $week .= '<td>'.'<a href="blog_standard.php?id='.$dd++.'">' .$day ;
        // $week .= '</br>'.mb_strimwidth($data[$d++], 0, 12, "...");

        $data= array();

          // for ( $day = 1; $day <= $thisdate; $day++) {

          // $count = count($jp);
          // srand(strtotime(date("Y-m-d", time())));
          // $number = rand(0, $count - 1);//random
          // $jp2 = $jp[$number];//jp

          // $title = $arr->$jp2->jp;

          // //chapter
          // $test = $arr->$jp2->chapter;
          // $number2 = rand(0, $test - 1);

          // //verse
          // $test = $arr->$jp2->chapter;
          // $number3 = rand(0, $test - 1);
          // $cal = $title.':'.$number2.'章'.$number3;

          // array_push($data, $cal);
          // }


        $week .=$data [$dd++];
        $week .= '</a>';
        $week .= '</td>';
        }else{
            $week .= '<td>'.$day;
            $week .= '</td>';  
        }
    }

    // 週終わり、または、月終わりの場合
    if ($youbi % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // 月の最終日の場合、空セルを追加
            // 例）最終日が水曜日の場合、木・金・土曜日の空セルを追加
            $week .= str_repeat('<td></td>', 6 - $youbi % 7);
        }

        // weeks配列にtrと$weekを追加する
        $weeks[] = '<tr>' . $week . '</tr>';

        // weekをリセット
        $week = '';
    }
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="New life Falmily Church _ Christmas event 2021/December">

    <title>Calender</title>
</head>


<header>
</header>


<div id="wrapper" class="wrapper clearfix">

<section>
                    <div class="container">
                        <h3>Calender</h3>
                        <table class="table table-bordered">
                            <tr>
                                <th>日</th>
                                <th>月</th>
                                <th>火</th>
                                <th>水</th>
                                <th>木</th>
                                <th>金</th>
                                <th>土</th>
                            </tr>
                            <?php
                                foreach ($weeks as $week) {
                                    echo $week;
                                }
                            ?>
                        </table>
                    </div>
</section>
</div>


</body>

</html>
