<?php 
$colname_RecOnline0 = 0;
mysql_select_db($database_connSQL, $connSQL);
$query_RecOnline0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_onlinetime = %s", GetSQLValueString($colname_RecOnline0, "int"));
$RecOnline0 = mysql_query($query_RecOnline0, $connSQL) or die(mysql_error());
$row_RecOnline0 = mysql_fetch_assoc($RecOnline0);
$totalRows_RecOnline0 = mysql_num_rows($RecOnline0);

$colname_RecOnline1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecOnline1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_onlinetime = %s", GetSQLValueString($colname_RecOnline1, "int"));
$RecOnline1 = mysql_query($query_RecOnline1, $connSQL) or die(mysql_error());
$row_RecOnline1 = mysql_fetch_assoc($RecOnline1);
$totalRows_RecOnline1 = mysql_num_rows($RecOnline1);

$colname_RecOnline2 = 2;
mysql_select_db($database_connSQL, $connSQL);
$query_RecOnline2 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_onlinetime = %s", GetSQLValueString($colname_RecOnline2, "int"));
$RecOnline2 = mysql_query($query_RecOnline2, $connSQL) or die(mysql_error());
$row_RecOnline2 = mysql_fetch_assoc($RecOnline2);
$totalRows_RecOnline2 = mysql_num_rows($RecOnline2);

$colname_RecOnline3 = 3;
mysql_select_db($database_connSQL, $connSQL);
$query_RecOnline3 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_onlinetime = %s", GetSQLValueString($colname_RecOnline3, "int"));
$RecOnline3 = mysql_query($query_RecOnline3, $connSQL) or die(mysql_error());
$row_RecOnline3 = mysql_fetch_assoc($RecOnline3);
$totalRows_RecOnline3 = mysql_num_rows($RecOnline3);

$colname_RecOnline4 = 4;
mysql_select_db($database_connSQL, $connSQL);
$query_RecOnline4 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_onlinetime = %s", GetSQLValueString($colname_RecOnline4, "int"));
$RecOnline4 = mysql_query($query_RecOnline4, $connSQL) or die(mysql_error());
$row_RecOnline4 = mysql_fetch_assoc($RecOnline4);
$totalRows_RecOnline4 = mysql_num_rows($RecOnline4);

$colname_RecOnline5 = 5;
mysql_select_db($database_connSQL, $connSQL);
$query_RecOnline5 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_onlinetime = %s", GetSQLValueString($colname_RecOnline5, "int"));
$RecOnline5 = mysql_query($query_RecOnline5, $connSQL) or die(mysql_error());
$row_RecOnline5 = mysql_fetch_assoc($RecOnline5);
$totalRows_RecOnline5 = mysql_num_rows($RecOnline5);