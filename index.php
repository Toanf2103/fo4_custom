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
        
        $sql = "SELECT *from user order by diem";
            
        $result = $conn->query($sql);
        
        
        $i=0;
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

