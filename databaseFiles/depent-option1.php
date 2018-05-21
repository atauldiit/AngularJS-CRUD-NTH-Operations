<?php
include 'database_connections.php';

?>
<script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint1").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint1").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "http://barisys.com/topangular6/databaseFiles/depent-option2.php?q1=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

<select class="form-control" name="txtLocation[]" onchange="showUser(this.value)">
<?php
	$sql2 = "SELECT `name`, `city`, `state` FROM `company_info` WHERE `type` LIKE 'hotel' AND `name` != '' AND `city` != '' AND `state` != '' ORDER BY `city` ASC";

	$result2 = mysqli_query($con, $sql2);
	echo "<option value=''>Select a City:</option>";
    if ($result2->num_rows > 0) {
        // output data of each row
		echo "<option title='뉴욕/뉴저지 등 뉴욕 투어용' value='NY'>NY - 뉴욕/뉴저지 등 뉴욕 투어용</option>";
		echo "<option title='시라큐스 등 천섬 투어 용' value='1000s'>1000s - 시라큐스 등 천섬 투어 용</option>";
		echo "<option title='미국/캐나다 쪽 나이아가라 투어 용' value='Niagara'>Niagara - 미국/캐나다 쪽 나이아가라 투어 용</option>";
		echo "<option title='나이아가라 제외한 캐나다 토론토, 오타와 투어 용' value='Ottawa'>ON - 나이아가라 제외한 캐나다 토론토, 오타와 투어 용</option>";
		echo "<option title='캐나다 퀘백, 몬트리올 투어 용' value='Montreal'>QC - 캐나다 퀘백, 몬트리올 투어 용</option>";
		echo "<option title='워싱턴 DC (DC 구역만)' value='Washington DC'>DC - 워싱턴 DC (DC 구역만)</option>";
		echo "<option value=''>--------------------------------------------------</option>";
		echo "<option value=''>위에 나열한 위치가 없을 경우 City, State 별로 찾아 주세요.</option>";
		echo "<option value=''>--------------------------------------------------</option>";
		
        while ($row2 = $result2->fetch_assoc()) {
            echo "<option value='$row2[city]'>" . $row2['city'] . ", " . $row2['state']."</option>";
        }
    } else {
        echo "0 results";
    }
    echo "</select>";
    ?>
<?php mysqli_close($con); ?>
