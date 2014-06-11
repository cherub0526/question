<?php session_start(); ?>
<?php require_once('Connections/connSQL.php'); ?>
<?php require_once('macaddress.php'); ?>

<?php
echo "!!";
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
$macaddress = $mac->mac_addr;
$ip_RecIp = "%";
if (isset($macaddress)) {
  $ip_RecIp = $macaddress;
}
mysql_select_db($database_connSQL, $connSQL);
$query_RecIp = sprintf("SELECT q_ip FROM `result`  WHERE `result`.q_macaddress = %s", GetSQLValueString($macaddress, "text"));
$RecIp = mysql_query($query_RecIp, $connSQL) or die(mysql_error());
$row_RecIp = mysql_fetch_assoc($RecIp);
$totalRows_RecIp = mysql_num_rows($RecIp);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $join3 = $_POST['q_join_3'];
  $q_join_3 = ""; 
  for($i=0;$i<sizeof($join3);$i++)
  {
    $q_join_3[$i] = $join3[$i];
  }
  /*
  $join4 = $_POST['q_join_4'];
  $q_join_4 = "";
  foreach($join4 as $key)
  {
    $q_join_4 .= "," . $key;
  }
  $q_join_4 = substr($q_join_4,1);
  */
  $ip = $_SERVER["REMOTE_ADDR"];
  
  $date = date("Y-m-d H:i:s");

  
  mysql_select_db($database_connSQL,$connSQL);
  $search = "SELECT q_macaddress FROM result WHERE q_macaddress = '$macaddress'";
  $s_result = mysql_query($search);
  $result = mysql_fetch_assoc($s_result);
  
    $insertSQL = sprintf("INSERT INTO `result` (q_age, q_edu, q_onlinetime, q_income, q_po, q_join, q_join_1, q_join_2, q_join_3_0, q_join_3_1, q_join_3_2, q_join_3_3, q_join_3_4, q_join_4, q_join_5, q_ip, q_macaddress,q_date) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
               GetSQLValueString($_POST['q_age'], "int"),
               GetSQLValueString($_POST['q_edu'], "int"),
               GetSQLValueString($_POST['q_onlinetime'], "int"),
               GetSQLValueString($_POST['q_income'], "int"),
               GetSQLValueString($_POST['q_po'], "int"),
               GetSQLValueString($_POST['q_join'], "int"),
               GetSQLValueString($_POST['q_join_1'], "int"),
               GetSQLValueString($_POST['q_join_2'], "int"),
               GetSQLValueString($q_join_3[0], "int"),
               GetSQLValueString($q_join_3[1], "int"),
               GetSQLValueString($q_join_3[2], "int"),
               GetSQLValueString($q_join_3[3], "int"),
               GetSQLValueString($q_join_3[4], "int"),
               GetSQLValueString($_POST['q_join_4'], "int"),
               GetSQLValueString($_POST['q_join_5'], "int"),
               GetSQLValueString($ip, "text"),
			   GetSQLValueString($macaddress, "text"),
               GetSQLValueString($date, "date"));
  
    mysql_select_db($database_connSQL, $connSQL);
    $Result1 = mysql_query($insertSQL, $connSQL) or die(mysql_error());
    
	setcookie('complete','complete',time()+60*60);
    header("Location:index.php");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>線上授權意見調查表</title>
<style type="text/css">
body {
	width: 600px;
	margin-right: auto;
	margin-left: auto;
	background-image: url(images/64.jpg);
	font-family: "標楷體";
}
table {
	background-color: #E6D3B3;
}
body #h1 {
	margin-top: 200px;
}
</style>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="title">
  <h1 align="center" style="color:#F00">線上授權意見調查表</h1>
</div>
  
<?php if ($totalRows_RecIp > 0 || isset($_COOKIE['complete'])) { // Show if recordset not empty ?>
  <h1 id="h1" align="center" style="color:#F00">您已經填過此問卷了！<br />
    <br />
  謝謝您提供的意見</h1>
  <?php if ($totalRows_RecIp > 0) {?>
  <h1>
    <p align="center" style="color:#F00">如果您想繼續填寫，請換台電腦。</p></h1>
  <?php } else if (isset($_COOKIE['complete']))  { ?>
    <h1>
    <p align="center" style="color:#F00">如果您想繼續填寫，請更換瀏覽器。</p></h1>
  <?php } ?>
  <?php } else {  ?>
  <form name="form1" action="<?php echo $editFormAction; ?>" method="POST" id="form1">
    <div id="content">
      <table width="600" height="1452" border="1">
        <tr>
          <td>年齡 <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio1">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_age" value="0" id="q_age_0" />
              15歲以下</label>
            <br />
            <label>
              <input type="radio" name="q_age" value="1" id="q_age_1" />
              16~20歲</label>
            <br />
            <label>
              <input type="radio" name="q_age" value="2" id="q_age_2" />
              21~30歲</label>
            <br />
            <label>
              <input type="radio" name="q_age" value="3" id="q_age_3" />
              31~40歲</label>
            <br />
            <label>
              <input type="radio" name="q_age" value="4" id="q_age_4" />
              41~45歲</label>
            <br />
            <label>
              <input type="radio" name="q_age" value="5" id="q_age_5" />
              46~50歲</label>
            <br />
            <label>
              <input type="radio" name="q_age" value="6" id="q_age_6" />
              50歲以上</label>
            <br />
            </span>
            <br />
          </p></td>
        </tr>
        <tr>
          <td>教育程度 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio2">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_edu" value="0" id="q_edu_0" />
              小學以下</label>
            <br />
            <label>
              <input type="radio" name="q_edu" value="1" id="q_edu_1" />
              國中</label>
            <br />
            <label>
              <input type="radio" name="q_edu" value="2" id="q_edu_2" />
              高中</label>
            <br />
            <label>
              <input type="radio" name="q_edu" value="3" id="q_edu_3" />
              大學</label>
            <br />
            <label>
              <input type="radio" name="q_edu" value="4" id="q_edu_4" />
              碩士</label>
            <br />
            <label>
              <input type="radio" name="q_edu" value="5" id="q_edu_5" />
              博士</label>
            <br /></span>
          </p></td>
        </tr>
        <tr>
          <td>每日上線時間 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio3">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_onlinetime" value="0" id="q_onlinetime_0" />
              1小時以下</label>
            <br />
            <label>
              <input type="radio" name="q_onlinetime" value="1" id="q_onlinetime_1" />
              1~2小時</label>
            <br />
            <label>
              <input type="radio" name="q_onlinetime" value="2" id="q_onlinetime_2" />
              2~3小時</label>
            <br />
            <label>
              <input type="radio" name="q_onlinetime" value="3" id="q_onlinetime_3" />
              3~4小時</label>
            <br />
            <label>
              <input type="radio" name="q_onlinetime" value="4" id="q_onlinetime_4" />
              4~5小時</label>
            <br />
            <label>
              <input type="radio" name="q_onlinetime" value="5" id="q_onlinetime_5" />
              5小時以上</label>
            <br /></span>
          </p></td>
        </tr>
        <tr>
          <td>收入 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio4">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_income" value="0" id="q_income_0" />
              19,999以下</label>
            <br />
            <label>
              <input type="radio" name="q_income" value="1" id="q_income_1" />
              20,000~29,999</label>
            <br />
            <label>
              <input type="radio" name="q_income" value="2" id="q_income_2" />
              30,000~39,999</label>
            <br />
            <label>
              <input type="radio" name="q_income" value="3" id="q_income_3" />
              40,000~49,999</label>
            <br />
            <label>
              <input type="radio" name="q_income" value="4" id="q_income_4" />
              50,000~59,999</label>
            <br />
            <label>
              <input type="radio" name="q_income" value="5" id="q_income_5" />
              60,000~69,999</label>
            <br />
            <label>
              <input type="radio" name="q_income" value="6" id="q_income_6" />
              70,000以上</label>
            <br /></span>
          </p></td>
        </tr>
        <tr>
          <td>發文 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio5">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_po" value="0" id="q_po_0" />
              只看不發文</label>
            <br />
            <label>
              <input type="radio" name="q_po" value="1" id="q_po_1" />
              偶爾</label>
            <br />
            <label>
              <input type="radio" name="q_po" value="2" id="q_po_2" />
              經常</label>
            <br />
            <label>
              <input type="radio" name="q_po" value="3" id="q_po_3" />
              隨時</label>
            <br /></span>
          </p></td>
        </tr>
        <tr>
          <td>如果您發文的資料可以線上授權他人使用，並且收取費用 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio6">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_join" value="0" id="q_join_0" />
              有興趣</label>
            <br />
            <label>
              <input type="radio" name="q_join" value="1" id="q_join_1" />
              沒有興趣</label>
            <br /></span>
          </p></td>
        </tr>
        <tr>
          <td>您曾想過合法轉載或使用網路上的資料嗎？ 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio7">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_join_1" value="0" id="q_join_1_0" />
              是</label>
            <br />
            <label>
              <input type="radio" name="q_join_1" value="1" id="q_join_1_1" />
              否</label>
            <br /></span>
          </p></td>
        </tr>
        <tr>
          <td>如果可以在瀏覽網頁時，對有興趣的圖片、文章......等，即時取得授權，您會在業面上申請授權嗎？ 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio8">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_join_2" value="0" id="q_join_2_0" />
              是</label>
            <br />
            <label>
              <input type="radio" name="q_join_2" value="1" id="q_join_2_1" />
              否</label>
            <br /></span>
          </p></td>
        </tr>
        <tr>
          <td height="30">您希望有的授權模式。 (可複選)
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="sprycheckbox1">
          <span class="checkboxRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="checkbox" name="q_join_3[]" value="1" id="q_join_3_0" />
              個人使用，非商業用途</label>
            <br />
            <label>
              <input type="checkbox" name="q_join_3[]" value="1" id="q_join_3_1" />
              個人使用含商業用途</label>
            <br />
            <label>
              <input type="checkbox" name="q_join_3[]" value="1" id="q_join_3_2" />
              學術使用</label>
            <br />
            <label>
              <input type="checkbox" name="q_join_3[]" value="1" id="q_join_3_3" />
              商業使用並限定範圍</label>
            <br />
            <label>
              <input type="checkbox" name="q_join_3[]" value="1" id="q_join_3_4" />
              商業使用且不限定範圍</label>
            <br />
            </span>            <br />
          </p></td>
        </tr>
        <tr>
          <td>承上題，您希望授權的費用在哪個範圍？(可複選) 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio9">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_join_4" value="0" id="q_join_4_0" />
              1~100元</label>
            <br />
            <label>
              <input type="radio" name="q_join_4" value="1" id="q_join_4_1" />
              100~500元</label>
            <br />
            <label>
              <input type="radio" name="q_join_4" value="2" id="q_join_4_2" />
              500~1000元</label>
            <br />
            <label>
              <input type="radio" name="q_join_4" value="3" id="q_join_4_3" />
              1,000~3,000元</label>
            <br />
            <label>
              <input type="radio" name="q_join_4" value="4" id="q_join_4_4" />
              3,000~5,000元</label>
            <br />
            <label>
              <input type="radio" name="q_join_4" value="5" id="q_join_4_5" />
              5,000~10,000元</label>
            <br />
            <label>
              <input type="radio" name="q_join_4" value="6" id="q_join_4_6" />
              10,000以上</label>
<br /></span>
          </p></td>
        </tr>
        <tr>
          <td>為保障您的授權交易，您願意將授權交易的物件及內容保存一則 在服務商的平台上嗎？<span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td><p>
          <span id="spryradio10">
          <span class="radioRequiredMsg">請進行選取。</span></br>
            <label>
              <input type="radio" name="q_join_5" value="0" id="q_join_5_0" />
              是</label>
            <br />
            <label>
              <input type="radio" name="q_join_5" value="1" id="q_join_5_1" />
              否</label>
            <br /></span>
          </p></td>
        </tr>
      </table>
      <p align="center"><input name="sumbit" type="submit" value="完成" /></p>
    </div>
    <input type="hidden" name="MM_insert" value="form1" />
</form>
  <?php } // Show if recordset not empty ?>
</div>

<script type="text/javascript">
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1", {validateOn:["blur"]});
var spryradio2 = new Spry.Widget.ValidationRadio("spryradio2", {validateOn:["blur"]});
var spryradio3 = new Spry.Widget.ValidationRadio("spryradio3", {validateOn:["blur"]});
var spryradio4 = new Spry.Widget.ValidationRadio("spryradio4", {validateOn:["blur"]});
var spryradio5 = new Spry.Widget.ValidationRadio("spryradio5", {validateOn:["blur"]});
var spryradio6 = new Spry.Widget.ValidationRadio("spryradio6", {validateOn:["blur"]});
var spryradio7 = new Spry.Widget.ValidationRadio("spryradio7", {validateOn:["blur"]});
var spryradio8 = new Spry.Widget.ValidationRadio("spryradio8", {validateOn:["blur"]});
var spryradio9 = new Spry.Widget.ValidationRadio("spryradio9", {validateOn:["blur"]});
var spryradio10 = new Spry.Widget.ValidationRadio("spryradio10", {validateOn:["blur"]});
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
</script>
</body>
</html>
<?php
mysql_free_result($RecIp);
?>
