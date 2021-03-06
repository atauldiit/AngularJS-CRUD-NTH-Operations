<?php
include_once 'databaseFiles/database_connections.php';
if ( isset( $_GET[ 'view_id' ] ) ) {
	//echo $_GET['view_id']."<br>";
	//$sql_query="SELECT * FROM users WHERE user_id=".$_GET['view_id'];
	$query = "SELECT * FROM company_info  WHERE id =" . $_GET['view_id'];
}
$result = mysqli_query( $con, $query );
$arr = array();
if ( mysqli_num_rows( $result ) != 0 ) {
	while ( $row = mysqli_fetch_assoc( $result ) ) {
		$fk_idx = $row[ "fk_idx" ];
		//echo $idx;
		include( 'header.php' );							
		?>
		<div class="container wrapper" ng-controller="DbController">
			<!-- Include Menu-TOP -->
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
			<div class="col-md-12 col-md-offset-0 bgColor-Maganda">
				<!-- Include form template which is used to insert data into database -->
				<div ng-include src="'templates/form.php'"></div>
				<!-- Include form template which is used to edit and update data into database -->
				<div ng-include src="'templates/editForm.html'"></div>
			</div>
			<div class="clearfix"></div>
			<!-- Table to show detalis -->
			<div class="col-md-12 col-md-offset-0 bgColor-blue">
				<div class="content_forom">
					<h3 class="text-center-white">데이터베이스의 데이터 세부 정보 표시 (Showing Data Details From Database)</h3>
					<h3> Back to 
                    <?php 
						if($row["type"] == "CarParking")
							echo('<a href="parking.php">Parking</a>');
						if($row["type"] == "CarGas")
							echo('<a href="gas.php">Gas</a>');
						if($row["type"] == "CarToll")
							echo('<a href="toll.php">Toll</a>');
						if($row["type"] == "resType")
							echo('<a href="mealTypes.php">Meal types</a>');
						if($row["type"] == "hotel")
							echo('<a href="hotel.php">Hotel</a>');
						if($row["type"] == "restaurant")
							echo('<a href="restaurant.php">Restaurant</a>');
						if($row["type"] == "trans")
							echo('<a href="transportation.php">Transportation</a>');
						if($row["type"] == "ticket")
							echo('<a href="ticket.php">Ticket</a>');
						if($row["type"] == "guide")
							echo('<a href="guide.php">Guide</a>');
						if($row["type"] == "TicketLocation")
							echo('<a href="ticketLocation.php">Ticket Location</a>');
						if($row["type"] == "etc")
							echo('<a href="etc.php">ETC</a>');
						if($row["type"] == "busUseType")
							echo('<a href="vehicleType.php">Vehicle Type</a>');
					?>
                   Page
                    </h3>
					<table class="table table-striped viewQuote">
						<thead>
							<!-- -------------------------- Showing Informatin Start ----------------------------- -->
							<tr class="tr_gradient">
								<th colspan="10">
									<h5 class="title">Details Info</h5>
								</th>
							</tr>
							<tr>
								<th class="textBgColortd"> <label for="txtRegister">ID: </label>
									<input type="text" name="txtRegister" class="form-control" placeholder="ID Here" value="<?php echo ($row["id"]); ?>" autofocus required readonly>
								</th>
								<th class="textBgColortd"><label for="dtTime">Name:</label>
									<input type="text" name="txtRegister" class="form-control" placeholder="Enter Name: " value="<?php echo ($row["name"]); ?>" autofocus required readonly>
								</th>
								<th class="textBgColortd"><label for="txtHotelLevel">Rating:</label>
									<input type="text" name="txtHotelLevel" class="form-control" placeholder="<?php echo ($row["txtHotelLevel"]); ?>" value="<?php echo ($row["txtHotelLevel"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd"> <label for="txtHotelDownTown">Distance:</label>
									<input type="text" name="txtHotelDownTown" class="form-control" placeholder="<?php echo ($row["txtHotelDownTown"]); ?>" value="<?php echo ($row["txtHotelDownTown"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd"><label for="officer">Manager:</label>
									<input type="text" name="officer" class="form-control" placeholder="<?php echo ($row["officer"]); ?>" value="<?php echo ($row["officer"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd"><label for="tel">Tel:</label>
									<input type="text" name="tel" class="form-control" placeholder="<?php echo ($row["tel"]); ?>" value="<?php echo ($row["tel"]); ?>" autofocus readonly>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th class="textBgColortd"><label for="officer">Fax:</label>
									<input type="text" name="officer" class="form-control" placeholder="<?php echo ($row["fax"]); ?>" value="<?php echo ($row["tel"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd"><label for="place">Location:</label>
									<input type="text" name="txtRequestor" class="form-control" placeholder="<?php echo ($row["place"]); ?>" value="<?php echo ($row["place"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd"><label for="addr">Address:</label>
									<input type="text" name="addr" class="form-control" placeholder="<?php echo ($row["addr"]); ?>" value="<?php echo ($row["addr"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd"><label for="city">City:</label>
									<input type="text" name="city" class="form-control" placeholder="<?php echo ($row["city"]); ?>" value="<?php echo ($row["city"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd" scope="row"><label for="state">State:</label>
									<input type="text" name="state" class="form-control" placeholder="<?php echo ($row["state"]); ?>" value="<?php echo ($row["state"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd" scope="row"><label for="zip">Zip:</label>
									<input type="text" name="state" class="form-control" placeholder="<?php echo ($row["zip"]); ?>" value="<?php echo ($row["zip"]); ?>" autofocus readonly>
								</th>
							</tr>
							<tr>
								<th class="textBgColortd"><label for="email">Email:</label>
									<input type="text" name="email" class="form-control" placeholder="<?php echo ($row["email"]); ?>" value="<?php echo ($row["email"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd"><label for="website">Website:</label>
									<a href="<?php echo ($row["website"]); ?>" target="_blank" ?<input type="text" name="website" class="form-control" placeholder="<?php echo ($row["website"]); ?>" value="<?php echo ($row["website"]); ?>" autofocus readonly></a>
								</th>
								<th class="textBgColortd"><label class="textBgColortd" for="remark">Remark:</label>
									<textarea name="remark" class="form-control" onMouseOver="<?php echo $row["remark "] ?>" readonly style="height:72px; ">
										<?php echo $row["remark"] ?>
									</textarea>
								</th>
								<th class="textBgColortd"><label for="price">Retail Price:</label>
									<input type="text" name="price" class="form-control" placeholder="<?php echo ($row["price"]); ?>" value="<?php echo ($row["price"]); ?>" autofocus readonly>
									<label for="netprice">Net Price:</label><input type="text" name="netprice" class="form-control" placeholder="<?php echo ($row["netprice"]); ?>" value="<?php echo ($row["netprice"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd"><label for="PriceDate_1">Price (Starting Date):</label>
									<input type="text" name="PriceDate_1" class="form-control" placeholder="<?php echo ($row["PriceDate_1"]); ?>" value="<?php echo ($row["PriceDate_1"]); ?>" autofocus readonly>
								</th>
								<th class="textBgColortd"><label for="PriceDate_2">Price (Ending Date):</label>
									<input type="text" name="PriceDate_2" class="form-control" placeholder="<?php echo ($row["PriceDate_2"]); ?>" value="<?php echo ($row["PriceDate_2"]); ?>" autofocus readonly>
								</th>
							</tr>
							<tr scope="row">
								<td colspan="10">&nbsp;</td>
							</tr>
						</tbody>
					</table>
					<table><tr><td>Total Expenses:</td><td>US$ <?php echo ($row["floatTotalEstimator"]); ?></td><td>Expenses per person:</td><td>US$ <?php echo ($row["floatPersonTotal"]); ?></td></tr></table>
					<?php } ?>
					<!-- -------------------------- Showing Informatin End ----------------------------- -->
				</div>
			</div>

			<?php
			}
			// Return json array containing data from the database
			$json_info = json_encode( $arr );
			?>
			<!-- Include controller -->

		</div> 
		<?php 
			include( 'footer.php' );
		?>