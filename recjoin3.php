<?php
$colname_RecJoin3_0 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin3_0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_3_0 = %s", GetSQLValueString($colname_RecJoin3_0, "text"));
$RecJoin3_0 = mysql_query($query_RecJoin3_0, $connSQL) or die(mysql_error());
$row_RecJoin3_0 = mysql_fetch_assoc($RecJoin3_0);
$totalRows_RecJoin3_0 = mysql_num_rows($RecJoin3_0);

$colname_RecJoin3_1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin3_1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_3_1 = %s", GetSQLValueString($colname_RecJoin3_1, "text"));
$RecJoin3_1 = mysql_query($query_RecJoin3_1, $connSQL) or die(mysql_error());
$row_RecJoin3_1 = mysql_fetch_assoc($RecJoin3_1);
$totalRows_RecJoin3_1 = mysql_num_rows($RecJoin3_1);

$colname_RecJoin3_2 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin3_2 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_3_2 = %s", GetSQLValueString($colname_RecJoin3_2, "text"));
$RecJoin3_2 = mysql_query($query_RecJoin3_2, $connSQL) or die(mysql_error());
$row_RecJoin3_2 = mysql_fetch_assoc($RecJoin3_2);
$totalRows_RecJoin3_2 = mysql_num_rows($RecJoin3_2);

$colname_RecJoin3_3 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin3_3 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_3_3 = %s", GetSQLValueString($colname_RecJoin3_3, "text"));
$RecJoin3_3 = mysql_query($query_RecJoin3_3, $connSQL) or die(mysql_error());
$row_RecJoin3_3 = mysql_fetch_assoc($RecJoin3_3);
$totalRows_RecJoin3_3 = mysql_num_rows($RecJoin3_3);

$colname_RecJoin3_4 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin3_4 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_3_4 = %s", GetSQLValueString($colname_RecJoin3_4, "text"));
$RecJoin3_4 = mysql_query($query_RecJoin3_4, $connSQL) or die(mysql_error());
$row_RecJoin3_4 = mysql_fetch_assoc($RecJoin3_4);
$totalRows_RecJoin3_4 = mysql_num_rows($RecJoin3_4);