<?php

// Including database connections
require_once 'database_connections.php';
// mysqli query to fetch all data from database
$query1 = "select city, state from company_info where type = 'hotel' and state <> '' and isDelete = 0 group by city, state order by city, state";
//$query1 = "select * from company_info where name <> '' OR city <> '' OR state <> '' and isDelete = 0 group by name order by name";
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