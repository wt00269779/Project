<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสารสนเทศสำหรับผู้ดูแลระบบ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import "global1.css";
        @import "temple.css";
        table, th , td {
            border: 1px solid grey;
            text-align:center;
            border-collapse: collapse;
            padding: 5px;
        }
        table tr:nth-child(odd) {
            background-color: #f1f1f1;
        }
        table tr:nth-child(even) {
            background-color: #ffffff;
        }
        td{
            font-size:18px;
        }
        th{
            font-size:18px;
            font-weight:normal;
        }
        .ei {
            width:15%;
        }
        #ei {
            margin-left:10px;
        }
        #top{
            background-color:#2c437c;
        }
    </style>
    
</head>
<body>
        <?php 
            if(isset($_SESSION['id5']) && isset($_SESSION['pswd5']) && $_SESSION['role5'] == 'Admin') {
                
            }
            else{
                header("location: staff-home.php");
                exit('</body></html>');
            }
        ?>
    <div class="top" id="top">
            <a href="staff-admin-main.php">นักเรียนสอบเข้าโครงการ</a>
            <a href="staff-admin-main2.php">นักศึกษา</a>
            <a class = "active" href="staff-admin-main3.php">อาจารย์</a>
            <a href="staff-admin-main4.php">รายวิชา</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-logout.php" class="logout">ออกจากระบบ</a>
    </div>
   <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">ข้อมูลอาจารย์</a></li>
            <li><a data-toggle="tab" href="#menu2">ลงทะเบียนอาจารย์</a></li>
        </ul>
     </div>
    <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                
            </div>
            <div id="menu2" class="tab-pane fade">
                <form methode="get" action="staff-admin-main3-upteach.php">
                    <div id = "ei">
                        <div class = "row">
                            <div class = "col-sm-4"><h2>ประวัติส่วนตัว</h2></div>
                            <div class = "col-sm-5"><h2>ข้อมูลติดต่อ</h2></div>
                            
                        </div>
                        <div class = "row">
                            <div class="col-sm-2" >
                                <p>คำนำหน้า : <br>
                                <input type="text" name="Prefix" class="check" id="a1"></p>
                                <p>ชื่อจริง : <br>
                                <input type="text" name="Fname" class="check" id="a2"></p>
                                <p>นามสกุล : <br>
                                <input type="text" name="Lname" class="check" id="a3"></p>
                                <p>รหัสบัตรประชาชน : <br>
                                <input type="text" name="IDCardNumber" class="check" id="a4"></p>
                                <p>วันเกิด : <br>
                                <input type="date" name="DOB" class="check" id="a5"></p>
                                <p>วุฒิการศึกษา : <br>
                                <input type="text" name="EducationBackground" class="check" id="a11"></p>
                            </div>
                            <div class="col-sm-2" >
                                <p>สัญชาติ : <br>
                                <input type="text" name="Nationality" class="check" id="a8"></p>
                                <p>เชื้อชาติ : <br>
                                <input type="text" name="Race" class="check" id="a9"></p>
                                <p>เพศ : <br>
                                <select name="Gender" class="check" id="a6">
                                        <option value="">โปรดเลือก</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                                </select></p>
                                <p>หมู่เลือด : <br>
                                <select name="BloodGroup" class="check" id="a7">
                                    <option value="">โปรดเลือก</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select></p>
                                <p>ศาสนา : <br>
                                <select name="Religion" class="check" id="a10">
                                        <option value="">โปรดเลือก</option>
                                        <option value="ไทย">พุทธ</option>
                                        <option value="คริสต์">คริสต์</option>
                                        <option value="อิสลาม">อิสลาม</option>
                                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                                </select></p>
                            </div>
                            <div class="col-sm-3" id="e1">
                                <p>ที่อยู่ : <br>
                                <textarea style="resize:none" rows='4' cols='30' name="Address" class="check" id="b1"></textarea></p>
                                <p>จังหวัด:<br>
                                <input type="text" name="Province" class="check" id="b2"></p>
                                <p>รหัสไปรษณีย์:<br>
                                <input type="text" name="PostCode" class="check" id="b3"></p>
                                <br>
                                <h2>สาขา</h2>
                                <p><?php
                                include "dblink.php";
                                $result = mysqli_query($conn,"SELECT * FROM departmentinfo");
                                echo"<select name = 'Department' class='check department' id='d2'>";
                                echo"<option value = ''>โปรดเลือก</option>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<option value = '".$row['Department']."'>".$row['Faculty'].'  '.$row['Department']."</option>";
                                }
                                echo"</select><br>";
                                ?></p>
                                <p><input type="submit" value="ยืนยัน" id="submit"></p>
                                <div id="alert"></div>
                            </div>
                            <div class="col-sm-2" id="e2">
                                <p>เบอร์โทรศัพท์มือถือ : <br>
                                <input type="text" name="MobileNo" class="check" id="b4"></p>
                                <p>เบอร์โทรศัพท์บ้าน:<br>
                                <input type="text" name="TelNo" class="check" id="b5"></p>
                                <p>E-mail:<br>
                                <input type="text" name="Email" class="check" id="b6"></p>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <script type="text/javascript">
        
        function myFunction() {
            var x = document.getElementById("top");
            if (x.className === "top") {
                x.className += " responsive";
                } 
            else {
                x.className = "top";
                }
        }

        $(function(){
			$(document).on('click',function(){
			var a1 = document.getElementById("a1").value;
			var a2 = document.getElementById("a2").value;
			var a3 = document.getElementById("a3").value;
			var a4 = document.getElementById("a4").value;
			var a5 = document.getElementById("a5").value;
			var a6 = document.getElementById("a6").value;
			var a7 = document.getElementById("a7").value;
			var a8 = document.getElementById("a8").value;
			var a9 = document.getElementById("a9").value;
			var a10 = document.getElementById("a10").value;
            var a10 = document.getElementById("a11").value;
			var b1 = document.getElementById("b1").value;
			var b2 = document.getElementById("b2").value;
			var b3 = document.getElementById("b3").value;
			var b4 = document.getElementById("b4").value;
			var b5 = document.getElementById("b5").value;
			var b6 = document.getElementById("b6").value;
            var d2 = document.getElementById("d2").value;

				if(a1==""||a2==""||a3=="" ||a4=="" ||a5=="" ||a6=="" ||a7=="" ||a8=="" ||a9=="" ||a10==""
				||a11=="" ||b1==""||b2==""||b3==""||b4==""||b5==""||b6==""||d2==""){
					document.getElementById("alert").innerHTML = '<p>โปรดกรอกข้อมูลให้ครบ</p>';
					$('input[id="submit"]').prop('disabled', true);
				}
				else {
					document.getElementById("alert").innerHTML = '';
					$('input[id="submit"]').prop('disabled', false);
				}
			})
		})
		$('html').bind('keypress', function(e){ //Disable keyboard <enter>
			if(e.keyCode == 13){
				return false;
			}
		});

        load();
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-main3-show.php";

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function displayResponse(response){
            var arr = JSON.parse(response);
            var out = "<h2>ข้อมูลผู้สอน</h2><table><tr><td>ID</td><td>ชื่อ</td><td>ภาควิชา</td><td>เบอร์</td><td>เพิ่มเติม</td></tr>";
            for(i=0;i<arr.length;i++){
                out += "<tr><td>"+ arr[i].StaffID +"</td>"+
                    "<td>"+ arr[i].Prefix + arr[i].FirstName +' '+ arr[i].LastName +"</td>"+
                    "<td>"+ arr[i].Faculty +' '+ arr[i].Department +"</td>"+
                    "<td>"+ arr[i].MobileNumber +"</td>" +
                    "<td><input type='button' id='bt' value='ดูข้อมูล' onclick=\"data("+arr[i].StaffID+")\">"+
                    "<input type='button' id='bt' value='ลบข้อมูล' onclick=\"deleteData("+arr[i].StaffID+")\"></td></tr>";
            }
                out += "</table>";
            document.getElementById("menu1").innerHTML = out;
        }

        function deleteData(staffID){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-main3-deleteData.php?SID="+staffID;
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    load();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function data(staffID){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-main3-data.php?SID="+staffID;
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    ShowData(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function ShowData(response){
            var arr = JSON.parse(response);
            var out = "<h2>ข้อมูลผู้สอน</h2>";
            
                out += "รหัสประจำตัว : "+ arr[0].StaffID +"<br>"+
                    "ชื่อ : "+ arr[0].Prefix + arr[0].FirstName +' '+ arr[0].LastName +"<br>"+
                    "เลขบัตรประจำตัวประชาชน : "+ arr[0].IDCardNumber +"<br>" +
                    "วุฒิการศึกษา : "+ arr[0].EducationBackground +"<br>" +
                    "ภาควิชา : "+ arr[0].Faculty +' '+ arr[0].Department +"<br>"+
                    "เป็นที่ปรึกษา : "+ arr[0].ConsultantStatus +"<br>" +
                    "เบอร์โทรศัพมือถือ : "+ arr[0].MobileNumber +"<br>" +
                    "เบอร์โทร : "+ arr[0].TelNumber +"<br>" +
                    "Email : "+ arr[0].Email +"<br>" +
                    "เพศ : "+ arr[0].Gender +"<br>" +
                    "วันเกิด : "+ arr[0].DOB +"<br>" +
                    "สัญชาติ : "+ arr[0].Nationality +"<br>" +
                    "เชื้อชาติ : "+ arr[0].Race +"<br>" +
                    "ศาสนา : "+ arr[0].Religion +"<br>" +
                    "กรุ๊ปเลือด : "+ arr[0].BloodGroup +"<br>" +
                    "<button onclick=\"load()\">ย้อนกลับ</button>";
                
            document.getElementById("menu1").innerHTML = out;
        }
        </script>
     </div>
</body>
</html>