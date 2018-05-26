<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสารสนเทศสำหรับอาจารย์</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
	<!-- <link href ="js/sweetalert2.all.js" rel="stylesheet"> -->
    <script src="js/sweetalert21.js"></script>
    <style>
        @import "global1.css";
        @import "temple.css";
    </style>
    
</head>
<body>
    <?php 
            if(isset($_SESSION['id']) && isset($_SESSION['pswd']) && $_SESSION['role'] == 'Teacher') {
                
            }
            else{
                header("location: staff-home.php");
                exit('</body></html>');
            }
    ?>
    <div class="top" id="top">
            <a href="staff-teacher-main.php">ข้อมูลอาจารย์</a>
            <a class = "active" href="staff-teacher-main2.php">ลงทะเบียนสอน</a>
            <a href="staff-teacher-main3.php">บันทึกและตัดเกรด</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-logout.php" class="logout">ออกจากระบบ</a>
    </div>
   <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1" onclick="load()">ลงทะเบียนสอน</a></li>
            <li><a data-toggle="tab" href="#menu2">ตารางสอน</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active" >
                
            </div>
            <div id="menu2" class="tab-pane fade">
                
            </div>
        </div>
        <script>
            load();
            load2();

            function load(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-disSub.php?ID="+<?php echo $_SESSION['id'];?>;
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        display(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
            
            function display(response){
                var arr = JSON.parse(response);
                if(arr[0].nop =="not found" ){
                    var out1 =  "<br>"+"ไม่พบรายวิชาทีต้องลงทะเบียนสอน" ;
                }
                else{
                    var out1 = "<form> เลือกรายวิชาที่ต้องการลงทะเบียนสอน: <select id='sub'>";
                            for(i=0;i<arr.length;i++){
                                out1+="<option value="+arr[i].SubjectSectionID+">"+arr[i].SubjectID+"&nbsp"+arr[i].SubjectName+"&nbspsec:"+arr[i].SectionNumber+"</option>";
                            }
                        out1 += "</select><br>"+
                            "<br><input type='button' value='ยืนยัน' id='edit1' onclick='regisSub()'>"+
                            "</form>";
                }
                document.getElementById("menu1").innerHTML = out1;
            }
            
            function regisSub(){
                var xmlhttp = new XMLHttpRequest();
                var sub = document.getElementById('sub').value;
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-regisSub-link.php?ID="+<?php echo $_SESSION['id'];?>+"&sub="+sub;
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        swal({
                            type: 'success',
                            title: 'ลงทะเบียนสอนเรียบร้อยแล้ว'
                        });
                        load();
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function myFunction() {
                var x = document.getElementById("top");
                if (x.className === "top") {
                    x.className += " responsive";
                } 
                else {
                    x.className = "top";
                }
            }

            function load2(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-timeTable.php?ID="+<?php echo $_SESSION['id'];?>;
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        display2(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
            
            function display2(response){
                var arr = JSON.parse(response);
                if(arr[0].nop =="not found" ){
                    var out2 =  "<br>"+"ไม่พบข้อมูล" ;
                }
                else{
                    var out2 = "<form> ภาคเรียนที่:<select id='sem'><option value='1'>1</option><option value='2'>2</option></select>" 
                                +"&nbspปีการศึกษา : <select id='sub'>";
                            for(i=0;i<arr.length;i++){
                                out2+="<option value="+arr[i].AcademicYear+">"+arr[i].AcademicYear+"</option>";
                            }
                        out2 += "</select><br>"+
                            "<br><input type='button' value='ตรวจสอบ' onclick=''>"+
                            "</form>";
                }
                document.getElementById("menu2").innerHTML = out2;
            }
        </script>
     </div>
</body>
</html>