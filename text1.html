<?php require_once('Connections/connSQL.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_connSQL, $connSQL);
$query_RecResult = "SELECT * FROM `result` ORDER BY q_id ASC";
$RecResult = mysql_query($query_RecResult, $connSQL) or die(mysql_error());
$row_RecResult = mysql_fetch_assoc($RecResult);
$totalRows_RecResult = mysql_num_rows($RecResult);

do{
//----- 定義要擷取的網頁地址
$url = "http://cx-media.com/survey/result.php?id=".$row_RecResult['q_id']; 
//----- 讀取網頁源始碼
$fp = file_get_contents($url); 
//----- 印出結果
echo $fp."<br>";
} while($row_RecResult = mysql_fetch_assoc($RecResult));

mysql_free_result($RecResult);
?>

