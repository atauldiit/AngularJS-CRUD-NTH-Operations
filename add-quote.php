<?php
include( 'header.php' );
include_once 'databaseFiles/database_connections.php';
?>

<div class="container wrapper">
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
	<?php
$txtRegister = $_POST['txtRegister'];
$dtTime = $_POST['dtTime'];
$txtHotelLevel = $_POST['txtHotelLevel'];
$txtHotelDownTown = $_POST['txtHotelDownTown'];
$txtWriteDate = $_POST['txtWriteDate'];
$txtRequestorCompany = $_POST['txtRequestorCompany'];
$txtRequestor = $_POST['txtRequestor'];
$txtPrtCode = $_POST['txtPrtCode'];
$txtGroup = $_POST['txtGroup'];
$txtEstimator = $_POST['txtEstimator'];
$intPerson = $_POST['intPerson'];
$txtNameTC = $_POST['txtNameTC'];
$intTC = $_POST['intTC'];
$txtEventName = $_POST['txtEventName'];
$txtTourLocation = $_POST['txtTourLocation'];
$txtTourStart = $_POST['txtTourStart'];
$txtTourEnd = $_POST['txtTourEnd'];
$txtTourLength = $_POST['txtTourLength'];
$txtPrtName = $_POST['txtPrtName'];

if ( isset( $_POST[ 'submit' ] ) ) {
	$sql = "INSERT INTO `nBasic` (txtRegister,dtTime,txtHotelLevel,txtHotelDownTown,txtWriteDate,txtRequestorCompany,txtRequestor,txtPrtCode,txtGroup,txtEstimator,intPerson,txtNameTC,intTC,txtEventName,txtTourLocation,txtTourStart,txtTourEnd,txtTourLength,txtPrtName) VALUES ('$txtRegister','$dtTime','$txtHotelLevel','$txtHotelDownTown','$txtWriteDate','$txtRequestorCompany','$txtRequestor','$txtPrtCode','$txtGroup','$txtEstimator','$intPerson','$txtNameTC','$intTC','$txtEventName','$txtTourLocation','$txtTourStart','$txtTourEnd','$txtTourLength','$txtPrtName')";

	if ( $con->query( $sql ) === TRUE ) {
		echo '<h3 class="text-center">견적 세부 사항을 데이터베이스에 성공적으로 삽입 (Successfully Insert Quote Details Into Database)</h3>';
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
} else
	echo( 'Something wrong!' );
		?>
		
		
		<!-- -------------------------- Basic Informatin End ----------------------------- -->		

</div>
<?php 
			include( 'footer.php' );
		?>