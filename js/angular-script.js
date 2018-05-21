// Application module
var crudApp = angular.module('crudApp', []);
crudApp.controller("DbController", ['$scope', '$http', function ($scope, $http) {

	// Function to get employee details from the database
	getInfo();

	function getInfo() {
		// Sending request to EmpDetails.php files 
		$http.post('databaseFiles/empDetails.php').success(function (data) {
			// Stored the returned data into scope 
			$scope.details = data;
		});
	}
	// ********************************************************* Start Page List ********************************************************************
	// Function to get hotelDetails Page details from the database
	getinfoHotel();

	function getinfoHotel() {
		// Sending request to hotelDetails.php files 
		$http.post('databaseFiles/hotelDetails.php').success(function (hotelData) {
			// Stored the returned hotelData into scope 
			$scope.hotelDetails = hotelData;
		});
	}

	// Function to get restaurantDetails Page details from the database
	getinfoRestaurant();

	function getinfoRestaurant() {
		// Sending request to restaurantDetails.php files 
		$http.post('databaseFiles/restaurantDetails.php').success(function (restaurantData) {
			// Stored the returned restaurantData into scope 
			$scope.restaurantDetails = restaurantData;
		});
	}

	// Function to get transportationDetails Page details from the database
	getinfoTransportation();

	function getinfoTransportation() {
		// Sending request to transportationDetails.php files 
		$http.post('databaseFiles/transportationDetails.php').success(function (transportationData) {
			// Stored the returned transportationData into scope 
			$scope.transportationDetails = transportationData;
		});
	}

	// Function to get transportationDetails Page details from the database
	getinfoTicket();

	function getinfoTicket() {
		// Sending request to ticketDetails.php files 
		$http.post('databaseFiles/ticketDetails.php').success(function (ticketData) {
			// Stored the returned ticketDetails into scope 
			$scope.ticketDetails = ticketData;
		});
	}

	// Function to get guideDetails Page details from the database
	getinfoGuide();

	function getinfoGuide() {
		// Sending request to guideDetails.php files 
		$http.post('databaseFiles/guideDetails.php').success(function (guideData) {
			// Stored the returned guideDetails into scope 
			$scope.guideDetails = guideData;
		});
	}

	// Function to get TicketLocationDetails Page details from the database
	getinfoTicketLocation();

	function getinfoTicketLocation() {
		// Sending request to TicketLocationDetails.php files 
		$http.post('databaseFiles/TicketLocationDetails.php').success(function (ticketLocationData) {
			// Stored the returned TicketLocationDetails into scope 
			$scope.TicketLocationDetails = ticketLocationData;
		});
	}

	// Function to get etcDetails Page details from the database
	getinfoEtc();

	function getinfoEtc() {
		// Sending request to etcDetails.php files 
		$http.post('databaseFiles/etcDetails.php').success(function (etcData) {
			// Stored the returned etcDetails into scope 
			$scope.etcDetails = etcData;
		});
	}

	// Function to get vehicleTypeDetails Page details from the database
	getinfoVehicleType();

	function getinfoVehicleType() {
		// Sending request to vehicleTypeDetails.php files 
		$http.post('databaseFiles/vehicleTypeDetails.php').success(function (vehicleTypeData) {
			// Stored the returned vehicleTypeDetails into scope 
			$scope.vehicleTypeDetails = vehicleTypeData;
		});
	}

	// Function to get parkingDetails Page details from the database
	getinfoParking();

	function getinfoParking() {
		// Sending request to parkingDetails.php files 
		$http.post('databaseFiles/parkingDetails.php').success(function (parkingData) {
			// Stored the returned parkingDetails into scope 
			$scope.parkingDetails = parkingData;
		});
	}

	// Function to get gasDetails Page details from the database
	getinfoGas();

	function getinfoGas() {
		// Sending request to gasDetails.php files 
		$http.post('databaseFiles/gasDetails.php').success(function (gasData) {
			// Stored the returned parkingDetails into scope 
			$scope.gasDetails = gasData;
		});
	}

	// Function to get tollDetails Page details from the database
	getinfoToll();

	function getinfoToll() {
		// Sending request to tollDetails.php files 
		$http.post('databaseFiles/tollDetails.php').success(function (tollData) {
			// Stored the returned parkingDetails into scope 
			$scope.tollDetails = tollData;
		});
	}

	// Function to get mealTypesDetails Page details from the database
	getinfomealTypes();

	function getinfomealTypes() {
		// Sending request to mealTypesDetails.php files 
		$http.post('databaseFiles/mealTypesDetails.php').success(function (mealTypesData) {
			// Stored the returned mealTypesDetails into scope 
			$scope.mealTypesDetails = mealTypesData;
		});
	}
	// ********************************************************* End Page List ********************************************************************
	getnHotelInfo();

	function getnHotelInfo() {
		// Sending request to nHotelDetails.php files 
		$http.post('databaseFiles/nHotelDetails.php').success(function (nHoteldata) {
			// Stored the returned data into scope 
			$scope.nHoteldetails = nHoteldata;
		});
	}

	// Function to get nRestaurantBus details from the database
	getnnRestaurantBusDetailsInfo();

	function getnnRestaurantBusDetailsInfo() {
		// Sending request to nRestaurantBusDetails.php files 
		$http.post('databaseFiles/nRestaurantBusDetails.php').success(function (nRestaurantBusDetailsdata) {
			// Stored the returned data into scope 
			$scope.nRestaurantBusDetailsdetails = nRestaurantBusDetailsdata;
		});
	}

	// Function to get nBusDetails details from the database
	getnBusDetailsInfo();

	function getnBusDetailsInfo() {
		// Sending request to nBusDetails.php files 
		$http.post('databaseFiles/nBusDetails.php').success(function (nBusDetailsdata) {
			// Stored the returned data into scope 
			$scope.nBusDetails = nBusDetailsdata;
		});
	}

	// Function to get nProfitDetails details from the database
	getnnProfitDetailsInfo();

	function getnnProfitDetailsInfo() {
		// Sending request to nProfitDetails.php files 
		$http.post('databaseFiles/nProfitDetails.php').success(function (nProfitdata) {
			// Stored the returned data into scope 
			$scope.nProfitDetails = nProfitdata;
		});
	}

	// Function to get nGuide details from the database
	getnGuideDetailsInfo();

	function getnGuideDetailsInfo() {
		// Sending request to nRestaurantBusDetails.php files 
		$http.post('databaseFiles/nGuideDetails.php').success(function (nGuideDetailsdata) {
			// Stored the returned data into scope 
			$scope.nGuideDetails = nGuideDetailsdata;
		});
	}

	// Function to get nGuide details from the database
	getnticketCompany_infoDetailsInfo();

	function getnticketCompany_infoDetailsInfo() {
		// Sending request to nRestaurantBusDetails.php files 
		$http.post('databaseFiles/ticketCompany_infoDetails.php').success(function (ticketCompany_infoDetailsdata) {
			// Stored the returned data into scope 
			$scope.ticketCompany_infoDetails = ticketCompany_infoDetailsdata;
		});
	}

	// Function to get nTicket details from the database
	getnTicketDetailsInfo();

	function getnTicketDetailsInfo() {
		// Sending request to nTicketDetails.php files 
		$http.post('databaseFiles/nTicketDetails.php').success(function (nTicketdata) {
			// Stored the returned data into scope 
			$scope.nTicketDetails = nTicketdata;
		});
	}

	// Function to get nETCDetails Page details from the database
	getinfonETC();

	function getinfonETC() {
		// Sending request to nETCDetails.php files 
		$http.post('databaseFiles/nETCDetails.php').success(function (nETCData) {
			// Stored the returned nETCDetails into scope 
			$scope.nETCDetails = nETCData;
		});
	}

	// Function to get txtRequestor_nBasicCompanyDetails Page details from the database
	getinfotxtRequestorCompany_nBasicDetails();

	function getinfotxtRequestorCompany_nBasicDetails() {
		// Sending request to txtRequestor_nBasicCompanyDetails.php files 
		$http.post('databaseFiles/txtRequestorCompany_nBasicDetails.php').success(function (txtRequestorCompany_nBasicDetailsData) {
			// Stored the returned nETCDetails into scope 
			$scope.txtRequestorCompany_nBasicDetails = txtRequestorCompany_nBasicDetailsData;
		});
	}

	// Function to get txtRequestor_nBasicDetails Page details from the database
	getinfotxtRequestor_nBasicDetails();

	function getinfotxtRequestor_nBasicDetails() {
		// Sending request to txtRequestor_nBasicDetails.php files 
		$http.post('databaseFiles/txtRequestor_nBasicDetails.php').success(function (txtRequestor_nBasicDetailsData) {
			// Stored the returned txtRequestor_nBasicDetails into scope 
			$scope.txtRequestor_nBasicDetails = txtRequestor_nBasicDetailsData;
		});
	}

	// Function to get txtEventName_nBasicDetails Page details from the database
	getinfotxtEventName_nBasicDetails();

	function getinfotxtEventName_nBasicDetails() {
		// Sending request to txtEventName_nBasicDetails.php files 
		$http.post('databaseFiles/txtEventName_nBasicDetails.php').success(function (txtEventName_nBasicDetailsData) {
			// Stored the returned txtEventName_nBasicDetails into scope 
			$scope.txtEventName_nBasicDetails = txtEventName_nBasicDetailsData;
		});
	}

	// Function to get txtEstimator_nBasicDetails Page details from the database
	getinfotxtEstimator_nBasicDetailsDetails();

	function getinfotxtEstimator_nBasicDetailsDetails() {
		// Sending request to txtEstimator_nBasicDetails.php files 
		$http.post('databaseFiles/txtEstimator_nBasicDetails.php').success(function (txtEstimator_nBasicData) {
			// Stored the returned txtEstimator_nBasicDetails into scope 
			$scope.txtEstimator_nBasicDetails = txtEstimator_nBasicData;
		});
	}

	// Function to get txtGroup_nBasicDetails Page details from the database
	getinfotxtGroup_nBasicDetails();

	function getinfotxtGroup_nBasicDetails() {
		// Sending request to txtGroup_nBasicDetails.php files 
		$http.post('databaseFiles/txtGroup_nBasicDetails.php').success(function (txtGroup_nBasicDetailsData) {
			// Stored the returned txtEstimator_nBasicDetails into scope 
			$scope.txtGroup_nBasicDetails = txtGroup_nBasicDetailsData;
		});
	}

	// Function to get city, State from company_info Page details from the database
	getinfocityState_company_infoDetailsDetails();

	function getinfocityState_company_infoDetailsDetails() {
		// Sending request to cityState_company_infoDetails.php files 
		$http.post('databaseFiles/cityState_company_infoDetails.php').success(function (cityState_company_infoData) {
			// Stored the returned txtEstimator_nBasicDetails into scope 
			$scope.cityState_company_infoDetails = cityState_company_infoData;
		});
	}

	// Function to get Name and type = 'tourLocation' details from the database
	getinfoTourLocation_company_infoDetails();

	function getinfoTourLocation_company_infoDetails() {
		// Sending request to tourLocation_company_infoDetails.php files 
		$http.post('databaseFiles/tourLocation_company_infoDetails.php').success(function (tourLocation_company_infoData) {
			// Stored the returned txtEstimator_nBasicDetails into scope 
			$scope.tourLocation_company_infoDetails = tourLocation_company_infoData;
		});
	}

	// Function to get company_infoDetails details from the database
	getinfocompany_infoDetails();

	function getinfocompany_infoDetails() {
		// Sending request to tourLocation_company_infoDetails.php files 
		$http.post('databaseFiles/company_infoDetails.php').success(function (company_infoDetailsData) {
			// Stored the returned txtEstimator_nBasicDetails into scope 
			$scope.company_infoDetails = company_infoDetailsData;
		});
	}

	// Setting default value of gender 
	$scope.empInfo = {
		'gender': 'male'
	};
	// ********************************************************* Edit Page List ********************************************************************
	// Enabling show_form variable to enable Add employee button
	$scope.show_form = true;
	// Function to add toggle behaviour to form
	$scope.formToggle = function () {
		$('#empForm').slideToggle();
		$('#editForm').css('display', 'none');
	}
	$scope.insertInfo = function (info) {
		$http.post('databaseFiles/insertDetails.php', {
			"type": info.type,
			"name": info.name,
			"txtHotelLevel": info.txtHotelLevel,
			"txtHotelDownTown": info.txtHotelDownTown,
			"officer": info.officer,
			"place": info.place,
			"addr": info.addr,
			"city": info.city,
			"state": info.state,
			"zip": info.zip,
			"tel": info.tel,
			"fax": info.fax,
			"email": info.email,
			"website": info.website,
			"remark": info.remark,
			"netprice": info.netprice,
			"price": info.price,
			"priceR": info.priceR,
			"dtTime": info.dtTime
		}).success(function (data) {
			if (data == true) {
				getInfo();
				$('#empForm').css('display', 'none');
			}
		});
	}
	$scope.deleteInfo = function (info) {
		$http.post('databaseFiles/deleteDetails.php', {
			"idx": info.idx
		}).success(function (data) {
			if (data == true) {
				getInfo();
			}
		});
	}
	$scope.currentUser = {};
	$scope.editInfo = function (info) {
		$scope.currentUser = info;
		$('#empForm').slideUp();
		$('#editForm').slideToggle();
	}
	$scope.UpdateInfo = function (info) {
		$http.post('databaseFiles/updateDetails.php', {
			"id": info.id,			
			"name": info.name,
			"txtHotelLevel": info.txtHotelLevel,
			"txtHotelDownTown": info.txtHotelDownTown,
			"officer": info.officer,
			"place": info.place,
			"addr": info.addr,
			"city": info.city,
			"state": info.state,
			"zip": info.zip,
			"tel": info.tel,
			"fax": info.fax,
			"email": info.email,
			"website": info.website,
			"remark": info.remark,
			"netprice": info.netprice,
			"price": info.price,
			"priceR": info.priceR,
			"dtTime": info.dtTime,
			"dateWinter_1": info.dateWinter_1,
			"dateWinter_2": info.dateWinter_2,
			"optPrice_1": info.optPrice_1,
			"optPrice_1": info.dateSpring_1,
			"optPrice_1": info.dateSpring_2,
			"optPrice_1": info.optPrice_2,
			"optPrice_1": info.dateSummer_1,
			"optPrice_1": info.dateSummer_2,
			"optPrice_1": info.optPrice_3,
			"optPrice_1": info.dateFall_1,
			"optPrice_1": info.dateFall_2,
			"optPrice_1": info.optPrice_4
		}).success(function (data) {
			$scope.show_form = true;
			if (data == true) {
				getInfo();
			}
		});
	}
	$scope.updateMsg = function (id) {
		$('#editForm').css('display', 'none');
	}
}]);