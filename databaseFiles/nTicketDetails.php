<?php

// Including database connections
require_once 'database_connections.php';
// mysqli query to fetch all data from database
//$query = "SELECT DISTINCT name FROM `company_info` WHERE `type` LIKE 'ticket' AND `name` IS NOT NULL ORDER BY `name` ASC";

$query = "SELECT DISTINCT `txtType_3` FROM `nTicket` WHERE `txtType_3` IS NOT NULL ORDER BY `txtType_3` ASC";
$result = mysqli_query($con, $query);
$arr = array();
if (mysqli_num_rows($result) != 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
}
// Return json array containing data from the database
echo $json_info = json_encode($arr);
?>