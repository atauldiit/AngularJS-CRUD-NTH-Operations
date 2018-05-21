<?php

// Including database connections
require_once 'database_connections.php';
// mysqli query to fetch all data from database
$query30 = "SELECT DISTINCT * FROM `nHotel` ORDER BY `idx` DESC";
$result30 = mysqli_query($con, $query30);
$arr30 = array();
if (mysqli_num_rows($result30) != 0) {
    while ($row30 = mysqli_fetch_assoc($result30)) {
        $arr30[] = $row30;
    }
}
// Return json array containing data from the database
echo $json_info30 = json_encode($arr30);
?>