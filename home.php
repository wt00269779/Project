<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>หน้าหลัก</title>
        <style>
            @import "global.css";
            html, body { 
                margin: 0;
                padding: 0;
                background: #dfdfdf;
                color: #444444;
                width: 100%;
            }
            a {
                text-decoration: none;
                margin: 5px;
                color: #444444;
            }
            #main {
                width: 1100px;
                height: 500px;
                margin: auto;
                position: relative;
                top: 50px;
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
            #content {
                position: relative;
                top:110px;
                width: 1100px;
                height: 350px;
            }
            #left,#right,#center {
                width: 340px;
                height: 300px;
                
                position: relative;
                
            }
            #left > div,#right > div ,#center > div {
                position: absolute;
                text-align: center;
                bottom: 0px;
                width: 100%;
                background: white;
                cursor: pointer;
            }
            #left {
                float: left;
            }
            #center {
                float: left;
                margin-left: 40px;
            }
            #right {
                float: right;
            }
            img {
                width: 340px;
                height: 215px;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <h1>ระบบลงทะเบียน</h1>
            </div>
            <div id="content">
                <div id="left" onclick="window.location.href='recruit-login.php'">
                    <div>
                        <img data-u="image" src="img/gallery/980x380/002.jpg" />
                        <h1>นักเรียน</h1>
                    </div>
                </div>
                <div id="center" onclick="window.location.href='#'">
                    <div>
                        <img data-u="image" src="img/gallery/980x380/003.jpg" />
                        <h1>นักศึกษา</h1>
                    </div>
                </div>
                <div id="right" onclick="window.location.href='#'">
                    <div>
                        <img data-u="image" src="img/gallery/980x380/004.jpg" />
                        <h1>บุคลากร</h1>
                    </div>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>