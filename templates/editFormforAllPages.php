<?php
	$myfile = fopen( "dataTypes.php", "r" )or die( "Unable to open file!" );
	$pageType1 = fread( $myfile, filesize( "dataTypes.php" ) );
	fclose( $myfile );
	$pageType2 = 'hotel';
?>

<!-- Form used for updation of data into database -->
<form class="form-horizontal alert alert-warning" id="editForm" ng-submit="UpdateInfo(currentUser)" hidden>
	<div class="container-fluid">
		<h3 class="text-center">Update <?php $myfile = fopen("dataTypes.php", "r") or die("Unable to open file!"); echo $dataTypes = fread($myfile,filesize("dataTypes.php"));
fclose($myfile); ?> Details Into Database</h3>
		<p>위치 기준 설명입니다.<br> NY – 뉴욕/뉴저지 등 뉴욕 투어 용<br> 1000s – 시라큐스 등 천섬 투어 용<br> Niagara – 미국/캐나다 쪽 나이아가라 투어 용<br> ON – 나이아가라 제외한 캐나다 토론토, 오타와 투어 용<br> QC– 캐나다 퀘백, 몬트리올 투어 용<br> DC – 워싱턴 DC 인근 버지니아, 메릴랜드 포함<br> 이 외에 나머지는 입력하신 State로 위치를 잡겠습니다.</p>
		<div class="row oddRow">
			<?php if  ($pageType1 == ('trans')) {?>
			<div class="col-sm-2 col-md-2">
				<?php 
				} 
				else 
					echo('<div class="col-sm-4 col-md-4">');
				?>
				<div class="form-group">
					<label for="Name">Name:</label>
					<input type="text" class="form-control" ng-model="currentUser.name" value="{{currentUser.name}}">
				</div>
			</div>
			<?php if  ($pageType1 == ('trans')) {?>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="subType">Type:</label>
					<select class="form-control" ng-model="currentUser.subType" title="Rating scale for hotel only">
						<option <?php echo "selected"; ?> >{{currentUser.subType}}</option>
						<option value="Bus">Bus</option>
						<option value="Min-Bus">Min-Bus</option>
						<option value="Van">Van</option>
						<option value="Mini-Van">Mini-Van</option>
						<option value="SUV">SUV</option>
						<option value="Sedan">Sedan</option>
					</select>
				</div>
			</div>
			<?php } ?>
			<?php if  ($pageType1 == ('hotel')) {?>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="Name">Rating:</label>
					<select class="form-control" ng-model="currentUser.txtHotelLevel" title="Rating scale for hotel only">
						<option <?php echo "selected"; ?> >{{currentUser.txtHotelLevel}}</option>
						<option value="1급">1급</option>
						<option value="준특급">준특급</option>
						<option value="준특급">특급</option>
					</select>
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="txtHotelDownTown">Distance:</label>
					<select class="form-control" class="form-control" ng-model="currentUser.txtHotelDownTown" name='txtHotelDownTown'>
						<option <?php echo "selected"; ?> >{{currentUser.txtHotelDownTown}}</option>
						<option>전체 (all)</option>
						<option>30분 거리 (30 minutes away)</option>
						<option>50분 거리 (50 mins)</option>
					</select>
				</div>
			</div>
			<?php } ?>
			<div class="col-sm-2 col-md-2" <?php if ($pageType1 == ('guide')) echo 'style="display: none;"'; ?>>
				<div class="form-group">
					<label for="officer">Manager:</label>
					<input type="text" class="form-control" ng-model="currentUser.officer" value="{{currentUser.officer}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<?php if  ($pageType1 == ('trans')) {?>
					<label for="place">Company:</label>
					<?php } else { ?>
					<label for="place">Location:</label>
					<?php } ?>
					<input type="text" class="form-control" ng-model="currentUser.place" value="{{currentUser.place}}">
				</div>
			</div>
		</div>
		<div class="row EvenRow">
			<div class="col-sm-5 col-md-5">
				<div class="form-group">
					<label for="addr">Address:</label>
					<input type="text" class="form-control" ng-model="currentUser.addr" value="{{currentUser.addr}}">
				</div>
			</div>
			<div class="col-sm-3 col-md-3">
				<div class="form-group">
					<label for="city">City:</label>
					<input type="text" class="form-control" ng-model="currentUser.city" value="{{currentUser.city}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="state">State:</label>
					<input type="text" class="form-control" ng-model="currentUser.state" value="{{currentUser.state}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="zip">Zip:</label>
					<input type="text" class="form-control" ng-model="currentUser.zip" value="{{currentUser.zip}}">
				</div>
			</div>
		</div>
		<div class="row oddRow">
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="tel">Telephone:</label>
					<input type="text" class="form-control" ng-model="currentUser.tel" value="{{currentUser.tel}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2" <?php if ($pageType1 == ('guide')) echo 'style="display: none;"'; ?>>
				<div class="form-group">
					<label for="fax">Fax:</label>
					<input type="text" class="form-control" ng-model="currentUser.fax" value="{{currentUser.fax}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="Email">Email:</label>
					<input type="text" class="form-control" ng-model="currentUser.email" value="{{currentUser.email}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2" <?php if ($pageType1 == ('guide')) echo 'style="display: none;"'; ?>>
				<div class="form-group">
					<label for="Website">Website:</label>
					<input type="text" class="form-control" ng-model="currentUser.website" value="{{currentUser.website}}">
				</div>
			</div>
			<div class="col-sm-4 col-md-4">
				<div class="form-group">
					<label for="remark">Remark:</label>
					<input type="text" class="form-control" ng-model="currentUser.remark" value="{{currentUser.remark}}">
				</div>
			</div>
		</div>
		<div class="row EvenRow">
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="netprice"><?php if  ($pageType1 == ('restaurant')) echo("Breakfast");  elseif ($pageType1 == ('guide')) echo('Price (Per/Day)'); else echo('Net Price'); ?> :</label>
					<input type="text" class="form-control" ng-model="currentUser.netprice" value="{{currentUser.netprice}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="netprice"><?php if  ($pageType1 == ('restaurant')) echo("Lunch"); elseif ($pageType1 == ('guide')) echo('Price (Per/Hour)'); else echo("Retail Price"); ?> :</label>
					<input type="text" class="form-control" ng-model="currentUser.price" value="{{currentUser.price}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2" <?php if ($pageType1 == ('guide')) echo 'style="display: none;"'; ?>>
				<div class="form-group">
					<label for="netprice"><?php if  ($pageType1 == ('restaurant')) echo("Dinner");  else echo("견적가 (Web Price)"); ?> :</label>
					<input type="text" class="form-control" ng-model="currentUser.priceR" value="{{currentUser.priceR}}">
				</div>
			</div>
			<!-- 
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="netprice_M">Price not included breakfast:</label>
					<input type="text" class="form-control" ng-model="currentUser.netprice_M" value="{{currentUser.netprice_M}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="price_M">견적가 (Price):</label>
					<input type="text" class="form-control" ng-model="currentUser.price_M" value="{{currentUser.price_M}}">
				</div>
			</div>
			<div class="col-sm-2 col-md-2">
				<div class="form-group">
					<label for="priceR_M">판매가 (Quote):</label>
					<input type="text" class="form-control" ng-model="currentUser.priceR_M" value="{{currentUser.priceR_M}}">
				</div>
			</div>
			-->
		</div>
		<?php 
			if ($pageType1 == 'hotel') {	
		?>
		<div class="row oddRow">
			<h5 style="color: #2231dd; font-weight: bolder;">Hotel Prices by Season</h5>
			<div class="col-sm-3 col-md-3">
				<div class="row oddRow">
					<label for="price_M">Price Table (<span style="color: #00BCD4;">Winter</span>):</label>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Date From:</label>
						<div class="form-group">
							<input type="date" class="form-control" ng-model="currentUser.dateWinter_1" value="{{currentUser.dateWinter_1}}">
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Date To:</label>
						<div class="form-group">
							<input type="date" class="form-control" ng-model="currentUser.dateWinter_2" value="{{currentUser.dateWinter_2}}">
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Price:</label>
						<div class="form-group">
							<input type="number" class="form-control" ng-model="currentUser.optPrice_1" value="{{currentUser.optPrice_1}}">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-md-3">
				<div class="row oddRow">
					<label for="price_M">Price Table (<span style="color: #00BCD4;">Spring</span>):</label>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Date From:</label>
						<div class="form-group">
							<input type="date" class="form-control" ng-model="currentUser.dateSpring_1" value="{{currentUser.dateSpring_1}}">
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Date To:</label>
						<div class="form-group">
							<input type="date" class="form-control" ng-model="currentUser.dateSpring_2" value="{{currentUser.dateSpring_2}}">
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Price:</label>
						<div class="form-group">
							<input type="number" class="form-control" ng-model="currentUser.optPrice_2" value="{{currentUser.optPrice_2}}">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-md-3">
				<div class="row oddRow">
					<label for="price_M">Price Table (<span style="color: #00BCD4;">Summer</span>):</label>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Date From:</label>
						<div class="form-group">
							<input type="date" class="form-control" ng-model="currentUser.dateSummer_1" value="{{currentUser.dateSummer_1}}">
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Date To:</label>
						<div class="form-group">
							<input type="date" class="form-control" ng-model="currentUser.dateSummer_2" value="{{currentUser.dateSummer_2}}">
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Price:</label>
						<div class="form-group">
							<input type="number" class="form-control" ng-model="currentUser.optPrice_3" value="{{currentUser.optPrice_3}}">
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-md-3">
				<div class="row oddRow">
					<label for="price_M">Price Table (<span style="color: #00BCD4;">Fall</span>):</label>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Date From:</label>
						<div class="form-group">
							<input type="date" class="form-control" ng-model="currentUser.dateFall_1" value="{{currentUser.dateFall_1}}" placeholder="Enter Date From">
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<label for="price_M">Date To:</label>
						<div class="form-group">
							<input type="date" class="form-control" ng-model="currentUser.dateFall_2" value="{{currentUser.dateFall_2}}">
						</div>
					</div>
					<div class="col-sm-4 col-md-4">
						<label for="optPrice_4">Price:</label>
						<div class="form-group">
							<input type="number" class="form-control" ng-model="currentUser.optPrice_4" value="{{currentUser.optPrice_4}}">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="form-group">
			<button style="margin-top: 10px;" class="btn btn-warning" ng-disabled="empList.$invalid" ng-click="updateMsg(currentUser.id)">Update</button>
		</div>
	</div>
	<!--****** Print ID ******-->
	<?php echo('Current User.id : {{currentUser.id}}') ?>
</form>