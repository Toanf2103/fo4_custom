<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhìn ai top 1?</title>
    <link rel="icon" type="image/png" href="logo.png">
    <!-- <link rel="stylesheet" href="css.css"> -->
    <link rel="stylesheet" href="css2.css">
</head>
<body>
<div class="bxh">
        <div class="title">
            <span>Bảng xếp hạng</span>
            <a href=".?act=lichdau">Lịch đấu</a>
        </div>
        <table class="tb">
            <tr class="row">
                <th>#</th>
                <th >Team</th>
                <th>ST</th>
                <th>T</th>
                <th>H</th>
                <th>B</th>
                <th>HS</th>
                <th>Đ</th>
            </tr>
            <?php getAllLoai()?>
            <!-- <tr class='row item'>
                <td><p>1</p></td>
                <td >
                    <div class='row-icon'>
                        <img class='icon' src='https://cloudinary.fifa.com/api/v3/picture/flags-sq-4/ARG?tx=c_fill,g_auto,q_auto'>
                        <span>Toàn</span>
                    </div>        
                </td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
                <td>3</td>
            </tr>            -->
        </table>
    </div>
      

</body>
</html>