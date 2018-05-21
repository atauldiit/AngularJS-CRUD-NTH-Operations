<?php
// Connecting to database as mysqli_connect("hostname", "username", "password", "database name");
$con = mysqli_connect("localhost", "barisys_topbari", "Nvw,u%uH#t^@", "barisys_topbari");
//$con = mysqli_connect("toptour2014.com", "toptravelDB", "Blue1234DB", "toptravelDB") or die (mysql_error());
mysqli_query( $con, 'SET NAMES "utf8" COLLATE "utf8_general_ci"' );
?>