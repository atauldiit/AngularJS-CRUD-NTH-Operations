<?php

// Including database connections
require_once 'database_connections.php';
// mysqli query to fetch all data from database
$query1 = "SELECT * from nBasic WHERE isIng = 0 ORDER BY txtWriteDate ASC";
$result1 = mysqli_query($con, $query1);
$arr1 = array();
if (mysqli_num_rows($result1) != 0) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $arr1[] = $row1;
    }
}
// Return json array containing data from the database
echo $json_info1 = json_encode($arr1);
?>