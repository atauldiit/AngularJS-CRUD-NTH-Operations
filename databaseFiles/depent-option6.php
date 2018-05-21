<?php include 'database_connections.php'; ?>

<?php
$sq1 = strval ($_GET['q1']);

//mysqli_select_db($con,"ajax_demo");
//$sql="SELECT `name` FROM `company_info` WHERE 'city' = ".$q." ORDER BY `name` ASC";
//$sql ="SELECT * FROM `company_info` WHERE `type` LIKE 'hotel' AND `city` LIKE '".$q."'";
//$sql = "SELECT DISTINCT `name` FROM `company_info` WHERE `name` != '' AND `place` = '".$q1."' OR `city` = '".$q1."' OR `state` = '".$q1."' ORDER BY `name` ASC";
//$sql = "SELECT `name` FROM `company_info` WHERE `type` = 'hotel' AND `name` != '' AND `place` = '".$q1."' OR `city` = '".$q1."' OR `state` = '".$q1."' ORDER BY `name` ASC";
$sql = "SELECT DISTINCT `name` FROM `company_info` WHERE `type` = 'hotel' AND `name` != '' AND `place` = '". $sq1 ."' OR `city` = '". $sq1 ."' OR `state` = '". $sq1 ."' ORDER BY `name` ASC";

$result = mysqli_query($con,$sql);

echo "<select name='txtHotel[]' class='form-control'>";
if ($result->num_rows > 0) {
	//echo "<option> q1" . $sq1 . "</option>";
	while($row = mysqli_fetch_array($result)) {    
		echo "<option value='$row[city]'>" . $row['name'] . "</option>>";    
	}
}
else {echo"<option>0 results</option>";}

echo "</select>";

?>