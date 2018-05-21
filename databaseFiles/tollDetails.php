<?php

// Including database connections
require_once 'database_connections.php';
// mysqli query to fetch all data from database
//$query = "SELECT * FROM `company_info` ORDER BY `name` ASC";
$query20 = "SELECT * FROM `company_info` WHERE `type` LIKE 'CarToll' AND name != '' AND `name` IS NOT NULL ORDER BY `id` ASC";
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