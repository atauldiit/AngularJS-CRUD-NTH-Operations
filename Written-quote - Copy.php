<?php
include_once 'databaseFiles/database_connections.php';

//echo $_GET['view_id']."<br>";
//$sql_query="SELECT * FROM users WHERE user_id=".$_GET['view_id'];
$query = "SELECT * FROM `nBasic` ORDER BY `idx` DESC";

$result = mysqli_query( $con, $query );
$arr = array();
if ( mysqli_num_rows( $result ) != 0 ) {
	while ( $row = mysqli_fetch_assoc( $result ) ) {
		$fk_idx = $row[ "fk_idx" ];
	}
}
//echo $idx;
include( 'header.php' );
?>
<!-- Form used to add new entries of employee in database -->
<div class="container wrapper">
	<div ng-include src="'templates/menu.php'"></div>
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<div class="alert alert-default navbar-brand search-box">
				<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Add New <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
			</div>
			<div class="alert alert-default input-group search-box">
				<span class="input-group-btn">
                            <input type="text" class="form-control" placeholder="Search infomation Details Into Database..." ng-model="search_query">
                        </span>
			

			</div>
		</div>
	</nav>
	<form class="form-horizontal" action="">
		<h3 class="text-center">세부 코트에 삽입] 데이터베이스 (Insert Quote Details Into Database)</h3>
		<table class="table table-striped addQuote">
			<thead>
				<!-- -------------------------- Basic Informatin Start ----------------------------- -->
				<tr class="tr_gradient">
					<th colspan="10">
						<h5 class="title">기본 정보 (Basic Info)</h5>
					</th>
				</tr>
				<tr>
					<th class="textBgColortd"> <label for="txtRegister">Register Name:</label>
						<input type="text" name="txtRegister" class="form-control" placeholder="Enter Register Name" ng-model="empInfo.txtRegister" value="" autofocus required>
						<p class="text-danger" ng-show="empList.txtRegister.$invalid && empList.txtRegister.$dirty">Name field is Empty!</p>
					</th>
					<th>&nbsp;</th>
					<th colspan="2" class="textBgColortd"><label for="dtTime">Last Modified:</label>
						<input type="datetime" name="dtTime" class="form-control" placeholder="<?php echo date(" Y/m/d ") ?>" ng-model="empInfo.dtTime" value="<?php echo date(" Y/m/d ") ?>" autofocus readonly>
					</th>
					<th colspan="2" class="textBgColortd"><label for="txtHotelLevel">Hotel Rating:</label>
						<select class="form-control" name='txtHotelLevel'>
							<option>전체 (All)</option>
							<option>1급 (1st grade)</option>
							<option>준특급 (Limited Express)</option>
							<option>특급 (Express)</option>
						</select>
					</th>
					<th colspan="2" class="textBgColortd"> <label for="txtHotelDownTown">Downtown:</label>
						<select class="form-control" name='txtHotelDownTown'>
							<option>전체 (all)</option>
							<option>30분 거리 (30 minutes away)</option>
							<option>50분 거리 (50 mins)</option>
						</select>
					</th>
					<th colspan="2" class="textBgColortd"><label for="txtWriteDate">First Date:</label>
						<input type="text" name="txtWriteDate" class="form-control" placeholder="<?php echo date(" Y/m/d ") ?>" ng-model="empInfo.txtWriteDate" value="<?php echo date(" Y/m/d ") ?>" autofocus readonly>
						<p class="text-danger" ng-show="empList.txtWriteDate.$invalid && empList.txtWriteDate.$dirty">First Date field is Empty!</p>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="textBgColortd" scope="row"><label for="txtRequestorCompany">Customers<sup>(1)</sup>:</label>
						<select class="form-control" name="txtRequestorCompany" ng-model="empInfo.txtRequestorCompany">
							<option value=''>거래처 선택</option>
							<option ng-repeat="txtRequestorCompany_nBasicDetail in txtRequestorCompany_nBasicDetails | filter:search_query" value="{{txtRequestorCompany_nBasicDetail.txtRequestorCompany}}">{{txtRequestorCompany_nBasicDetail.txtRequestorCompany}}</option>
							<option value='_ETC_'>기타</option>
						</select>
					</td>
					<td>&nbsp;</td>
					<td class="textBgColortd" colspan="4"><label for="txtRequestor">Client:</label>
						<select class="form-control" name="txtRequestor" ng-model="empInfo.txtRequestor">
							<option value=''>의뢰인 선택</option>
							<option ng-repeat="txtRequestor_nBasicDetail in txtRequestor_nBasicDetails| filter:search_query" value="{{txtRequestor_nBasicDetail.txtRequestor}}">{{txtRequestor_nBasicDetail.txtRequestor}}</option>
							<option value='_ETC_'>기타</option>
						</select>
					</td>
					<td class="textBgColortd" colspan="4"><label for="txtPrtCode">Product Code:</label>
						<input type="text" name="txtPrtCode" class="form-control" placeholder="Enter Product Code" ng-model="empInfo.txtPrtCode" autofocus>
					</td>
				</tr>
				<tr>
					<th class="textBgColortd" scope="row"><label for="txtGroup">(Group name)<sup>(2)</sup>:</label>
						<select class="form-control" name="txtGroup" ng-model="empInfo.txtGroup">
							<option value=''>단체명 선택</option>
							<option ng-repeat="txtGroup_nBasicDetail in txtGroup_nBasicDetails | filter:search_query" value="{{txtGroup_nBasicDetail.txtGroup}}">{{txtGroup_nBasicDetail.txtGroup}}</option>
							<option value='_ETC_'>기타</option>
						</select>
					</th>
					<th>&nbsp;</th>
					<th colspan="3" class="textBgColortd"><label for="txtEstimator">Calculation of:</label>
						<select class="form-control" name="txtEstimator" ng-model="empInfo.txtEstimator">
							<option value=''>산출인 선택</option>
							<option ng-repeat="txtEstimator_nBasicDetail in txtEstimator_nBasicDetails | filter:search_query" value="{{txtEstimator_nBasicDetail.txtEstimator}}">{{txtEstimator_nBasicDetail.txtEstimator}}</option>
							<option value='_ETC_'>기타</option>
						</select>
					</th>
					<th colspan="3" class="textBgColortd"><label for="intPerson">Number of Person:</label>
						<input type="number" name="intPerson" class="form-control" placeholder="Enter Number of Person" ng-model="empInfo.intPerson" autofocus required/>
					</th>
					<th colspan="2"><label>Team Leader:</label>
						<select class="form-control" name="txtNameTC">
							<option>TC</option>
							<option value="_ETC_">Etc</option>
						</select>
						<input class="form-control" placeholder="Number of TC" type="text" name="intTC">
					</th>
				</tr>
				<tr scope="row">
					<td class="textBgColortd" scope="row"><label for="txtEventName">Event Name<sup>(3)</sup>:</label>
						<select class="form-control" name="txtEventName" ng-model="empInfo.txtEventName">
							<option value=''>지역명 또는 특정 관광명 선택</option>
							<option ng-repeat="txtEventName_nBasicDetail in txtEventName_nBasicDetails | filter:search_query" value="{{txtEventName_nBasicDetail.txtEventName}}">{{txtEventName_nBasicDetail.txtEventName}}</option>
							<option value='_ETC_'>기타</option>
						</select>
					</td>
					<th>&nbsp;</th>
					<td class="textBgColortd" colspan="2"><label for="txtTourLocation">Tour Location:</label>
						<select class="form-control" name="txtTourLocation" ng-model="empInfo.txtTourLocation">
							<option>한국 시종일</option>
							<option ng-repeat="tourLocation_company_infoDetail in tourLocation_company_infoDetails | filter:search_query" value="{{tourLocation_company_infoDetail.name}}">{{tourLocation_company_infoDetail.name}}</option>
							<option value='_ETC_'>기타</option>
						</select>
					</td>
					<td><label for="First Date">Start Date:</label>
						<input type="date" name="txtTourStart" class="form-control" placeholder="Enter Tour Starting Date" value="empInfo.txtTourStart" ng-model="empInfo.txtTourStart" autofocus required/>
					</td>
					<td colspan="2"><label for="First Date">End Date:</label>
						<input type="date" name="txtTourEnd" class="form-control" placeholder="Enter Tour Ending Date" ng-model="empInfo.txtTourEnd" autofocus required/>
					</td>
					<td colspan="3"><label for="txtTourLength">Travel Duration<sup>(4)</sup>:</label>
						<input type="number" name="txtTourLength" class="form-control" placeholder="{{(empInfo.txtTourEnd - empInfo.txtTourStart) / (1000 * 60 * 60 * 24)}} Days" value="{{(empInfo.txtTourEnd - empInfo.txtTourStart) / (1000 * 60 * 60 * 24)}} Days" ng-model="empInfo.txtTourLength" autofocus readonly/>
					</td>
				</tr>
				<tr>
					<th colspan="10" scope="row"><label>Product Name:</label>
						<input class="form-control" type='text' name='txtPrtName' value="{{empInfo.txtRequestorCompany}} {{empInfo.txtGroup}} {{empInfo.txtEventName}} {{(empInfo.txtTourEnd - empInfo.txtTourStart) / (1000 * 60 * 60 * 24)}}" placeholder='Automatically generated based on values 1, 2, 3, and 4' readonly>
					</th>
				</tr>

				<tr scope="row">
					<th colspan="10">&nbsp;</th>
				</tr>
			</tbody>
		</table>
		<!-- -------------------------- Basic Informatin End ----------------------------- -->
		<!-- -------------------------- Hotel Informatin Start ----------------------------- -->
		<table class="table table-striped addQuote" id="tabel-addquote-hotel">
			<tr class="tr_gradient">
				<th colspan="10">
					<h5 class="title">1.호텔 (Hotel)</h5>
				</th>
			</tr>
			<tr scope="row">
				<th colspan="2" scope="row">날짜 (Date)</th>
				<th colspan="2">지역 (Area) </th>
				<th>호텔명 (Hotel Name)</th>
				<th>요금 (Fee)</th>
				<th>박수 (Days)</th>
				<th>방수 (Rooms)</th>
				<th colspan="2">소계 (Sub Total)</th>
			</tr>
			<tr scope="row">
				<td colspan="2"><input type="date" name="txtTourStart" class="form-control" placeholder="Enter Tour Starting Date" value="empInfo.txtTourStart" ng-model="empInfo.txtTourStart" autofocus required/>
				</td>
				<td colspan="2">
					<?php include("http://barisys.com/topangular6/databaseFiles/depent-option1.php"); ?>
				</td>

				<td id="txtHint1">Hotel Name info will be listed here</td>
				<td><input type="number" name="floatPrice" class="form-control" placeholder="Enter Fee" ng-model="empInfo.floatPrice" autofocus required/>
				</td>
				<td><input type="number" name="floatNight" class="form-control" placeholder="How Many Days" ng-model="empInfo.floatNight" autofocus required/>
				</td>
				<td><input type="number" name="floatRoom" class="form-control" placeholder="How Many Rooms" ng-model="empInfo.floatRoom" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal" class="form-control" placeholder="Sub Total" value="{{empInfo.floatPrice * empInfo.floatNight * empInfo.floatRoom}}" ng-model="empInfo.floatSubtotal" autofocus readonly/>
				</td>
			</tr>
			<tr scope="row">
				<td colspan="2"><input type="date" name="txtTourStart" class="form-control" placeholder="Enter Tour Starting Date" value="empInfo.txtTourStart + empInfo.floatNight" ng-model="empInfo.txtTourStart" autofocus required/>
				</td>
				<td colspan="2">
					<?php include("http://barisys.com/topangular6/databaseFiles/depent-option3.php"); ?>
				</td>

				<td id="txtHint2">Hotel Name info will be listed here</td>
				<td><input type="number" name="floatPrice2" class="form-control" placeholder="Enter Fee" ng-model="empInfo.floatPrice" autofocus required/>
				</td>
				<td><input type="number" name="floatNight" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatNight" autofocus required/>
				</td>
				<td><input type="number" name="floatRoom" class="form-control" placeholder="Enter Waterproof" ng-model="empInfo.floatRoom" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal" class="form-control" placeholder="Sub Total" value="{{empInfo.floatPrice * empInfo.floatNight * empInfo.floatRoom}}" ng-model="empInfo.floatSubtotal" autofocus readonly/>
				</td>
			</tr>
			<tr scope="row">
				<td colspan="2"><input type="date" name="txtTourStart" class="form-control" placeholder="Enter Tour Starting Date" value="empInfo.txtTourStart" ng-model="empInfo.txtTourStart" autofocus required/>
				</td>
				<td colspan="2">
					<?php include("http://barisys.com/topangular6/databaseFiles/depent-option5.php"); ?>
				</td>

				<td id="txtHint3">Hotel Name info will be listed here</td>
				<td><input type="number" name="floatPrice2" class="form-control" placeholder="Enter Fee" ng-model="empInfo.floatPrice" autofocus required/>
				</td>
				<td><input type="number" name="floatNight" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatNight" autofocus required/>
				</td>
				<td><input type="number" name="floatRoom" class="form-control" placeholder="Enter Waterproof" ng-model="empInfo.floatRoom" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal" class="form-control" placeholder="Sub Total" value="{{empInfo.floatPrice * empInfo.floatNight * empInfo.floatRoom}}" ng-model="empInfo.floatSubtotal" autofocus readonly/>
				</td>
			</tr>
		</table>
		<a onclick="myFunction()">Add Row</a>
		<!-- -------------------------- Hotel Informatin End ----------------------------- -->

		<!-- -------------------------- Meals Informatin Start ----------------------------- -->
		<table class="table table-striped addQuote">
			<tr class="tr_gradient">
				<th colspan="10">
					<h5 class="title">2.식사 (Meals)</h5>
				</th>
			</tr>
			<tr>
				<th colspan="2"><label for="txtType_1">Classification:</label>
				</th>
				<th colspan="2"><label for="floatPrice_1">price:</label>
				</th>
				<th colspan="2"><label for="floatPerson_1">personnel:</label>
				</th>
				<th colspan="2"><label for="First Date">Count:</label>
				</th>
				<th colspan="2"><label for="floatSubtotal">Sub Total:</label>
				</th>
			</tr>
			<tr>
				<td colspan="2" scope="row">
					<select class="form-control" name="txtType_1" ng-model="empInfo.txtType_1">
						<option>종류 선택 (Select type)</option>
						<option>조식 (Breakfast)</option>
						<option>중식 (Chinese)</option>
						<option>석식 (Dinner)</option>
						<option>특식 (Special)</option>
						<option>간식 (Snack)</option>
						<option value='_ETC_'>기타 (Etc)</option>
					</select>
				</td>
				<td colspan="2"><input type="number" name="floatPrice_1" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_1" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatPerson_1" class="form-control" placeholder="Enter How Many Person" ng-model="empInfo.floatPerson_1" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatCount_1" class="form-control" placeholder="Enter Count" ng-model="empInfo.floatCount_1" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal_1" class="form-control" placeholder="Sub Total" ng-model="empInfo.floatSubtotal_1" value="{{empInfo.floatPrice_1 * empInfo.floatPrice_1 * empInfo.floatCount_1}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td colspan="2" scope="row">
					<select class="form-control" name="txtType_1" ng-model="empInfo.txtType_1">
						<option>종류 선택 (Select type)</option>
						<option>조식 (Breakfast)</option>
						<option>중식 (Chinese)</option>
						<option>석식 (Dinner)</option>
						<option>특식 (Special)</option>
						<option>간식 (Snack)</option>
						<option value='_ETC_'>기타 (Etc)</option>
					</select>
				</td>
				<td colspan="2"><input type="number" name="floatPrice_1" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_1" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatPerson_1" class="form-control" placeholder="Enter How Many Person" ng-model="empInfo.floatPerson_1" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatCount_1" class="form-control" placeholder="Enter Count" ng-model="empInfo.floatCount_1" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal_1" class="form-control" placeholder="Sub Total" ng-model="empInfo.floatSubtotal_1" value="{{empInfo.floatPrice_1 * empInfo.floatPrice_1 * empInfo.floatCount_1}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td colspan="2" scope="row">
					<select class="form-control" name="txtType_1" ng-model="empInfo.txtType_1">
						<option>종류 선택 (Select type)</option>
						<option>조식 (Breakfast)</option>
						<option>중식 (Chinese)</option>
						<option>석식 (Dinner)</option>
						<option>특식 (Special)</option>
						<option>간식 (Snack)</option>
						<option value='_ETC_'>기타 (Etc)</option>
					</select>
				</td>
				<td colspan="2"><input type="number" name="floatPrice_1" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_1" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatPerson_1" class="form-control" placeholder="Enter How Many Person" ng-model="empInfo.floatPerson_1" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatCount_1" class="form-control" placeholder="Enter Count" ng-model="empInfo.floatCount_1" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal_1" class="form-control" placeholder="Sub Total" ng-model="empInfo.floatSubtotal_1" value="{{empInfo.floatPrice_1 * empInfo.floatPrice_1 * empInfo.floatCount_1}}" autofocus readonly/>
				</td>
			</tr>
		</table>
		<!-- -------------------------- Meals Informatin End ----------------------------- -->

		<!-- -------------------------- Vehicle Informatin Start ----------------------------- -->
		<table class="table table-striped addQuote">
			<tr class="tr_gradient">
				<th colspan="10">
					<h5 class="title">3. 차량 (Vehicle)</h5>
				</th>
			</tr>
			<tr>
				<td><label for="txtType_2">Vehicle Type:</label>
				</td>
				<td>&nbsp;</td>
				<td colspan="3"><label for="floatPrice_2">Fee:</label>
				</td>
				<td colspan="3"><label for="floatDay_2">Days:</label>
				</td>
				<td colspan="2"><label for="floatSubtotal_2">Sub Total:</label>
			</tr>
			<tr>
				<td>
					<select class="form-control" name="txtType_2" ng-model="empInfo.txtType_2">
						<option ng-repeat="nBusDetail in nBusDetails| filter:search_query" value="{{nBusDetail.txtType_2}}">{{nBusDetail.txtType_2}}</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td colspan="3"><input type="number" name="floatPrice_2" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_2" autofocus required/>
				</td>
				<td colspan="3"><input type="number" name="floatDay_2" class="form-control" placeholder="Enter personnel" ng-model="empInfo.floatDay_2" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal_2" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatSubtotal_2" value="{{empInfo.floatPrice_2 * empInfo.floatDay_2}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td>
					<select class="form-control" name="txtType_2" ng-model="empInfo.txtType_2">
						<option ng-repeat="nBusDetail in nBusDetails| filter:search_query" value="{{nBusDetail.txtType_2}}">{{nBusDetail.txtType_2}}</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td colspan="3"><input type="number" name="floatPrice_2" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_2" autofocus required/>
				</td>
				<td colspan="3"><input type="number" name="floatDay_2" class="form-control" placeholder="Enter personnel" ng-model="empInfo.floatDay_2" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal_2" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatSubtotal_2" value="{{empInfo.floatPrice_2 * empInfo.floatDay_2}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td>
					<select class="form-control" name="txtType_2" ng-model="empInfo.txtType_2">
						<option ng-repeat="nBusDetail in nBusDetails| filter:search_query" value="{{nBusDetail.txtType_2}}">{{nBusDetail.txtType_2}}</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td colspan="3"><input type="number" name="floatPrice_2" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_2" autofocus required/>
				</td>
				<td colspan="3"><input type="number" name="floatDay_2" class="form-control" placeholder="Enter personnel" ng-model="empInfo.floatDay_2" autofocus required/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal_2" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatSubtotal_2" value="{{empInfo.floatPrice_2 * empInfo.floatDay_2}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td colspan="7">&nbsp;</td>
				<td><label for="floatBusTotal">Total:</label>
				</td>
				<td colspan="2"><input type="number" name="floatBusTotal" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatBusTotal" value="{{empInfo.floatPrice_2 * empInfo.floatDay_2}}" autofocus readonly/>
				</td>
			</tr>
			<!-- -------------------------- Vehicle Informatin End ----------------------------- -->
		</table>
		<table class="table table-striped addQuote">
			<!-- -------------------------- Attractive Informatin Start ----------------------------- -->
			<tr class="tr_gradient">
				<th colspan="10">
					<h5 class="title">4. 입장료 (Attractive)</h5>
				</th>
			</tr>
			<tr>
				<td><label for="Entry area">Entry area:</label>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><label for="floatPrice_3">Admission fee:</label>
				</td>
				<td colspan="3"><label for="floatPerson_3">Personnel:</label>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><label for="floatSubtotal_3">Sub Total:</label>
				</td>
			</tr>
			<tr>
				<td>
					<select class="form-control" name="name" ng-model="empInfo.txtType_3">
						<option ng-repeat="ticketCompany_infoDetail in ticketCompany_infoDetails| filter:search_query" value="{{ticketCompany_infoDetail.name}}">{{ticketCompany_infoDetail.name}}</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="number" name="floatPrice_3" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_3" autofocus required/>
				</td>
				<td colspan="3"><input type="number" name="floatPerson_3" class="form-control" placeholder="Enter personnel" ng-model="empInfo.floatPerson_3" autofocus required/>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="number" name="floatSubtotal_3" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatSubtotal_3" value="{{empInfo.floatPrice_3 * empInfo.floatPerson_3}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td>
					<select class="form-control" name="name" ng-model="empInfo.txtType_3">
						<option ng-repeat="ticketCompany_infoDetail in ticketCompany_infoDetails| filter:search_query" value="{{ticketCompany_infoDetail.name}}">{{ticketCompany_infoDetail.name}}</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="number" name="floatPrice_3" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_3" autofocus required/>
				</td>
				<td colspan="3"><input type="number" name="floatPerson_3" class="form-control" placeholder="Enter personnel" ng-model="empInfo.floatPerson_3" autofocus required/>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="number" name="floatSubtotal_3" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatSubtotal_3" value="{{empInfo.floatPrice_3 * empInfo.floatPerson_3}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td>
					<select class="form-control" name="name" ng-model="empInfo.txtType_3">
						<option ng-repeat="ticketCompany_infoDetail in ticketCompany_infoDetails| filter:search_query" value="{{ticketCompany_infoDetail.name}}">{{ticketCompany_infoDetail.name}}</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="number" name="floatPrice_3" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_3" autofocus required/>
				</td>
				<td colspan="3"><input type="number" name="floatPerson_3" class="form-control" placeholder="Enter personnel" ng-model="empInfo.floatPerson_3" autofocus required/>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="number" name="floatSubtotal_3" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatSubtotal_3" value="{{empInfo.floatPrice_3 * empInfo.floatPerson_3}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td colspan="7">&nbsp;</td>
				<td><label for="floatTicketTotal">Total:</label>
				</td>
				<td colspan="2"><input type="number" name="floatTicketTotal" class="form-control" placeholder="Total" ng-model="empInfo.floatTicketTotal" value="{{empInfo.floatPrice_3 * empInfo.floatPerson_3}}" autofocus readonly/>
				</td>
			</tr>
			<!-- -------------------------- Attractive Informatin End ----------------------------- -->
		</table>
		<table class="table table-striped addQuote">
			<!-- -------------------------- Cost Guide Informatin Start ----------------------------- -->
			<tr class="tr_gradient">
				<th colspan="10">
					<h5 class="title">5. 가이드 비용 (Cost Guide)</h5>
				</th>
			</tr>
			<tr>
				<td><label for="intType_4">Number of people:</label>
				</td>
				<td>&nbsp;</td>
				<td colspan="3"><label for="floatPrice_4">Cost:</label>
				</td>
				<td colspan="3"><label for="floatCount_4">Days:</label>
				</td>
				<td colspan="2"><label for="floatSubtotal_4">Sub Total:</label>
				</td>
			</tr>
			<tr>
				<td><input type="number" name="intType_4" class="form-control" placeholder="Enter price" ng-model="empInfo.intType_4" autofocus/>
				</td>
				<td>&nbsp;</td>
				<td colspan="3"><input type="number" name="floatPrice_4" class="form-control" placeholder="Enter Cost" ng-model="empInfo.floatPrice_4" autofocus/>
				</td>
				<td colspan="3"><input type="number" name="floatCount_4" class="form-control" placeholder="Enter Days" ng-model="empInfo.floatCount_4" autofocus/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal_4" class="form-control" placeholder="sub Total" ng-model="empInfo.floatSubtotal_4" value="{{empInfo.intType_4 * empInfo.floatPrice_4 * empInfo.floatCount_4}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td><input type="number" name="intType_4" class="form-control" placeholder="Enter price" ng-model="empInfo.intType_4" autofocus/>
				</td>
				<td>&nbsp;</td>
				<td colspan="3"><input type="number" name="floatPrice_4" class="form-control" placeholder="Enter Cost" ng-model="empInfo.floatPrice_4" autofocus/>
				</td>
				<td colspan="3"><input type="number" name="floatCount_4" class="form-control" placeholder="Enter Days" ng-model="empInfo.floatCount_4" autofocus/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal_4" class="form-control" placeholder="sub Total" ng-model="empInfo.floatSubtotal_4" value="{{empInfo.intType_4 * empInfo.floatPrice_4 * empInfo.floatCount_4}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td><input type="number" name="intType_4" class="form-control" placeholder="Enter price" ng-model="empInfo.intType_4" autofocus/>
				</td>
				<td>&nbsp;</td>
				<td colspan="3"><input type="number" name="floatPrice_4" class="form-control" placeholder="Enter Cost" ng-model="empInfo.floatPrice_4" autofocus/>
				</td>
				<td colspan="3"><input type="number" name="floatCount_4" class="form-control" placeholder="Enter Days" ng-model="empInfo.floatCount_4" autofocus/>
				</td>
				<td colspan="2"><input type="number" name="floatSubtotal_4" class="form-control" placeholder="sub Total" ng-model="empInfo.floatSubtotal_4" value="{{empInfo.intType_4 * empInfo.floatPrice_4 * empInfo.floatCount_4}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td colspan="7">&nbsp;</td>
				<td>Total:</td>
				<td colspan="2"><input type="number" name="floatGuideTotal" class="form-control" placeholder="Total" ng-model="empInfo.floatGuideTotal" value="{{empInfo.intType_4 * empInfo.floatPrice_4 * empInfo.floatCount_4}}" autofocus readonly/>
				</td>
			</tr>
		</table>
		<!-- -------------------------- Cost Guide Informatin End ----------------------------- -->

		<!-- -------------------------- Other details Informatin Start ----------------------------- -->
		<table class="table table-striped addQuote">
			<tr class="tr_gradient">
				<th colspan="10">
					<h5 class="title">6. 기타 포함사항 (Other details include)</h5>
				</th>
			</tr>
			<tr>
				<td><label for="Entry area">Contents:</label>
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td colspan="2"><label for="floatSubtotal_5">Price:</label>
				</td>
			</tr>
			<tr>
				<td>
					<select class="form-control" name="txtType_6" ng-model="empInfo.txtType_6">
						<option ng-repeat="nETCDetail in nETCDetails| filter:search_query" value="{{nETCDetail.txtType_6}}">{{nETCDetail.txtType_6}}</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="number" name="floatPrice_6" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_6" autofocus/>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><label>Total</label>
				</td>
				<td colspan="2">{{empInfo.floatPrice_6}}</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<!-- -------------------------- Other details Informatin End ----------------------------- -->
		</table>
		<table class="table table-striped addQuote">
			<!-- -------------------------- Handling Charge details Informatin Start ----------------------------- -->
			<tr class="tr_gradient">
				<th colspan="10">
					<h5 class="title">7. 현지 핸들링 Charge (Handling Charge)</h5>
				</th>
			</tr>
			<tr>
				<td><label for="Entry area">Contents:</label>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><label for="floatSubtotal_5">Price:</label>
				</td>
				<td colspan="3"><label for="floatProfit_5">Yield (%):</label>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><label for="floatPrice_5">Proceeds:</label>
				</td>
			</tr>
			<tr>
				<td>
					<select class="form-control" name="txtType_5" ng-model="empInfo.txtType_5">
						<option ng-repeat="nProfitDetail in nProfitDetails| filter:search_query" value="{{nProfitDetail.txtType_5}}">{{nProfitDetail.txtType_5}}</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="number" name="floatSubtotal_5" class="form-control" placeholder="Enter price" ng-model="empInfo.floatSubtotal_5" autofocus/>
				</td>
				<td colspan="3"><input type="number" name="floatPerson_1" class="form-control" placeholder="Enter Yield (%)" ng-model="empInfo.floatProfit_5" autofocus/>
				</td>
				<td>&nbsp;</td>
				<td colspan="2"><input type="number" name="floatPrice_5" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatPrice_5" value="{{empInfo.floatSubtotal_5 * empInfo.floatProfit_5}}" autofocus readonly/>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<!-- -------------------------- Handling Charge details Informatin End ----------------------------- -->

			</tbody>
		</table>
		<div class="form-group">
			<button class="btn btn-warning" ng-disabled="empList.$invalid">저장하기새로하기 (Add Into Database)</button>
		</div>
	</form>
</div>

<?php 
			// Return json array containing data from the database
			$json_info = json_encode( $arr );
		
			include( 'footer.php' );
		?>