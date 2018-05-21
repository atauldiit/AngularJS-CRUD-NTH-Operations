<?php

// Including database connections
require_once 'database_connections.php';
// mysqli query to fetch all data from database
//$query = "SELECT * FROM `company_info` ORDER BY `name` ASC";
$query20 = "SELECT * FROM `company_info` WHERE `type` LIKE 'trans' AND place != '' AND `place` IS NOT NULL AND `addr` != '' AND `addr` IS NOT NULL AND `city` IS NOT NULL AND `state` IS NOT NULL ORDER BY `name` ASC";
$result20 = mysqli_query($con, $query20);
$arr20 = array();
if (mysqli_num_rows($result20) != 0) {
    while ($row20 = mysqli_fetch_assoc($result20)) {
        $arr20[] = $row20;
    }
}
// Return json array containing data from the database
echo $json_info20 = json_encode($arr20);
?>