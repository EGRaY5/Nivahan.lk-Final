<?php
    require('dbcon.php');

    function get_chat_list($sender){
        global $conn;
        $sqlCode = "SELECT DISTINCT sender FROM chat WHERE connector LIKE '%$sender%' ";
        $sqlCode1 = "SELECT DISTINCT reciever FROM chat WHERE connector LIKE '$sender%'";
        $run = mysqli_query($conn,$sqlCode);
        $run1 = mysqli_query($conn,$sqlCode1);
        $recievers = array();
        while($reciever = mysqli_fetch_assoc($run)){
            if($reciever['sender'] == $sender){

            }else{
                $recievers[] = array('reciever'=>$reciever['sender']);
            }

        }

        while($reciever1 = mysqli_fetch_assoc($run1)){
            if($reciever['reciever'] == $sender){

            }else{
                $flag = 'no';
                foreach($recievers as $position){
                    if($position['reciever'] == $reciever1['reciever']){
                        $flag='yes';
                    }
                }
                if($flag == 'no'){
                    $recievers[] = array('reciever'=>$reciever1['reciever']);
                }

            }

        }

        return $recievers;
    }

    function send_msg($sender,$reciever,$message){
        global $conn;
        $connector = $sender."_".$reciever;
        $sqlCode = "INSERT INTO chat (sender,reciever,connector,message) VALUES ('$sender','$reciever','$connector','$message')";
        if(mysqli_query($conn,$sqlCode)){
            return true;
        }else{
            return false;
        }
    }

    function getAllMsgByUser($user,$reciever){
        global $conn;
        $connector1 = $user."_".$reciever;
        $connector2 = $reciever."_".$user;

        $sqlCode="SELECT sender,message FROM chat WHERE connector='$connector1' OR connector='$connector2' ORDER BY msg_date DESC";
        $res = mysqli_query($conn,$sqlCode);
        $messages = array();
        while($row = mysqli_fetch_assoc($res)){
            $messages[] = array('sender'=>$row['sender'],'message'=>$row['message']);
        }

        return $messages;

    }

?>