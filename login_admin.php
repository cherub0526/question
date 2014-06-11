<?php session_start(); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin.php";
  $MM_redirectLoginFailed = "login_admin.php?errMsg=1";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connSQL, $connSQL);
  
  $LoginRS__query=sprintf("SELECT a_username, a_password FROM `admin` WHERE a_username=%s AND a_password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $connSQL) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
if(isset($_SESSION['MM_Username']))
header("Location:admin.php" );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>問卷調查結果登入</title>
<style type="text/css">
body {
	width: 1000px;
	margin-right: auto;
	margin-left: auto;
	background-image: url(images/64.jpg);
}
table {
	margin-right: auto;
	margin-left: auto;
	margin-top: 200px;
}
</style>
</head>

<body>
<form action="<?php echo $loginFormAction; ?>" method="POST" id="form1">
<table width="300" height="200" border="1">
  <tr>
    <td colspan="2" align="center" valign="middle"><h1>管理者登入 <br />
    </h1></td>
  </tr>
  <tr>
    <td width="102">登入帳號：</td>
    <td width="182"><label for="username"></label>
      <input type="text" name="username" id="username" /></td>
  </tr>
  <tr>
    <td>登入密碼：</td>
    <td><label for="password"></label>
      <input type="password" name="password" id="password" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="sumbit" id="sumbit" value="送出" /></td>
  </tr>
</table>
</form>
</body>
</html>