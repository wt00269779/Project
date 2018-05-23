<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>สำหรับนักศึกษาใหม่</title>
        <style>
            @import "global1.css";
            html, body { 
                margin: 0;
                padding: 0;
                background: #dfdfdf;
                color: #444444;
            }
            #main {
                width: 90%;
                float: right;
                position: relative;
                top: 50px;
            }
    
            #left {
                float: left;
                width: 10%;
                position: relative;
            }
            #back {
                margin: 20px;
                font-weight: bold;
            }
            #header {
                width: 100%;
                top: 100px;
                position: relative;
            }
            #header > h1 {
                font-size: 50px;
                position: absolute;
                bottom: 0;
                width: 100%;
                border-bottom: 5px solid;
            }
            div#left > a {
                text-decoration: none;
                margin: 5px;
                color: #444444;
            }
            div#sub > a {
                text-decoration: underline;
                margin: 5px;
                color: #ffffff;
            }
            div#content {
                clear: both;
                width: 100%;
                position: relative;
                height: 450px;
                top: 110px;
            }
            #c-top {
                width: 100%;
                height: 360px;
                top: 0;
                text-align: left;
                position: relative;
                background: #444444;
                color: white;
            }
            form{
                padding-top : 5px;
                padding-left : 30px;
            }
            input[type=text] {
                background: #242424;
                margin-top: 10px;
                padding-left: 30px;
                width: 310px;
                height:30px;
                text-align: left;
                color: white;
            }
            input[type=password] {
                background: #242424;
                margin-top: 20px;
                padding-left: 30px;
                width: 310px;
                height: 30px;
                text-align: left;
                color: white;
            }
            ::placeholder {
                color: white;
            }
            input[type=submit] {
                width: 60px;
                margin-top: 25px;
                margin-left: 10px;
                background: white;
            }
            div#text >a {
                text-decoration: underline;
            }
            #text{
                padding-left : 30px;
            }
        </style>    

    </head>
    <body>
        <?php
        if(isset($_SESSION['id']) && isset($_SESSION['idcard'])&&$_SESSION['role']=='student') {
            header("location: student-changepw.php");
            exit('</body></html>');
        }
        ?> 
        <div id="left">
            <br><a href="student-home.php" id="back">< back</a>
        </div>
        <div id="main">
            <div id="header">
                <h1>ลงทะเบียนสำหรับนักศึกษาใหม่</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form method="post" action="student-new-login-link.php">
                        <h1>ระบบสารสนเทศ<br>เพื่อการบริหารการศึกษา</h1>
                        <input type="text" name="id" placeholder="รหัสนักศึกษา"><br>
                        <input type="password" name="pswd" placeholder="รหัสบัตรประจำตัวประชาชน"><br>
                        <input type="submit" value="เข้าสู่ระบบ">
                    </form>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>
</html>