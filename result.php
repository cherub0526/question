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

$colname_RecGet = "-1";
if (isset($_GET['id'])) {
  $colname_RecGet = $_GET['id'];
}
mysql_select_db($database_connSQL, $connSQL);
$query_RecGet = sprintf("SELECT * FROM `result` WHERE q_id = %s", GetSQLValueString($colname_RecGet, "int"));
$RecGet = mysql_query($query_RecGet, $connSQL) or die(mysql_error());
$row_RecGet = mysql_fetch_assoc($RecGet);
$totalRows_RecGet = mysql_num_rows($RecGet);
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
<div id="content">
      <table width="600" height="1340" border="1">
      <tr>
      	<td>
        問卷編號：<?php echo $row_RecGet['q_id']; ?>
        </td>
      </tr>
        <tr>
          <td>年齡 <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td>
          
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_age'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_age<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_age_0<?php echo $row_RecGet['q_id']; ?>" />
              15歲以下</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_age'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_age<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_age_1<?php echo $row_RecGet['q_id']; ?>" />
              16~20歲</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_age'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_age<?php echo $row_RecGet['q_id']; ?>" value="2" id="q_age_2<?php echo $row_RecGet['q_id']; ?>" />
              21~30歲</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_age'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_age<?php echo $row_RecGet['q_id']; ?>" value="3" id="q_age_3<?php echo $row_RecGet['q_id']; ?>" />
              31~40歲</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_age'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_age<?php echo $row_RecGet['q_id']; ?>" value="4" id="q_age_4<?php echo $row_RecGet['q_id']; ?>" />
              41~45歲</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_age'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_age<?php echo $row_RecGet['q_id']; ?>" value="5" id="q_age_5<?php echo $row_RecGet['q_id']; ?>" />
              46~50歲</label>
            
            <label>
              <br />
              <input <?php if (!(strcmp($row_RecGet['q_age'],"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_age<?php echo $row_RecGet['q_id']; ?>" value="6" id="q_age_6<?php echo $row_RecGet['q_id']; ?>" />
            50歲以上</label>
            
            
            
          </td>
        </tr>
        <tr>
          <td>教育程度 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td>
          
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_edu'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_edu<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_edu_0<?php echo $row_RecGet['q_id']; ?>" />
              小學以下</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_edu'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_edu<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_edu_1<?php echo $row_RecGet['q_id']; ?>" />
              國中</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_edu'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_edu<?php echo $row_RecGet['q_id']; ?>" value="2" id="q_edu_2<?php echo $row_RecGet['q_id']; ?>" />
              高中</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_edu'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_edu<?php echo $row_RecGet['q_id']; ?>" value="3" id="q_edu_3<?php echo $row_RecGet['q_id']; ?>" />
              大學</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_edu'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_edu<?php echo $row_RecGet['q_id']; ?>" value="4" id="q_edu_4<?php echo $row_RecGet['q_id']; ?>" />
              碩士</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_edu'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_edu<?php echo $row_RecGet['q_id']; ?>" value="5" id="q_edu_5<?php echo $row_RecGet['q_id']; ?>" />
              博士</label>
            
          </td>
        </tr>
        <tr>
          <td>每日上線時間 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td>
          
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_onlinetime'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_onlinetime<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_onlinetime_0<?php echo $row_RecGet['q_id']; ?>" />
              1小時以下</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_onlinetime'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_onlinetime<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_onlinetime_1<?php echo $row_RecGet['q_id']; ?>" />
              1~2小時</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_onlinetime'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_onlinetime<?php echo $row_RecGet['q_id']; ?>" value="2" id="q_onlinetime_2<?php echo $row_RecGet['q_id']; ?>" />
              2~3小時</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_onlinetime'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_onlinetime<?php echo $row_RecGet['q_id']; ?>" value="3" id="q_onlinetime_3<?php echo $row_RecGet['q_id']; ?>" />
              3~4小時</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_onlinetime'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_onlinetime<?php echo $row_RecGet['q_id']; ?>" value="4" id="q_onlinetime_4<?php echo $row_RecGet['q_id']; ?>" />
              4~5小時</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_onlinetime'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_onlinetime<?php echo $row_RecGet['q_id']; ?>" value="5" id="q_onlinetime_5<?php echo $row_RecGet['q_id']; ?>" />
              5小時以上</label>
            
          </td>
        </tr>
        <tr>
          <td>收入 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td>          
          <input <?php if (!(strcmp($row_RecGet['q_income'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_income<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_income_0<?php echo $row_RecGet['q_id']; ?>" />
              19,999以下
            
            
              <input <?php if (!(strcmp($row_RecGet['q_income'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_income<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_income_1<?php echo $row_RecGet['q_id']; ?>" />
              20,000~29,999</label>
            
            
              <input <?php if (!(strcmp($row_RecGet['q_income'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_income<?php echo $row_RecGet['q_id']; ?>" value="2" id="q_income_2<?php echo $row_RecGet['q_id']; ?>" />
              30,000~39,999</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_income'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_income<?php echo $row_RecGet['q_id']; ?>" value="3" id="q_income_3<?php echo $row_RecGet['q_id']; ?>" />
              40,000~49,999</label>
            
            <label>
              <br />
               <input <?php if (!(strcmp($row_RecGet['q_income'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_income<?php echo $row_RecGet['q_id']; ?>" value="4" id="q_income_4<?php echo $row_RecGet['q_id']; ?>" />
            50,000~59,999</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_income'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_income<?php echo $row_RecGet['q_id']; ?>" value="5" id="q_income_5<?php echo $row_RecGet['q_id']; ?>" />
              60,000~69,999</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_income'],"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_income<?php echo $row_RecGet['q_id']; ?>" value="6" id="q_income_6<?php echo $row_RecGet['q_id']; ?>" />
              70,000以上</label>
            
          </td>
        </tr>
        <tr>
          <td>發文 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td>
          
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_po'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_po<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_po_0<?php echo $row_RecGet['q_id']; ?>" />
              只看不發文</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_po'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_po<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_po_1<?php echo $row_RecGet['q_id']; ?>" />
              偶爾</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_po'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_po<?php echo $row_RecGet['q_id']; ?>" value="2" id="q_po_2<?php echo $row_RecGet['q_id']; ?>" />
              經常</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_po'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_po<?php echo $row_RecGet['q_id']; ?>" value="3" id="q_po_3<?php echo $row_RecGet['q_id']; ?>" />
              隨時</label>
            
          </td>
        </tr>
        <tr>
          <td>如果您發文的資料可以線上授權他人使用，並且收取費用 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td>
          
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_join_0<?php echo $row_RecGet['q_id']; ?>" />
              有興趣</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_1<?php echo $row_RecGet['q_id']; ?>" />
              沒有興趣</label>
            
          </td>
        </tr>
        <tr>
          <td>您曾想過合法轉載或使用網路上的資料嗎？ 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td>
          
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_1'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_1<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_join_1_0<?php echo $row_RecGet['q_id']; ?>" />
              是</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_1'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_1<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_1_1<?php echo $row_RecGet['q_id']; ?>" />
              否</label>
            
          </td>
        </tr>
        <tr>
          <td>如果可以在瀏覽網頁時，對有興趣的圖片、文章......等，即時取得授權，您會在業面上申請授權嗎？ 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td>
          
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_2'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_2<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_join_2_0<?php echo $row_RecGet['q_id']; ?>" />
              是</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_2'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_2<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_2_1<?php echo $row_RecGet['q_id']; ?>" />
              否</label>
            
          </td>
        </tr>
        <tr>
          <td height="30">您希望有的授權模式。 (可複選)
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td>
  
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_3_0'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="q_join_3<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_3_0<?php echo $row_RecGet['q_id']; ?>" />
              個人使用，非商業用途</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_3_1'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="q_join_3<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_3_1<?php echo $row_RecGet['q_id']; ?>" />
              個人使用含商業用途</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_3_2'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="q_join_3<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_3_2<?php echo $row_RecGet['q_id']; ?>" />
              學術使用</label>
            
            <label>
              <br />
              <input <?php if (!(strcmp($row_RecGet['q_join_3_3'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="q_join_3<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_3_3<?php echo $row_RecGet['q_id']; ?>" />
            商業使用並限定範圍</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_3_4'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="q_join_3<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_3_4<?php echo $row_RecGet['q_id']; ?>" />
              商業使用且不限定範圍</label>
            
                        
          </td>
        </tr>
        <tr>
          <td height="45">承上題，您希望授權的費用在哪個範圍？(可複選) 
          <span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td height="69">
          
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_4'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_4<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_join_4_0<?php echo $row_RecGet['q_id']; ?>" />
              1~100元</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_4'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_4<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_4_1<?php echo $row_RecGet['q_id']; ?>" />
              100~500元</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_4'],"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_4<?php echo $row_RecGet['q_id']; ?>" value="2" id="q_join_4_2<?php echo $row_RecGet['q_id']; ?>" />
              500~1000元</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_4'],"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_4<?php echo $row_RecGet['q_id']; ?>" value="3" id="q_join_4_3<?php echo $row_RecGet['q_id']; ?>" />
              1,000~3,000元</label>
            
            <label>
              <br />
              <input <?php if (!(strcmp($row_RecGet['q_join_4'],"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_4<?php echo $row_RecGet['q_id']; ?>" value="4" id="q_join_4_4<?php echo $row_RecGet['q_id']; ?>" />
            3,000~5,000元</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_4'],"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_4<?php echo $row_RecGet['q_id']; ?>" value="5" id="q_join_4_5<?php echo $row_RecGet['q_id']; ?>" />
              5,000~10,000元</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_4'],"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_4<?php echo $row_RecGet['q_id']; ?>" value="6" id="q_join_4_6<?php echo $row_RecGet['q_id']; ?>" />
              10,000以上</label>

          </td>
        </tr>
        <tr>
          <td height="64">為保障您的授權交易，您願意將授權交易的物件及內容保存一則 在服務商的平台上嗎？<span style="color:#F00">*</span></td>
        </tr>
        <tr>
          <td height="51">
          
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_5'],"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_5<?php echo $row_RecGet['q_id']; ?>" value="0" id="q_join_5_0<?php echo $row_RecGet['q_id']; ?>" />
              是</label>
            
            <label>
              <input <?php if (!(strcmp($row_RecGet['q_join_5'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="q_join_5<?php echo $row_RecGet['q_id']; ?>" value="1" id="q_join_5_1<?php echo $row_RecGet['q_id']; ?>" />
              否</label>            
          </td>
        </tr>
        <tr>
        <td height="55"><p>ip：<?php echo $row_RecGet['q_ip']; ?> Macaddress：<?php echo $row_RecGet['q_macaddress']; ?> 時間：<?php echo $row_RecGet['q_date']; ?></p></td>
        </tr>
      </table>
</div>
</div>

</body>
</html>