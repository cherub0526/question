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
if (!isset($_SESSION['MM_Username']) && isset($_GET['login']) != "admin"  ) {    
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

require_once('recjoin3.php');
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
<h1 align="center" style="color:#F00"><strong>系統統計表</strong></h1>
	<p align="right">
		<span style="margin-right:10px"><a href="down_three_result.php">下載 年齡、教育、上網時間統計 PDF</a></span>
		<span style="margin-right:10px"><a href="down_admin.php">下載 統計 PDF</a></span>
		<span style="margin-right:10px"><a href="down_pdf.php">下載 詳細問卷 PDF</a></span>
	<span><a href="<?php echo $logoutAction ?>">登出</a></span>
	</p>
</div>
<div id="content"><p align="right" style="color:#F00">總共調查人數 ： <?php echo $row_Rectotal['COUNT(*)']; ?></p>
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
  
<?php
	$array = array('15歲以下：'=> 0 , '16~20歲：' => 1,'21~30歲：' => 2,'31~40歲：'=>3,'41~45歲：' => 4,'46~50歲：' => 5, '50歲以上：' => 6);
	foreach ($array as $key => $value) {  ?>
		<tr><td><?php echo $key ?> </td>
		<?php
			$age_RecAge0 = $value;
			mysql_select_db($database_connSQL, $connSQL);
			$query_RecAge0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_age = %s", GetSQLValueString($age_RecAge0, "int"));
			$RecAge0 = mysql_query($query_RecAge0, $connSQL) or die(mysql_error());
			$row_RecAge0 = mysql_fetch_assoc($RecAge0);
			$totalRows_RecAge0 = mysql_num_rows($RecAge0);
		?>
		<td><?php echo $row_RecAge0['COUNT(*)']; ?> 人</td>
		<td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecAge0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;?> %</td>
		</tr>
<?php	}?>
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
          
<?php
	$array = array('國小以下：'=> 0 , '國中：' => 1,'高中：' => 2,'大學：'=>3,'碩士：' => 4,'博士：' => 5);
	foreach ($array as $key => $value) {  
?>
		<tr><td><?php echo $key ?> </td>
		<?php
			$edu_RecEdu0 = $value;
			mysql_select_db($database_connSQL, $connSQL);
			$query_RecEdu0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_edu = %s", GetSQLValueString($edu_RecEdu0, "int"));
			$RecEdu0 = mysql_query($query_RecEdu0, $connSQL) or die(mysql_error());
			$row_RecEdu0 = mysql_fetch_assoc($RecEdu0);
			$totalRows_RecEdu0 = mysql_num_rows($RecEdu0);
		?>
		<td><?php echo $row_RecEdu0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecEdu0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
        </tr>
<?php	}?>
            
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
      
<?php
	$array = array('1小時以上：'=> 0 , '1~2小時：' => 1,'2~3小時：' => 2,'3~4小時：'=>3,'4~5小時：' => 4,'5小時以上：' => 5);
	foreach ($array as $key => $value) {  ?>
        <tr><td><?php echo $key ?> </td>
<?php 
	$colname_RecOnline0 = $value;
	mysql_select_db($database_connSQL, $connSQL);
	$query_RecOnline0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_onlinetime = %s", GetSQLValueString($colname_RecOnline0, "int"));
	$RecOnline0 = mysql_query($query_RecOnline0, $connSQL) or die(mysql_error());
	$row_RecOnline0 = mysql_fetch_assoc($RecOnline0);
	$totalRows_RecOnline0 = mysql_num_rows($RecOnline0);
?>
        <td><?php echo  $row_RecOnline0['COUNT(*)']?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo  round(($row_RecOnline0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ; ?> %</td>
      </tr>
<?php	}?>
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
      
<?php
	$array = array('19,999以上：'=> 0 , '20,000~29,999：' => 1,'30,000~39,999：' => 2,'40,000~49,999：'=>3,'50,000~59,000：' => 4,'60,000~69,999：' => 5, '70,000以上：' => 6);
	foreach ($array as $key => $value) {  
?>
		<tr><td><?php echo $key ?> </td>
<?php
	$income_RecIncome0 = $value;
	mysql_select_db($database_connSQL, $connSQL);
	$query_RecIncome0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_income = %s", GetSQLValueString($income_RecIncome0, "int"));
	$RecIncome0 = mysql_query($query_RecIncome0, $connSQL) or die(mysql_error());
	$row_RecIncome0 = mysql_fetch_assoc($RecIncome0);
	$totalRows_RecIncome0 = mysql_num_rows($RecIncome0);
?>		
        <td><?php echo $row_RecIncome0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecIncome0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
<?php } ?>      
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
      
<?php
	$array = array('只看不PO：'=> 0 , '偶爾：' => 1,'3經常：' => 2,'經常：'=>3,'隨時PO：' => 4);
	foreach ($array as $key => $value) {  
?>      	
        <tr><td><?php echo $key ?> </td>
<?php
	$colname_RecPo0 = $value;
	mysql_select_db($database_connSQL, $connSQL);
	$query_RecPo0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_po = %s", GetSQLValueString($colname_RecPo0, "int"));
	$RecPo0 = mysql_query($query_RecPo0, $connSQL) or die(mysql_error());
	$row_RecPo0 = mysql_fetch_assoc($RecPo0);
	$totalRows_RecPo0 = mysql_num_rows($RecPo0);
?>
        <td><?php echo $row_RecPo0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecPo0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
<?php } ?>
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
<?php
	$array = array('有興趣：'=> 0 , '沒有興趣：' => 1);
	foreach ($array as $key => $value) {  
?>      	      
      <tr>
        <td><?php echo $key ?> </td>
<?php
	$colname_RecJoin0 = $value;
	mysql_select_db($database_connSQL, $connSQL);
	$query_RecJoin0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join = %s", GetSQLValueString($colname_RecJoin0, "int"));
	$RecJoin0 = mysql_query($query_RecJoin0, $connSQL) or die(mysql_error());
	$row_RecJoin0 = mysql_fetch_assoc($RecJoin0);
	$totalRows_RecJoin0 = mysql_num_rows($RecJoin0);
?>
        <td><?php echo $row_RecJoin0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
<?php } ?>
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
<?php
	$array = array('是：'=> 0 , '否：' => 1);
	foreach ($array as $key => $value) {  
?>  
      <tr>
        <td><?php echo $key ?> </td>
<?php
	$colname_RecJoin1_0 = $value;
	mysql_select_db($database_connSQL, $connSQL);
	$query_RecJoin1_0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_1 = %s", GetSQLValueString($colname_RecJoin1_0, "int"));
	$RecJoin1_0 = mysql_query($query_RecJoin1_0, $connSQL) or die(mysql_error());
	$row_RecJoin1_0 = mysql_fetch_assoc($RecJoin1_0);
	$totalRows_RecJoin1_0 = mysql_num_rows($RecJoin1_0);
?>
        <td><?php echo $row_RecJoin1_0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin1_0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
<?php } ?>
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
<?php
	$array = array('是：'=> 0 , '否：' => 1);
	foreach ($array as $key => $value) {  
?>  
      <tr>
        <td><?php echo $key ?> </td>
<?php
	$colname_RecJoin2_0 = $value;
	mysql_select_db($database_connSQL, $connSQL);
	$query_RecJoin2_0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_2 = %s", GetSQLValueString($colname_RecJoin2_0, "int"));
	$RecJoin2_0 = mysql_query($query_RecJoin2_0, $connSQL) or die(mysql_error());
	$row_RecJoin2_0 = mysql_fetch_assoc($RecJoin2_0);
	$totalRows_RecJoin2_0 = mysql_num_rows($RecJoin2_0);	
?>        
        <td><?php echo $row_RecJoin2_0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin2_0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
<?php } ?>
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
<?php
	$array = array('1~100元：'=> 0 , '100~500元：' => 1,'500~1000元：' => 2,'1000~3000元：'=>3,'3000~5000元：' => 4,'5000~10000元：' => 5, '10000元以上' => 6);
	foreach ($array as $key => $value) {  
?>
      <tr>
        <td><?php echo $key ?> </td>
<?php
	$colname_RecJoin4_0 = $value;
	mysql_select_db($database_connSQL, $connSQL);
	$query_RecJoin4_0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_4 = %s", GetSQLValueString($colname_RecJoin4_0, "int"));
	$RecJoin4_0 = mysql_query($query_RecJoin4_0, $connSQL) or die(mysql_error());
	$row_RecJoin4_0 = mysql_fetch_assoc($RecJoin4_0);
	$totalRows_RecJoin4_0 = mysql_num_rows($RecJoin4_0);
?>
        <td><?php echo $row_RecJoin4_0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin4_0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
<?php } ?>      
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
<?php
	$array = array('是：'=> 0 , '否：' => 1);
	foreach ($array as $key => $value) {  
?>      
      <tr>
        <td><?php echo $key ?> </td>
<?php
	$colname_RecJoin5_0 = $value;
	mysql_select_db($database_connSQL, $connSQL);
	$query_RecJoin5_0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_5 = %s", GetSQLValueString($colname_RecJoin5_0, "int"));
	$RecJoin5_0 = mysql_query($query_RecJoin5_0, $connSQL) or die(mysql_error());
	$row_RecJoin5_0 = mysql_fetch_assoc($RecJoin5_0);
	$totalRows_RecJoin5_0 = mysql_num_rows($RecJoin5_0);
?>        
        <td><?php echo $row_RecJoin5_0['COUNT(*)']; ?> 人</td>
        <td><?php if($row_Rectotal['COUNT(*)'] !=0) echo round(($row_RecJoin5_0['COUNT(*)']/$row_Rectotal['COUNT(*)']),2)*100; else echo "0" ;; ?> %</td>
      </tr>
<?php } ?>
    </table>
      <br /></td>
  </tr>
</table>
</div>

</body>
</html>
<?php
mysql_free_result($Rectotal);
mysql_free_result($RecJoin4_0);
mysql_free_result($RecJoin5_0);
mysql_free_result($RecAge0);
mysql_free_result($RecEdu0);
mysql_free_result($RecOnline0);
mysql_free_result($RecIncome0);
mysql_free_result($RecPo0);
mysql_free_result($RecJoin0);
mysql_free_result($RecJoin1_0);
mysql_free_result($RecJoin2_0);

mysql_free_result($RecJoin3_0);
mysql_free_result($RecJoin3_1);
mysql_free_result($RecJoin3_2);
mysql_free_result($RecJoin3_3);
mysql_free_result($RecJoin3_4);

?>