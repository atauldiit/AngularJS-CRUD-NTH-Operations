<?php 
// Including database connections
require_once 'database_connections.php';
// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input")); 
// Escaping special characters from submitting data & storing in new variables.
//$txtRegister = mysqli_real_escape_string($con, $data->txtRegister);
date_default_timezone_set("America/New_York");
$dtTime = date("Y/m/d");
//$txtWriteDate = date("Y/m/d");

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

// mysqli insert query
/*$query = "INSERT company_info (type,name,txtHotelLevel,txtHotelDownTown,officer,place,addr,city,state,zip,tel,fax,email,website,remark,netprice,price,priceR,netprice_M,price_M,priceR_M) VALUES ('$type','$name','$txtHotelLevel','$txtHotelDownTown','$officer','$place','$dtTime','$addr','$city','$state','$zip','$tel','$fax','$email','$website','$remark','$netprice','$price','$priceR','$netprice_M','$price_M','$priceR_M')"; */

$query = "INSERT INTO `barisys_topbari`.`company_info` (`id`, `type`, `subType`, `name`, `place`, `addr`, `city`, `state`, `zip`, `email`, `officer`, `tel`, `fax`, `remark`, `reg_user_id`, `reg_date`, `edit_user_id`, `edit_date`, `DelFlg`, `price`, `netprice`, `priceR`, `price_M`, `netprice_M`, `priceR_M`, `txtFlag`, `optPrice_1`, `optPrice_2`, `optPrice_3`, `optPrice_4`, `arrayOption`, `txtHotelLevel`, `txtHotelDownTown`, `website`, `isDelete`, `intCurrentQty`, `intCurrentView`, `dateWinter_1`, `dateWinter_2`, `dateSpring_1`, `dateSpring_2`, `dateSummer_1`, `dateSummer_2`, `dateFall_1`, `dateFall_2`) VALUES (NULL, 'hotel', NULL, 'Motel 8', 'va', '10455', 'Ananndale', 'VA', '1000', 'atauldiit@gamail.com', 'officer', '1234567890', '1234567890', 'This is remark', NULL, '2017-03-13 00:00:00', NULL, NULL, NULL, '100', '102', '103', '104', '105', '106', NULL, '107', '108', '109', '110', NULL, NULL, NULL, NULL, '0', '0', '0', '2017-03-13', '2017-03-19', '2017-03-19', '2017-03-26', '2017-03-27', '2017-03-28', '2017-03-29', '2017-03-27')";

// Inserting data into database
mysqli_query($con, $query);
echo true;
?>