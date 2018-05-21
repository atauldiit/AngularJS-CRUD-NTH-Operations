<?php include("header.php"); ?>
<body>
<div class="container wrapper" ng-controller="DbController">
  <h1 class="text-center"><a href="index.php"><?php echo $title; ?></a></h1>
  <!-- Include menu -->
  <div ng-include src="'templates/menu.php'"></div>
  <div class="col-md-6 col-md-offset-3"> 
    <!-- Include form template which is used to insert data into database -->
    <div ng-include src="'templates/form.html'"></div>
    <!-- Include form template which is used to edit and update data into database -->
    <div ng-include src="'templates/editForm.html'"></div>
  </div>
  <div class="clearfix"></div>
  <!-- Include Home Page table List template -->
  <div ng-include src="'templates/financial-statements-table.php'"></div>
</div>
<!-- Include controller --> 
<script src="js/angular-script.js"></script>
</body>
</html>