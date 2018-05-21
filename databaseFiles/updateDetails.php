<?php 
// Including database connections
require_once 'database_connections.php';
// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input")); 
// Escaping special characters from updated data
$id = mysqli_real_escape_string($con, $data->id);
$type = mysqli_real_escape_string($con, $data->type);
$name = mysqli_real_escape_string($con, $data->name);
$txtHotelLevel = mysqli_real_escape_string($con, $data->txtHotelLevel);
$txtHotelDownTown = mysqli_real_escape_string($con, $data->txtHotelDownTown);
$officer = mysqli_real_escape_string($con, $data->officer);
$place = mysqli_real_escape_string($con, $data->place);
$addr = mysqli_real_escape_string($con, $data->addr);
$city = mysqli_real_escape_string($con, $data->city);
$state = mysqli_real_escape_string($con, $data->state);
$zip = mysqli_real_escape_string($con, $data->zip);
$tel = mysqli_real_escape_string($con, $data->tel);
$fax = mysqli_real_escape_string($con, $data->fax);
$email = mysqli_real_escape_string($con, $data->email);
$website = mysqli_real_escape_string($con, $data->website);
$remark = mysqli_real_escape_string($con, $data->remark);
$netprice = mysqli_real_escape_string($con, $data->netprice);
$price = mysqli_real_escape_string($con, $data->price);
$priceR = mysqli_real_escape_string($con, $data->priceR);
$netprice_M = mysqli_real_escape_string($con, $data->netprice_M);
$price_M = mysqli_real_escape_string($con, $data->price_M);
$priceR_M = mysqli_real_escape_string($con, $data->priceR_M);
$dateWinter_1 = mysqli_real_escape_string($con, $data->dateWinter_1);
$dateWinter_2 = mysqli_real_escape_string($con, $data->dateWinter_2);
$optPrice_1 = mysqli_real_escape_string($con, $data->optPrice_1);
$dateSpring_1 = mysqli_real_escape_string($con, $data->dateSpring_1);
$dateSpring_2 = mysqli_real_escape_string($con, $data->dateSpring_2);
$optPrice_2 = mysqli_real_escape_string($con, $data->optPrice_2);
$dateSummer_1 = mysqli_real_escape_string($con, $data->dateSummer_1);
$dateSummer_2 = mysqli_real_escape_string($con, $data->dateSummer_2);
$optPrice_3 = mysqli_real_escape_string($con, $data->optPrice_3);
$dateFall_1 = mysqli_real_escape_string($con, $data->dateFall_1);
$dateFall_2 = mysqli_real_escape_string($con, $data->dateFall_2);
$optPrice_4 = mysqli_real_escape_string($con, $data->optPrice_4);

// mysqli query to insert the updated data
/*$query = "UPDATE `company_info` SET `name` = '$name', `txtHotelLevel` = '$txtHotelLevel', `txtHotelDownTown` = '$txtHotelDownTown', `officer` = '$officer', `addr` = '$addr', `city` = '$city', `state` = '$state', `zip` = '$zip', `tel` = '$tel', `fax` = '$fax', `email` = '$email', `website`, = '$website', `remark` = '$remark', `netprice` = '$netprice', `price` = '$price', `priceR` = '$priceR', `netprice_M` = '$netprice_M', `price_M` = '$price_M', `priceR_M` = '$priceR_M' WHERE `company_info`.`id` = '$id'";*/
$query = "UPDATE `barisys_topbari`.`company_info` SET `name` = '$name', `txtHotelLevel` = '$txtHotelLevel', `txtHotelDownTown` = '$txtHotelDownTown', `officer` = '$officer', `place` = '$place', `addr` = '$addr', `city` = '$city', `state` = '$state', `zip` = '$zip', `tel` = '$tel', `fax` = '$fax', `email` = '$email', `website` = '$website', `remark` = '$remark', `netprice` = '$netprice', `price` = '$price', `priceR` = '$priceR', `netprice_M` = '$netprice_M', `price_M` = '$price_M', `priceR_M` = '$priceR_M' WHERE `company_info`.`id` = $id;";
mysqli_query($con, $query);
echo true;
?>