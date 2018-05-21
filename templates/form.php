<!-- Form used to add new entries of employee in database -->
<form class="form-horizontal alert alert-warning dataEditInsert" name="empList" id="empForm" ng-submit="insertInfo(empInfo);" hidden>
	<div class="container-fluid">
		<h3 class="text-center">Insert <?php $myfile = fopen("dataTypes.php", "r") or die("Unable to open file!"); echo $dataTypes = fread($myfile,filesize("dataTypes.php"));
fclose($myfile); ?> Details Into Database</h3>
		<p>위치 기준 설명입니다.<br> NY – 뉴욕/뉴저지 등 뉴욕 투어 용<br> 1000s – 시라큐스 등 천섬 투어 용<br> Niagara – 미국/캐나다 쪽 나이아가라 투어 용<br> ON – 나이아가라 제외한 캐나다 토론토, 오타와 투어 용<br> QC– 캐나다 퀘백, 몬트리올 투어 용<br> DC – 워싱턴 DC 인근 버지니아, 메릴랜드 포함<br> 이 외에 나머지는 입력하신 State로 위치를 잡겠습니다.</p>
		<div class="row oddRow">
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="Type">Type:</label>
					<input type="text" name="type" class="form-control" placeholder="<?php echo($dataTypes); ?>" ng-model="empInfo.type" value="<?php echo($dataTypes); ?>" autofocus readonly/>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="Name">Name:</label>
					<input type="text" name="name" class="form-control" placeholder="Enter Name" ng-model="empInfo.name" value="" autofocus required/>
					<p class="text-danger" ng-show="empList.name.$invalid && empList.name.$dirty">Name field is Empty!</p>
				</div>
			</div>
			<?php if ($dataTypes == 'hotel'){?>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="Name">Rating:</label>
					<select class="form-control" name='txtHotelLevel' title="Rating scale for hotel only">
						<option>선택</option>
						<option>1급</option>
						<option>준특급</option>
						<option>특급</option>
					</select>
				</div>
			</div>
			<?php } ?>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="txtHotelDownTown">Distance:</label>
					<select class="form-control" name='txtHotelDownTown'>
						<option>전체 (all)</option>
						<option>30분 거리 (30 minutes away)</option>
						<option>50분 거리 (50 mins)</option>
					</select>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="officer">Manager:</label>
					<input type="text" name="officer" class="form-control" placeholder="Enter Manager's Name" ng-model="empInfo.officer" value="" autofocus/>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="Name">Location:</label>
					<input type="text" name="place" class="form-control" placeholder="Enter Location" ng-model="empInfo.place" value="" autofocus/>
				</div>
			</div>
		</div>
		<div class="row EvenRow">
			<div class="col-sm-5 col-md-5">
				<div class="form-group">
					<label for="addr">Address:</label>
					<input type="text" name="addr" id="autocomplete" onFocus="geolocate()" class="form-control" placeholder="Enter Address" ng-model="empInfo.addr" value="" autofocus/>
					<p class="text-danger" ng-show="empList.addr.$invalid && empList.addr.$dirty">Address Date field is Empty!</p>
				</div>
			</div>
			<div class="col-sm-3 col-md-3">
				<div class="form-group">
					<label for="city slimField">City:</label>
					<input type="text" name="city" id="locality" class="form-control field" placeholder="Enter City" ng-model="empInfo.city" value="" autofocus />
					<p class="text-danger" ng-show="empList.city.$invalid && empList.city.$dirty">City field is Empty!</p>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group slimField">
					<label for="state">State:</label>
					<input type="text" name="state" id="administrative_area_level_1" class="form-control field" placeholder="Enter State Name" ng-model="empInfo.state" value="" autofocus/>
					<!--<select class="form-control" name="state" autofocus required>
						<?php //echo StateDropdown(null, 'abbrev'); ?>
					</select>-->
					<p class="text-danger" ng-show="empList.state.$invalid && empList.state.$dirty">State field is Empty!</p>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group slimField">
					<label for="zip">Zip:</label>
					<input type="number" name="zip" id="postal_code" class="form-control field" placeholder="Enter Zip" ng-model="empInfo.zip" value="" autofocus/>
					<p class="text-danger" ng-show="empList.zip.$invalid && empList.zip.$dirty">Zip field is Empty!</p>
				</div>
			</div>
		</div>
		<div class="row oddRow">
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="tel">Telephone:</label>
					<input type="tel" name="tel" class="form-control" placeholder="Enter Telephone" ng-model="empInfo.tel" value="" autofocus required/>
					<p class="text-danger" ng-show="empList.tel.$invalid && empList.tel.$dirty">Telephone field is Empty!</p>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="fax">Fax:</label>
					<input type="tel" name="fax" class="form-control" placeholder="Enter Fax" ng-model="empInfo.fax" value="" autofocus/>
					<p class="text-danger" ng-show="empList.fax.$invalid && empList.fax.$dirty">Fax field is Empty!</p>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="Email">Email:</label>
					<input type="email" name="email" class="form-control" placeholder="Enter Email" ng-model="empInfo.email" value="" autofocus required/>
					<p class="text-danger" ng-show="empList.email.$invalid && empList.email.$dirty">Email field is Empty!</p>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="Website">Website:</label>
					<input type="text" name="website" class="form-control" placeholder="Enter Website" ng-model="empInfo.website" value="" autofocus/>
				</div>
			</div>
			<div class="col-sm-4 col-md-4">
				<div class="form-group">
					<label for="remark">Remark:</label>
					<input type="text" name="remark" class="form-control" placeholder="Enter Remark" ng-model="empInfo.remark" value="" autofocus/>
					<p class="text-danger" ng-show="empList.remark.$invalid && empList.remark.$dirty">Remark field is Empty!</p>
				</div>
			</div>
		</div>
		<div class="row EvenRow">
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="price"><?php if ($dataTypes == 'restaurant'){ echo("Breakfast");} else {echo("판매가 (Retail Price)");}?>:</label>
					<input type="number" name="price" class="form-control" placeholder="Enter Price" ng-model="empInfo.price" value="" autofocus required/>
					<p class="text-danger" ng-show="empList.price.$invalid && empList.price.$dirty">Price field is Empty!</p>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="netprice"><?php if ($dataTypes == 'restaurant'){ echo("Lunch");} else {echo("Net Price");}?>:</label>
					<input type="number" name="netprice" class="form-control" placeholder="Enter Net Price" ng-model="empInfo.netprice" value="" autofocus required/>
					<p class="text-danger" ng-show="empList.netprice.$invalid && empList.netprice.$dirty">Netprice field is Empty!</p>
				</div>
			</div>
			
			<?php if (($dataTypes == 'TicketLocation') || ($dataTypes == 'restaurant')){?>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="priceR"><?php if ($dataTypes == 'restaurant'){ echo("Dinner");} else {echo("견적가 (Web Price)");}?>:</label>
					<input type="number" name="priceR" class="form-control" placeholder="Enter Quote" ng-model="empInfo.priceR" value="" autofocus/>
				</div>
			</div>
			<?php } ?>
			<!--<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="netprice_M">Price not included breakfast:</label>
					<input type="number" name="netprice_M" class="form-control" placeholder="Enter Price not included breakfast" ng-model="empInfo.netprice_M" value="" autofocus/>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="price_M">견적가 (Price):</label>
					<input type="number" name="price_M" class="form-control" placeholder="Enter Price" ng-model="empInfo.price_M" value="" autofocus/>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="priceR_M">판매가 (Quote):</label>
					<input type="number" name="priceR_M" class="form-control" placeholder="Enter Quote" ng-model="empInfo.priceR_M" value="" autofocus/>
				</div>
			</div>-->
		</div>
		<?php if ($dataTypes == 'hotel'){?>
		<div class="row oddRow">
			<h5 style="color: #2231dd; font-weight: bolder;">Hotel Prices by Season</h5>
			<div class="col-sm-3 col-md-3">
				<div class="row oddRow">
					<label for="optPrice_1">Price Table (<span style="color: #00BCD4;">Winter</span>):</label>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="date" name="dateWinter_1" class="form-control" placeholder="Enter Winter Start" title="Enter Winter Start" ng-model="empInfo.dateWinter_1" value="" autofocus/>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="date" name="dateWinter_2" class="form-control" placeholder="Enter Winter End" title="Enter Winter End" ng-model="empInfo.dateWinter_2" value="" autofocus/>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="number" name="optPrice_1" class="form-control" placeholder="Enter Winter Price" title="Enter Winter Price" ng-model="empInfo.optPrice_1" value="" autofocus/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-md-3">
				<div class="row oddRow">
					<label for="optPrice_2">Price Table (<span style="color: #00BCD4;">Spring</span>):</label>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="date" name="dateSpring_1" class="form-control" placeholder="Enter Spring starting Date" title="Enter Spring starting Date" ng-model="empInfo.dateSpring_1" value="" autofocus/>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="date" name="dateSpring_2" class="form-control" placeholder="Enter Spring ending Date" title="Enter Spring ending Date" ng-model="empInfo.dateSpring_2" value="" autofocus/>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="number" name="optPrice_2" class="form-control" placeholder="Enter Spring Price" title="Enter Spring Price" ng-model="empInfo.optPrice_2" value="" autofocus/>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3 col-md-3">
				<div class="row oddRow">
					<label for="optPrice_3">Price Table (<span style="color: #00BCD4;">Summer</span>):</label>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="date" name="dateSummer_1" class="form-control" placeholder="Enter Summer starting Date" title="Enter Summer starting Date" ng-model="empInfo.dateSummer_1" value="" autofocus/>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="date" name="dateSummer_2" class="form-control" placeholder="Enter Summer ending Date" title="Enter Summer ending Date" ng-model="empInfo.dateSummer_2" value="" autofocus/>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="number" name="optPrice_3" class="form-control" placeholder="Enter Summer Price" title="Enter Summer Price" ng-model="empInfo.optPrice_3" value="" autofocus/>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3 col-md-3">
				<div class="row oddRow">
					<label for="optPrice_4">Price Table (<span style="color: #00BCD4;">Fall</span>):</label>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="date" name="dateFall_1" class="form-control" placeholder="Enter Fall starting Date" title="Enter Fall starting Date" ng-model="empInfo.dateFall_1" value="" autofocus/>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="date" name="dateFall_2" class="form-control" placeholder="Enter Fall ending Date" title="Enter Fall ending Date" ng-model="empInfo.dateFall_2" value="" autofocus/>
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<div class="form-group">
							<input type="number" name="optPrice_4" class="form-control" placeholder="Enter Fall Price" title="Enter Fall Price" ng-model="empInfo.optPrice_4" value="" autofocus/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="form-group">
			<button class="btn btn-warning" ng-disabled="empList.$invalid" style="margin-top: 10px;">Add Into Database</button>
		</div>
	</div>
</form>
<div style="display: table-column-group;">
	<input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
	<table id="address">
		<tr>
			<td class="label">Street address</td>
			<td class="slimField"><input class="field" id="street_number" disabled="true"></input>
			</td>
			<td class="wideField" colspan="2"><input class="field" id="route" disabled="true"></input>
			</td>
		</tr>
		<tr>
			<td class="label">City</td>
			<!-- Note: Selection of address components in this example is typical.
             You may need to adjust it for the locations relevant to your app. See
             https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
        -->
			<td class="wideField" colspan="3"><input class="field" id="locality" disabled="true"></input>
			</td>
		</tr>
		<tr>
			<td class="label">State</td>
			<td class="slimField"><input class="field" id="administrative_area_level_1" disabled="true"></input>
			</td>
			<td class="label">Zip code</td>
			<td class="wideField"><input class="field" id="postal_code" disabled="true"></input>
			</td>
		</tr>
		<tr>
			<td class="label">Country</td>
			<td class="wideField" colspan="3"><input class="field" id="country" disabled="true"></input>
			</td>
		</tr>
	</table>
</div>
<script>
	// This example displays an address form, using the autocomplete feature
	// of the Google Places API to help users fill in the information.

	// This example requires the Places library. Include the libraries=places
	// parameter when you first load the API. For example:
	// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

	var placeSearch, autocomplete;
	var componentForm = {
		street_number: 'short_name',
		route: 'long_name',
		locality: 'long_name',
		administrative_area_level_1: 'short_name',
		country: 'long_name',
		postal_code: 'short_name'
	};

	function initAutocomplete() {
		// Create the autocomplete object, restricting the search to geographical
		// location types.
		autocomplete = new google.maps.places.Autocomplete(
			/** @type {!HTMLInputElement} */
			( document.getElementById( 'autocomplete' ) ), {
				types: [ 'geocode' ]
			} );

		// When the user selects an address from the dropdown, populate the address
		// fields in the form.
		autocomplete.addListener( 'place_changed', fillInAddress );
	}

	function fillInAddress() {
		// Get the place details from the autocomplete object.
		var place = autocomplete.getPlace();

		for ( var component in componentForm ) {
			document.getElementById( component ).value = '';
			document.getElementById( component ).disabled = false;
		}

		// Get each component of the address from the place details
		// and fill the corresponding field on the form.
		for ( var i = 0; i < place.address_components.length; i++ ) {
			var addressType = place.address_components[ i ].types[ 0 ];
			if ( componentForm[ addressType ] ) {
				var val = place.address_components[ i ][ componentForm[ addressType ] ];
				document.getElementById( addressType ).value = val;
			}
		}
	}

	// Bias the autocomplete object to the user's geographical location,
	// as supplied by the browser's 'navigator.geolocation' object.
	function geolocate() {
		if ( navigator.geolocation ) {
			navigator.geolocation.getCurrentPosition( function ( position ) {
				var geolocation = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};
				var circle = new google.maps.Circle( {
					center: geolocation,
					radius: position.coords.accuracy
				} );
				autocomplete.setBounds( circle.getBounds() );
			} );
		}
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtcdr4gEwDchz1FyRw1GPgwnoUjEAyDg4&libraries=places&callback=initAutocomplete" async defer></script>