<html ng-app="crudApp">

<head>
	<title>AngularJS CRUD Operations</title>
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
	<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
	<script type="text/javascript">
		( function () {
			'use strict';

			angular
				.module( 'crudApp', [] )
				.factory( 'PagerService', PagerService )
				.controller( 'DbController', DbController );

			function DbController( PagerService ) {
				var vm = this;

				vm.dummyItems = _.range( 1, 151 ); // dummy array of items to be paged
				vm.pager = {};
				vm.setPage = setPage;

				initController();

				function initController() {
					// initialize to page 1
					vm.setPage( 1 );
				}

				function setPage( page ) {
					if ( page < 1 || page > vm.pager.totalPages ) {
						return;
					}

					// get pager object from service
					vm.pager = PagerService.GetPager( vm.dummyItems.length, page );

					// get current page of items
					detail = vm.dummyItems.slice( vm.pager.startIndex, vm.pager.endIndex + 1 );
				}
			}

			function PagerService() {
				// service definition
				var service = {};

				service.GetPager = GetPager;

				return service;

				// service implementation
				function GetPager( totalItems, currentPage, pageSize ) {
					// default to first page
					currentPage = currentPage || 1;

					// default page size is 10
					pageSize = pageSize || 10;

					// calculate total pages
					var totalPages = Math.ceil( totalItems / pageSize );

					var startPage, endPage;
					if ( totalPages <= 10 ) {
						// less than 10 total pages so show all
						startPage = 1;
						endPage = totalPages;
					} else {
						// more than 10 total pages so calculate start and end pages
						if ( currentPage <= 6 ) {
							startPage = 1;
							endPage = 10;
						} else if ( currentPage + 4 >= totalPages ) {
							startPage = totalPages - 9;
							endPage = totalPages;
						} else {
							startPage = currentPage - 5;
							endPage = currentPage + 4;
						}
					}

					// calculate start and end item indexes
					var startIndex = ( currentPage - 1 ) * pageSize;
					var endIndex = Math.min( startIndex + pageSize - 1, totalItems - 1 );

					// create an array of pages to ng-repeat in the pager control
					var pages = _.range( startPage, endPage + 1 );

					// return object with all pager properties required by the view
					return {
						totalItems: totalItems,
						currentPage: currentPage,
						pageSize: pageSize,
						totalPages: totalPages,
						startPage: startPage,
						endPage: endPage,
						startIndex: startIndex,
						endIndex: endIndex,
						pages: pages
					};
				}
			}
		} )();
	</script>
</head>

<body>
	<div class="container wrapper" ng-controller="DbController as vm">
		<!-- Include Menu-TOP -->
		<div ng-include src="'templates/menu.php'"></div>
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<!--<div class="alert alert-default navbar-brand search-box">
					<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Add Quote <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
				</div>-->
				<div class="alert alert-default navbar-brand search-box">
					<button class="btn btn-primary"><a href="Written-quote.php">Add Quote <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></button>
				</div>
				<div class="alert alert-default input-group search-box">
					<span class="input-group-btn">
        				<input type="text" class="form-control" placeholder="Search infomation Details Into Database..." ng-model="search_query">
        			</span>
				
				</div>
			</div>
		</nav>
		<?php
		$myfile = fopen( "templates/dataTypes.php", "w" )or die( "Unable to open file!" );
		$txt = "quote";
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
			<table class="table table-striped table-thead-gradient">
				<thead>
					<th ng-click="orderByMe('txtWriteDate')">Date Created</th>
					<th>AB Tourism Sun</th>
					<th>Event Name <br> (<a href="#">click the Date of creation</a> <br>for detailed information.)</th>
					<th>Personnel (+TC)</th>
					<th>client</th>
					<th>Calculation of</th>
					<th>Registrant</th>
					<th>Added</th>
					<th colspan="2">Action</th>
				</thead>
				<tr scope="row" ng-repeat="detail in details | orderBy:myOrderBy | filter:search_query">
					<?php 
					  $idx = '{{detail.idx}}';
					  $fk_idx = '{{detail.fk_idx}}';
					?>
					<td><a href="view_data.php?view_id={{detail.idx}}">{{detail.txtWriteDate}}</a>
					</td>
					<td>{{detail.txtTourStart}} - {{detail.txtTourEnd}}({{detail.txtTourLocation}})</td>
					<td>[{{detail.txtGroup}}] {{detail.txtTourLength}}</td>
					<td>{{detail.intPerson}} {{detail.txtNameTC}}</td>
					<td>{{detail.txtRequestor}}</td>
					<td>{{detail.txtEstimator}}</td>
					<td>{{detail.txtRegister}}</td>
					<td>{{detail.dtTime}}</td>
					<td><button class="btn btn-warning" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
					</td>
					<td><button class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
					</td>
				</tr>
			</table>
			<div class="text-center">
				<!-- pager -->
				<ul ng-if="vm.pager.pages.length" class="pagination">
					<li ng-class="{disabled:vm.pager.currentPage === 1}">
						<a ng-click="vm.setPage(1)">First</a>
					</li>
					<li ng-class="{disabled:vm.pager.currentPage === 1}">
						<a ng-click="vm.setPage(vm.pager.currentPage - 1)">Previous</a>
					</li>
					<li ng-repeat="page in vm.pager.pages" ng-class="{active:vm.pager.currentPage === page}">
						<a ng-click="vm.setPage(page)">{{page}}</a>
					</li>
					<li ng-class="{disabled:vm.pager.currentPage === vm.pager.totalPages}">
						<a ng-click="vm.setPage(vm.pager.currentPage + 1)">Next</a>
					</li>
					<li ng-class="{disabled:vm.pager.currentPage === vm.pager.totalPages}">
						<a ng-click="vm.setPage(vm.pager.totalPages)">Last</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Include controller -->
	<script src="js/angular-script.js"></script>
	<script src="js/myScript.js"></script>
</body>

</html>