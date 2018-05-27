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
            border-collapse: collapse;
            padding: 5px;
        }
        table tr:nth-child(odd) {
            background-color: #f1f1f1;
        }
        table tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
    
</head>
<body>
    <div class="top" id="top">
            <a href="staff-admin-main.php">นักเรียนสอบเข้าโครงการ</a>
            <a href="staff-admin-main2.php">นักศึกษา</a>
            <a href="staff-admin-main3.php">อาจารย์</a>
            <a class = "active"  href="staff-admin-main4.php">รายวิชา</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-home.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu0">ข้อมูลรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu1">เพิ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu2">ลบรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu3">แก้ไขรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu4">เพิ่มกลุ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu5">ลบกลุ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu6">แก้ไขกลุ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu7" onclick="loadstat()">สถิติ</a></li>
        </ul>
    </div>
    <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu0" class="tab-pane fade in active"></div>
            <div id="menu1" class="tab-pane fade"></div>
            <div id="menu2" class="tab-pane fade"></div>
            <div id="menu3" class="tab-pane fade"></div>
            <div id="menu4" class="tab-pane fade"></div>
            <div id="menu5" class="tab-pane fade"></div>
            <div id="menu6" class="tab-pane fade"></div>
            <div id="menu7" class="tab-pane fade"></div>
        </div>

        <script>
        function myFunction() {
            var x = document.getElementById("top");
            if (x.className === "top") {
                x.className += " responsive";
                } 
            else {
                x.className = "top";
                }
            }

        loadsubject();
        loadstat();
        function loadsubject(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-main4-link.php?type=01";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    vsub = JSON.parse(xmlhttp.responseText);
                    display();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function display() {
            var out0 = "<table>";
            for( var i = 0 ; i < vsub.length ; i++ ) {
                if( i==0 ) out0 += "<tr><td align='center'>รหัสวิชา</td><td align='center'>ชื่อวิชา</td><td align='center'>หน่วยกิต</td><td align='center'>กลุ่ม</td><td align='center'>เทอมการศึกษา</td><td align='center'>ปีการศึกษา</td><td align='center'>จำนวนที่นั่ง</td><td align='center'>วัน</td><td align='center'>เวลาเริ่ม</td><td align='center'>เวลาจบ</td><td align='center'>ห้องเรียน</td></tr>";
                out0 += "</td><td>" + vsub[i].SubjectID +
                "</td><td>" + vsub[i].SubjectName+
                "</td><td>" + vsub[i].Credit+
                "</td><td>" + vsub[i].SectionNumber+
                "</td><td>" + vsub[i].Semester+
                "</td><td>" + vsub[i].AcademicYear+
                "</td><td>" + vsub[i].SeatAmount+
                "</td><td>" + vsub[i].Day+
                "</td><td>" + vsub[i].StartTime+    
                "</td><td>" + vsub[i].EndTime+
                "</td><td>" + vsub[i].Room+
                "</td></tr>";
            }
            out0 += "</table>";
            document.getElementById("menu0").innerHTML = out0;

            var out1 = "<h2>เพิ่มรายวิชา</h2><p>"+
                "<div class = 'row'>"+
                "<div class= 'col-sm-4' >"+
                "<form>"+
                "<p>รหัสวิชา : <input type='text' id='aSID' class='bg'></p>"+
                "<p>ชื่อวิชา : <input type='text' id='aSN' class='bg'></p>"+
                "<p>รายละเอียด : <textarea style='resize: none' rows=3 cols=40 id='aDes' class='bg'></textarea></p>"+
                "<p>หน่วยกิต : <input type='text' id='aCre' class='bg'></p>"+
                "<br><p><input type='button' value='ยืนยัน' onclick='update1()'></p>"+
                "</form>"+
                "</div>"+
                "</div>";
            document.getElementById("menu1").innerHTML = out1;

            var out2 = "<h2>ลบรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<form>"+
                    "<p>วิชา: <select id='inSub2' onchange='change2()'>";
            for( var i=0 ; i<vsub.length ; i++ )
                if( i==0 || vsub[i].SubjectID!=vsub[i-1].SubjectID ) out2+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
            out2 += "</select><div id='in2'></div><p><br><input type='button' value='ยืนยัน' onclick='update2()'></p></form></div></div>";
            document.getElementById("menu2").innerHTML = out2;

            var out3 = "<h2>แก้ไขรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<p>วิชา: <select id='inSub3' onchange='change3()'>";
            for( var i=0 ; i<vsub.length ; i++ )
                if( i==0 || vsub[i].SubjectID!=vsub[i-1].SubjectID ) out3+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
            out3+="</select><br><div id='in3'></div></div></div>";
            document.getElementById("menu3").innerHTML = out3;

            var out4 = "<h2>เพิ่มกลุ่มรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<p>วิชา: <select id='inSub4'>";
            for( var i=0 ; i<vsub.length ; i++ )
                if( i==0 || vsub[i].SubjectID!=vsub[i-1].SubjectID ) out4+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
            out4+="</select><p>กลุ่ม: <select id='inSec4'>"+
                        "<option value=1>1</option>"+
                        "<option value=2>2</option>"+
                        "<option value=3>3</option>"+
                        "</select>"+
                "<p>เทอมการศึกษา: <select id='inSem4'>"+
                        "<option value=1>1</option>"+
                        "<option value=2>2</option>"+
                        "</select>"+
                "<p>ปีการศึกษา: <input type='text' id='inY' class='bg'></p>"+
                "<p>จำนวนที่นั่ง: <input type='text' id='inSA' class='bg'></p>"+
                "<p>วัน: <input type='text' id='inD' class='bg'></p>"+
                "<p>เวลา: <input type='text' id='inTS' class='bg'> ถึง <input type='text' id='inTE' class='bg'></p>"+
                "<p>ห้องเรียน: <input type='text' id='inR' class='bg'></p>"+
                "<br><p><input type='button' value='ยืนยัน' onclick='update4()'></p>"+
                "</div></div>";
            document.getElementById("menu4").innerHTML = out4;

            var out5 = "<h2>ลบกลุ่มรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<form>"+
                    "<p>วิชา: <select id='inSub5'>";
            for( var i=0 ; i<vsub.length ; i++ )
                if( i==0 || vsub[i].SubjectID!=vsub[i-1].SubjectID ) out5+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
            out5 += "</select>";
            document.getElementById("menu5").innerHTML = out5;
            out5 = "<h2>ลบกลุ่มรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<form>"+
                    "<p>วิชา: <select id='inSub5' onclick='change5()'>";
            for( var i=0 ; i<vsub.length ; i++ )
                if( i==0 || vsub[i].SubjectID!=vsub[i-1].SubjectID ) out5+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
            out5 += "</select> กลุ่ม: <select id='inSec5' onclick='change5()'>";
            for( var i=0 ; i<vsub.length ; i++ )
                if( vsub[i].SubjectID==document.getElementById('inSub5').value ) out5+="<option value='"+vsub[i].SectionNumber+"'>"+vsub[i].SectionNumber+"</option>";
            out5+="</select><div id='in5'></div><p><br><input type='button' value='ยืนยัน' onclick='update5()'></p></form></div></div>";
            document.getElementById("menu5").innerHTML = out5;

            var out6 = "<h2>แก้ไขกลุ่มรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<p>วิชา: <select id='inSub6' onchange='change6()'>";
            for( var i=0 ; i<vsub.length ; i++ )
                if( i==0 || vsub[i].SubjectID!=vsub[i-1].SubjectID ) out6+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
                out6 += "</select>";
            document.getElementById("menu6").innerHTML = out6;
            out6 = "<h2>แก้ไขกลุ่มรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<form>"+
                    "<p>วิชา: <select id='inSub6' onchange='change6()'>";
            for( var i=0 ; i<vsub.length ; i++ )
                if( i==0 || vsub[i].SubjectID!=vsub[i-1].SubjectID ) out6+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
            out6 += "</select> กลุ่ม: <select id='inSec6' onchange='change6()'>";
            for( var i=0 ; i<vsub.length ; i++ )
                if( vsub[i].SubjectID==document.getElementById('inSub6').value ) out6+="<option value='"+vsub[i].SectionNumber+"'>"+vsub[i].SectionNumber+"</option>";
            out6+="</select><br><br></form><div id='in6'></div></div></div>";
            document.getElementById("menu6").innerHTML = out6;

            change2();
            change3();
            change5();
            change6();
        }

        function change2(){
            var sub = document.getElementById('inSub2').value;
            var index;
            for( var i=0 ; i<vsub.length ; i++ )
                if( sub==vsub[i].SubjectID ){ index=i; break; }
            var out = "<p><div class = 'row'>"+
                    "<div class= 'col-sm-4' >"+
                    "<p>รหัสวิชา : "+vsub[index].SubjectID+"</p>"+
                    "<p>ชื่อวิชา : "+vsub[index].SubjectName+"</p>"+
                    "<p>รายละเอียด : "+vsub[index].Description+"</p>"+
                    "<p>หน่วยกิต : "+vsub[index].Credit+"</p>"+
                    "</div>"+
                    "</div>";
            document.getElementById("in2").innerHTML = out;
        }

        function change3(){
            var sub = document.getElementById('inSub3').value;
            var index;
            for( var i=0 ; i<vsub.length ; i++ )
                if( sub==vsub[i].SubjectID ){ index=i; break; }
            var out = "<p><div class = 'row'>"+
                    "<div class= 'col-sm-4' >"+
                    "<form>"+
                    "<p>รหัสวิชา : <input type='text' id='cSID' class='bg' value='"+vsub[index].SubjectID+"'></p>"+
                    "<p>ชื่อวิชา : <input type='text' id='cSN' class='bg' value='"+vsub[index].SubjectName+"'></p>"+
                    "<p>รายละเอียด : <textarea style='resize: none' rows=3 cols=40 id='cDes' class='bg'>"+vsub[index].Description+"</textarea></p>"+
                    "<p>หน่วยกิต : <input type='text' id='cCre' class='bg' value='"+vsub[index].Credit+"'></p>"+
                    "<br><p><input type='button' value='ยืนยัน' onclick='update3()'></p>"+
                    "</form>"+
                    "</div>"+
                    "</div>";
            document.getElementById("in3").innerHTML = out;
        }

        function change5(){
            var sub = document.getElementById('inSub5').value;
            var sec = document.getElementById('inSec5').value;
            var index;
            for( var i=0 ; i<vsub.length ; i++ )
                if( sub==vsub[i].SubjectID && sec==vsub[i].SectionNumber ){ index=i; break; }
            var out = "<p><div class = 'row'>"+
                    "<div class= 'col-sm-4' >"+
                    "<p>เทอมการศึกษา: "+vsub[index].Semester+"</p>"+
                    "<p>ปีการศึกษา: "+vsub[index].AcademicYear+"</p>"+
                    "<p>จำนวนที่นั่ง: "+vsub[index].SeatAmount+"</p>"+
                    "<p>วัน: "+vsub[index].Day+"</p>"+
                    "<p>เวลา: "+vsub[index].StartTime+" ถึง "+vsub[index].EndTime+"</p>"+
                    "<p>ห้องเรียน: "+vsub[index].Room+"</p>"+
                    "</div>"+
                    "</div>";
            document.getElementById("in5").innerHTML = out;
        }

        function change6(){
            var sub = document.getElementById('inSub6').value;
            var sec = document.getElementById('inSec6').value;
            var index;
            for( var i=0 ; i<vsub.length ; i++ )
                if( sub==vsub[i].SubjectID && sec==vsub[i].SectionNumber ){ index=i; break; }
            var out = "<p><div class = 'row'>"+
                    "<div class= 'col-sm-4' >"+
                    "<form>"+
                    "<p>เทอมการศึกษา: <select id='inSem6'>"+
                            "<option value=1>1</option>"+
                            "<option value=2>2</option>"+
                            "</select>"+
                    "<p>ปีการศึกษา: <input type='text' id='inY6' class='bg' value='"+vsub[index].AcademicYear+"'></p>"+
                    "<p>จำนวนที่นั่ง: <input type='text' id='inSA6' class='bg' value='"+vsub[index].SeatAmount+"'></p>"+
                    "<p>วัน: <input type='text' id='inD6' class='bg' value='"+vsub[index].Day+"'></p>"+
                    "<p>เวลา: <input type='text' id='inTS6' class='bg' value='"+vsub[index].StartTime+"'> ถึง <input type='text' id='inTE6' class='bg' value='"+vsub[index].EndTime+"'></p>"+
                    "<p>ห้องเรียน: <input type='text' id='inR6' class='bg' value='"+vsub[index].Room+"'></p>"+
                    "<br><p><input type='button' value='ยืนยัน' onclick='update6()'></p>"+
                    "</form>"+
                    "</div>"+
                    "</div>";
            document.getElementById("in6").innerHTML = out;
        }

        function update1(){
            var xmlhttp = new XMLHttpRequest();
            var inSID = document.getElementById('aSID').value;
            var inSN = document.getElementById('aSN').value;
            var inDes = document.getElementById('aDes').value;
            var inCre = document.getElementById('aCre').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main4-link.php?type=11";
                url+="&inSID="+inSID+"&inSN="+inSN+"&inDes="+inDes+"&inCre="+inCre;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function update2(){
            var xmlhttp = new XMLHttpRequest();
            var sub = document.getElementById('inSub2').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main4-link.php?type=12";
                url+="&inSub="+sub;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function update3(){
            var xmlhttp = new XMLHttpRequest();
            var oldID = document.getElementById('inSub3').value;
            var inSID = document.getElementById('cSID').value;
            var inSN = document.getElementById('cSN').value;
            var inDes = document.getElementById('cDes').value;
            var inCre = document.getElementById('cCre').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main4-link.php?type=13";
                url+="&oldID="+oldID+"&inSID="+inSID+"&inSN="+inSN+"&inDes="+inDes+"&inCre="+inCre;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function update4(){
            var xmlhttp = new XMLHttpRequest();
            var sub = document.getElementById('inSub4').value;
            var sec = document.getElementById('inSec4').value;
            var sem = document.getElementById('inSem4').value;
            var year = document.getElementById('inY').value;
            var sa = document.getElementById('inSA').value;
            var day = document.getElementById('inD').value;
            var ts = document.getElementById('inTS').value;
            var te = document.getElementById('inTE').value;
            var room = document.getElementById('inR').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main4-link.php?type=14";
                url+="&sub="+sub+"&sec="+sec+"&sem="+sem+"&year="+year+"&sa="+sa+"&day="+day+"&ts="+ts+"&te="+te+"&room="+room;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function update5(){
            var xmlhttp = new XMLHttpRequest();
            var sub = document.getElementById('inSub5').value;
            var sec = document.getElementById('inSec5').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main4-link.php?type=15";
                url+="&inSub="+sub+"&inSec="+sec;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function update6(){
            var xmlhttp = new XMLHttpRequest();
            var sub = document.getElementById('inSub6').value;
            var sec = document.getElementById('inSec6').value;
            var sem = document.getElementById('inSem6').value;
            var year = document.getElementById('inY6').value;
            var sa = document.getElementById('inSA6').value;
            var day = document.getElementById('inD6').value;
            var ts = document.getElementById('inTS6').value;
            var te = document.getElementById('inTE6').value;
            var room = document.getElementById('inR6').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main4-link.php?type=16";
                url+="&sub="+sub+"&sec="+sec+"&sem="+sem+"&year="+year+"&sa="+sa+"&day="+day+"&ts="+ts+"&te="+te+"&room="+room;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function loadstat(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/report-8.php";
                
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    disstat(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function disstat(response){
            var arr = JSON.parse(response);
            var out7 = "<form> เลือกรายวิชาที่ต้องการดูเกรด: <select id='sub3'>";
            for(i=0;i<arr.length;i++){
                out7+="<option value="+
                        arr[i].SubjectSectionID+">"+
                        arr[i].SubjectID+
                        "&nbsp"+arr[i].SubjectName+
                        "&nbspsec:"+arr[i].SectionNumber+
                        "&nbspภาคเรียนที่:"+arr[i].Semester+
                        "&nbspปีการศึกษา:"+arr[i].AcademicYear+
                        "</option>";
            }
            out7 += "</select><br>"+
                    "<br><input type='button' value='ตรวจสอบ' onclick='show()'>"+
                    "</form>";
            }
            document.getElementById("menu7").innerHTML = out7;
        }

        function show(){
            var xmlhttp = new XMLHttpRequest();
            var sub = document.getElementById('sub3').value;
            var url = location.protocol+'//'+location.host+"/Project/report-8-link.php?sub="+sub;
                
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    disGrade3(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        </script>

    </div>
</body>
</html>