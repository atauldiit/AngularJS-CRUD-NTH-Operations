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
        <button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Add Quote <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
      </div>
      <div class="alert alert-default input-group search-box"> <span class="input-group-btn">
        <input type="text" class="form-control" placeholder="Search infomation Details Into Database..." ng-model="search_query">
        </span> </div>
    </div>
  </nav>
  <div class="col-md-6 col-md-offset-3"> 
    
    <!-- Include form template which is used to insert data into database -->
    <div ng-include src="'templates/form.php'"></div>
    
    <!-- Include form template which is used to edit and update data into database -->
    <div ng-include src="'templates/editForm.html'"></div>
  </div>
  <div class="clearfix"></div>
  
  <!-- Table to show employee detalis -->
  <div class="table-responsive">
    <table class="table table-hover">
      <tr>
        <th>IDX&nbsp;</th>
        <th>Date Created&nbsp;</th>
        <th>AB Tourism Sun&nbsp;</th>
        <th width="270">Title<br>
          (Details, please click on the Date.)&nbsp;</th>
        <th>Personnel (+TC)&nbsp;</th>
        <th>client&nbsp;</th>
        <th>Calculation of&nbsp;</th>
        <th>Registrant&nbsp;</th>
        <th>Added&nbsp;</th>
        <th>Function&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
      <tr ng-repeat="detail in details| filter:search_query">
        <td>{{detail.idx}}</td>
        <td><span>{{detail.txtWriteDate}}</span></td>
        <td width="170">{{detail.txtTourStart}} - {{detail.txtTourEnd}}({{detail.txtTourLocation}})</td>
        <td>[{{detail.txtGroup}}] {{detail.txtTourLength}}</td>
        <td>{{detail.intPerson}} {{detail.txtNameTC}}</td>
        <td>{{detail.txtRequestor}}</td>
        <td>{{detail.txtEstimator}}</td>
        <td>{{detail.txtRegister}}</td>
        <td>{{detail.dtTime}}</td>
        <td><button class="btn btn-warning" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></td>
        <td><button class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
      </tr>
    </table>
  </div>
</div>
<!-- Include controller --> 
<script src="js/angular-script.js"></script>
</body>
</html>