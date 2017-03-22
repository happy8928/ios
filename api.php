
<?php
$s = $_GET['s'];
$a='http://search2013.kuwo.cn/r.s?all='.$s.'&ft=music&newsearch=1&itemset=web_2012&client=kt&cluster=0&pn=1&rn=50&rformat=json&hasmkv=1&encoding=utf8';
$file = fopen($a,"r");
$content = stream_get_contents($file, 1024 * 1024);
$content = ereg_replace("'","\"",$content);

$sj = json_decode($content,true);
//print_r()

//$j=json_decode($content,true);
//print_r($j);
// for ($i=0; $i < count($j["abslist"]); $i++) { 
// 	echo $j["abslist"][$i]["MVPIC"].',';
// }

$data = array(
  'rand' => $_GET['random'],
  'msg' => 'Success',
  'data' => $sj,
);
echo $_GET['callback'].'('.json_encode($data).')';
?>


