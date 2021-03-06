<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link href ="js/sweetalert2.all.js" rel="stylesheet" >
    <script src="js/sweetalert21.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link href ="js/sweetalert2.all.js" rel="stylesheet" >
    <script src="js/sweetalert21.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>สละสิทธิ์</title>
    <style>
        @import "global1.css";
        #left {
            float: left;
            width: 13%;
            position: relative;
            height: 100%;
        }
        #main {
            width: 72%;
            height: 100%;
            margin: auto;
            position: relative;
            top: 60px;
        }
        #header {
			width: 100%;
			height: 80px;
            position: relative;
        }
        #sm,#sm-sub {
            width: 100px;
            height: 40px;
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 20px;
            border-radius: 10px;
            color:white;
        }
        #profile{
            margin-top: 2%;
            margin-left:10%;
        }
        #detail{
            margin-left:10%;
        }
        #button {
            margin-left:30%;
            font-size:18px;
            font-weight:none;
        }
        #sm-sub{
            background-color:#3085d6;
        }
        #sm{
            background-color:#d33;
        }
        .swal2-popup {
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <?php
    include "recruit-checkLog.php";
    ?>
    <div id="left">
        <a href="#" id="back"> </a>
    </div>
    <div id="main">
        <div id="header">
            <h1>สละสิทธิ์</h1>
            
        </div>
        <div id="content">
        <div id="profile"></div>
            <form>
                <div id="detail"></div>
                <div id="but"></div>
            </form>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>
    

    <script>
        load();
        
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-reject-link1.php?inID=" + <?php echo $_COOKIE['id'] ?>
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function displayResponse(response) {
            arr = JSON.parse(response);
            var out = "<p>รหัสประจำตัวผู้สมัคร : "+ arr[0].RecruitID +"</p>"+
                    "<p>ชื่อ : "+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"</p>";
            document.getElementById("profile").innerHTML = out;

            var outlist =
                "<h3>ชื่อมหาวิทยาลัยที่เลือกศึกษาต่อ</h3>"+
                "<select name=\"inUni\" id=\"inUni\" onchange=\"otherField(this.value)\">"+
                    "<option value='จุฬาลงกรณ์'>จุฬาลงกรณ์มหาวิทยาลัย</option><option value='เกษตรศาสตร์'>มหาวิทยาลัยเกษตรศาสตร์</option><option value='ธรรมศาสตร์'>มหาวิทยาลัยธรรมศาสตร์</option><option value='พระนครเหนือ'>สถาบันเทคโนโลยีพระจอมเกล้าพระนครเหนือ</option>"+
                    "<option value='ลาดกระบัง'>สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง</option><option value='มหิดล'>มหาวิทยาลัยมหิดล</option><option value='อื่น'>อื่นๆ</option>"+
                "</select><br><div id='addbut'></div>"+
                "<br>เหตุผล<br>"+
                "<textarea rows=3 cols=50 name=\"reason\" style=\"resize:none\"></textarea><br>"+
                "<div id='button'>"+
                // "<input id='sm-sub' type=\"button\" value=\"ยืนยัน\" onclick=\"update()\">"+
                "<input id='sm-sub' type=\"button\" value=\"ยืนยัน\" >"+
                "<input id='sm' type=\"button\" value=\"ย้อนกลับ\" onclick=\"window.location.href='recruit-status.php'\">"+
                "</div>";
            document.getElementById("detail").innerHTML = outlist;

            $(function(){
                $('#sm-sub').on('click',function(){
                    swal({
                        title: 'คุณต้องการที่จะสละสิทธ์ใช่หรือไม่',
                        text: "หากคุณสละสิทธิ์แล้ว คุณไม่สามารถยกเลิกได้",
                        type: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<a href="recruit-status.php" ><font color="white">ยืนยันที่จะสละสิทธิ์</font></a>',
                        cancelButtonText: 'ยกเลิก',
                    }).then((result) => {
                        if (result.value) {
                            update();
                        }
                    })
                })
            })
           
        }

        function update() {
            var xmlhttp = new XMLHttpRequest();
            var uni = document.getElementById("inUni").value;
            if( uni=="other" ){
                uni = document.getElementById("other").value;
            }
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-reject-link.php?inID="+arr[0].RecruitID+"&inUni="+uni;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function otherField(val) {
            if( val=="อื่น" )
                document.getElementById("addbut").innerHTML = "โปรดระบุ: <input type=\"text\" name=\"other\" id=\"other\"><br>";
            else
                document.getElementById("addbut").innerHTML = "";
        }

         
    </script>
</body>
</html>