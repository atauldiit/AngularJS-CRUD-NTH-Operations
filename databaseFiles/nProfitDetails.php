<?php

// Including database connections
require_once 'database_connections.php';
// mysqli query to fetch all data from database
//$query30 = "SELECT DISTINCT `name` FROM `company_info` WHERE `type` LIKE 'profitType' ORDER BY `name` ASC";
$query30 = "SELECT DISTINCT `txtType_5` FROM `nProfit` WHERE `txtType_5` IS NOT NULL ORDER BY `txtType_5` ASC";
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