<?php
    include('connect.php');
    function getTen($id){
        global $conn;
            
        $sql = "SELECT ten,hinh_anh FROM user WHERE id={$id}";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            return $row['ten']; 
        }
    }
    function getTranByVong($vong){
        global $conn;
        $sql = "SELECT * from tran_dau 
                 WHERE vong={$vong}";
            
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $team1=getTen($row['id_team1']);
            $team2=getTen($row['id_team2']);

            echo "<option value={$row["id"]}>{$team1} - {$team2}</option>";
            
        }
    }
    function updateTran($tran,$team1,$team2)
    {
        global $conn;
        $sql="UPDATE tran_dau 
         SET diem_1 = {$team1},diem_2 = {$team2}
         WHERE tran_dau.id = {$tran}";
        $result=$conn->query($sql);
        if($result!=null){
            $conn->close();
            return true;
        }
        $conn->close();
        return false;
    }

    

    $action = isset($_REQUEST['actAjax']) ? $_REQUEST['actAjax'] : '';
    switch ($action) {
        case 'getTran':
            $vong=$_REQUEST['vong'];
            getTranByVong($vong);
            break;
        case 'updateTran':
            $tran=$_REQUEST['tran'];
            $team1=$_REQUEST['team1'];
            $team2=$_REQUEST['team2'];

            echo updateTran($tran,$team1,$team2);
            break;
        default:
            include('bangxephang.php');
        break;

    }
