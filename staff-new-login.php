<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>สำหรับบุคลากร</title>
        <style>
            @import "global1.css";
            @import "temphome.css";
            div#content{          
                background-image: url(img/gallery/980x380/065.jpg);
            }
            .swal2-popup {
            font-size: 2rem;
            }
        </style>    

    </head>
    <body>
        <?php
        if(isset($_SESSION['id2']) && isset($_SESSION['idcard2']) &&  $_SESSION['role2'] == 'staff') {
            header("location: staff-changepw.php");
            exit('</body></html>');
        }
        ?> 
        <div id="left">
            <a href="staff-home.php" class="btn btn-info btn-lg" id = "back">
                <span class="glyphicon glyphicon-chevron-left"></span> 
            </a>
        </div>
        <div id="main">
            <div id="header">
                <h1>ลงทะเบียนบุคลากรใหม่</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form action="staff-new-login-link.php" method="post" >
                        <h1>สำหรับบุคลากรใหม่</h1>
                        <h4>กรุณากรอกรหัสประจำตัวบุคลากรและรหัสบัตรประชาชนเพื่อทำการเข้าระบบและสร้างรหัสผ่าน</h4>
                        <div id = "c-in">
                            <input type="text" name="id" placeholder="รหัสประจำตัวบุคลากร"><br>
                            <input type="password" name="pswd" placeholder="รหัสบัตรประจำตัวประชาชน"><br>
                            <div id  = "sub">
                                <input type="submit" value="เข้าสู่ระบบ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>
</html>