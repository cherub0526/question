<?php
$colname_RecJoin5_0 = 0;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin5_0 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_5 = %s", GetSQLValueString($colname_RecJoin5_0, "int"));
$RecJoin5_0 = mysql_query($query_RecJoin5_0, $connSQL) or die(mysql_error());
$row_RecJoin5_0 = mysql_fetch_assoc($RecJoin5_0);
$totalRows_RecJoin5_0 = mysql_num_rows($RecJoin5_0);

$colname_RecJoin5_1 = 1;
mysql_select_db($database_connSQL, $connSQL);
$query_RecJoin5_1 = sprintf("SELECT COUNT(*) FROM `result` WHERE q_join_5 = %s", GetSQLValueString($colname_RecJoin5_1, "int"));
$RecJoin5_1 = mysql_query($query_RecJoin5_1, $connSQL) or die(mysql_error());
$row_RecJoin5_1 = mysql_fetch_assoc($RecJoin5_1);
$totalRows_RecJoin5_1 = mysql_num_rows($RecJoin5_1);