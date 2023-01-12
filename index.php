<?php
include('connect.php');
function getTen($id){
    global $conn;
        
    $sql = "SELECT ten,hinh_anh FROM user WHERE id={$id}";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        return $row; 
    }
}

function getAllLoai(){
    global $conn;
         
        $sql = "CALL get_bangdiem()";
            
        $result = $conn->query($sql);
        
        $i=1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr class='row item'>
                        <td><p>{$i}</p></td>
                        <td >
                            <div class='row-icon'>
                                <img class='icon' src='{$row["hinh_anh"]}'>
                                
                                <span>
                                    
                                    <a class='name' href='.?act=chitiet&id={$row["id"]}'>
                                        {$row["ten"]}
                                    </a> 
                                </span>
                            </div>        
                        </td>
                        <td>{$row["so_tran"]}</td>
                        <td>{$row["thang"]}</td>
                        <td>{$row["hoa"]}</td>
                        <td>{$row["thua"]}</td>
                        <td>{$row["hieu_so"]}</td>
                        <td>{$row["diem"]}</td>
                    </tr>";
            $i++;            
            }
            
        }
function getLichDau($vong){
    global $conn;
        
        $sql = "SELECT *from tran_dau WHERE vong={$vong}";
            
        $result = $conn->query($sql);
   
        while ($row = $result->fetch_assoc()) {
                $team1=getTen($row['id_team1'])['ten'];
                $team2=getTen($row['id_team2'])['ten'];
                $anh1=getTen($row['id_team1'])['hinh_anh'];
                $anh2=getTen($row['id_team2'])['hinh_anh'];
                echo "<div class='item'>
                            <div class='team start'>
                                <span>{$team1}</span>
                                <img class='icon' src='{$anh1}'>
                            </div>
                            <span class='tyso'>
                                {$row['diem_1']}-{$row['diem_2']}
                            </span>
                            <div class='team end'>
                                <span>{$team2}</span>
                                <img class='icon' src='{$anh2}'>
                            </div>
                        </div>";                     
            }           
        }

function getSoTran($id_user) {
    global $conn;
        
    $sql = "SELECT count(*) as so_tran, sum(CASE
                                        WHEN id_team1 = {$id_user} then diem_1 - diem_2
                                        WHEN id_team2 = {$id_user} then diem_2 - diem_1
                                    END) as hieu_so
            from tran_dau
            WHERE (id_team1 = {$id_user} or id_team2 = {$id_user})
                and diem_1 is not null
                and diem_2 is not null";
        
    $result = $conn->query($sql);

    return $result->fetch_assoc();
}

function getSoTranThang($id_user) {
    global $conn;
        
    $sql = "SELECT count(*) as so_tran
            FROM tran_dau
            WHERE (id_team1 = {$id_user} AND diem_1 > diem_2)
                OR (id_team2 = {$id_user} AND diem_1 < diem_2)";
        
    $result = $conn->query($sql);

    return $result->fetch_assoc()['so_tran'];
}

function getSoTranThua($id_user) {
    global $conn;
        
    $sql = "SELECT count(*) as so_tran
            FROM tran_dau
            WHERE (id_team1 = {$id_user} AND diem_1 < diem_2)
                OR (id_team2 = {$id_user} AND diem_1 > diem_2)";
        
    $result = $conn->query($sql);

    return $result->fetch_assoc()['so_tran'];
}
function getSoVongDau(){
    global $conn;
    $sql="SELECT MAX(vong) as max FROM tran_dau";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        return $row['max']; 
    }
}

function getTranById($id){
    global $conn;
    $sql = "SELECT * 
            from tran_dau  
            WHERE id_team1={$id} OR id_team2={$id} ";
            
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $team1=getTen($row['id_team1'])['ten'];
        $team2=getTen($row['id_team2'])['ten'];
        $anh1=getTen($row['id_team1'])['hinh_anh'];
        $anh2=getTen($row['id_team2'])['hinh_anh'];
        echo "<div class='item'>
                    <div class='team start'>
                        <span>{$team1}</span>
                        <img class='icon' src='{$anh1}'>
                    </div>
                    <span class='tyso'>
                        {$row['diem_1']}-{$row['diem_2']}
                    </span>
                    <div class='team end'>
                        <span>{$team2}</span>
                        <img class='icon' src='{$anh2}'>
                    </div>
                </div>";                     
    }
}
function getTenById($id){
    global $conn;
    $sql="SELECT * 
          FROM  user 
          WHERE id={$id}";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        return $row['ten']; 
    }
    
}
        

$action = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
switch ($action) {
    case 'bang_xep_hang':
        include('bangxephang.php');
        break;
    case 'lichdau':
        include('lichdau.php');
        break;
    case 'chitiet':
        include('chitiet.php');
        break;
    default:
        include('bangxephang.php');
    break;

}
?>

