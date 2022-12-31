function load(){
    getTran();
}

function getTran(){
    $vong=document.getElementById('vong').value
    xml = new XMLHttpRequest();
    
    {
        xml.onreadystatechange = function() {
            if (xml.readyState == 4){
                
                check=xml.responseText;
                el=document.getElementById('tran')
                el.innerHTML=check;
                     
                // el = document.querySelector('tbody');
                // el.innerHTML=xml.responseText;          
            }
          
        }   
        url = 'xuly.php?actAjax=getTran&vong='+$vong;      
        xml.open("GET", url, "false");
        xml.send();
    }
}
function submit(){
    alertCon
}
function xacnhan(){
    $tran=document.getElementById('tran').value
    $team1=document.getElementById('team1').value;
    $team2=document.getElementById('team2').value;
    
    if($tran=="" || $team1=="" ||$team2==""){
        alert("Nhập đi mày?");
    }else if(confirm("Xác nhận cập nhật kết quả nge mặt lz")){
        xml = new XMLHttpRequest();
    
        {
            xml.onreadystatechange = function() {
                if (xml.readyState == 4){
                    
                    check=xml.responseText;
                    
                    if(check==1){
                        alert("Thêm xong rồi mày!");
                    }
                        
                    // el = document.querySelector('tbody');
                    // el.innerHTML=xml.responseText;          
                }
            
            }   
            url = 'xuly.php?actAjax=updateTran&tran='+$tran+'&team1='+$team1+'&team2='+$team2;      
            xml.open("GET", url, "false");
            xml.send();
        }
    }
}

