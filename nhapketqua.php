<?php
    include('connect.php');
    function getAllVong(){
        global $conn;         
        $sql = "SELECT DISTINCT tran_dau.vong FROM tran_dau";              
        $result = $conn->query($sql);   
        while ($row = $result->fetch_assoc()) {
                echo "<tr class='wpos'>
                                    <td>{$i}</td>
                                    <td>
                                    <img src='{$row["hinh_anh"]}'>
                                    {$row["ten"]}</td>
                                    <td>{$row["so_tran"]}</td>
                                    <td>{$row["win"]}</td>
                                    <td>{$row["draw"]}</td>
                                    <td>{$row["lose"]}</td>
                                    <td>{$row["gd"]} </td>
                                    <td>{$row["diem"]}</td>
                                </tr>";
                $i++;
                
            }    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nhapketqua.css">
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
            font-size: 30px;
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
<body>
    <div class="box">
        <span>Chọn vòng</span>
        <select name="vong" id="vong">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
        </select>
        <span>Chọn trận</span>
        <select name="tran" id="tran">
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
        </select>
        <div class="tyso">
            <span>tỷ số</span>
            <input type="number" min="0" max="10" name="team1" id="team1">
            <input type="number"min="0" max="10" name="team2" id="team2">
        </div>
        <div class="sub-main">
            <button class="button-two"><span>Xong</span></button>
          </div>
    </div>
    
</body>
</html>