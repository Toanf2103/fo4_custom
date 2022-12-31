<?php
    include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc cc à?</title>
    <link rel="stylesheet" href="nhapketqua.css">
    <link rel="icon" type="image/png" href="logo.png">
    <style>
        .box{
            box-sizing: border-box;
            width: 900px;
            margin: 100px auto;
            min-height: 300px;
            background: #efefef;
            padding: 100px 200px;
            font-size: 20px;
            
        }
        .box select{
            font-size: 20px;
            margin-right: 30px;
            padding: 5px;
        }
        .tyso{
            margin-top: 20px;
            font-size: 30px;
        }
        .tyso input{
            font-size: larger;
            width: 100px;
            text-align: center;
            margin-left: 10px;
        }
        
    </style>
    <script src="js.js"></script>
</head>
<body onload='load()'>
    <div class="box">
        
        <span>Chọn vòng</span>
        <select name="vong" id="vong" onchange='getTran()'>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            
        </select>
        <span>Chọn trận</span>
        <select name="tran" id="tran">
            
        </select>
        <div class="tyso">
            <span>tỷ số</span>
            <input type="number" min="0" max="10" name="team1" id="team1">
            <input type="number"min="0" max="10" name="team2" id="team2">
        </div>
        <div class="sub-main">
            <button class="button-two" onclick='xacnhan()'><span>Xong</span></button>
          </div>
    </div>
    
</body>
</html>