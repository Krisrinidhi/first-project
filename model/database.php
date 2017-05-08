<?php

/* Database Connection */

$sDbHost = 'sql2.njit.edu';
$sDbName = 'sk2423';
$sDbUser = 'sk2423';
$sDbPwd = 'IR8VDFjJC';

$dbConn = mysql_connect ($sDbHost, $sDbUser, $sDbPwd) or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($sDbName,$dbConn) or die('Cannot select database. ' . mysql_error());

?>