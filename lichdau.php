<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="logo.png">
    <title>Đăk Mil fo4</title>
    <link rel="stylesheet" href="cssLichdau.css">
</head>
<body>
    
    <div class="bg">

    </div>
    
    <div id="container">
    <h1><a href=".?act=bang_xep_hang">Bảng xếp hạng</a></h1>
    <?php    
            $vong=getSoVongDau();

            for ($i = 1; $i <= $vong; $i++) {
                echo "<div class='box'>";
                echo "<p>Vòng {$i}</p>";
                getLichDau($i);
                echo "</div>";
            }
        ?>
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