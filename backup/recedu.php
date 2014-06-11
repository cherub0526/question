<?php 
$edu_RecEdu0 = 0;
mysql_select_db($database_connSQL, $connSQL);
$query_RecEdu0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_edu = %s", GetSQLValueString($edu_RecEdu0, "int"));
$RecEdu0 = mysql_query($query_RecEdu0, $connSQL) or die(mysql_error());
$row_RecEdu0 = mysql_fetch_assoc($RecEdu0);
$totalRows_RecEdu0 = mysql_num_rows($RecEdu0);

$edu_RecEdu1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecEdu1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_edu = %s", GetSQLValueString($edu_RecEdu1, "int"));
$RecEdu1 = mysql_query($query_RecEdu1, $connSQL) or die(mysql_error());
$row_RecEdu1 = mysql_fetch_assoc($RecEdu1);
$totalRows_RecEdu1 = mysql_num_rows($RecEdu1);

$edu_RecEdu2 = 2;
mysql_select_db($database_connSQL, $connSQL);
$query_RecEdu2 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_edu = %s", GetSQLValueString($edu_RecEdu2, "int"));
$RecEdu2 = mysql_query($query_RecEdu2, $connSQL) or die(mysql_error());
$row_RecEdu2 = mysql_fetch_assoc($RecEdu2);
$totalRows_RecEdu2 = mysql_num_rows($RecEdu2);

$edu_RecEdu3 = 3;
mysql_select_db($database_connSQL, $connSQL);
$query_RecEdu3 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_edu = %s", GetSQLValueString($edu_RecEdu3, "int"));
$RecEdu3 = mysql_query($query_RecEdu3, $connSQL) or die(mysql_error());
$row_RecEdu3 = mysql_fetch_assoc($RecEdu3);
$totalRows_RecEdu3 = mysql_num_rows($RecEdu3);

$edu_RecEdu4 = 4;
mysql_select_db($database_connSQL, $connSQL);
$query_RecEdu4 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_edu = %s", GetSQLValueString($edu_RecEdu4, "int"));
$RecEdu4 = mysql_query($query_RecEdu4, $connSQL) or die(mysql_error());
$row_RecEdu4 = mysql_fetch_assoc($RecEdu4);
$totalRows_RecEdu4 = mysql_num_rows($RecEdu4);

$edu_RecEdu5 = 5;
mysql_select_db($database_connSQL, $connSQL);
$query_RecEdu5 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_edu = %s", GetSQLValueString($edu_RecEdu5, "int"));
$RecEdu5 = mysql_query($query_RecEdu5, $connSQL) or die(mysql_error());
$row_RecEdu5 = mysql_fetch_assoc($RecEdu5);
$totalRows_RecEdu5 = mysql_num_rows($RecEdu5);