<?php
include_once 'databaseFiles/database_connections.php';
if (isset($_GET['view_id'])) {
    //echo $_GET['view_id']."<br>";
    //$sql_query="SELECT * FROM users WHERE user_id=".$_GET['view_id'];
    $query = "SELECT * FROM nBasic WHERE idx =" . $_GET['view_id'];
}
$result = mysqli_query($con, $query);
$arr = array();
if (mysqli_num_rows($result) != 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fk_idx = $row["fk_idx"];
        // echo $idx;
        ?>
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
                                <button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">view Quote <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
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
                            <table class="table table-striped viewQuote">
                                <thead>
                                    <!-- -------------------------- Basic Informatin Start ----------------------------- -->
                                    <tr class="tr_gradient">
                                        <th colspan="10"><h5 class="title">기본 정보 (Basic Info)</h5></th>
                                    </tr>
                                    <tr>
                                        <th class="textBgColortd"> <label for="txtRegister">Register Name: </label>
                                            <input type="text" name="txtRegister" class="form-control" placeholder="Enter Register Name" value="<?php echo $row["txtRegister"] ?>" autofocus required readonly >
                                        </th>                                 
                                        <th colspan="2" class="textBgColortd"><label for="dtTime">Last Modified:</label>
                                            <input type="text" name="dtTime" class="form-control" placeholder="<?php echo $row["dtTime"] ?>" value="<?php echo $row["dtTime"] ?>" autofocus required readonly >
                                        </th>
                                        <th colspan="2" class="textBgColortd"><label for="txtHotelLevel">Hotel Rating:</label>
                                            <input type="text" name="txtHotelLevel" class="form-control" placeholder="<?php echo $row["txtHotelLevel"] ?>" value="<?php echo $row["txtHotelLevel"] ?>" autofocus readonly>
                                        </th>
                                        <th colspan="2" class="textBgColortd"> <label for="txtHotelDownTown">Downtown:</label>
                                            <input type="text" name="txtHotelDownTown" class="form-control" placeholder="<?php echo $row["txtHotelDownTown"] ?>" value="<?php echo $row["txtHotelDownTown"] ?>" autofocus readonly>
                                        </th>
                                        <th colspan="2" class="textBgColortd"><label for="txtWriteDate">First Date:</label>
                                            <input type="text" name="txtWriteDate" class="form-control" placeholder="<?php echo $row["txtWriteDate"] ?>" value="<?php echo $row["txtWriteDate"] ?>" autofocus readonly>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td  class="textBgColortd" scope="row"><label for="txtRequestorCompany">Customers<sup>(1)</sup>:</label>
                                        <input type="text" name="txtRequestorCompany" class="form-control" placeholder="<?php echo $row["txtRequestorCompany"] ?>" value="<?php echo $row["txtRequestorCompany"] ?>" autofocus readonly>
                                      </td>                                      
                                      <td class="textBgColortd" colspan="4"><label for="txtRequestor">Client:</label>
                                        <input type="text" name="txtRequestor" class="form-control" placeholder="<?php echo $row["txtRequestor"] ?>" value="<?php echo $row["txtRequestor"] ?>" autofocus readonly>
                                      </td>
                                      <td class="textBgColortd" colspan="4"><label for="txtPrtCode">Product Code:</label>
                                        <input type="text" name="txtPrtCode" class="form-control" placeholder="<?php echo $row["txtPrtCode"] ?>" value="<?php echo $row["txtPrtCode"] ?>" autofocus readonly>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th class="textBgColortd" scope="row"><label for="txtGroup">(Group name)<sup>(2)</sup>:</label>
                                        <input type="text" name="txtPrtCode" class="form-control" placeholder="<?php echo $row["txtGroup"] ?>" value="<?php echo $row["txtGroup"] ?>" autofocus readonly>
                                      </th>                                      
                                      <th colspan="3" class="textBgColortd" ><label for="txtEstimator">Calculation of:</label>
                                        <input type="text" name="txtEstimator" class="form-control" placeholder="<?php echo $row["txtEstimator"] ?>" value="<?php echo $row["txtEstimator"] ?>" autofocus readonly>
                                      </th>
                                      <th colspan="3" class="textBgColortd" ><label for="intPerson">Number of Person:</label>
                                        <input type="text" name="txtEstimator" class="form-control" placeholder="<?php echo $row["intPerson"] ?>" value="<?php echo $row["intPerson"] ?>" autofocus readonly>
                                      </th>
                                      <th colspan="2"><label>Team Leader:</label>
                                        <input type="text" name="txtNameTC" class="form-control" placeholder="<?php echo $row["txtNameTC"] ?>" value="<?php echo $row["txtNameTC"] ?>" autofocus readonly>
                                        <input type="text" name="intTC" class="form-control" placeholder="<?php echo $row["intTC"] ?>" value="<?php echo $row["intTC"] ?>" autofocus readonly>
                                      </th>
                                    </tr>
                                    <tr  scope="row">
                                      <td class="textBgColortd" scope="row"><label for="txtEventName">Event Name<sup>(3)</sup>:</label>
                                        <input type="text" name="txtNameTC" class="form-control" placeholder="<?php echo $row["txtEventName"] ?>" value="<?php echo $row["txtEventName"] ?>" autofocus readonly>
                                      </td>                                     
                                      <td class="textBgColortd" colspan="2"><label for="txtTourLocation">Tour Location:</label>
                                        <input type="text" name="txtTourLocation" class="form-control" placeholder="<?php echo $row["txtTourLocation"] ?>" value="<?php echo $row["txtTourLocation"] ?>" autofocus readonly>
                                      </td>
                                      <td><label for="First Date">Start Date:</label>
                                        <input type="text" name="txtTourStart" class="form-control" placeholder="<?php echo $row["txtTourStart"] ?>" value="<?php echo $row["txtTourStart"] ?>" autofocus readonly>
                                      </td>
                                      <td colspan="2"><label for="First Date">End Date:</label>
                                        <input type="text" name="txtTourEnd" class="form-control" placeholder="<?php echo $row["txtTourEnd"] ?>" value="<?php echo $row["txtTourEnd"] ?>" autofocus readonly>
                                      </td>
                                      <td colspan="3"><label for="txtTourLength">Travel Duration<sup>(4)</sup>:</label>
                                        <input type="text" name="txtTourLength" class="form-control" placeholder="<?php echo $row["txtTourLength"] ?>" value="<?php echo $row["txtTourLength"] ?>" autofocus readonly>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="10" scope="row"><label>Product Name:</label>
                                        <input type="text" name="txtPrtName" class="form-control" placeholder="<?php echo $row["txtPrtName"] ?>" value="<?php echo $row["txtPrtName"] ?>" autofocus readonly>
                                      </td>
                                    </tr>                                    
                                    <tr  scope="row">
                                      <td colspan="10">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- -------------------------- Basic Informatin End ----------------------------- -->

                            <!-- -------------------------- Hotel Informatin Start ----------------------------- -->
                            <?php } ?>
                            <?php 
                              $query2 = "SELECT * FROM nHotel WHERE fk_idx =" . $fk_idx;
                              $result2 = mysqli_query($con, $query2);
                              $arr2 = array();
                            ?>
                              <table class="table table-striped viewQuote" id="tabel-addquote-hotel">        
                                <tr class="tr_gradient">
                                  <th colspan="10"><h5 class="title">1.호텔 (Hotel)</h5></th>
                                </tr>
                                <tr scope="row">
                                  <th colspan="2" scope="row">날짜 (Date)</th>
                                  <th colspan="2">지역 (Area) </th>
                                  <th>호텔명 (Hotel Name)</th>
                                  <th>요금 (Fee)</th>
                                  <th>박수 (Days)</th>
                                  <th>방수 (Rooms)</th>
                                  <th colspan="2">소계 (Sub Total)</th>
                                </tr>
                              <?php
                              while ($row2 = mysqli_fetch_assoc($result2)) {                                
                              ?>
                                <tr scope="row">
                                  <td colspan="2">
                                    <input type="text" name="txtDate" class="form-control" placeholder="<?php echo $row2["txtDate"] ?>" value="<?php echo $row2["txtDate"] ?>" autofocus readonly>
                                  </td>
                                  <td colspan="2">
                                    <input type="text" name="txtLocation" class="form-control" placeholder="<?php echo $row2["txtLocation"] ?>" value="<?php echo $row2["txtLocation"] ?>" autofocus readonly>
                                  </td>                                  
                                  <td id="txtHint1">
                                    <input type="text" name="txtHotel" class="form-control" placeholder="<?php echo $row2["txtHotel"] ?>" value="<?php echo $row2["txtHotel"] ?>" autofocus readonly>
                                  </td>
                                  <td>
                                    <input type="text" name="floatPrice" class="form-control" placeholder="<?php echo $row2["floatPrice"] ?>" value="<?php echo $row2["floatPrice"] ?>" autofocus readonly>                                  </td>
                                  <td>
                                    <input type="text" name="floatNight" class="form-control" placeholder="<?php echo $row2["floatNight"] ?>" value="<?php echo $row2["floatNight"] ?>" autofocus readonly> 
                                  </td>
                                  <td>
                                    <input type="text" name="floatRoom" class="form-control" placeholder="<?php echo $row2["floatRoom"] ?>" value="<?php echo $row2["floatRoom"] ?>" autofocus readonly> 
                                  </td>
                                  <td colspan="2">
                                    <input type="text" name="floatSubtotal" class="form-control" placeholder="<?php echo $row2["floatSubtotal"] ?>" value="<?php echo $row2["floatSubtotal"] ?>" autofocus readonly> 
                                  </td>
                                </tr>                                                            
                              <?php
                              }
                            ?>                            
                            <?php 
                              $query2 = "SELECT * FROM nBasic WHERE idx =" . $_GET['view_id'];
                              $result2 = mysqli_query($con, $query2);
                              $arr2 = array();

                              while ($row2 = mysqli_fetch_assoc($result2)) {
								  echo('<tr class="sum-Total"><td colspan="8" class="text-right"><label>Hotel Sum: </label></td><td>US$ ' . $row2["floatHotelTotal"] . '</td></tr>');
							  }
                            ?>                            
                            </table>
                            <!-- -------------------------- Hotel Informatin End ----------------------------- -->

                            <!-- -------------------------- Meals Informatin Start ----------------------------- -->
                            <?php 
                              $query3 = "SELECT * FROM nRestaurant WHERE fk_idx =" . $fk_idx;
                              $result3 = mysqli_query($con, $query3);
                              $arr3 = array();
                            ?>
                            <table class="table table-striped viewQuote">        
                              <tr class="tr_gradient">
                                <th colspan="10"><h5 class="title">2.식사 (Meals)</h5></th>
                              </tr>
                              <tr>
                                <th colspan="2"><label for="txtType_1">Classification:</label></th>
                                <th colspan="2"><label for="floatPrice_1">price:</label></th>
                                <th colspan="2"><label for="floatPerson_1">personnel:</label></th>
                                <th colspan="2"><label for="First Date">Count:</label></th>
                                <th colspan="2"><label for="floatSubtotal">Sub Total:</label></th>
                              </tr>
                              <?php
                              while ($row3 = mysqli_fetch_assoc($result3)) {                                
                              ?>
                              <tr>
                                <td colspan="2">
                                  <input type="text" name="txtType_1" class="form-control" placeholder="<?php echo $row3["txtType_1"] ?>" value="<?php echo $row3["txtType_1"] ?>" autofocus readonly>
                                </td>
                                <td colspan="2">
                                  <input type="text" name="floatPrice_1" class="form-control" placeholder="<?php echo $row3["floatPrice_1"] ?>" value="<?php echo $row3["floatPrice_1"] ?>" autofocus readonly>
                                </td>
                                <td colspan="2">
                                  <input type="text" name="floatPerson_1" class="form-control" placeholder="<?php echo $row3["floatPerson_1"] ?>" value="<?php echo $row3["floatPerson_1"] ?>" autofocus readonly>
                                </td>
                                <td colspan="2">
                                  <input type="text" name="floatCount_1" class="form-control" placeholder="<?php echo $row3["floatCount_1"] ?>" value="<?php echo $row3["floatCount_1"] ?>" autofocus readonly>
                                </td>
                                <td colspan="2">
                                  <input type="text" name="floatSubtotal_1" class="form-control" placeholder="<?php echo $row3["floatSubtotal_1"] ?>" value="<?php echo $row3["floatSubtotal_1"] ?>" autofocus readonly>
                                </td>
                              </tr>
                              <?php
                              }
                              ?>
                              <?php 
                              $query2 = "SELECT * FROM nBasic WHERE idx =" . $_GET['view_id'];
                              $result2 = mysqli_query($con, $query2);
                              $arr2 = array();

                              while ($row2 = mysqli_fetch_assoc($result2)) {
								  echo('<tr class="sum-Total"><td colspan="8" class="text-right"><label>Meals Sum: </label></td><td>US$ ' . $row2["floatRestaurantTotal"] . '</td></tr>');
							  }
                            ?>  
                            </table>
                            <!-- -------------------------- Vehicle Informatin Start ----------------------------- -->
                            <?php 
                              $query3 = "SELECT * FROM nBus WHERE fk_idx =" . $fk_idx;
                              $result3 = mysqli_query($con, $query3);
                              $arr3 = array();
                            ?>
                            <table class="table table-striped viewQuote" style="width: 50%; float: left;">         
                              <tr class="tr_gradient">
                                <th colspan="10"><h5 class="title">3. 차량 (Vehicle)</h5></th>
                              </tr>
                              <tr>
                                <td colspan="3"><label for="txtType_2">Vehicle Type:</label></td>                                
                                <td colspan="3"><label for="floatPrice_2">Fee:</label></td>
                                <td colspan="2"><label for="floatDay_2">Days:</label></td>
                                <td><label for="floatSubtotal_2">Sub Total:</label></td>
                              </tr>
                              <?php
                              while ($row3 = mysqli_fetch_assoc($result3)) {                                
                              ?>
                              <tr>
                                <td colspan="3">
                                  <input type="text" name="txtType_2" class="form-control" placeholder="<?php echo $row3["txtType_2"] ?>" value="<?php echo $row3["txtType_2"] ?>" autofocus readonly>
                                </td>                                
                                <td colspan="3">
                                  <input type="text" name="floatPrice_2" class="form-control" placeholder="<?php echo $row3["floatPrice_2"] ?>" value="<?php echo $row3["floatPrice_2"] ?>" autofocus readonly>
                                </td>
                                <td colspan="2">
                                  <input type="text" name="floatDay_2" class="form-control" placeholder="<?php echo $row3["floatDay_2"] ?>" value="<?php echo $row3["floatDay_2"] ?>" autofocus readonly>
                                </td>
                                <td>
                                  <input type="text" name="floatSubtotal_2" class="form-control" placeholder="<?php echo $row3["floatSubtotal_2"] ?>" value="<?php echo $row3["floatSubtotal_2"] ?>" autofocus readonly>
                                </td>
                              </tr>
                              <?php
                              }
                              ?>
                              <?php 
								  $query2 = "SELECT * FROM nBasic WHERE idx =" . $_GET['view_id'];
								  $result2 = mysqli_query($con, $query2);
								  $arr2 = array();

								  while ($row2 = mysqli_fetch_assoc($result2)) {
									  echo('<tr class="sum-Total"><td colspan="8" class="text-right"><label>Vehicle Sum: </label></td><td>US$ ' . $row2["floatBusTotal"] . '</td></tr>');
								  }
                              ?>  
                            </table>
                            <!-- -------------------------- Attractive Informatin Start ----------------------------- -->
                            <?php 
                              $query3 = "SELECT * FROM nTicket WHERE fk_idx =" . $fk_idx;
                              $result3 = mysqli_query($con, $query3);
                              $arr3 = array();
                            ?>
                            <table class="table table-striped viewQuote" style="width: 50%; float: left;">         
                              <tr class="tr_gradient">
                                <th colspan="10"><h5 class="title">4. 입장료 (Attractive)</h5></th>
                              </tr>
                              <tr>
                                <td colspan="3"><label for="Entry area">Entry area:</label></td>
                                
                                <td colspan="3"><label for="floatPrice_3">Admission fee:</label></td>
                                <td colspan="2"><label for="floatPerson_3">Personnel:</label></td>
                                
                                <td><label for="floatSubtotal_3">Sub Total:</label></td>
                              </tr>
                              <?php
                              while ($row3 = mysqli_fetch_assoc($result3)) {                                
                              ?>
                              <tr>
                                <td colspan="3">
                                  <input type="text" name="txtType_3" class="form-control" placeholder="<?php echo $row3["txtType_3"] ?>" value="<?php echo $row3["txtType_3"] ?>" autofocus readonly>
                                </td>                                
                                <td colspan="3">
                                  <input type="text" name="floatPrice_3" class="form-control" placeholder="<?php echo $row3["floatPrice_3"] ?>" value="<?php echo $row3["floatPrice_3"] ?>" autofocus readonly>
                                </td>
                                <td colspan="2">
                                  <input type="text" name="floatPerson_3" class="form-control" placeholder="<?php echo $row3["floatPerson_3"] ?>" value="<?php echo $row3["floatPerson_3"] ?>" autofocus readonly>
                                </td>
                                <td>
                                  <input type="text" name="floatSubtotal_3" class="form-control" placeholder="<?php echo $row3["floatSubtotal_3"] ?>" value="<?php echo $row3["floatSubtotal_3"] ?>" autofocus readonly>
                                </td>
                              </tr>
                              <?php
                              }
                              ?>
                              <?php 
								  $query2 = "SELECT * FROM nBasic WHERE idx =" . $_GET['view_id'];
								  $result2 = mysqli_query($con, $query2);
								  $arr2 = array();

								  while ($row2 = mysqli_fetch_assoc($result2)) {
									  echo('<tr class="sum-Total"><td colspan="8" class="text-right"><label>Attractive Sum: </label></td><td>US$ ' . $row2["floatTicketTotal"] . '</td></tr>');
								  }
                              ?>
                            </table>
                            <!-- -------------------------- Cost Guide Informatin Start ----------------------------- -->
                            <?php 
                              $query3 = "SELECT * FROM nGuide WHERE fk_idx =" . $fk_idx;
                              $result3 = mysqli_query($con, $query3);
                              $arr3 = array();
                            ?>
                            <table class="table table-striped viewQuote" style="width: 50%; float: left; clear: both;">        
                              <tr class="tr_gradient">
                                <th colspan="10"><h5 class="title">5. 가이드 비용 (Cost Guide)</h5></th>
                              </tr>
                              <tr>
                                <td colspan="3"><label for="intType_4">Number of people:</label></td>
                                
                                <td colspan="3"><label for="floatPrice_4">Cost:</label></td>
                                <td colspan="2"><label for="floatCount_4">Days:</label></td>
                                <td><label for="floatSubtotal_4">Sub Total:</label></td>
                              </tr>
                              <?php
                              while ($row3 = mysqli_fetch_assoc($result3)) {                                
                              ?>
                              <tr>
                                <td colspan="3">
                                  <input type="text" name="intType_4" class="form-control" placeholder="<?php echo $row3["intType_4"] ?>" value="<?php echo $row3["intType_4"] ?>" autofocus readonly>
                                </td>
                                
                                <td colspan="3">
                                  <input type="text" name="floatPrice_4" class="form-control" placeholder="<?php echo $row3["floatPrice_4"] ?>" value="<?php echo $row3["floatPrice_4"] ?>" autofocus readonly>
                                </td>
                                <td colspan="2">
                                  <input type="text" name="floatCount_4" class="form-control" placeholder="<?php echo $row3["floatCount_4"] ?>" value="<?php echo $row3["floatCount_4"] ?>" autofocus readonly>
                                </td>
                                <td>
                                  <input type="text" name="floatSubtotal_4" class="form-control" placeholder="<?php echo $row3["floatSubtotal_4"] ?>" value="<?php echo $row3["floatSubtotal_4"] ?>" autofocus readonly>
                                </td>
                              </tr>
                              <?php
                              }
                              ?>
                              <?php 
								  $query2 = "SELECT * FROM nBasic WHERE idx =" . $_GET['view_id'];
								  $result2 = mysqli_query($con, $query2);
								  $arr2 = array();

								  while ($row2 = mysqli_fetch_assoc($result2)) {
									  echo('<tr class="sum-Total"><td colspan="8" class="text-right"><label>Cost Guide Sum: </label></td><td>US$ ' . $row2["floatGuideTotal"] . '</td></tr>');
								  }
                              ?>
                            </table>                            
                            
                            <!-- -------------------------- Local handling Charge Informatin Start ----------------------------- -->
                            <?php 
                              $query3 = "SELECT * FROM nProfit WHERE fk_idx =" . $fk_idx;
                              $result3 = mysqli_query($con, $query3);
                              $arr3 = array();
                            ?>
                            <table class="table table-striped viewQuote" style="width: 50%; float: left;">      
                              <tr class="tr_gradient">
                                <th colspan="10"><h5 class="title">7. 현지 핸들링 Charge (Local handling Charge) </h5></th>
                              </tr>
                              <tr>
                                <td colspan="3"><label for="txtType_5">Contents:</label></td>                                
                                <td colspan="3"><label for="floatSubtotal_5">Price:</label></td>   
                                <td colspan="2"><label for="floatProfit_5">Return (%):</label></td>
                                <td><label for="floatPrice_5">Proceeds:</label></td>                             
                              </tr>
                              <?php
                              while ($row3 = mysqli_fetch_assoc($result3)) {                                
                              ?>
                              <tr>
                                <td colspan="3">
                                  <input type="text" name="txtType_5" class="form-control" placeholder="<?php echo $row3["txtType_5"] ?>" value="<?php echo $row3["txtType_5"] ?>" autofocus readonly>
                                </td>                                
                                <td colspan="3">
                                  <input type="text" name="floatSubtotal_5" class="form-control" placeholder="<?php echo $row3["floatSubtotal_5"] ?>" value="<?php echo $row3["floatSubtotal_5"] ?>" autofocus readonly>
                                </td> 
                                <td colspan="2">
                                  <input type="text" name="floatProfit_5" class="form-control" placeholder="<?php echo $row3["floatProfit_5"] ?>" value="<?php echo $row3["floatProfit_5"] ?>" autofocus readonly>
                                </td> 
                                <td>
                                  <input type="text" name="floatPrice_5" class="form-control" placeholder="<?php echo $row3["floatPrice_5"] ?>" value="<?php echo $row3["floatPrice_5"] ?>" autofocus readonly>
                                </td>                                
                              </tr>
                              <?php
                              }
                              ?>                              
                            </table>
                            <!-- -------------------------- Others Informatin Start ----------------------------- -->
                            <?php 
                              $query3 = "SELECT * FROM nETC WHERE fk_idx =" . $fk_idx;
                              $result3 = mysqli_query($con, $query3);
                              $arr3 = array();
                            ?>
                            <table class="table table-striped viewQuote" style="width: 50%; float: left; clear: both;">          
                              <tr class="tr_gradient">
                                <th colspan="10"><h5 class="title">	6. 기타 포함사항 (Others) </h5></th>
                              </tr>
                              <tr>
                                <td><label for="txtType_6">Contents:</label></td>
                                
                                <td><label for="floatPrice_6">Price:</label></td>                                
                              </tr>
                              <?php
                              while ($row3 = mysqli_fetch_assoc($result3)) {                                
                              ?>
                              <tr>
                                <td>
                                  <input type="text" name="txtType_6" class="form-control" placeholder="<?php echo $row3["txtType_6"] ?>" value="<?php echo $row3["txtType_6"] ?>" autofocus readonly>
                                </td>
                                
                                <td colspan="3">
                                  <input type="text" name="floatPrice_6" class="form-control" placeholder="<?php echo $row3["floatPrice_6"] ?>" value="<?php echo $row3["floatPrice_6"] ?>" autofocus readonly>
                                </td>                                
                              </tr>
                              <?php
                              }
                              ?>
                              <?php 
              								  $query2 = "SELECT * FROM nBasic WHERE idx =" . $_GET['view_id'];
              								  $result2 = mysqli_query($con, $query2);
              								  $arr2 = array();

              								  while ($row2 = mysqli_fetch_assoc($result2)) {
              									  echo('<tr class="sum-Total"><td class="text-right"><label>Others Sum: </label></td><td>US$ ' . $row2["floatETCTotal"] . '</td></tr>');
              								  }
                              ?>
                            </table>
                            <table class="table table-striped viewQuote" style="width: 50%; float: left;"><tr class="tr_gradient">
                                <th colspan="10"><h5 class="title"> Expenses: </h5></th>
                              </tr>
                              <?php 
                                $query2 = "SELECT * FROM nBasic WHERE idx =" . $_GET['view_id'];
                                $result2 = mysqli_query($con, $query2);
                                $arr2 = array();

                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                  ?>
                               <tr class="sum-Total"><td style="color: #FFC107;">Total Expenses:</td><td style="background: #ffc212;">US$ <?php echo ($row["floatTotalEstimator"]); ?></td><td style="color: #FFC107;">Expenses per person:</td><td style="background: #ffc212;">US$ <?php echo ($row["floatPersonTotal"]); ?></td></tr>
                               <?php } ?>
                               </table>
                        </div>
                    </div>
                </div>
                <!-- Include controller --> 
                <script src="js/angular-script.js"></script>
                <script src="js/myScript.js"></script>
            </body>
        </html>
        <?php
}
// Return json array containing data from the database
$json_info = json_encode($arr);
?>