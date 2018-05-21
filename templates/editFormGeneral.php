<!-- Form used for updation of data into database -->
<form class="form-horizontal alert alert-warning" id="editForm" ng-submit="UpdateInfo(currentUser)" hidden>
<h3 class="text-center">Update Employee Details</h3>
	<div class="form-group">
		<label for="Name">Employee Name:</label>
		<input type="text" class="form-control" ng-model="currentUser.txtRequestor" value="{{currentUser.txtRequestor}}">
	</div>
    <div class="form-group">
		<label for="Name">Last Modified:</label>
		<input type="date" class="form-control" ng-model="currentUser.dtTime" value="{{currentUser.dtTime}}">
	</div>
    <div class="form-group">
		<label for="Name">First Date:</label>
		<input type="date" class="form-control" ng-model="currentUser.txtWriteDate" value="{{currentUser.txtWriteDate}}">
	</div>
	<div class="form-group">
		<button class="btn btn-warning" ng-disabled="empList.$invalid" ng-click="updateMsg(currentUser.idx)">Update</button>
	</div>
</form>
