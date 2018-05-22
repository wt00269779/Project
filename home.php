<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>หน้าหลัก</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <style>
 
            @font-face{
                font-family: "supermarket";
                src: url(font/supermarket.woff);
            }
            html, body { 
                font-family: "supermarket";
                margin: 0;
                padding: 0;
                background: #ebebeb;
                color: #444444;
                width: 100%;
            }
            #main {
                width: 1100px;
                height: 100%;
                margin: auto;
                position: relative;
                top: 50px;
            }
            #header {
                width: 100%;
                height: 100px;
                position: relative;
            }
            #header > h1 {
                font-family: "supermarket";
                font-size: 50px;
                position: absolute;
                bottom: 0;
                width: 100%;
                border-bottom: 5px solid;
            }
            #content {
                position: relative;
                height: 350px;
                width:100%;
            }
            #left,#right {
                float: left;
                margin-top: 10px;
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
            #center {
                float: left;
                margin-top: 10px;
                margin-left: 40px;
                width: 340px;
                height: 300px;
                position: relative;
            }
            #right {
                float: right;
            }
            img {
                width: 340px;
                height: 215px;
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                width: 40%;
            }
            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }
            .container {
                padding: 2px 16px;
            }
            @media only screen and (max-width:820px) {
            /* For mobile phones: */
                #main {
                width:100%;
                }
                #center,#right{
                    float: left;
                    margin-left:0px;
                }
            }
            footer {
                position: absolute;
                text-align: right;
                width: 100%;
                bottom: -30px;
                border-top: 2px solid;
                
            }
            a {
                text-decoration: none;
                margin: 5px;
                color: #444444;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <h1>ระบบลงทะเบียน</h1>
            </div>
            <div id="content">
                <div id="left" class="card" onclick="window.location.href='recruit-login.php'">
                    <div>
                        <img data-u="image" src="img/gallery/980x380/056.jpg" />
                        <h1>นักเรียน</h1>
                    </div>
                </div>
                <div id="center" class="card" onclick="window.location.href='student-home.php'">
                    <div>
                        <img data-u="image" src="img/gallery/980x380/057.jpg" />
                        <h1>นักศึกษา</h1>
                    </div>
                </div>
                <div id="right" class="card" onclick="window.location.href='staff-home.php'">
                    <div>
                        <img data-u="image" src="img/gallery/980x380/058.jpg" />
                        <h1>บุคลากร</h1>
                    </div>
                </div>
                <?php include "recruit-footer.php"; ?>
            </div>
        </div>
    </body>
</html>