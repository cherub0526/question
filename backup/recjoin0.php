<?php
$colname_RecJoin0 = 0;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join = %s", GetSQLValueString($colname_RecJoin0, "int"));
$RecJoin0 = mysql_query($query_RecJoin0, $connSQL) or die(mysql_error());
$row_RecJoin0 = mysql_fetch_assoc($RecJoin0);
$totalRows_RecJoin0 = mysql_num_rows($RecJoin0);

$colname_RecJoin1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join = %s", GetSQLValueString($colname_RecJoin1, "int"));
$RecJoin1 = mysql_query($query_RecJoin1, $connSQL) or die(mysql_error());
$row_RecJoin1 = mysql_fetch_assoc($RecJoin1);
$totalRows_RecJoin1 = mysql_num_rows($RecJoin1);