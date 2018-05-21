<?php

// Including database connections
require_once 'database_connections.php';
// mysqli query to fetch all data from database
$query = "SELECT * FROM `nBasic` ORDER BY `idx` DESC";
//$query = "SELECT DISTINCT `txtRequestor`, `txtRequestorCompany`, `txtEventName`, `txtEstimator`, `txtTourLocation`, `txtNameTC`, `txtGroup` FROM `nBasic` WHERE `txtRequestor` IS NOT NULL AND `txtRequestorCompany` IS NOT NULL AND `txtEventName` IS NOT NULL AND `txtEstimator` IS NOT NULL AND `txtTourLocation` IS NOT NULL AND `txtNameTC` IS NOT NULL AND `txtGroup` IS NOT NULL ORDER BY `idx` DESC";

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