<html ng-app="crudApp">

<head>
	<title>AngularJS CRUD Operations Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- Include main CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Include jQuery library -->
	<script src="js/jQuery/jquery.min.js"></script>
	<!-- Include AngularJS library -->
	<script src="lib/angular/angular.min.js"></script>
	<!-- Include Bootstrap Javascript -->
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container wrapper" ng-controller="DbController">
		<!-- Include Menu-TOP -->
		<div ng-include src="'templates/menu.php'"></div>
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<div class="alert alert-default navbar-brand search-box">
					<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Add Guide <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
				</div>
				<div class="alert alert-default input-group search-box"> <span class="input-group-btn">
        <input type="text" class="form-control" placeholder="Search infomation Details Into Database..." ng-model="search_query">
        </span>
					</div>
			</div>
		</nav>
		<?php
			$myfile = fopen( "templates/dataTypes.php", "w" )or die( "Unable to open file!" );
			$txt = "guide";
			fwrite( $myfile, $txt );
		?>
		<div class="col-md-12 col-md-offset-0 bgColor-Maganda">

			<!-- Include form template which is used to insert data into database -->
			<div ng-include src="'templates/form.php'"></div>

			<!-- Include form template which is used to edit and update data into database -->
			<div ng-include src="'templates/editFormforAllPages.php'"></div>
		</div>
		<div class="clearfix"></div>

		<!-- Table to show employee detalis -->
		<div class="table-responsive">
			<h3 class="text-center">Guide List From Database</h3>
			<table class="table table-striped table-thead-gradient">
				<thead>
					<tr>
						<th>ID&nbsp;</th>
						<th>Name&nbsp;</th>
						<th>Contact Info&nbsp;</th>
						<th>Address&nbsp;</th>
						<th>Place&nbsp;</th>
						<th>City&nbsp;</th>
						<th>State&nbsp;</th>
						<th>Zip code&nbsp;</th>
						<th>Email&nbsp;</th>						
						<th>Price (Per/Day) &nbsp;</th>
						<th>Price (Price/Hour) &nbsp;</th>
						<th>Remark&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="guideDetail in guideDetails| filter:search_query">
						<td><a href="view_data-all.php?view_id={{guideDetail.id}}">{{guideDetail.id}}</a></td>
						<td><span><a href="view_data-all.php?view_id={{guideDetail.id}}">{{guideDetail.name}}</a></span></td>
						<td>{{guideDetail.tel}}</td>
						<td>{{guideDetail.addr}}</td>
						<td>{{guideDetail.place}}</td>
						<td>{{guideDetail.city}}</td>
						<td>{{guideDetail.state}}</td>
						<td>{{guideDetail.zip}}</td>
						<td>{{guideDetail.email}}</td>						
						<td>{{guideDetail.netprice}}</td>
						<td>{{guideDetail.price}}</td>
						<td><button class="btn btn-warning" ng-click="editInfo(guideDetail)" title="Remark"><span class="glyphicon glyphicon-edit"></span></button></td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
	<!-- Include controller -->
	<script src="js/angular-script.js"></script>
</body>

</html>