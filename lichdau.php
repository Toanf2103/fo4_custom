<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cssLich.css">
</head>
<body>
    <div class="box">
        <a href=".?act=">Bảng xếp hạng</a>
        <h1>Kết quả</h1>
        
            <?php
            
                for ($i = 1; $i <= 7; $i++) {
                    echo "<div class='title'>";
                    echo "<h2>Vòng {$i}</h2>";
                    getLichDau($i);
                    echo "</div>";
                }
            ?>

                <!-- <div>
                    <h2>Vòng 1</h2>
                
                    <div class='team'>
                        <div class='team1 item'>
                            
                            <p>tem1</p>
                            <img src=''>
                        </div>
                        <div class='ty_so item'>
                        <p>3-2</p>
                        </div>
                        <div class='team2 item'>
                            <p>tem1</p>
                            <img src=''>
                                                
                            
                        </div>
                    </div>
                    
                </div>         -->
                
        
 
        </div>
    </div>
</body>
</html>