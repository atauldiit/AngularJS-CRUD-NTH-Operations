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
        <button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Add Ticket Location <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
      </div>
      <div class="alert alert-default input-group search-box"> <span class="input-group-btn">
        <input type="text" class="form-control" placeholder="Search infomation Details Into Database..." ng-model="search_query">
        </span> </div>
    </div>
  </nav>
  <?php
	$myfile = fopen( "templates/dataTypes.php", "w" )or die( "Unable to open file!" );
	$txt = "TicketLocation";
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
 <h3 class="text-center">Ticket Location List From Database</h3>
  <table class="table table-striped table-thead-gradient">
  <thead>
    <tr>
      <th>ID&nbsp;</th>
      <th>Name&nbsp;</th>
      <th>Manager Contact&nbsp;</th>      
      <th>Address&nbsp;</th>
      <th>Place&nbsp;</th>
      <th>City&nbsp;</th>
      <th>State&nbsp;</th>
      <th>Zip code&nbsp;</th>
      <th>Email&nbsp;</th>      
      <th>Net Price &nbsp;</th>
      <th>Retail Price &nbsp;</th>
      <th>Web Price&nbsp;</th>
      <th>Remark&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="TicketLocationDetail in TicketLocationDetails| filter:search_query">
      <td><a href="view_data-all.php?view_id={{TicketLocationDetail.id}}">{{TicketLocationDetail.id}}</a></td>
      <td><span><a href="view_data-all.php?view_id={{TicketLocationDetail.id}}">{{TicketLocationDetail.name}}</a></span></td>
      <td>Officer: {{TicketLocationDetail.officer}}<br> T: {{TicketLocationDetail.tel}}<br>F: {{TicketLocationDetail.fax}}</td>      
      <td>{{TicketLocationDetail.addr}}</td>
      <td>{{TicketLocationDetail.place}}</td>
      <td>{{TicketLocationDetail.city}}</td>
      <td>{{TicketLocationDetail.state}}</td>
      <td>{{TicketLocationDetail.zip}}</td>
      <td>{{TicketLocationDetail.email}}</td>      
      <td>{{TicketLocationDetail.netprice}}</td>
      <td>{{TicketLocationDetail.price}}</td>
      <td>{{TicketLocationDetail.price_M}}</td>
      <td><button class="btn btn-warning" ng-click="editInfo(TicketLocationDetail)" title="Remark"><span class="glyphicon glyphicon-edit"></span></button></td>
    </tr>
    </tbody>
  </table>
</div>

</div>
<!-- Include controller --> 
<script src="js/angular-script.js"></script>
</body>
</html>