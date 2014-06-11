<?php 
$colname_RecPo0 = 0;
mysql_select_db($database_connSQL, $connSQL);
$query_RecPo0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_po = %s", GetSQLValueString($colname_RecPo0, "int"));
$RecPo0 = mysql_query($query_RecPo0, $connSQL) or die(mysql_error());
$row_RecPo0 = mysql_fetch_assoc($RecPo0);
$totalRows_RecPo0 = mysql_num_rows($RecPo0);

$colname_RecPo1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecPo1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_po = %s", GetSQLValueString($colname_RecPo1, "int"));
$RecPo1 = mysql_query($query_RecPo1, $connSQL) or die(mysql_error());
$row_RecPo1 = mysql_fetch_assoc($RecPo1);
$totalRows_RecPo1 = mysql_num_rows($RecPo1);

$colname_RecPo2 = 2;
mysql_select_db($database_connSQL, $connSQL);
$query_RecPo2 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_po = %s", GetSQLValueString($colname_RecPo2, "int"));
$RecPo2 = mysql_query($query_RecPo2, $connSQL) or die(mysql_error());
$row_RecPo2 = mysql_fetch_assoc($RecPo2);
$totalRows_RecPo2 = mysql_num_rows($RecPo2);

$colname_RecPo3 = 3;
mysql_select_db($database_connSQL, $connSQL);
$query_RecPo3 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_po = %s", GetSQLValueString($colname_RecPo3, "int"));
$RecPo3 = mysql_query($query_RecPo3, $connSQL) or die(mysql_error());
$row_RecPo3 = mysql_fetch_assoc($RecPo3);
$totalRows_RecPo3 = mysql_num_rows($RecPo3);