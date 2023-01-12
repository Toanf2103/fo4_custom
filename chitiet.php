<?php
    $id=$_REQUEST['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="logo.png">
    <title>Đăk Mil fo4</title>
    <link rel="stylesheet" href="cssLichdau.css">
    <style>
        h1{
            display:flex;
            align-items:center;
            justify-content:left;
        }
        h1 a{
            display:inline-block;
            padding: 0px 20px;
            text-align:left;
            font-size:20px;
            flex:2;
        }
        h1 a:hover{
            text-decoration:underline;
            font-size:25px;
        }
        h1 span{
            flex:3;
            text-align:left;
        }
        @media screen and (max-width: 600px) {
            h1 a{
                font-size:10px;
            }
            h1 a:hover{
                flex:3;
                font-size:25px;
            }
            h1 span{
                font-size:15px;
            }
        }
    </style>
</head>
<body>
    
    <div class="bg">

    </div>
    
    <div id="container">
    <h1>
        <a href=".?act=bang_xep_hang">Bảng xếp hạng</a>
        <span>Lịch đấu <?php echo getTenById($id) ?></span>
    </h1>
    <div class="box">
    <?php    
        
        getTranById($id);    
        ?>
    </div>
    

        <!-- <div class="box">
            <p>
                Vòng 1
            </p>
            <div class='item'>
                <div class='team'>
                    <span>Toàn</span>
                    <img class='icon' src='https://cloudinary.fifa.com/api/v3/picture/flags-sq-4/ARG?tx=c_fill,g_auto,q_auto'>
                </div>
                <span class='tyso'>
                        3-4
                </span>
                <div class='team end'>
                    <span>Toàn</span>
                    <img class='icon' src='https://cloudinary.fifa.com/api/v3/picture/flags-sq-4/ARG?tx=c_fill,g_auto,q_auto'>
                </div>
            </div>
            <div class="item">
                <div class="team">
                    <span>Toàn</span>
                    <img class="icon" src="https://cloudinary.fifa.com/api/v3/picture/flags-sq-4/ARG?tx=c_fill,g_auto,q_auto">
                </div>
                <span class="tyso">
                        3-4
                </span>
                <div class="team end">
                    <span>Toàn</span>
                    <img class="icon" src="https://cloudinary.fifa.com/api/v3/picture/flags-sq-4/ARG?tx=c_fill,g_auto,q_auto">
                </div>
            </div>
            <div class="item">
                <div class="team">
                    <span>Toàn</span>
                    <img class="icon" src="https://cloudinary.fifa.com/api/v3/picture/flags-sq-4/ARG?tx=c_fill,g_auto,q_auto">
                </div>
                <span class="tyso">
                        3-4
                </span>
                <div class="team end">
                    <span>Toàn</span>
                    <img class="icon" src="https://cloudinary.fifa.com/api/v3/picture/flags-sq-4/ARG?tx=c_fill,g_auto,q_auto">
                </div>
            </div>
            <div class="item">
                <div class="team">
                    <span>Toàn</span>
                    <img class="icon" src="https://cloudinary.fifa.com/api/v3/picture/flags-sq-4/ARG?tx=c_fill,g_auto,q_auto">
                </div>
                <span class="tyso">
                        3-4
                </span>
                <div class="team end">
                    <span>Toàn</span>
                    <img class="icon" src="https://cloudinary.fifa.com/api/v3/picture/flags-sq-4/ARG?tx=c_fill,g_auto,q_auto">
                </div>
            </div>
        </div> -->
      </div>
</body>
</html>