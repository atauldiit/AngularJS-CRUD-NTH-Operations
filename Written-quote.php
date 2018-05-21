<?php
include( 'header.php' );
include_once 'databaseFiles/database_connections.php';
date_default_timezone_set( "America/New_York" );
?>
<div class="container wrapper" ng-controller="DbController">
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
	<form action="add-quote.php" method="post">
		<div md-whiteframe="24" flex-sm="45" flex-gt-sm="35" flex-gt-md="25">
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
							<input type="text" class="form-control" name="txtRegister" required>
						</th>
						<th>&nbsp;</th>
						<th colspan="2" class="textBgColortd"><label for="dtTime">Last Modified:</label>
							<input type="text" name="dtTime" class="form-control" placeholder="<?php echo ($today = date(" Y/m/d H:i:s ")); ?>" value="<?php echo ($today = date(" Y/m/d H:i:s ")); ?>" autofocus required readonly>
						</th>
						<th colspan="2" class="textBgColortd"><label for="txtHotelLevel">Hotel Rating:</label>
							<select class="form-control" name='txtHotelLevel'>
								<option>전체 (All)</option>
								<option value="1급">1급 (1st grade)</option>
								<option value="준특급">준특급 (Limited Express)</option>
								<option value="특급">특급 (Express)</option>
							</select>
						</th>
						<th colspan="2" class="textBgColortd"> <label for="txtHotelDownTown">Downtown:</label>
							<select class="form-control" name='txtHotelDownTown'>
								<option>전체 (all)</option>
								<option value="30분">30분 거리 (30 minutes away)</option>
								<option value="50분 거리">50분 거리 (50 mins)</option>
							</select>
						</th>
						<th colspan="2" class="textBgColortd"><label for="txtWriteDate">First Date:</label>
							<input type="text" name="txtWriteDate" class="form-control" placeholder="<?php echo ($today = date(" m/d/y ")); ?>" value="<?php echo ($today = date(" m/d/y ")); ?>" autofocus readonly>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="textBgColortd" scope="row"><label for="txtRequestorCompany">Customers<sup>(1)</sup>:</label>
							<select class="form-control" name="txtRequestorCompany" ng-model="empInfo.txtRequestorCompany">
								<option value=''>거래처 선택</option>
								<?php
								$query = "SELECT DISTINCT `txtRequestorCompany` FROM `nBasic` WHERE `txtRequestorCompany` != '' ORDER BY `txtRequestorCompany` ASC";
								$result = mysqli_query( $con, $query );
								if ( mysqli_num_rows( $result ) != 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo( '<option value=' . $row[ "txtRequestorCompany" ] . '>' . $row[ "txtRequestorCompany" ] . '</option>' );
									}
								}
								?>
								<option value='_ETC_'>기타</option>
							</select>
						</td>
						<td>&nbsp;</td>
						<td class="textBgColortd" colspan="4"><label for="txtRequestor">Client:</label>
							<select class="form-control" name="txtRequestor" ng-model="empInfo.txtRequestor">
								<option value=''>의뢰인 선택</option>
								<?php
								$query = "SELECT DISTINCT `txtRequestor` FROM `nBasic` WHERE `txtRequestor` != '' ORDER BY `txtRequestor` ASC";
								$result = mysqli_query( $con, $query );
								if ( mysqli_num_rows( $result ) != 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo( '<option value=' . $row[ "txtRequestor" ] . '>' . $row[ "txtRequestor" ] . '</option>' );
									}
								}
								?>
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
								<?php
								$query = "SELECT DISTINCT `txtGroup` FROM `nBasic` WHERE `txtGroup` != '' ORDER BY `txtGroup` ASC";
								$result = mysqli_query( $con, $query );
								if ( mysqli_num_rows( $result ) != 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo( '<option value=' . $row[ "txtGroup" ] . '>' . $row[ "txtGroup" ] . '</option>' );
									}
								}
								?>
								<option value='_ETC_'>기타</option>
							</select>
						</th>
						<th>&nbsp;</th>
						<th colspan="3" class="textBgColortd"><label for="txtEstimator">Calculation of:</label>
							<select class="form-control" name="txtEstimator" ng-model="empInfo.txtEstimator">
								<option value=''>산출인 선택</option>
								<?php
								$query = "SELECT DISTINCT `txtEstimator` FROM `nBasic` WHERE `txtEstimator` != '' ORDER BY `txtEstimator` ASC";
								$result = mysqli_query( $con, $query );
								if ( mysqli_num_rows( $result ) != 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo( '<option value=' . $row[ "txtEstimator" ] . '>' . $row[ "txtEstimator" ] . '</option>' );
									}
								}
								?>
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
								<?php
								$query = "SELECT DISTINCT `txtEventName` FROM `nBasic` WHERE `txtEventName` != '' ORDER BY `txtEventName` ASC";
								$result = mysqli_query( $con, $query );
								if ( mysqli_num_rows( $result ) != 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo( '<option value=' . $row[ "txtEventName" ] . '>' . $row[ "txtEventName" ] . '</option>' );
									}
								}
								?>
								<option value='_ETC_'>기타</option>
							</select>
						</td>
						<th>&nbsp;</th>
						<td class="textBgColortd" colspan="2"><label for="txtTourLocation">Tour Location:</label>
							<select class="form-control" name="txtTourLocation" ng-model="empInfo.txtTourLocation">
								<?php
								$query = "SELECT DISTINCT `txtTourLocation` FROM `nBasic` WHERE `txtTourLocation` != '' ORDER BY `txtTourLocation` ASC";
								$result = mysqli_query( $con, $query );
								if ( mysqli_num_rows( $result ) != 0 ) {
									while ( $row = mysqli_fetch_assoc( $result ) ) {
										echo( '<option value=' . $row[ "txtTourLocation" ] . '>' . $row[ "txtTourLocation" ] . '</option>' );
									}
								}
								?>
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
							<input type="number" name="txtTourLength" class="form-control" placeholder="{{(empInfo.txtTourEnd - empInfo.txtTourStart) / (1000 * 60 * 60 * 24)| number:0}} Days" value="{{(empInfo.txtTourEnd - empInfo.txtTourStart) / (1000 * 60 * 60 * 24)}} Days" ng-model="empInfo.txtTourLength" autofocus readonly/>
						</td>
					</tr>
					<tr>
						<th colspan="10" scope="row"><label>Product Name:</label>
							<input class="form-control" type='text' name='txtPrtName' value="{{empInfo.txtRequestorCompany}} {{empInfo.txtGroup}} {{empInfo.txtEventName}} {{(empInfo.txtTourEnd - empInfo.txtTourStart) / (1000 * 60 * 60 * 24)| number:0}}" placeholder='Automatically generated based on values 1, 2, 3, and 4' readonly>
						</th>
					</tr>

					<tr scope="row">
						<th colspan="10">&nbsp;</th>
					</tr>
				</tbody>
			</table>
			<!-- -------------------------- Basic Informatin End ----------------------------- -->
			<!-- -------------------------- Hotel Informatin Start ----------------------------- -->
			<button id="btn3" type="button" value="Add Rows">Add Rows</button>
			<button id="btn1" type="button" value="Remove Rows">Remove Rows</button>
			<table class="table table-striped addQuote" id="tabel-addquote-hotel">
				<tr class="tr_gradient">
					<th colspan="10">
						<h5 class="title">1.호텔 (Hotel)</h5>
					</th>
				</tr>
				<tr scope="row">
					<th scope="row">날짜 (Date)</th>
					<th>지역 (Area) </th>
					<th>호텔명 (Hotel Name)</th>
					<th>요금 (Fee)</th>
					<th>박수 (Days)</th>
					<th>방수 (Rooms)</th>
					<th>소계 (Sub Total)</th>
				</tr>
				<tr id="div1" scope="row">
					<td><input type="date" id="start_date" name="txtTourStart" class="form-control" placeholder="Enter Tour Starting Date" value="{{empInfo.txtTourStart}}" ng-model="empInfo.txtTourStart" autofocus required/>
					</td>
					<td>
						<?php include("http://barisys.com/topangular6/databaseFiles/depent-option1.php"); ?>
					</td>

					<td id="txtHint1">Hotel Name info will be listed here</td>
					<td><input type="number" name="floatPrice[]" class="form-control" placeholder="Enter Fee" value="empInfo.floatPrice1" ng-model="empInfo.floatPrice1" autofocus required/>
					</td>
					<td><input type="number" id="days" name="floatNight[]" class="form-control" placeholder="How Many Days" value="empInfo.floatNight1" ng-model="empInfo.floatNight1" autofocus required/>
					</td>
					<td><input type="number" name="floatRoom[]" class="form-control" placeholder="How Many Rooms" value="empInfo.floatRoom1" ng-model="empInfo.floatRoom1" autofocus required/>
					</td>
					<td><input type="number" name="floatSubtotal[]" class="form-control" placeholder="Sub Total" value="{{empInfo.floatPrice1 * empInfo.floatNight1 * empInfo.floatRoom1}}" ng-model="empInfo.floatSubtotal1" autofocus readonly/>
					</td>
				</tr>
				<tr id="div2" scope="row">
					<td><input id="end_date" type="date" name="txtTourStart[]" class="form-control" placeholder="Enter Tour Starting Date" value="{{empInfo.txtTourStart2}}" ng-model="empInfo.txtTourStart2" autofocus required/>
					</td>
					<td>
						<?php include("http://barisys.com/topangular6/databaseFiles/depent-option3.php"); ?>
					</td>

					<td id="txtHint2">Hotel Name info will be listed here</td>
					<td><input type="number" name="floatPrice[]" class="form-control" placeholder="Enter Fee" ng-model="empInfo.floatPrice2" autofocus required/>
					</td>
					<td><input type="number" name="floatNight[]" class="form-control" placeholder="Enter Clap" ng-model="empInfo.floatNight2" autofocus required/>
					</td>
					<td><input type="number" name="floatRoom[]" class="form-control" placeholder="Enter Waterproof" ng-model="empInfo.floatRoom2" autofocus required/>
					</td>
					<td><input type="number" name="floatSubtotal[]" class="form-control" placeholder="Sub Total" value="{{empInfo.floatPrice2 * empInfo.floatNight2 * empInfo.floatRoom2}}" ng-model="empInfo.floatSubtotal2" autofocus readonly/>
					</td>
				</tr>
				<tr>
					<td colspan="6"><label style="text-align: right;">Sum:</label> </td>
					<td colspan="1"><input type="number" name="floatHotelTotal" class="form-control" placeholder="Total" value="{{empInfo.floatSubtotal1 + empInfo.floatSubtotal2}}" ng-model="empInfo.floatHotelTotal" autofocus readonly/></td>
				</tr>
			</table>
			<!-- -------------------------- Hotel Informatin End ----------------------------- -->
			<!-- -------------------------- Meals Informatin Start ----------------------------- -->
			<button id="btn4" type="button" value="Add Rows">Add Rows</button>
			<button id="btn2" type="button" value="Remove Rows">Remove Rows</button>
			<table class="table table-striped addQuote" id="tabel-addquote-meal">
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
				<tr id="div3" scope="row">
					<td colspan="2" scope="row">
						<select class="form-control" name="txtType_1[]" ng-model="empInfo.txtType_11">
							<option>종류 선택 (Select type)</option>
							<option>조식 (Breakfast)</option>
							<option>중식 (Chinese)</option>
							<option>석식 (Dinner)</option>
							<option>특식 (Special)</option>
							<option>간식 (Snack)</option>
							<option value='_ETC_'>기타 (Etc)</option>
						</select>
					</td>
					<td colspan="2"><input type="number" name="floatPrice_1[]" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_11" autofocus required/>
					</td>
					<td colspan="2"><input type="number" name="floatPerson_1[]" class="form-control" placeholder="Enter How Many Person" ng-model="empInfo.floatPerson_11" autofocus required/>
					</td>
					<td colspan="2"><input type="number" name="floatCount_1[]" class="form-control" placeholder="Enter Count" ng-model="empInfo.floatCount_11" autofocus required/>
					</td>
					<td colspan="2"><input type="number" name="floatSubtotal_1[]" class="form-control" placeholder="Sub Total" ng-model="empInfo.floatSubtotal_11" value="{{empInfo.floatPrice_11 * empInfo.floatPrice_11 * empInfo.floatCount_11}}" autofocus readonly/>
					</td>
				</tr>
				<tr id="div4" scope="row">
					<td colspan="2" scope="row">
						<select class="form-control" name="txtType_1[]" ng-model="empInfo.txtType_12">
							<option>종류 선택 (Select type)</option>
							<option>조식 (Breakfast)</option>
							<option>중식 (Chinese)</option>
							<option>석식 (Dinner)</option>
							<option>특식 (Special)</option>
							<option>간식 (Snack)</option>
							<option value='_ETC_'>기타 (Etc)</option>
						</select>
					</td>
					<td colspan="2"><input type="number" name="floatPrice_1[]" class="form-control" placeholder="Enter price" ng-model="empInfo.floatPrice_12" autofocus required/>
					</td>
					<td colspan="2"><input type="number" name="floatPerson_1[]" class="form-control" placeholder="Enter How Many Person" ng-model="empInfo.floatPerson_12" autofocus required/>
					</td>
					<td colspan="2"><input type="number" name="floatCount_1[]" class="form-control" placeholder="Enter Count" ng-model="empInfo.floatCount_12" autofocus required/>
					</td>
					<td colspan="2"><input type="number" name="floatSubtotal_1[]" class="form-control" placeholder="Sub Total" ng-model="empInfo.floatSubtotal_12" value="{{empInfo.floatPrice_12 * empInfo.floatPrice_12 * empInfo.floatCount_12}}" autofocus readonly/>
					</td>
				</tr>
				<tr>
					<td colspan="8"><label style="text-align: right;">Sum:</label> </td>
					<td colspan="1"><input type="number" name="floatHotelTotal" class="form-control" placeholder="Total" value="{{empInfo.floatSubtotal_12 + empInfo.floatSubtotal_12}}" ng-model="empInfo.floatHotelTotal" autofocus readonly/></td>
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
		</table>
		<!-- -------------------------- Vehicle Informatin End ----------------------------- -->					
			<input type="submit" name="submit" value="SUBMIT"/>
		</div>
	</form>
	<script type="text/javascript">
		/********************************************************** Hotel Date Change depanet on first date ****************************************************/
		( function ( $, window, document, undefined ) {
			$( "#days" ).on( "change", function () {
				var date = new Date( $( "#start_date" ).val() ),
					days = parseInt( $( "#days" ).val(), 10 );

				if ( !isNaN( date.getTime() ) ) {
					date.setDate( date.getDate() + days );

					$( "#end_date" ).val( date.toInputFormat() );
				} else {
					alert( "Invalid Date" );
				}
			} );


			//From: http://stackoverflow.com/questions/3066586/get-string-in-yyyymmdd-format-from-js-date-object
			Date.prototype.toInputFormat = function () {
				var yyyy = this.getFullYear().toString();
				var mm = ( this.getMonth() + 1 ).toString(); // getMonth() is zero-based
				var dd = this.getDate().toString();
				return yyyy + "-" + ( mm[ 1 ] ? mm : "0" + mm[ 0 ] ) + "-" + ( dd[ 1 ] ? dd : "0" + dd[ 0 ] ); // padding
			};
		} )( jQuery, this, document );
		/********************************************************** Start Add/Romve Row(Hotel Section) ****************************************************/

		$(document).ready( function () {
			$( '#btn3' ).on( "click", null, function () {

				$('#div2').clone().insertAfter('#div1');

			});
			$( "#btn1" ).click( function () {
				//var x = document.getElementById("#tabel-addquote-hotel").rows.length;
				//if ( x > 2 ) {
					$("#div2").remove();
				//}				
			});			 
		});

		/********************************************************** End Add/Romve Row(Hotel Section)  ****************************************************/
		/********************************************************** Start Meals Add/Romve Row(Hotel Section) ****************************************************/

		$(document).ready( function () {
			$('#btn4').on( "click", null, function () {

				$('#div4').clone().insertAfter('#div3');
				
				for(var i=0;i<$("tr#div4").length;i++)
				{
					$("#div4 input").each(function(i) {

						$(this).attr('name', $(this).attr('name') + i);
					});
				}

			});

			$( "#btn2" ).click( function () {
				//var y = document.getElementById("#tabel-addquote-meal").rows.length;
				//if ( y > 2 ) {
					$("#div4").remove();
				//}
			});
		});

		/********************************************************** End Meals Add/Romve Row(Hotel Section)  ****************************************************/
	</script>
</div> 
<?php
include( 'footer.php' );
?>