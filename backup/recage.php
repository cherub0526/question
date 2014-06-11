<?php
$age_RecAge0 = 0;
mysql_select_db($database_connSQL, $connSQL);
$query_RecAge0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_age = %s", GetSQLValueString($age_RecAge0, "int"));
$RecAge0 = mysql_query($query_RecAge0, $connSQL) or die(mysql_error());
$row_RecAge0 = mysql_fetch_assoc($RecAge0);
$totalRows_RecAge0 = mysql_num_rows($RecAge0);

$age_RecAge1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecAge1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_age = %s", GetSQLValueString($age_RecAge1, "int"));
$RecAge1 = mysql_query($query_RecAge1, $connSQL) or die(mysql_error());
$row_RecAge1 = mysql_fetch_assoc($RecAge1);
$totalRows_RecAge1 = mysql_num_rows($RecAge1);

$age_RecAge2 = 2;
mysql_select_db($database_connSQL, $connSQL);
$query_RecAge2 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_age = %s", GetSQLValueString($age_RecAge2, "int"));
$RecAge2 = mysql_query($query_RecAge2, $connSQL) or die(mysql_error());
$row_RecAge2 = mysql_fetch_assoc($RecAge2);
$totalRows_RecAge2 = mysql_num_rows($RecAge2);

$age_RecAge3 = 3;
mysql_select_db($database_connSQL, $connSQL);
$query_RecAge3 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_age = %s", GetSQLValueString($age_RecAge3, "int"));
$RecAge3 = mysql_query($query_RecAge3, $connSQL) or die(mysql_error());
$row_RecAge3 = mysql_fetch_assoc($RecAge3);
$totalRows_RecAge3 = mysql_num_rows($RecAge3);

$age_RecAge4 = 4;
mysql_select_db($database_connSQL, $connSQL);
$query_RecAge4 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_age = %s", GetSQLValueString($age_RecAge4, "int"));
$RecAge4 = mysql_query($query_RecAge4, $connSQL) or die(mysql_error());
$row_RecAge4 = mysql_fetch_assoc($RecAge4);
$totalRows_RecAge4 = mysql_num_rows($RecAge4);

$age_RecAge5 = 5;
mysql_select_db($database_connSQL, $connSQL);
$query_RecAge5 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_age = %s", GetSQLValueString($age_RecAge5, "int"));
$RecAge5 = mysql_query($query_RecAge5, $connSQL) or die(mysql_error());
$row_RecAge5 = mysql_fetch_assoc($RecAge5);
$totalRows_RecAge5 = mysql_num_rows($RecAge5);

$age_RecAge6 = 6;
mysql_select_db($database_connSQL, $connSQL);
$query_RecAge6 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_age = %s", GetSQLValueString($age_RecAge6, "int"));
$RecAge6 = mysql_query($query_RecAge6, $connSQL) or die(mysql_error());
$row_RecAge6 = mysql_fetch_assoc($RecAge6);
$totalRows_RecAge6 = mysql_num_rows($RecAge6);