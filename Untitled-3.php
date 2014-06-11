<?php
$fp = fopen("text1.html","a");

$url = "pdf.php";
//----- 讀取網頁源始碼
$text = file_get_contents($url);
fwrite($fp,$text);
?>