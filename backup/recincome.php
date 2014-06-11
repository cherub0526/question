<?php
$income_RecIncome0 = 0;
mysql_select_db($database_connSQL, $connSQL);
$query_RecIncome0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_income = %s", GetSQLValueString($income_RecIncome0, "int"));
$RecIncome0 = mysql_query($query_RecIncome0, $connSQL) or die(mysql_error());
$row_RecIncome0 = mysql_fetch_assoc($RecIncome0);
$totalRows_RecIncome0 = mysql_num_rows($RecIncome0);

$income_RecIncome1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecIncome1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_income = %s", GetSQLValueString($income_RecIncome1, "int"));
$RecIncome1 = mysql_query($query_RecIncome1, $connSQL) or die(mysql_error());
$row_RecIncome1 = mysql_fetch_assoc($RecIncome1);
$totalRows_RecIncome1 = mysql_num_rows($RecIncome1);

$income_RecIncome2 = 2;
mysql_select_db($database_connSQL, $connSQL);
$query_RecIncome2 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_income = %s", GetSQLValueString($income_RecIncome2, "int"));
$RecIncome2 = mysql_query($query_RecIncome2, $connSQL) or die(mysql_error());
$row_RecIncome2 = mysql_fetch_assoc($RecIncome2);
$totalRows_RecIncome2 = mysql_num_rows($RecIncome2);

$income_RecIncome3 = 3;
mysql_select_db($database_connSQL, $connSQL);
$query_RecIncome3 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_income = %s", GetSQLValueString($income_RecIncome3, "int"));
$RecIncome3 = mysql_query($query_RecIncome3, $connSQL) or die(mysql_error());
$row_RecIncome3 = mysql_fetch_assoc($RecIncome3);
$totalRows_RecIncome3 = mysql_num_rows($RecIncome3);

$income_RecIncome4 = 4;
mysql_select_db($database_connSQL, $connSQL);
$query_RecIncome4 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_income = %s", GetSQLValueString($income_RecIncome4, "int"));
$RecIncome4 = mysql_query($query_RecIncome4, $connSQL) or die(mysql_error());
$row_RecIncome4 = mysql_fetch_assoc($RecIncome4);
$totalRows_RecIncome4 = mysql_num_rows($RecIncome4);

$income_RecIncome5 = 5;
mysql_select_db($database_connSQL, $connSQL);
$query_RecIncome5 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_income = %s", GetSQLValueString($income_RecIncome5, "int"));
$RecIncome5 = mysql_query($query_RecIncome5, $connSQL) or die(mysql_error());
$row_RecIncome5 = mysql_fetch_assoc($RecIncome5);
$totalRows_RecIncome5 = mysql_num_rows($RecIncome5);

$income_RecIncome6 = 6;
mysql_select_db($database_connSQL, $connSQL);
$query_RecIncome6 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_income = %s", GetSQLValueString($income_RecIncome6, "int"));
$RecIncome6 = mysql_query($query_RecIncome6, $connSQL) or die(mysql_error());
$row_RecIncome6 = mysql_fetch_assoc($RecIncome6);
$totalRows_RecIncome6 = mysql_num_rows($RecIncome6);