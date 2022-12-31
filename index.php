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
            echo "<tr class='wpos'>
                                <td>{$i}</td>
                                <td>
                                <img src='{$row["hinh_anh"]}'>
                                {$row["ten"]}</td>
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

                echo " 
                <div>
                            <div class='team'>
                                <div class='team1 item'>
                                    
                                    <p>{$team1}</p>
                                    <img src='{$anh1}'>
                                </div>
                                <div class='ty_so item'>
                                <p>{$row['diem_1']}-{$row['diem_2']}</p>
                                </div>
                                <div class='team2 item'>
                                    <p>{$team2}</p>
                                    <img src='{$anh2}'>

                                </div>
                            </div>
                            
                        </div> ";
                
                
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
      
        

$action = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
switch ($action) {
    case 'bang_xep_hang':
        include('bangxephang.php');
        break;
    case 'lichdau':
        include('lichdau.php');
        break;
    default:
        include('bangxephang.php');
    break;

}
?>

