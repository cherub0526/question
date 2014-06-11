<?php require_once('Connections/connSQL.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login_admin.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login_admin.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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
$query_Rectotal = "SELECT COUNT(*) FROM `result`";
$Rectotal = mysql_query($query_Rectotal, $connSQL) or die(mysql_error());
$row_Rectotal = mysql_fetch_assoc($Rectotal);
$totalRows_Rectotal = mysql_num_rows($Rectotal);

require_once('recage.php');
require_once('recedu.php');
require_once('reconline.php');
require_once('recincome.php');
require_once('recpo.php');
require_once('recjoin0.php');
require_once('recjoin1.php');
require_once('recjoin2.php');
require_once('recjoin3.php');
require_once('recjoin4.php');
require_once('recjoin5.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系統統計表</title>
<style type="text/css">
body {
	width: 800px;
	margin-right: auto;
	margin-left: auto;
	background-image: url(images/64.jpg);
}
#table0 {
	margin-right: auto;
	margin-left: auto;
}
#table1 {
}
#title p a {
	text-decoration: none;
}
</style>
</head>

<body>
<div id="title">
<h1 align="center" style="color:#F00"><strong>系統統計表</strong></h1><p align="right"><a href="<?php echo $logoutAction ?>">登出</a></p>
</div>
<div id="content">
<table width="650" border="1" id="table0">
  <tr>
    <td  style="color:#F00">年齡</td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table1" align="center">
      <tr>
    <td width="246">&nbsp;</td>
    <td width="70">人數</td>
    <td width="70">百分比</td>
  </tr>
  <tr>
    <td>15歲以下：</td>
    <td><?php echo $row_RecAge0['COUNT(*)']; ?> 人</td>
    <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecAge0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;?> %</td>
  </tr>
  <tr>
    <td>16~20歲：</td>
    <td><?php echo $row_RecAge1['COUNT(*)']; ?> 人</td>
    <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecAge1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
  </tr>
  <tr>
    <td>21~30歲：</td>
    <td><?php echo $row_RecAge2['COUNT(*)']; ?> 人</td>
    <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecAge2['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
  </tr>
  <tr>
    <td>31~40歲：</td>
    <td><?php echo $row_RecAge3['COUNT(*)']; ?> 人</td>
    <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecAge3['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
  </tr>
  <tr>
    <td>41~45歲：</td>
    <td><?php echo $row_RecAge4['COUNT(*)']; ?> 人</td>
    <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecAge4['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
  </tr>
  <tr>
    <td>46~50歲：</td>
    <td><?php echo $row_RecAge5['COUNT(*)']; ?> 人</td>
    <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecAge5['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
  </tr>
  <tr>
    <td>50歲以上：</td>
    <td><?php echo $row_RecAge6['COUNT(*)']; ?> 人</td>
    <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecAge6['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
  </tr>
</table>
      <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">教育程度</td>
  </tr>
  <tr>
    <td>
        <table width="400" border="0.5" id="table2" align="center">
          <tr>
            <td width="246">&nbsp;</td>
            <td width="70">人數</td>
            <td width="70">百分比</td>
          </tr>
          <tr>
            <td>國小以下：</td>
            <td><?php echo $row_RecEdu0['COUNT(*)']; ?> 人</td>
            <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecEdu0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
          </tr>
          <tr>
            <td>國中：</td>
            <td><?php echo $row_RecEdu1['COUNT(*)']; ?> 人</td>
            <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecEdu1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
          </tr>
          <tr>
            <td>高中：</td>
            <td><?php echo $row_RecEdu2['COUNT(*)']; ?> 人</td>
            <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecEdu2['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
          </tr>
          <tr>
            <td>大學：</td>
            <td><?php echo $row_RecEdu3['COUNT(*)']; ?> 人</td>
            <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecEdu3['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
          </tr>
          <tr>
            <td>碩士：</td>
            <td><?php echo $row_RecEdu4['COUNT(*)']; ?> 人</td>
            <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecEdu4['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
          </tr>
          <tr>
            <td>博士：</td>
            <td><?php echo $row_RecEdu5['COUNT(*)']; ?>人</td>
            <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecEdu5['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
          </tr>
        </table>
        <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">每日上網時間</td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table3" align="center">
      <tr>
        <td width="246">&nbsp;</td>
        <td width="70">人數</td>
        <td width="70">百分比</td>
      </tr>
      <tr>
        <td>1小時以上：</td>
        <td><?php echo  $row_RecOnline0['COUNT(*)']?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo  round(($row_RecOnline0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
      </tr>
      <tr>
        <td>1~2小時：</td>
        <td><?php echo $row_RecOnline1['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo  round(($row_RecOnline1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
      </tr>
      <tr>
        <td>2~3小時：</td>
        <td><?php echo $row_RecOnline2['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo  round(($row_RecOnline2['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
      </tr>
      <tr>
        <td>3~4小時：</td>
        <td><?php echo $row_RecOnline3['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo  round(($row_RecOnline3['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
      </tr>
      <tr>
        <td>4~5小時：</td>
        <td><?php echo $row_RecOnline4['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo  round(($row_RecOnline4['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
      </tr>
      <tr>
        <td>5小時以上：</td>
        <td><?php echo $row_RecOnline5['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo  round(($row_RecOnline5['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
      </tr>
    </table>
      <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">收入</td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table4" align="center">
      <tr>
        <td width="246">&nbsp;</td>
        <td width="70">人數</td>
        <td width="70">百分比</td>
      </tr>
      <tr>
        <td>19,999以上：</td>
        <td><?php echo $row_RecIncome0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecIncome0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      
      <tr>
        <td>20,000~29,999：</td>
        <td><?php echo $row_RecIncome1['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecIncome1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>30,000~39,999：</td>
        <td><?php echo $row_RecIncome2['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecIncome2['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>40,000~49,999：</td>
        <td><?php echo $row_RecIncome3['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecIncome3['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>50,000~59,000：</td>
        <td><?php echo $row_RecIncome4['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecIncome4['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>60,000~69,999：</td>
        <td><?php echo $row_RecIncome5['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecIncome5['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>70,000以上：</td>
        <td><?php echo $row_RecIncome6['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecIncome6['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      </table>
      <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">發文</td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table5" align="center">
      <tr>
        <td width="246">&nbsp;</td>
        <td width="70">人數</td>
        <td width="70">百分比</td>
      </tr>
      <tr>
        <td>只看不PO：</td>
        <td><?php echo $row_RecPo0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecPo0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>偶爾：</td>
        <td><?php echo $row_RecPo1['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecPo1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>經常：</td>
        <td><?php echo $row_RecPo2['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecPo2['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>隨時PO</td>
        <td><?php echo $row_RecPo3['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecPo3['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
    </table>
      <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">如果您發文的資料可以線上授權他人使用，並且收取費用</td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table6" align="center">
      <tr>
        <td width="246">&nbsp;</td>
        <td width="70">人數</td>
        <td width="70">百分比</td>
      </tr>
      <tr>
        <td>有興趣：</td>
        <td><?php echo $row_RecJoin0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>沒有興趣：</td>
        <td><?php echo $row_RecJoin1['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
    </table>
      <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">您曾想過合法轉載或使用網路上的資料嗎？</td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table7" align="center">
      <tr>
        <td width="246">&nbsp;</td>
        <td width="70">人數</td>
        <td width="70">百分比</td>
      </tr>
      <tr>
        <td>是：</td>
        <td><?php echo $row_RecJoin1_0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin1_0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>否：</td>
        <td><?php echo $row_RecJoin1_1['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin1_1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
    </table>
      <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">如果可以在瀏覽網頁時，對有興趣的圖片、文章......等，即時取得授權，您會在業面上申請授權嗎？ </td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table8" align="center">
      <tr>
        <td width="246">&nbsp;</td>
        <td width="70">人數</td>
        <td width="70">百分比</td>
      </tr>
      <tr>
        <td>是：</td>
        <td><?php echo $row_RecJoin2_0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin2_0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>否：</td>
        <td><?php echo $row_RecJoin2_1['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin2_1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
    </table>
      <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">您希望有的授權模式。</td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table9" align="center">
      <tr>
        <td width="246">&nbsp;</td>
        <td width="70">人數</td>
        <td width="70">百分比</td>
      </tr>
      <tr>
        <td>個人使用分商業用途</td>
        <td><?php echo $row_RecJoin3_0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin3_0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>個人使用包含商業用途</td>
        <td><?php echo $row_RecJoin3_1['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin3_1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>學術使用</td>
        <td><?php echo $row_RecJoin3_2['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin3_2['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>商業使用且限定範圍</td>
        <td><?php echo $row_RecJoin3_3['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin3_3['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>商業使用且不限定範圍</td>
        <td><?php echo $row_RecJoin3_4['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin3_4['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
    </table>
      <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">承上題，您希望授權的費用在哪個範圍？(可複選) </td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table10" align="center">
      <tr>
        <td width="246">&nbsp;</td>
        <td width="70">人數</td>
        <td width="70">百分比</td>
      </tr>
      <tr>
        <td>1~100元</td>
        <td><?php echo $row_RecJoin4_0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin4_0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>100~500元</td>
        <td><?php echo $row_RecJoin4_1['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin4_1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>500~1000元</td>
        <td><?php echo $row_RecJoin4_2['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin4_2['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>1000~3000元</td>
        <td><?php echo $row_RecJoin4_3['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin4_3['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>3000~5000元</td>
        <td><?php echo $row_RecJoin4_4['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin4_4['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>5000~10000元</td>
        <td><?php echo $row_RecJoin4_5['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin4_5['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>10000元以上</td>
        <td><?php echo $row_RecJoin4_6['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin4_6['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
    </table>
      <br /></td>
  </tr>
  <tr>
    <td  style="color:#F00">為保障您的授權交易，您願意將授權交易的物件及內容保存一則 在服務商的平台上嗎？</td>
  </tr>
  <tr>
    <td><table width="400" border="0.5" id="table11" align="center">
      <tr>
        <td width="246">&nbsp;</td>
        <td width="70">人數</td>
        <td width="70">百分比</td>
      </tr>
      <tr>
        <td>是：</td>
        <td><?php echo $row_RecJoin5_0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin5_0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
      <tr>
        <td>否：</td>
        <td><?php echo $row_RecJoin5_1['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin5_1['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
    </table>
      <br /></td>
  </tr>
</table>
</div>

</body>
</html>
<?php
require_once('recfreesql.php');
?>
