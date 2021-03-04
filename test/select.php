<?php
$pages=isset($_GET['pages'])?(is_numeric($_GET['pages'])?$_GET['pages']:1):1;
$response=$message->getMessage($pages);
$totalPages=(int)$response["totalPages"];
$activepages=(int)$response["activepages"];
$result=$response["result"];
$link="";
echo "<br>";
for($i=1;$i<=$totalPages;$i++){
    $link.="<a href=\"./?pages=$i\" style=\"padding:15px;margin:10px;background:#e3e3e3;\">$i</a>";
}
echo $link;
var_dump($result);
?>