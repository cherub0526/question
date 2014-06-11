<?php
$colname_RecJoin2_0 = 0;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin2_0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_2 = %s", GetSQLValueString($colname_RecJoin2_0, "int"));
$RecJoin2_0 = mysql_query($query_RecJoin2_0, $connSQL) or die(mysql_error());
$row_RecJoin2_0 = mysql_fetch_assoc($RecJoin2_0);
$totalRows_RecJoin2_0 = mysql_num_rows($RecJoin2_0);

$colname_RecJoin2_1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin2_1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_2 = %s", GetSQLValueString($colname_RecJoin2_1, "int"));
$RecJoin2_1 = mysql_query($query_RecJoin2_1, $connSQL) or die(mysql_error());
$row_RecJoin2_1 = mysql_fetch_assoc($RecJoin2_1);
$totalRows_RecJoin2_1 = mysql_num_rows($RecJoin2_1);