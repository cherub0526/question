<?php
$colname_RecJoin1_0 = 0;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin1_0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_1 = %s", GetSQLValueString($colname_RecJoin1_0, "int"));
$RecJoin1_0 = mysql_query($query_RecJoin1_0, $connSQL) or die(mysql_error());
$row_RecJoin1_0 = mysql_fetch_assoc($RecJoin1_0);
$totalRows_RecJoin1_0 = mysql_num_rows($RecJoin1_0);

$colname_RecJoin1_1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin1_1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_1 = %s", GetSQLValueString($colname_RecJoin1_1, "int"));
$RecJoin1_1 = mysql_query($query_RecJoin1_1, $connSQL) or die(mysql_error());
$row_RecJoin1_1 = mysql_fetch_assoc($RecJoin1_1);
$totalRows_RecJoin1_1 = mysql_num_rows($RecJoin1_1);